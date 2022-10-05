<html>
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="styles/main.css" media="screen" type="text/css"/>
</head>
<body>
<div id="container">
    <!-- zone de connexion -->

    <form method="POST" class="formInscription">
        <h1>Inscription</h1>
        <div>
            <label for="usernameInscription"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="usernameInscription"
                   id="usernameInscription">
        </div>
        <div>
            <label for="emailInscription"><b>Adresse mail</b></label>
            <input type="email" placeholder="Entrer le nom d'utilisateur" name="emailInscription"
                   id="emailInscription">
        </div>
        <div>
            <label for="passwordInscription"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="passwordInscription"
                   id="passwordInscription">
        </div>
        <div>
            <label for="passwordInscription2"><b>Confirmation du mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="passwordInscription2"
                   id="passwordInscription2">
        </div>
        <input type="submit" id='submit' value="SIGN IN" name="btnInscription">
        <?php
        require("bdd.php");
        if (!empty($_POST["usernameInscription"]) && !empty($_POST["emailInscription"]) && !empty($_POST["passwordInscription"]) && !empty($_POST["passwordInscription2"])) {
            $username = htmlspecialchars($_POST["usernameInscription"]);
            $email = htmlspecialchars($_POST["emailInscription"]);
            $mdp = $_POST["passwordInscription"];
            $mdp2 = $_POST["passwordInscription2"];
            if ($mdp == $mdp2) {
                $mdp = password_hash($mdp, PASSWORD_BCRYPT);
                $rqt_inscription = $bdd->prepare("INSERT INTO users(login, pswd, email, date_creation, date_activation, img_profil) VALUES (?, ?, ?, ?, ?, ?)");
                $rqt_inscription->execute([$username, $mdp, $email, date("Y-m-d"), null, "ok"]);
                Header("Location: index.php");

            } else {
                $error = "Vos mots de passe ne sont pas identiques !";
            }
        } else {
            $error = "Veuillez remplir tous les champs !";
        }
        ?>
        <p class='errorP'>
            <?php
            if (isset($_POST["btnInscription"])) {
                if (isset($error)) {
                    echo $error;
                }
            }
            ?>
        </p>
    </form>
    <spaN>Vous avez déjà un compte ? Cliquez <a href="index.php">ici</a></spaN>
</div>
</body>
</html>
