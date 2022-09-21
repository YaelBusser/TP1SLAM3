<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="styles/main.css" media="screen" type="text/css"/>
</head>
<body>
<<<<<<< HEAD
<h1>Bienvenue <span><?php echo $_SESSION["username"]; ?></span></h1>
=======
<h1>Bienvenue <span><?= $_SESSION["username"]; ?></span></h1>
>>>>>>> Profile
</body>
</html>