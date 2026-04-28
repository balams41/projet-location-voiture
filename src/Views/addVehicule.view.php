
<?php $title = "Ajouter un véhicule"; ?>
<?php require_once(__DIR__ . "/partials/head.view.php"); ?>
<div class="container mt-4">
    <h2 class="mb-4">Ajouter un véhicule</h2>

    <?php if(!empty($this->arrayError['general'])): ?>
        <div class="alert alert-danger"><?= $this->arrayError['general'] ?></div>
    <?php endif; ?>

    <form method="POST" action="/vehicules/ajouter">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="brand" class="form-label">Marque *</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?= $_POST['brand'] ?? '' ?>" placeholder="ex : Renault">
                <?php if(!empty($this->arrayError['brand'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['brand'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="model" class="form-label">Modèle *</label>
                <input type="text" class="form-control" id="model" name="model" value="<?= $_POST['model'] ?? '' ?>" placeholder="ex : Clio">
                <?php if(!empty($this->arrayError['model'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['model'] ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="color" class="form-label">Couleur *</label>
                <input type="text" class="form-control" id="color" name="color" value="<?= $_POST['color'] ?? '' ?>" placeholder="ex : Blanc">
                <?php if(!empty($this->arrayError['color'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['color'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="gearbox" class="form-label">Boîte de vitesses *</label>
                <select class="form-select" id="gearbox" name="gearbox">
                    <option value="">-- Choisir --</option>
                    <?php foreach(['Manuelle', 'Automatique'] as $g): ?>
                        <option value="<?= $g ?>" <?= (($_POST['gearbox'] ?? '') === $g) ? 'selected' : '' ?>><?= $g ?></option>
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
                    <option value="">-- Choisir --</option>
                    <?php foreach(['Essence', 'Diesel', 'Électrique', 'Hybride', 'GPL'] as $fuel): ?>
                        <option value="<?= $fuel ?>" <?= (($_POST['fuel_type'] ?? '') === $fuel) ? 'selected' : '' ?>><?= $fuel ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if(!empty($this->arrayError['fuel_type'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['fuel_type'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="mileage" class="form-label">Kilométrage (km) *</label>
                <input type="number" class="form-control" id="mileage" name="mileage" value="<?= $_POST['mileage'] ?? '' ?>" min="0" placeholder="ex : 45000">
                <?php if(!empty($this->arrayError['mileage'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['mileage'] ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="registration_plate" class="form-label">Immatriculation *</label>
                <input type="text" class="form-control" id="registration_plate" name="registration_plate" value="<?= $_POST['registration_plate'] ?? '' ?>" placeholder="ex : AB-123-CD">
                <?php if(!empty($this->arrayError['registration_plate'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['registration_plate'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Prix (€) *</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= $_POST['price'] ?? '' ?>" min="1" step="0.01" placeholder="ex : 12500">
                <?php  if(!empty($this->arrayError['price'])): ?>
                    <div class="text-danger small"><?= $this->arrayError['price'] ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description *</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Décrivez l'état et les équipements..."><?= $_POST['description'] ?? '' ?></textarea>
            <?php if(!empty($this->arrayError['description'])): ?>
                <div class="text-danger small"><?= $this->arrayError['description'] ?></div>
            <?php endif; ?>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" name="addVehicle" class="btn btn-primary">Publier l'annonce</button>
            <a href="/vehicules" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
<?php require_once(__DIR__ . "/partials/footer.view.php"); ?>