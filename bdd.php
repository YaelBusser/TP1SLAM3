<?php
try{
    $bdd = new PDO("mysql:host=localhost;dbname=yb_slam3_tp1;charset=utf8", "root", "");
}
catch(Exception $e){
    echo $e -> getMessage();
    die;
}
?>