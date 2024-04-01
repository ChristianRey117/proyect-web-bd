<?php 

session_start();

function redirect(){
    include "../includes/connexion_base_donnees.php";

    if (isset($_POST['courreil']) && isset($_POST['motPasse']) && $_POST['langue']) {
        
        $courreil = $_POST['courreil'];
        $motPasse = $_POST['motPasse'];
        setcookie('langue', $_POST['langue'], time() + (86400 * 30), "/"); // 86400 = 1 day

        try{
            $response = $connexion->query("SELECT * FROM tbutilisateur WHERE courreil='$courreil' AND motDePasse ='$motPasse'");

            $utilisateur = $response->fetch();

            if($utilisateur){
                $_SESSION["prenom"] = $utilisateur["prenom"];
                header("Location: /lab04/catalogue.php");
                exit();
            }else{

                if($_POST['langue'] == 'Francais'){
                    header("Location: /lab04/connexion.php?message=Mauvais mot de passe ou courreil");
                }else{
                    header("Location: /lab04/connexion.php?message=Wrong password or email");
                }
                exit();
            }
        }catch(PDOException $e){
            if($_POST['langue'] == 'Francais'){
                header("Location: /lab04/connexion.php?message=Mauvais mot de passe ou courreil");
            }else{
                header("Location: /lab04/connexion.php?message=Wrong password or email");
            }
            exit();
        }

        

    }
}

redirect();
  
?>