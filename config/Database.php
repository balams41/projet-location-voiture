<?php

namespace Config;

use PDO;
use Exception;

class Database
{
    static function getConnection()
    {
        try {
            // Connexion à la base
          $pdo = new PDO(
        "mysql:host=location-database;dbname=location;charset=utf8",
        "user",
        "user"
);

         
            //echo "Connexion réussie ✅";


        } catch (Exception $e) {
            // Gestion d'erreur
            die("Erreur de connexion ❌ : " . $e->getMessage());
        };
        return $pdo;
    }
}

