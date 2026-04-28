<?php $title = $myVehicule->getBrand() . ' ' . $myVehicule->getModel(); ?>
<?php require_once(__DIR__ . "/partials/head.view.php"); ?>

<div class="container mt-4">

    <!-- Bouton retour -->
    <a href="/vehicules" class="btn btn-secondary mb-4">← Retour aux véhicules</a>

    <div class="row">

        <!-- Image du véhicule -->
        <div class="col-md-6 mb-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px;">
                <span style="font-size: 80px;">🚗</span>
            </div>
        </div>

        <!-- Infos du véhicule -->
        <div class="col-md-6">

            <h2 class="mb-1"><?= $myVehicule->getBrand() ?> <?= $myVehicule->getModel() ?></h2>
            <h4 class="text-primary mb-4"><?= number_format($myVehicule->getPrice(), 2, ',', ' ') ?> € / jour</h4>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>🎨 Couleur</th>
                        <td><?= $myVehicule->getColor() ?></td>
                    </tr>
                    <tr>
                        <th>⚙️ Boîte de vitesses</th>
                        <td><?= $myVehicule->getGearbox() ?></td>
                    </tr>
                    <tr>
                        <th>⛽ Carburant</th>
                        <td><?= $myVehicule->getFuelType() ?></td>
                    </tr>
                    <tr>
                        <th>📍 Kilométrage</th>
                        <td><?= number_format($myVehicule->getMileage(), 0, ',', ' ') ?> km</td>
                    </tr>
                    <tr>
                        <th>🔖 Immatriculation</th>
                        <td><?= $myVehicule->getRegistrationPlate() ?></td>
                    </tr>
                </tbody>
            </table>

            <!-- Description -->
            <div class="mb-4">
                <h5>Description</h5>
                <p class="text-muted"><?= $myVehicule->getDescription() ?></p>
            </div>

            <!-- Boutons admin -->
            <?php if(isset($_SESSION['user'])): ?>
                <div class="d-flex gap-2">
                    <a href="/vehicules/modifier?id=<?= $myVehicule->getIdVehicle() ?>" class="btn btn-warning">✏️ Modifier</a>
                    <a href="/vehicules/supprimer?id=<?= $myVehicule->getIdVehicle() ?>" class="btn btn-danger"
                       onclick="return confirm('Supprimer ce véhicule ?')">🗑️ Supprimer</a>
                </div>
            <?php else: ?>
                <a href="/connexion" class="btn btn-primary w-100">📅 Réserver ce véhicule</a>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/partials/footer.view.php"); ?>