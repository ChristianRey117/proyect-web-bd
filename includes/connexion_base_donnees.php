<?php
$server = "localhost";
$user = "root";
$pass = "";

try{
 $connexion = new PDO("mysql:host=$server;dbname=christian", $user, $pass);
}catch(PDOException $e){
    die("Connexion échouée. Erreur : ". $e->getMessage());
}
?>