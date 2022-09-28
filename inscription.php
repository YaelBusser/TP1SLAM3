<html>
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="styles/main.css" media="screen" type="text/css"/>
</head>
<body>
<div id="container">
    <!-- zone de connexion -->

    <form action="verification.php" method="POST" class="formInscription">
        <h1>Inscription</h1>
        <div>
            <label for="usernameInscription"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="usernameInscription" required>
        </div>
        <div>
            <label for="passwordInscription"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="passwordInscription" required>
        </div>
        <div>
            <label for="passwordInscription2"><b>Confirmation du mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="passwordInscription2" required>
        </div>
        <input type="submit" id='submit' value="SIGN IN">
        <?php
        // Code de vérification
        ?>
    </form>
    <p>Vous avez déjà un compte ? Cliquez <a href="index.php">ici</a></p>
</div>
</body>
</html>
