<?php 
$xml_about = simplexml_load_file('./textes/a_propos.xml');

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
<body>
    <?php include "./includes/header.php" ?>

    <div class="container">
        <div class="row" style="margin-top: 5%;">
            <div class="col-12" style="text-align: center;">
            <?php 
                 foreach($xml_about->children() as $text){
                    $langue = "FR";
                    if(isset($_COOKIE['langue'])){
                        if($_COOKIE['langue'] != 'Francais'){
                           $langue = "EN";
                        }
                    }
                    $text_langue = $text->$langue;

                    if(strval($text->Title) == 'Yes'){
                        echo("
                            <h1>
                            $text_langue
                            </h1>
                        ");
                    }
                   
                }
            ?>
            </div>

            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="montre_propos.php" method="get">

                                <?php 
                                    foreach($xml_about->children() as $text){
                                        $langue = "FR";
                                        if(isset($_COOKIE['langue'])){
                                            if($_COOKIE['langue'] != 'Francais'){
                                               $langue = "EN";
                                            }
                                        }
                                        $text_langue = $text->$langue;
                    
                                        if(strval($text->Title) == 'No' && (strval($text_langue) == 'Your company address' || strval($text_langue) == 'Adress de votre compagnie')){
                                            echo("
                                            <div class='col-12'>

                                            <div class='row'>
                                                <div class='col-4'>
                                                    <label for='Adress'>$text_langue</label>
                                                </div>
            
                                                <div class='col-8'>
                                                    <input type='text' id='input-user' name='adress' required>
                                                </div>
                                            </div>
            
                                          
                                         
                                        </div>
                                            ");
                                        }else if(strval($text->Title) == 'No' && (strval($text_langue) == 'Number of employees' || strval($text_langue) == "Nombre d'employés")){
                                            echo("
                                            <div class='col-12' style='margin-top: 15px;'>
    
                                            <div class='row'>
                                                <div class='col-4'>
                                                    <label for='nomEmployes'>$text_langue</label>
                                                </div>
            
                                                <div class='col-8'>
                                                    <input type='tel' id='input-mot-passe' name='nomEmployes' required>
                                                </div>
                                            </div>
                                          
                                        </div>
                                            ");
                                        }
                                        else if(strval($text->Title) == 'No' && (strval($text_langue) == 'Annual income ($)' || strval($text_langue) == 'Revenu annuel ($)')){
                                            echo("
                                            <div class='col-12' style='margin-top: 15px;'>
    
                                            <div class='row'>
                                                <div class='col-4'>
                                                    <label for='revenu'>$text_langue</label>
                                                </div>
            
                                                <div class='col-8'>
                                                    <input type='tel' id='input-mot-passe' name='revenu'>
                                                </div>
                                            </div>
                                          
                                        </div>
                                            ");
                                        }else if(strval($text->Title) == 'No' && (strval($text_langue) == 'Do employees work weekends?' || strval($text_langue) == 'Est-ce que les employés travaillent la fin de semaine?')){
                                            echo("
                                            <div class='col-12' style='margin-top: 15px;'>
    
                                    <div class='row'>
                                        <div class='col-4'>
                                            <label for='travail'>$text_langue</label>
                                        </div>
    
                                        <div class='col-8'>
                                            <input type='tel' id='input-mot-passe' name='travail' required>
                                        </div>
                                    </div>
                                  
                                </div>
                                            ");
                                        }
                                        else{
                                            if(strval($text->Button) == 'Yes'){
                                                echo("
                                                    <div class='col-12' style='margin-top: 15px;'>
                                                        <button type='submit' class='btn btn-success'>$text_langue</button>
                                                    </div>
                                                ");
                                            }
                                        }
                                    }
                                ?>
                          
                            </form>
                            
                        </div>

                    </div>
                  </div>

                
            </div>
        </div>

    </div>


    <?php include "./includes/footer.php" ?>
</body>
</html>
