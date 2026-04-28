<?php $title = "Modifier " . $myVehicule->getBrand() . ' ' . $myVehicule->getModel(); ?>
<?php require_once(__DIR__ . "/partials/head.view.php"); ?>

<div class="container mt-4">
    <h2 class="mb-4">Modifier : <?= $myVehicule->getBrand() ?> <?= $myVehicule->getModel() ?></h2>

    <?php if(!empty($this->arrayError['general'])): ?>
        <div class="alert alert-danger"><?= $this->arrayError['general'] ?></div>
    <?php endif; ?>

    <form method="POST" action="/vehicules/modifier?id=<?= $myVehicule->getIdVehicle() ?>">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="brand" class="form-label">Marque *</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?= $_POST['brand'] ?? $myVehicule->getBrand() ?>">
                <?php if(!empty($this->arrayError['brand'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['brand'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="model" class="form-label">Modèle *</label>
                <input type="text" class="form-control" id="model" name="model" value="<?= $_POST['model'] ?? $myVehicule->getModel() ?>">
                <?php if(!empty($this->arrayError['model'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['model'] ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="color" class="form-label">Couleur *</label>
                <input type="text" class="form-control" id="color" name="color" value="<?= $_POST['color'] ?? $myVehicule->getColor() ?>">
                <?php if(!empty($this->arrayError['color'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['color'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="gearbox" class="form-label">Boîte de vitesses *</label>
                <select class="form-select" id="gearbox" name="gearbox">
                    <?php
                        $currentGearbox = $_POST['gearbox'] ?? $myVehicule->getGearbox();
                        foreach(['Manuelle', 'Automatique'] as $g):
                    ?>
                        <option value="<?= $g ?>" <?= $currentGearbox === $g ? 'selected' : '' ?>><?= $g ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if(!empty($this->arrayError['gearbox'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['gearbox'] ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fuel_type" class="form-label">Carburant *</label>
                <select class="form-select" id="fuel_type" name="fuel_type">
                    <?php
                        $currentFuel = $_POST['fuel_type'] ?? $myVehicule->getFuelType();
                        foreach(['Essence', 'Diesel', 'Électrique', 'Hybride', 'GPL'] as $fuel):
                    ?>
                        <option value="<?= $fuel ?>" <?= $currentFuel === $fuel ? 'selected' : '' ?>><?= $fuel ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if(!empty($this->arrayError['fuel_type'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['fuel_type'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="mileage" class="form-label">Kilométrage (km) *</label>
                <input type="number" class="form-control" id="mileage" name="mileage" value="<?= $_POST['mileage'] ?? $myVehicule->getMileage() ?>" min="0">
                <?php if(!empty($this->arrayError['mileage'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['mileage'] ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="registration_plate" class="form-label">Immatriculation *</label>
                <input type="text" class="form-control" id="registration_plate" name="registration_plate" value="<?= $_POST['registration_plate'] ?? $myVehicule->getRegistrationPlate() ?>">
                <?php if(!empty($this->arrayError['registration_plate'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['registration_plate'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Prix (€) *</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= $_POST['price'] ?? $myVehicule->getPrice() ?>" min="1" step="0.01">
                <?php if(!empty($this->arrayError['price'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['price'] ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description *</label>
            <textarea class="form-control" id="description" name="description" rows="4"><?= $_POST['description'] ?? $myVehicule->getDescription() ?></textarea>
            <?php if(!empty($this->arrayError['description'])): ?>
                <div class="text-danger small"><?= $this->arrayError['description'] ?></div>
            <?php endif; ?>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" name="editVehicule" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="/vehicules/voir?id=<?= $myVehicule->getIdVehicle() ?>" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>

<?php require_once(__DIR__ . "/partials/footer.view.php"); ?>