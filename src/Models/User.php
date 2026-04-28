<?php

namespace App\Models;

use PDO;
use Config\Database;

class User
{
    private ?int $id_client;
    private ?string $last_name;
    private ?string $first_name;
    private ?string $email;
    private ?string $phone;
    private ?string $adress;
    private ?string $city;
    private ?int $postal_code;
    private ?string $date_of_birth;
    private ?string $driving_licence;
    private ?string $password;

    public function __construct(
        ?int $id_client = null,
        ?string $last_name = null,
        ?string $first_name = null,
        ?string $email = null,
        ?string $phone = null,
        ?string $adress = null,
        ?string $city = null,
        ?int $postal_code = null,
        ?string $date_of_birth = null,
        ?string $driving_licence = null,
        ?string $password = null
    ) {
        $this->id_client = $id_client;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->adress = $adress;
        $this->city = $city;
        $this->postal_code = $postal_code;
        $this->date_of_birth = $date_of_birth;
        $this->driving_licence = $driving_licence;
        $this->password = $password;
    }

    // ✅ password ajouté dans la requête SQL
    public function saveUser(): bool
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO `client` 
                (`last_name`, `first_name`, `email`, `phone`, `adress`, `city`, `postal_code`, `date_of_birth`, `driving_licence`, `password`) 
                VALUES (?,?,?,?,?,?,?,?,?,?)";

        $statement = $pdo->prepare($sql);

        return $statement->execute([
            $this->last_name,
            $this->first_name,
            $this->email,
            $this->phone,
            $this->adress,
            $this->city,
            $this->postal_code,
            $this->date_of_birth,
            $this->driving_licence,
            $this->password // ✅
        ]);
    }

    // ✅ password ajouté dans la requête SQL et dans le constructeur
    public function getUserByEmail(): User|false
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `id_client`, `last_name`, `first_name`, `email`, `phone`, `adress`, `city`, `postal_code`, `date_of_birth`, `driving_licence`, `password` 
                FROM `client` WHERE `email` = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->email]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new User(
                $result['id_client'],
                $result['last_name'],
                $result['first_name'],
                $result['email'],
                $result['phone'],
                $result['adress'],
                $result['city'],
                $result['postal_code'],
                $result['date_of_birth'],
                $result['driving_licence'],
                $result['password'] // ✅
            );
        }

        return false;
    }

    public function getUserById(): User|false
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `id_client`, `last_name`, `first_name`, `email`, `phone`, `adress`, `city`, `postal_code`, `date_of_birth`, `driving_licence` 
                FROM `client` WHERE `id_client` = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id_client]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new User(
                $result['id_client'],
                $result['last_name'],
                $result['first_name'],
                $result['email'],
                $result['phone'],
                $result['adress'],
                $result['city'],
                $result['postal_code'],
                $result['date_of_birth'],
                $result['driving_licence']
            );
        }

        return false;
    }

    public function updateUser(): bool
    {
        if (!$this->id_client) {
            throw new \Exception("Impossible de mettre à jour sans id_client");
        }

        $pdo = Database::getConnection();
        $sql = "UPDATE `client` 
                SET `last_name` = ?, `first_name` = ?, `email` = ?, `phone` = ?, `adress` = ?, `city` = ?, `postal_code` = ?, `date_of_birth` = ?, `driving_licence` = ? 
                WHERE `id_client` = ?";
        $statement = $pdo->prepare($sql);
        return $statement->execute([
            $this->last_name,
            $this->first_name,
            $this->email,
            $this->phone,
            $this->adress,
            $this->city,
            $this->postal_code,
            $this->date_of_birth,
            $this->driving_licence,
            $this->id_client
        ]);
    }

    public function deleteUser(): bool
    {
        if (!$this->id_client) {
            throw new \Exception("Impossible de supprimer sans id_client");
        }

        $pdo = Database::getConnection();
        $sql = "DELETE FROM `client` WHERE `id_client` = ?";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id_client]);
    }

    // ✅ password ajouté dans getAllUsers
    public function getAllUsers(): array
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `id_client`, `last_name`, `first_name`, `email`, `phone`, `adress`, `city`, `postal_code`, `date_of_birth`, `driving_licence`, `password` 
                FROM `client`";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($results as $result) {
            $users[] = new User(
                $result['id_client'],
                $result['last_name'],
                $result['first_name'],
                $result['email'],
                $result['phone'],
                $result['adress'],
                $result['city'],
                $result['postal_code'],
                $result['date_of_birth'],
                $result['driving_licence'],
                $result['password']
            );
        }

        return $users;
    }

    // =============== GETTERS ===============

    public function getIdClient(): ?int { return $this->id_client; }
    public function getLastName(): ?string { return $this->last_name; }
    public function getFirstName(): ?string { return $this->first_name; }
    public function getEmail(): ?string { return $this->email; }
    public function getPhone(): ?string { return $this->phone; }
    public function getAdress(): ?string { return $this->adress; }
    public function getCity(): ?string { return $this->city; }
    public function getPostalCode(): ?int { return $this->postal_code; }
    public function getDateOfBirth(): ?string { return $this->date_of_birth; }
    public function getDrivingLicence(): ?string { return $this->driving_licence; }
    public function getPassword(): ?string { return $this->password; }

    // =============== SETTERS ===============

    public function setIdClient(int $id_client): void { $this->id_client = $id_client; }
    public function setLastName(string $last_name): void { $this->last_name = $last_name; }
    public function setFirstName(string $first_name): void { $this->first_name = $first_name; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function setPhone(string $phone): void { $this->phone = $phone; }
    public function setAdress(string $adress): void { $this->adress = $adress; }
    public function setCity(string $city): void { $this->city = $city; }
    public function setPostalCode(int $postal_code): void { $this->postal_code = $postal_code; }
    public function setDateOfBirth(string $date_of_birth): void { $this->date_of_birth = $date_of_birth; }
    public function setDrivingLicence(string $driving_licence): void { $this->driving_licence = $driving_licence; }
    public function setPassword(string $password): void { $this->password = $password; }
}