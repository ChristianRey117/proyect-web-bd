<?php 
session_start();

function redirect(){
    if (isset($_POST['courreil']) && isset($_POST['motPasse']) && $_POST['langue']) {
        
        $courreil = $_POST['courreil'];
        $motPasse = $_POST['motPasse'];
        setcookie('langue', $_POST['langue'], time() + (86400 * 30), "/"); // 86400 = 1 day
        if($courreil == 'test@cegep.ca' && $motPasse == 'testcegep'){
            $_SESSION["session-courreil"] = $courreil;
            header("Location: /lab03/catalogue.php");
            exit();
        }else{
            header("Location: /lab03/connexion.php?message=Mauvais mot de passe ou courreil");
            exit();
        }
    }
}

redirect();
  
?>