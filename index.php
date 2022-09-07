<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="styles/main.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>
                <div>
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                </div>
                <div>
                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                </div>
                <input type="submit" id='submit' value='LOGIN' class="btn">
                <?php
                // Code de vérification 
                ?>
            <p>Pas encore inscrit ? Cliquez <a href="inscription.php">ici</a></p>
            </form>
        </div>
    </body>
</html>
