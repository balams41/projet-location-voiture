<?php

namespace App\Models;

use PDO;
use Config\Database;

class Vehicle
{
    private ?int $id_vehicle;
    private ?string $brand;
    private ?string $model;
    private ?string $color;
    private ?string $gearbox;
    private ?float $mileage;
    private ?string $description;
    private ?string $registration_plate;
    private ?string $fuel_type;
    private ?float $price;

    public function __construct(
        ?int $id_vehicle = null,
        ?string $brand = null,
        ?string $model = null,
        ?string $color = null,
        ?string $gearbox = null,
        ?float $mileage = null,
        ?string $description = null,
        ?string $registration_plate = null,
        ?string $fuel_type = null,
        ?float $price = null
    ) {
        $this->id_vehicle = $id_vehicle;
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->gearbox = $gearbox;
        $this->mileage = $mileage;
        $this->description = $description;
        $this->registration_plate = $registration_plate;
        $this->fuel_type = $fuel_type;
        $this->price = $price;
    }

    // CREATE
    public function addVehicle(): bool
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO vehicle 
        (brand, model, color, gearbox, mileage, description, registration_plate, fuel_type, price)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $this->brand,
            $this->model,
            $this->color,
            $this->gearbox,
            $this->mileage,
            $this->description,
            $this->registration_plate,
            $this->fuel_type,
            $this->price
        ]);
    }

    // READ ONE
    public function getVehicleById(): self|false
    {
        $pdo = Database::getConnection();
        $sql = "SELECT * FROM vehicle WHERE id_vehicle = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->id_vehicle]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new Vehicle(...array_values($data));
        }
        return false;
    }

    // READ ALL
    public function getAllVehicles(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM vehicle ORDER BY id_vehicle DESC"); 

        $vehicles = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vehicles[] = new Vehicle(...array_values($row));
        }

        return $vehicles;
    }

    // UPDATE
    public function updateVehicle(): bool
    {
        $pdo = Database::getConnection();
        $sql = "UPDATE vehicle SET 
        brand=?, model=?, color=?, gearbox=?, mileage=?, description=?, registration_plate=?, fuel_type=?, price=?
        WHERE id_vehicle=?";

        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $this->brand,
            $this->model,
            $this->color,
            $this->gearbox,
            $this->mileage,
            $this->description,
            $this->registration_plate,
            $this->fuel_type,
            $this->price,
            $this->id_vehicle
        ]);
    }

    // DELETE
    public function deleteVehicle(): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM vehicle WHERE id_vehicle = ?");
        return $stmt->execute([$this->id_vehicle]);
    }

 // =============== GETTERS ===============

public function getIdVehicle(): ?int
{
    return $this->id_vehicle;
}

public function getBrand(): ?string
{
    return $this->brand;
}

public function getModel(): ?string
{
    return $this->model;
}

public function getColor(): ?string
{
    return $this->color;
}

public function getGearbox(): ?string
{
    return $this->gearbox;
}

public function getMileage(): ?float
{
    return $this->mileage;
}

public function getDescription(): ?string
{
    return $this->description;
}

public function getRegistrationPlate(): ?string
{
    return $this->registration_plate;
}

public function getFuelType(): ?string
{
    return $this->fuel_type;
}

public function getPrice(): ?float
{
    return $this->price;
}


// =============== SETTERS ===============

public function setIdVehicle(int $id_vehicle): void
{
    $this->id_vehicle = $id_vehicle;
}

public function setBrand(string $brand): void
{
    $this->brand = $brand;
}

public function setModel(string $model): void
{
    $this->model = $model;
}

public function setColor(string $color): void
{
    $this->color = $color;
}

public function setGearbox(string $gearbox): void
{
    $this->gearbox = $gearbox;
}

public function setMileage(float $mileage): void
{
    $this->mileage = $mileage;
}

public function setDescription(string $description): void
{
    $this->description = $description;
}

public function setRegistrationPlate(string $registration_plate): void
{
    $this->registration_plate = $registration_plate;
}

public function setFuelType(string $fuel_type): void
{
    $this->fuel_type = $fuel_type;
}

public function setPrice(float $price): void
{
    $this->price = $price;
}
}