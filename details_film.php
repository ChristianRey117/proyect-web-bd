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
                
                <div class="col-7 mt-3" style="margin-bottom: 5%">
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

        <div class="row">
            <div class="col-12">
                <h2 style='display:flex; justify-content: center' class='mb-4'>Commentaires</h2>
            </div>
            
            <?php
            $sql = "SELECT * FROM tbfilmcommentaire JOIN tbcommentaire ON tbfilmcommentaire.idCommentaire = tbcommentaire.idCommentaire WHERE idFilm = ?";
            $response = $connexion->prepare($sql);
            $response->execute([$id_film]);
            while($commentaire = $response->fetch()){
                $date=$commentaire['dateCreation'];
                $commentaireText = $commentaire['commentaire'];
                $utilisateur = $commentaire['idUtilisateur'];
                $utilisateur = $utilisateur == null ? 'Anonimo' : $utilisateur;
                if($utilisateur != null){
                    $sqlRaquete = "SELECT * FROM tbutilisateur WHERE noUtilisateur = ?";
                    $res = $connexion->prepare($sqlRaquete);
                    $res->execute([$utilisateur]);
                    while($dUtilisateur = $res->fetch()){
                        $utilisateur = $dUtilisateur['prenom'];
                    }
                }
                echo("
                <div class='col-2 mb-4'>
                <img src='./images/avatar.jpg' alt='' style='width: 80px'>
            </div>

            <div class='col-10'>
                <div class='row'>
                    <div class='col-6'>
                        <h3>$utilisateur</h3>
                    </div>
                    <div class='col-6'>
                        <span style='font-size: large; font-weight: bold'>Date: $date</span>
                    </div>
                    <div class='col-12'>
                        <p>$commentaireText</p>
                    </div>
                </div>
            </div>
                ");
            }
                
            ?>
        </div>

        <div class="row" >
            <div class="col-12">
                <h2>Add commentaire</h2>
            </div>
            
            <div class="col-12">
                <?php 
                    echo("
                    <form action='./action/commentaire-action.php?id_film=$id_film' method='post'>
                    <div class='col-12'>
                        <div class='form-floating'>
                            <textarea class='form-control' placeholder='Leave a comment here' id='floatingTextarea2' style='height: 100px' name='commentaire' required></textarea>
                        </div>
                    </div>

                    <div class='col-12'>
                        <button class='btn btn-primary'>Comment</button>
                    </div>
                </form>
                    ")
                ?>
                
            </div>
            

           
        </div>

        <div class="row" style='height: 100px'>

        </div>

    </div>


    <?php include "./includes/footer.php" ?>
</body>
</html>
