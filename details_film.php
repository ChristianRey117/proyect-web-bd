<?php 
$xml_acteurs = simplexml_load_file('./textes/acteurs_film.xml');

if(isset($_GET["id"])){
    $id_film = $_GET["id"];
}
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
                    // foreach($xml_acteurs->children() as $title){
                    //     $text_langue = $title->$langue;
                    //     if(strval($title->Title) == 'Yes'){
                    //         echo("
                    //         <h1>$text_langue</h1>
                    //         ");
                    //     }
                    // }
                ?>

                
            </div>
            <div class="row" style="margin-bottom: 10% text-align:center">
                <div class="col-5 mt-3" style="margin-bottom: 10%">
                <?php 
                            $sql = "SELECT * FROM tbFilm  JOIN tbtype ON tbfilm.noFilm = tbtype.noType WHERE noFilm = $id_film";
                            $response = $connexion->prepare($sql);
                            $response->execute();
                            while($film = $response->fetch()){
                              $imageFilm = $film["lienImage"];
                              $titreFilm = $film["titre"];
                              $typeFilm = $film["nom"];

                              $htmlCal = "";
                                for($i=0; $i < $film["note"]; $i++){
                                    $htmlCal = $htmlCal."<label for='radio1'>★</label>";
                                }
                
                              echo("
                                <div class='card' style='width: 18rem;'>
                                    <img src='$imageFilm' class='card-img-top' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$titreFilm</h5>
                                        <div class='row' style='margin-bottom: 5px;'>
                                        <div class='col-12'>
                                            <p class='card-text' style='font-weight: 300; font-size: small;'>$titreFilm</p>
                                        </div>

                                        <div class='col-12'>
                                            <p class='clasificacion'>".$htmlCal."
                                                
                                                </p>

                                                <p>Type de film: $typeFilm</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                              ");
                            }
                        ?>
                    
                </div>
                
                <div class="col-7 mt-3" style="margin-bottom: 10%">
                    <?php foreach($xml_acteurs->children() as $text){
                        $langue = "FR";
                        if(isset($_COOKIE['langue'])){
                            if($_COOKIE['langue'] != 'Francais'){
                            $langue = "EN";
                            }
                        }
                        $text_langue = $text->$langue;

                        if(strval($text->Title) == 'Yes'){
                            echo("
                            <h2 scope='col'>$text_langue</h2>
                            ");
                        }
                    } ?>
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
                                $sql = "SELECT raquete. * FROM (
                                    SELECT noFilm, prenom, nom, taille, nationalite, TIMESTAMPDIFF(year, dateNaissance, now()) AS age, rue, noCivique, codePostal, province, pays, ville, revenue, 'plusMoyenne' as 'source' FROM tbfilmacteur JOIN tbacteur ON tbacteur.noActeur = tbfilmacteur.noActeur JOIN tbadress ON tbacteur.noAdress = tbadress.noAdress WHERE revenue > (SELECT AVG(revenue) FROM tbfilmacteur) UNION SELECT noFilm, prenom, nom, taille, nationalite, TIMESTAMPDIFF(year, dateNaissance, now()) AS age, rue, noCivique, codePostal, province, pays, ville, revenue,'moinsMoyenne' as 'source' FROM tbfilmacteur JOIN tbacteur ON tbacteur.noActeur = tbfilmacteur.noActeur JOIN tbadress ON tbacteur.noAdress = tbadress.noAdress WHERE revenue < (SELECT AVG(revenue) FROM tbfilmacteur)
                                ) AS raquete WHERE noFilm = $id_film";
                                $response = $connexion->prepare($sql);
                                $response->execute();
                                while($studio = $response->fetch()){
                                    $prenom = $studio["prenom"];
                                    $nom = $studio["nom"];
                                    $taille = $studio["taille"];
                                    $nationalite = $studio["nationalite"];
                                    $age = $studio["age"];
                                    $revenue = $studio["revenue"];
                                    $pays = $studio["pays"];
                                    $source = $studio["source"];
                                    $revenueHtml = $source == 'plusMoyenne' ? "<td> <span style='color: red'>*</span>$ $revenue</td>" : "<td>$ $revenue</td>";
                                    echo("
                                        <tr>
                                            <td>$prenom</td>
                                            <td>$nom</td>
                                            <td>$taille</td>
                                            <td>$nationalite</td>
                                            <td>$age ans</td>
                                            $revenueHtml
                                            <td>$pays</td>
                                        </tr>
                                    ");
                                }
                            ?>
                            
                        
                        </tbody>
                    </table>
                    
                </div>
                
            </div>
            
        </div>

    </div>


    <?php include "./includes/footer.php" ?>
</body>
</html>
