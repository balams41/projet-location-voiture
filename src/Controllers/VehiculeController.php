<?php

namespace App\Controllers;

use App\Models\Vehicle;       // ✅ vrai nom du modèle
use App\Utils\AbstractController;

class VehiculeController extends AbstractController
{
    // ───── LISTE DE TOUS LES VÉHICULES ──────────────────────────────────────

    public function index()
    {
        $vehicule  = new Vehicle();
        $vehicules = $vehicule->getAllVehicles();   // ✅ vrai nom de méthode

        require_once(__DIR__ . '/../Views/vehicule.view.php');
    }

    // ───── VOIR UN VÉHICULE PAR SON ID ──────────────────────────────────────

    public function vehicule()
    {
        if (isset($_GET['id'])) {
            $id         = htmlspecialchars($_GET['id']);
            $vehicule   = new Vehicle($id);
            $myVehicule = $vehicule->getVehicleById();   // ✅

            if ($myVehicule) {
                require_once(__DIR__ . '/../Views/singlevehicule.view.php');
            } else {
                $this->redirectToRoute('/vehicules', 302);
            }
        } else {
            $this->redirectToRoute('/vehicules', 302);
        }
    }

    // ───── AJOUTER UN VÉHICULE ───────────────────────────────────────────────

    public function addVehicle()
    {
        if (isset($_SESSION['user'])) {
            if (isset($_POST['add_vehicle'])) {
                $brand              = htmlspecialchars($_POST['brand']);
                $model              = htmlspecialchars($_POST['model']);
                $color              = htmlspecialchars($_POST['color']);
                $gearbox            = htmlspecialchars($_POST['gearbox']);
                $mileage            = (float) $_POST['mileage'];
                $description        = htmlspecialchars($_POST['description']);
                $registration_plate = htmlspecialchars($_POST['registration_plate']);
                $fuel_type          = htmlspecialchars($_POST['fuel_type']);
                $price              = (float) $_POST['price'];

                if (empty($brand))              $this->arrayError['brand']              = "La marque est obligatoire.";
                if (empty($model))              $this->arrayError['model']              = "Le modèle est obligatoire.";
                if (empty($color))              $this->arrayError['color']              = "La couleur est obligatoire.";
                if (empty($gearbox))            $this->arrayError['gearbox']            = "La boîte de vitesses est obligatoire.";
                if ($mileage < 0)               $this->arrayError['mileage']            = "Le kilométrage ne peut pas être négatif.";
                if (empty($description))        $this->arrayError['description']        = "La description est obligatoire.";
                if (empty($registration_plate)) $this->arrayError['registration_plate'] = "La plaque d'immatriculation est obligatoire.";
                if (empty($fuel_type))          $this->arrayError['fuel_type']          = "Le type de carburant est obligatoire.";
                if ($price <= 0)                $this->arrayError['price']              = "Le prix doit être supérieur à 0.";

                if (empty($this->arrayError)) {
                    $vehicle = new Vehicle(null, $brand, $model, $color, $gearbox, $mileage, $description, $registration_plate, $fuel_type, $price);

                    if ($vehicule->addVehicle()) {      // ✅
                        $this->redirectToRoute('/vehicules', 302);
                    } else {
                        $this->arrayError['general'] = "Une erreur est survenue lors de l'ajout.";
                    }
                }
            }

            require_once(__DIR__ . '/../Views/addVehicule.view.php');
        } else {
            $this->redirectToRoute('/connexion', 302);
        }
    }

    // ───── MODIFIER UN VÉHICULE ──────────────────────────────────────────────

    public function editVehicule()
    {
        if (isset($_SESSION['user'])) {
            if (isset($_GET['id'])) {
                $id         = htmlspecialchars($_GET['id']);
                $vehicule   = new Vehicle($id);
                $myVehicule = $vehicule->getVehicleById();   // ✅

                if ($myVehicule) {
                    if (isset($_POST['edit_vehicule'])) {
                        $brand              = htmlspecialchars($_POST['brand']);
                        $model              = htmlspecialchars($_POST['model']);
                        $color              = htmlspecialchars($_POST['color']);
                        $gearbox            = htmlspecialchars($_POST['gearbox']);
                        $mileage            = (float) $_POST['mileage'];
                        $description        = htmlspecialchars($_POST['description']);
                        $registration_plate = htmlspecialchars($_POST['registration_plate']);
                        $fuel_type          = htmlspecialchars($_POST['fuel_type']);
                        $price              = (float) $_POST['price'];

                        if (empty($brand))              $this->arrayError['brand']              = "La marque est obligatoire.";
                        if (empty($model))              $this->arrayError['model']              = "Le modèle est obligatoire.";
                        if (empty($color))              $this->arrayError['color']              = "La couleur est obligatoire.";
                        if (empty($gearbox))            $this->arrayError['gearbox']            = "La boîte de vitesses est obligatoire.";
                        if ($mileage < 0)               $this->arrayError['mileage']            = "Le kilométrage ne peut pas être négatif.";
                        if (empty($description))        $this->arrayError['description']        = "La description est obligatoire.";
                        if (empty($registration_plate)) $this->arrayError['registration_plate'] = "La plaque d'immatriculation est obligatoire.";
                        if (empty($fuel_type))          $this->arrayError['fuel_type']          = "Le type de carburant est obligatoire.";
                        if ($price <= 0)                $this->arrayError['price']              = "Le prix doit être supérieur à 0.";

                        if (empty($this->arrayError)) {
                            $updatedVehicule = new Vehicle($id, $brand, $model, $color, $gearbox, $mileage, $description, $registration_plate, $fuel_type, $price);

                            if ($updatedVehicule->updateVehicle()) {    // ✅
                                $this->redirectToRoute('/vehicules/voir?id=' . $id, 302);
                            } else {
                                $this->arrayError['general'] = "Une erreur est survenue lors de la modification.";
                            }
                        }
                    }

                    require_once(__DIR__ . '/../Views/editvehicule.view.php');
                } else {
                    $this->redirectToRoute('/vehicules', 302);
                }
            } else {
                $this->redirectToRoute('/vehicules', 302);
            }
        } else {
            $this->redirectToRoute('/connexion', 302);
        }
    }

    // ───── SUPPRIMER UN VÉHICULE ─────────────────────────────────────────────

    public function deleteVehicule()
    {
        if (isset($_SESSION['user'])) {
            if (isset($_GET['id'])) {
                $id         = htmlspecialchars($_GET['id']);
                $vehicule   = new Vehicle($id);
                $myVehicule = $vehicule->getVehicleById();   // ✅

                if ($myVehicule) {
                    $vehicule->deleteVehicle();              // ✅
                    $this->redirectToRoute('/vehicules', 302);
                } else {
                    $this->redirectToRoute('/vehicules', 302);
                }
            } else {
                $this->redirectToRoute('/vehicules', 302);
            }
        } else {
            $this->redirectToRoute('/connexion', 302);
        }
    }
}