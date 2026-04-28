<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
<h1>Inscription</h1>
<form method="POST">
    <div class="container">
        <div class="form-group">
            <label for="last_name">Nom :</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $_POST['last_name'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="first_name">Prénom :</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $_POST['first_name'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $_POST['email'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone :</label>
            <input type="text" name="phone" id="phone" class="form-control" value="<?= $_POST['phone'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="adress">Adresse :</label>
            <input type="text" name="adress" id="adress" class="form-control" value="<?= $_POST['adress'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="city">Ville :</label>
            <input type="text" name="city" id="city" class="form-control" value="<?= $_POST['city'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="postal_code">Code postal :</label>
            <input type="number" name="postal_code" id="postal_code" class="form-control" value="<?= $_POST['postal_code'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date de naissance :</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?= $_POST['date_of_birth'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="driving_licence">Permis de conduire :</label>
            <input type="text" name="driving_licence" id="driving_licence" class="form-control" value="<?= $_POST['driving_licence'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Parle-moi un peu de toi :</label>
            <textarea name="description" id="description" class="form-control" style="height:100px"><?= $_POST['description'] ?? '' ?></textarea>
        </div>
        <button type="submit" name="register" class="btn btn-success mt-3">S’inscrire</button>
    </div>
</form>
<?php
require_once(__DIR__ . "/partials/footer.view.php");
?>