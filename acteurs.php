<?php 
$xml_acteurs = simplexml_load_file('./textes/acteurs.xml');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Planet</title>
    <link rel="icon" href="./logo cinema.png">
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body style="height: auto">
    <?php include "./includes/header.php" ?>
    <?php include "./includes/connexion_base_donnees.php"?>

    <div class="container">
        <div class="row" style="margin-top: 5%; display:flex">
            <div class="col-12" style="text-align:center">
                <?php
                    foreach($xml_acteurs->children() as $title){
                        $text_langue = $title->$langue;
                        if(strval($title->Title) == 'Yes'){
                            echo("
                            <h1>$text_langue</h1>
                            ");
                        }
                    }
                ?>
                
            </div>
            <div class="col-12 mt-3" style="margin-bottom: 10%">
                <table class="table">
                    <thead>
                        <tr>
                        <?php 
                            foreach($xml_acteurs->children() as $text){
                                $langue = "FR";
                                if(isset($_COOKIE['langue'])){
                                    if($_COOKIE['langue'] != 'Francais'){
                                    $langue = "EN";
                                    }
                                }
                                $text_langue = $text->$langue;
            
                                if(strval($text->Title) == 'No'){
                                    echo("
                                    <th scope='col'>$text_langue</th>
                                    ");
                                }
                            
                            }
                        ?>                 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT *, TIMESTAMPDIFF(year, dateNaissance, now()) AS age, 'plusMoyenne' AS SOURCE from tbacteur JOIN tbAdress ON tbActeur.noAdress = tbAdress.noAdress WHERE taille > (SELECT AVG(taille) FROM tbacteur)  UNION SELECT *, TIMESTAMPDIFF(year, dateNaissance, now()) AS age, 'moinsMoyenne' AS SOURCE FROM tbacteur JOIN tbAdress ON tbActeur.noAdress = tbAdress.noAdress WHERE taille < (SELECT AVG(taille) FROM tbacteur) ORDER BY prenom, nom ASC";
                            $response = $connexion->prepare($sql);
                            $response->execute();
                            while($studio = $response->fetch()){
                                $prenom = $studio["prenom"];
                                $nom = $studio["nom"];
                                $taille = $studio["taille"];
                                $nationalite = $studio["nationalite"];
                                $age = $studio["age"];
                                $ville = $studio["ville"];
                                $source = $studio["SOURCE"];
                                $tailleHtml = $source == 'moinsMoyenne' ? "<td> <span style='color: red'>*</span>$taille m</td>" : "<td>$taille m</td>";
                                $color = $source == 'moinsMoyenne' ? 'red' : '';
                                echo("
                                    <tr>
                                        <td style='background-color: $color '>$prenom</td>
                                        <td>$nom</td>
                                        $tailleHtml
                                        <td>$nationalite</td>
                                        <td>$age ans</td>
                                        <td>$ville</td>
                                    </tr>
                                ");
                            }
                        ?>
                        
                    
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <?php include "./includes/footer.php" ?>
</body>
</html>
