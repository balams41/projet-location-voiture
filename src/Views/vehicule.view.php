<?php $title = "Nos véhicules"; ?>
<?php require_once(__DIR__ . "/partials/head.view.php"); ?>

<div class="page-vehicules">
  <div class="container">

    <div class="page-header">
      <h2>🚗 Nos véhicules</h2>
      <?php if(isset($_SESSION['user'])): ?>
        <a href="/vehicules/ajouter" class="btn-ajouter">+ Ajouter un véhicule</a>
      <?php endif; ?>
    </div>

    <?php if(empty($vehicules)): ?>
      <p class="vide">Aucun véhicule disponible pour le moment.</p>
    <?php else: ?>
      <div class="grille">
        <?php foreach($vehicules as $v): ?>
          <div class="carte">

            <div class="carte-image">🚗</div>

            <div class="carte-body">
              <div class="carte-titre"><?= $v->getBrand() ?> <?= $v->getModel() ?></div>
              <div class="carte-infos">
                🎨 <?= $v->getColor() ?><br>
                ⚙️ <?= $v->getGearbox() ?><br>
                ⛽ <?= $v->getFuelType() ?><br>
                📍 <?= number_format($v->getMileage(), 0, ',', ' ') ?> km
              </div>
              <div class="carte-prix"><?= number_format($v->getPrice(), 2, ',', ' ') ?> € / jour</div>
            </div>

            <div class="carte-footer">
              <a href="/vehicules/voir?id=<?= $v->getIdVehicle() ?>" class="btn-voir">Voir</a>
              <?php if(isset($_SESSION['user'])): ?>
                <a href="/vehicules/modifier?id=<?= $v->getIdVehicle() ?>" class="btn-modifier">Modifier</a>
                <a href="/vehicules/supprimer?id=<?= $v->getIdVehicle() ?>" class="btn-supprimer"
                   onclick="return confirm('Supprimer ce véhicule ?')">Supprimer</a>
              <?php endif; ?>
            </div>

          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</div>

<?php require_once(__DIR__ . "/partials/footer.view.php"); ?>