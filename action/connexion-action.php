<?php 

session_start();

function redirect(){
    include "../includes/connexion_base_donnees.php";

    if (isset($_POST['courreil']) && isset($_POST['motPasse']) && $_POST['langue']) {
        
        $courreil = $_POST['courreil'];
        $motPasse = $_POST['motPasse'];
        setcookie('langue', $_POST['langue'], time() + (86400 * 30), "/"); // 86400 = 1 day

        try{
            $sql = "SELECT * FROM tbutilisateur WHERE courreil=? AND motDePasse=?";
            $response = $connexion->prepare($sql);
            $response->execute([$courreil, $motPasse]);

            $utilisateur = $response->fetch();

            if($utilisateur){
                $_SESSION["prenom"] = $utilisateur["prenom"];
                $_SESSION["id_utilisateur"] = $utilisateur["noUtilisateur"];
                header("Location: /proyect-web-bd/catalogue.php");
                exit();
            }else{

                if($_POST['langue'] == 'Francais'){
                    header("Location: /proyect-web-bd/connexion.php?message=Mauvais mot de passe ou courreil");
                }else{
                    header("Location: /proyect-web-bd/connexion.php?message=Wrong password or email");
                }
                exit();
            }
        }catch(PDOException $e){
            if($_POST['langue'] == 'Francais'){
                header("Location: /proyect-web-bd/connexion.php?message=Mauvais mot de passe ou courreil");
            }else{
                header("Location: /proyect-web-bd/connexion.php?message=Wrong password or email");
            }
            exit();
        }

        

    }
}

redirect();
  
?>