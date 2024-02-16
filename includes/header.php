<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$xml = simplexml_load_file('./textes/header.xml');
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
        <?php
        foreach($xml->children() as $button){
            $langue = "FR";
            if(isset($_COOKIE['langue'])){
                if($_COOKIE['langue'] != 'Francais'){
                   $langue = "EN";
                }
            }
            $text_button = $button->$langue;
            if(strval($text_button) == 'Connection' || strval($text_button) == 'Connexion'){
                if(isset($_SESSION["session-courreil"])){
                    $courreil = $_SESSION["session-courreil"];
                    $text_hello = $xml->Button[$xml->count() - 1]->$langue;
                    echo("
                    <a href='connexion.php' style='position:fixed; right:0'>$text_hello $courreil</a>
                    ");
                }else{
                    echo("
                    <a href='connexion.php' style='position:fixed; right:0'>$text_button</a>
                    ");
                }
                
            }else{
                if(strval($text_button) != 'Hello' && strval($text_button) !== 'Bonjour'){
                    echo("
                    <a href='$button->HREF'>$text_button</a>
                    ");
                }
                
            }
           
        }

            ?>
        
</div>
    
</body>
</html>