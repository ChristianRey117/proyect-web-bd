<?php 

session_start();

function redirect(){
    include "../includes/connexion_base_donnees.php";

    if (isset($_POST['estrellas']) && $_GET["id_film"]) {
        
        $puntuation = $_POST['estrellas'];
        $id_film = $_GET['id_film'];

        $sql = "INSERT INTO `tbfilmpuntuation` (`noFilm`, `puntuation`) VALUES (?, ?)";
        $response = $connexion->prepare($sql);
        $response->execute([$id_film, $puntuation]);
    
        header("Location: /proyect-web-bd/details_film.php?id=$id_film");

        

    }
}

redirect();
  
?>