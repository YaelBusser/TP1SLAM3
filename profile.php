<?php
session_start();
if(isset($_SESSION["username"])){
?>
<html>
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="styles/main.css" media="screen" type="text/css"/>
</head>
<body>
<h1>Bienvenue <span><?php echo $_SESSION["username"]; ?></span></h1>
<a href="deconnexion.php">se déconnecter</a>
</body>
</html>
<?php }else{ Header("Location: index.php");} ?>