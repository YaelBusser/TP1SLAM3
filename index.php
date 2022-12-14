<?php
include "bdd.php";
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="styles/main.css" media="screen" type="text/css"/>
</head>
<body>
<div class="body-connexion">
    <div id="container">
        <!-- zone de connexion -->

        <form method="POST" name="formConnexion" class="formConnexion">
            <h1>Connexion</h1>
            <div>
                <label for="username"><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" id="username"
                       value="<?php if (isset($_POST["username"])) {
                           echo $_POST["username"];
                       } ?>">
            </div>
            <div>
                <label for="password"><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" id="password">
            </div>
            <input type="submit" id='submit' value='LOGIN' class="btn" name="btn">
            <?php
            if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["btn"])) {
                $username = htmlspecialchars($_POST["username"]);
                $password = $_POST["password"];

                $rqt_user = $bdd->prepare("SELECT login, pswd FROM users WHERE login = ?");
                $rqt_user->execute([$username]);
                $info = $rqt_user->fetch();

                $rqt_username = $bdd->prepare("SELECT login FROM users WHERE login = ?");
                $rqt_username->execute([$username]);
                $countName = $rqt_username->rowCount();
                var_dump($password);
                var_dump($info["pswd"]);
                if (password_verify($password, $info["pswd"])) {
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
</div>
</body>
</html>
