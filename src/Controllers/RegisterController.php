<?php 

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\User;

class RegisterController extends AbstractController
{
    public function index()
    {
        // Si le client click sur submit
        if(isset($_POST['register'])){
            $last_name = htmlspecialchars($_POST['last_name']);
            $first_name = htmlspecialchars($_POST['first_name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $adress = htmlspecialchars($_POST['adress']);
            $city = htmlspecialchars($_POST['city']);
            $postal_code = htmlspecialchars($_POST['postal_code']);
            $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
            $driving_licence = htmlspecialchars($_POST['driving_licence']);
            $password = $_POST['password']; // ✅ PAS de htmlspecialchars sur le mot de passe

            // Validations
            $this->totalCheck("last_name", $last_name);
            $this->totalCheck("first_name", $first_name);
            $this->totalCheck("email", $email);
            $this->totalCheck("phone", $phone);
            $this->checkFormat('adress', $adress);
            $this->checkFormat('city', $city);
            $this->totalCheck("postal_code", $postal_code);
            $this->totalCheck("date_of_birth", $date_of_birth);
            $this->checkFormat('driving_licence', $driving_licence);
            // ✅ Validation manuelle du mot de passe
            if(empty($password)){
                $this->arrayError['password'] = "Le mot de passe est obligatoire";
            }

            // Hash du mot de passe
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Vérifier si l'email existe déjà
            $userCheck = new User(null, $last_name, $first_name, $email, $phone, $adress, $city, $postal_code, $date_of_birth, $driving_licence, $passwordHash);

            $ifExist = $userCheck->getUserByEmail();

            if($ifExist){

                // Un compte avec cet email existe déjà
                $this->arrayError['email'] = "Un compte avec cette adresse email a déjà été créé";

            } else {

                // Créer le nouvel utilisateur
                $user = new User(
                    null,
                    $last_name,
                    $first_name,
                    $email,
                    $phone,
                    $adress,
                    $city,
                    $postal_code,
                    $date_of_birth,
                    $driving_licence,
                    $passwordHash // ✅ mot de passe hashé correctement
                );

                // Enregistrer dans la base de données
                if($user->saveUser()){
                    // Redirection vers la page de connexion
                    $this->redirectToRoute("/", 200);
                } else {
                    $this->arrayError['general'] = "Une erreur s'est produite lors de l'enregistrement";
                }
            }
        }

        require_once(__DIR__ . "/../Views/register.view.php");
    }
}