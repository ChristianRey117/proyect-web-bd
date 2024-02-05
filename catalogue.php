<?php 

$film1 = new \stdClass;
$film1->titre = "Drive";
$film1->lien = "./images/drive.jpg";
$film1->notes = "Un cascadeur hollywoodien qui travaille comme chauffeur pour des criminels commence à recevoir des menaces de mort après un braquage raté";
$film1->type = "Action";
$film1->cal = 3;
$film2 = new \stdClass;
$film2->titre = "Matrix";
$film2->lien = "./images/matrix.jpg";
$film2->notes = "Hanté par d'étranges souvenirs, la vie de Neo prend un tournant inattendu lorsqu'il se retrouve, une fois de plus, à l'intérieur de la Matrice.";
$film2->type = "Science Fiction";
$film2->cal = 4;

$film3 = new \stdClass;
$film3->titre = "Soul";
$film3->lien = "./images/soul.jpg";
$film3->notes = "Un professeur de musique qui a perdu sa passion est transporté hors de son corps dans le Grand Avant et doit retrouver son chemin avec l'aide d'une âme d'enfant qui apprend à se connaître.";
$film3->type = "Science Fiction";
$film3->cal = 5;

$films = array($film1, $film2, $film3);

function showFilms($titre, $note, $ligne_image,$type, $htmlCalif){
echo("
<div class='col-4'>
<div class='card' style='max-width: 18rem;'>
    <img src='$ligne_image' class='card-img-top' alt='' style='max-width: 18rem; max-height: 12rem;'>
    <div class='card-body'>
      <h5 class='card-title'>$titre</h5>
      <div class='row' style='margin-bottom: 5px;'>
        <div class='col-12'>
            <p class='card-text' style='font-weight: 300; font-size: small;'>$note</p>
        </div>

        <div class='col-12'>
            <p class='clasificacion'>".$htmlCalif."
                
              </p>

              <p>Type de film: $type</p>
        </div>
      </div>
      <a href='#' class='btn btn-primary'>Go somewhere</a>
    </div>
  </div>
</div>
");
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
<body >
   <?php include "./includes/header.php" ?>

    <div class="container" >
        <div class="row" style="margin-top: 5px;">
            

          <?php 
            foreach($films as $film){
              $htmlCal = "";
              for($i=0; $i < $film->cal; $i++){
                $htmlCal = $htmlCal."<label for='radio1'>★</label>";
              }
              showFilms($film->titre, $film->notes, $film->lien,$film->type,$htmlCal);
            }
          ?>
        </div>
        
        
    </div>

    <?php include "./includes/footer.php"?>
</body>
</html>