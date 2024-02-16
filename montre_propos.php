<?php 
    $adress = $_GET['adress'];
    $nomEmployes = $_GET['nomEmployes'];
    $revenu = $_GET['revenu'];
    $travail = $_GET['travail'];

    $xml_show_propos = simplexml_load_file('./textes/montre_propos.xml');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    <?php include "./includes/header.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php 
                foreach($xml_show_propos->children() as $text){
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
        </div>
        <div class="row">
            <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                    <?php 
                         foreach($xml_show_propos->children() as $text){
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
                    <tr>
                        <td><?php echo($adress) ?></td>
                        <td><?php echo($nomEmployes) ?></td>
                        <td><?php echo($revenu)?></td>
                        <td><?php echo($travail) ?></td>
                    </tr>
                
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include "./includes/footer.php" ?>
</body>
</html