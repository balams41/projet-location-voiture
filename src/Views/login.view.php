<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
<h1> page de Connexion</h1>
<form method="POST">
    <div class="container">

        <?php if(isset($this->arrayError['general'])): ?>
            <p class="text-danger"><?= $this->arrayError['general'] ?></p>
        <?php endif; ?>

        <div class="form-group">
            <label for="email" class="form-label">Donne moi ton email :</label>
            <input type="email" name="email" id="email" placeholder="Toto@gmail.com" class="form-control" value="<?= $_POST['email'] ?? '' ?>">
            <?php if(isset($this->arrayError['email'])): ?>
                <p class="text-danger"><?= $this->arrayError['email'] ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Donne moi ton mot de passe :</label>
            <input type="password" name="password" id="password" class="form-control">
            <?php if(isset($this->arrayError['password'])): ?>
                <p class="text-danger"><?= $this->arrayError['password'] ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" name="login" class="btn btn-success mt-5">Connexion</button>

    </div>
    <li class="nav-item">
            <a class="nav-link btn-inscription" href="/deconnexion">Se déconnecter</a>
          </li>
</form>
<?php
require_once(__DIR__ . "/partials/footer.view.php");
?>