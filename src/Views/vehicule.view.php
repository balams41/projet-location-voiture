<?php $title = "Nos véhicules"; ?>
<?php require_once(__DIR__ . "/partials/head.view.php"); ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tous les véhicules</h2>
        <?php if(isset($_SESSION['user'])): ?>
            <a href="/vehicules/ajouter" class="btn btn-primary">+ Ajouter un véhicule</a>
        <?php endif; ?>
    </div>

    <?php if(empty($vehicules)): ?>
        <p class="texkt-muted">Aucun véhicule disponible pour le moment.</p>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach($vehicules as $v): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= $v->getBrand() ?> <?= $v->getModel() ?></h5>
                            <p class="card-text">
                                🎨 <?= $v->getColor() ?> &nbsp;|&nbsp;
                                ⚙️ <?= $v->getGearbox() ?> &nbsp;|&nbsp;
                                ⛽ <?= $v->getFuelType() ?>
                            </p>
                            <p class="card-text">📍 <?= number_format($v->getMileage(), 0, ',', ' ') ?> km</p>
                            <p class="card-text fw-bold text-primary"><?= number_format($v->getPrice(), 2, ',', ' ') ?> €</p>
                        </div>
                        <div class="card-footer d-flex gap-2">
                            <a href="/vehicules/voir?id=<?= $v->getIdVehicle() ?>" class="btn btn-sm btn-dark">Voir</a>
                            <?php if(isset($_SESSION['user'])): ?>
                                <a href="/vehicules/modifier?id=<?= $v->getIdVehicle() ?>" class="btn btn-sm btn-secondary">Modifier</a>
                                <a href="/vehicules/supprimer?id=<?= $v->getIdVehicle() ?>" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Supprimer ce véhicule ?')">Supprimer</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once(__DIR__ . "/partials/footer.view.php"); ?>