<?php
require_once(__DIR__ . '/../vendor/autoload.php');
session_start();
use Config\Router;

$router = new Router;

$router->addRoute('/', 'HomeController', 'index');
$router->addRoute('/inscription', 'RegisterController', 'index');
$router->addRoute('/connexion', 'SessionController', 'login');
$router->addRoute('/connexion', 'SessionController', 'login');
$router->addRoute('/vehicules', 'VehiculeController', 'index');
$router->addRoute('/deconnexion', 'SessionController', 'logout');


$router->addRoute('/vehicules',           'VehiculeController', 'index');
$router->addRoute('/vehicules/voir',      'VehiculeController', 'vehicule');
$router->addRoute('/vehicules/ajouter',   'VehiculeController', 'addVehicule');
$router->addRoute('/vehicules/modifier',  'VehiculeController', 'editVehicule');
$router->addRoute('/vehicules/supprimer', 'VehiculeController', 'deleteVehicule');

$router->handleRequest();
