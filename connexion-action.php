<?php 
if (isset($_POST['courreil']) && isset($_POST['motPasse'])) {

    $courreil = $_POST['courreil'];
    $motPasse = $_POST['motPasse'];

    if($courreil == 'test@cegep.ca' && $motPasse == 'testcegep'){
        header("Location: /lab03/catalogue.php");
        exit();
    }else{
        header("Location: /lab03/connexion.php?message=Mauvais mot de passe ou courreil");
        exit();
    }
}

  
?>