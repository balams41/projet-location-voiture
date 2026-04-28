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

$router->addRoute('/vehicules',          'VehiculeController', 'index');
$router->addRoute('/vehicule/voir',     'VehiculeController', 'vehicle');
$router->addRoute('/vehicule/ajouter',  'VehiculeController', 'addVehicle');
$router->addRoute('/vehicule/modifier', 'VehiculeController', ' updateVehicle');
$router->addRoute('/vehicule/delete', 'VehiculeController', 'deleteVehicule');

$router->handleRequest();