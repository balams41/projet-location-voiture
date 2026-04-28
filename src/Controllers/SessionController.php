<?php
namespace App\Controllers;
use App\Models\User;
use App\Utils\AbstractController;

class SessionController extends AbstractController
{
    public function login()
    {
        if (isset($_POST['login'])) {
            $email    = htmlspecialchars($_POST['email']);
            $password = $_POST['password']; // ✅ pas de htmlspecialchars

            if(empty($email)){
                $this->arrayError['email'] = "Ce champs ne peut pas être vide.";
            }
            if(empty($password)){
                $this->arrayError['password'] = "Ce champs ne peut pas être vide.";
            }

            if (!$this->arrayError) {
                $user   = new User(null, null, null, $email);
                $myUser = $user->getUserByEmail();

                if (!$myUser || !$myUser->getPassword()) {
                    $verifPassword = false;
                } else {
                    $verifPassword = password_verify($password, $myUser->getPassword());
                }

                if ($verifPassword) {
                    $_SESSION['user'] = [
                        'id_client'  => $myUser->getIdClient(),
                        'email'      => $myUser->getEmail(),
                        'last_name'  => $myUser->getLastName(),
                        'first_name' => $myUser->getFirstName(),
                    ];
                    $this->redirectToRoute('/', 301); // ✅ redirige ici après connexion réussie
                } else {
                    $this->arrayError['general'] = "Adresse email ou mot de passe incorrect";
                }
            }
        }
        require_once(__DIR__ . '/../Views/login.view.php');
    }

    public function logout()
    {
        session_destroy();
        $this->redirectToRoute('/', 200);
    }
}
// ❌ Rien en dehors de la classe !