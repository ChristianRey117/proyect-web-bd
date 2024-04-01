<?php 

$xml_catalogue = simplexml_load_file('./textes/catalogue.xml');

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
<body style="height:auto">
   <?php include "./includes/header.php" ?>

    <div class="container" style="height: auto">
        <div class="row" style="margin-top: 5%; margin-bottom: 15%">
            
          <?php 
          include "./includes/connexion_base_donnees.php";

          $response = $connexion->query("SELECT * FROM tbFilm JOIN tbType ON tbFilm.noType = tbType.noType");

          while($film = $response->fetch()){
            $image = $film["lienImage"];
            $title = $film["titre"];
            $content = $film["titre"];
            $typeFilm = $film["nom"];

              $htmlCal = "";
              for($i=0; $i < $film["note"]; $i++){
                $htmlCal = $htmlCal."<label for='radio1'>★</label>";
              }

            echo("
            <div class='col-4'>
              <div class='card' style='max-width: 18rem;'>
                  <img src='$image' class='card-img-top' alt='' style='max-width: 18rem; max-height: 12rem;'>
                  <div class='card-body'>
                    <h5 class='card-title'>$title</h5>
                    <div class='row' style='margin-bottom: 5px;'>
                      <div class='col-12'>
                          <p class='card-text' style='font-weight: 300; font-size: small;'>$content</p>
                      </div>

                      <div class='col-12'>
                          <p class='clasificacion'>".$htmlCal."
                              
                            </p>

                            <p>Type de film: $typeFilm</p>
                      </div>
                    </div>
                    <a href='#' class='btn btn-primary'>Aller</a>
                  </div>
                </div>
            </div>
            ");
          }
          ?>
        </div>
    </div>

    <?php include "./includes/footer.php"?>
</body>
</html>