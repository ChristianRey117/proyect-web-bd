<?php 

session_start();

function redirect(){
    include "../includes/connexion_base_donnees.php";

    if (isset($_POST['commentaire']) && isset($_GET['id_film'])) {
        $commentaire = $_POST['commentaire'];
        $id_film = $_GET['id_film'];
        $date= date("Y/m/d");
        $idUtilisateur = $_SESSION["id_utilisateur"];
        $idUtilisateur = !$idUtilisateur ? null : $idUtilisateur;

        $sql = "INSERT INTO `tbcommentaire` (`idCommentaire`, `dateCreation`, `commentaire`, `idUtilisateur`) VALUES (NULL, ?, ?, ?)";
        $response = $connexion->prepare($sql);
        $response->execute([$date, $commentaire, $idUtilisateur]);
        $last_id = $connexion->lastInsertId();
        $sql = "INSERT INTO tbfilmcommentaire (idFilm, idCommentaire) VALUES(?,?)";
        $response = $connexion->prepare($sql);
        $response->execute([$id_film, $last_id]);
        header("Location: /proyect-web-bd/details_film.php?id=$id_film");
    }
}

redirect();
  
?>