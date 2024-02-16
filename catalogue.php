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
<body >
   <?php include "./includes/header.php" ?>

    <div class="container" >
        <div class="row" style="margin-top: 5px;">
            

          <?php 

            foreach($xml_catalogue->children() as $card){
              $langue = "FR";
              if(isset($_COOKIE['langue'])){
                  if($_COOKIE['langue'] != 'Francais'){
                     $langue = "EN";
                  }
              }
              $card_intro_langue = $card->Intro->$langue;
              $card_type_langue = $card->Type->$langue;
              $card_button_langue = $card->Button->$langue;

                $htmlCal = "";
                for($i=0; $i < $card->Note; $i++){
                  $htmlCal = $htmlCal."<label for='radio1'>★</label>";
                }

              echo("
              <div class='col-4'>
                <div class='card' style='max-width: 18rem;'>
                    <img src='$card->Img' class='card-img-top' alt='' style='max-width: 18rem; max-height: 12rem;'>
                    <div class='card-body'>
                      <h5 class='card-title'>$card->Title</h5>
                      <div class='row' style='margin-bottom: 5px;'>
                        <div class='col-12'>
                            <p class='card-text' style='font-weight: 300; font-size: small;'>$card_intro_langue</p>
                        </div>

                        <div class='col-12'>
                            <p class='clasificacion'>".$htmlCal."
                                
                              </p>

                              <p>Type de film: $card_type_langue</p>
                        </div>
                      </div>
                      <a href='#' class='btn btn-primary'>$card_button_langue</a>
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