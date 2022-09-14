<?php
require "bdd.php";
if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["btn"] && !empty($_POST["formConnexion"]))){
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $rqt_user = $bdd -> prepare("SELECT login, pswd FROM users WHERE login = :username AND pswd = :password");
    $rqt_user->bindValue(":username", $username);
    $rqt_user->bindValue(":password", $password);
    $rqt_user->execute();
    $isValid = $rqt_user -> rowCount();
    echo $isValid;
    if($isValid == 1){
        Header("Location: profile.php");
    }else{
        Header("Location: inscription.php");
    }
}else{
    $error = "Votre mot de passer ou nom d'utilisateur est incorrecte";
}
