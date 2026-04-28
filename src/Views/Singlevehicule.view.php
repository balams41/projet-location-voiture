<?php $title = $myVehicule->getBrand() . ' ' . $myVehicule->getModel(); ?>
<?php require_once(__DIR__ . "/partials/head.view.php"); ?>

<div class="container mt-4">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/vehicules">Véhicules</a></li>
            <li class="breadcrumb-item active"><?= $myVehicule->getBrand() ?> <?= $myVehicule->getModel() ?></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><?= $myVehicule->getBrand() ?> <?= $myVehicule->getModel() ?></h4>
            <span class="badge bg-secondary"><?= $myVehicule->getRegistrationPlate() ?></span>
        </div>
        <div class="card-body">
            <h3 class="text-primary fw-bold mb-4"><?= number_format($myVehicule->getPrice(), 2, ',', ' ') ?> €</h3>

            <div class="row mb-3">
                <div class="col-md-3">
                    <small class="text-muted text-uppercase">Couleur</small>
                    <p class="fw-bold"><?= $myVehicule->getColor() ?></p>
                </div>
                <div class="col-md-3">
                    <small class="text-muted text-uppercase">Boîte de vitesses</small>
                    <p class="fw-bold"><?= $myVehicule->getGearbox() ?></p>
                </div>
                <div class="col-md-3">
                    <small class="text-muted text-uppercase">Carburant</small>
                    <p class="fw-bold"><?= $myVehicule->getFuelType() ?></p>
                </div>
                <div class="col-md-3">
                    <small class="text-muted text-uppercase">Kilométrage</small>
                    <p class="fw-bold"><?= number_format($myVehicule->getMileage(), 0, ',', ' ') ?> km</p>
                </div>
            </div>

            <small class="text-muted text-uppercase">Description</small>
            <p><?= nl2br($myVehicule->getDescription()) ?></p>
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="/vehicules" class="btn btn-secondary">← Retour</a>
            <?php if(isset($_SESSION['user'])): ?>
                <a href="/vehicules/modifier?id=<?= $myVehicule->getIdVehicle() ?>" class="btn btn-dark">Modifier</a>
                <a href="/vehicules/supprimer?id=<?= $myVehicule->getIdVehicle() ?>" class="btn btn-danger"
                   onclick="return confirm('Supprimer ce véhicule ?')">Supprimer</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/partials/footer.view.php"); ?>