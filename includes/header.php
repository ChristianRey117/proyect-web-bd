<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="topnav">
        <a href="./index.php"><img src="./logo cinema.png" alt="" width="65rem"></a>
        <a class="active" href="./index.php">Accueil</a>
        <a href="./a_propos.php">A propos</a>
        <a href="./catalogue.php">Catalogue</a>
        <?php 
            if(isset($_SESSION["session-courreil"])){
                $courreil = $_SESSION["session-courreil"];
                echo("
                <a href='connexion.php' style='position:fixed; right:0'>Bonjour $courreil</a>
                ");
            }else{
                echo("
                <a href='connexion.php' style='position:fixed; right:0'>Connexion</a>
                ");
            }
        ?>
        
</div>
    
</body>
</html>