<?php
include "bdd.php";
?>
<html>
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="styles/main.css" media="screen" type="text/css"/>
</head>
<body>
<div id="container">
    <!-- zone de connexion -->

    <form method="POST" name="formConnexion">
        <h1>Connexion</h1>
        <div>
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username">
        </div>
        <div>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password">
        </div>
        <input type="submit" id='submit' value='LOGIN' class="btn" name="btn">
        <?php
        if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["btn"])) {
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);

            $rqt_user = $bdd->prepare("SELECT login, pswd FROM users WHERE login = :username AND pswd = :password");
            $rqt_user->bindValue(":username", $username);
            $rqt_user->bindValue(":password", $password);
            $rqt_user->execute();
            $isValid = $rqt_user->rowCount();

            $rqt_username = $bdd->prepare("SELECT login FROM users WHERE login = :username");
            $rqt_username->bindValue(":username", $username);
            $rqt_username->execute();
            $countName = $rqt_username->rowCount();

            if ($isValid == 1) {
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                Header("Location: profile.php");
            } else if ($countName == 0) {
                Header("Location: inscription.php");
            } else {
                $error = "Votre mot de passe ou nom d'utilisateur est incorrecte";
            }
        } else {
            $error = "Veuillez remplir tous les champs !";
        }
        ?>
        <p class="errorP"><?php
            if (isset($_POST["btn"])) {
                if ($error) {
                    echo $error;
                }
            }
            ?>
        </p>
        <p>Pas encore inscrit ? Cliquez <a href="inscription.php">ici</a></p>
    </form>
</div>
</body>
</html>
