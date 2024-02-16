<?php 
if(isset($_GET["message"])){
    $message = $_GET["message"];
}

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['session-courreil'])){
    session_unset();
    session_destroy();
}

$xml_connection = simplexml_load_file('./textes/connexion.xml');

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
    <?php include "./includes/header.php"?>

    <div class="container">
        
        <div class="row" style="margin-top: 5%;">
            <div class="col-12" style="text-align: center;">
            <?php 
                foreach($xml_connection->children() as $text){
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
                        <?php  
                        if(isset($message)){
                            echo("
                            <div class='col-12'>
                                <p style='color: red; font-weight:bold'>$message</p>
                            </div>
                            ");
                        }
                           
                        ?>
                            <form action="./action/connexion-action.php" method="post">

                            <?php 
                            
                            foreach($xml_connection->children() as $text){
                                $langue = "FR";
                                if(isset($_COOKIE['langue'])){
                                    if($_COOKIE['langue'] != 'Francais'){
                                       $langue = "EN";
                                    }
                                }
                                $text_langue = $text->$langue;
            
                                if(strval($text->Title) == 'No' && (strval($text_langue) == 'Courreil' || strval($text_langue) == 'Email')){
                                    echo("
                                        <div class='col-12'>

                                            <div class='row'>
                                                <div class='col-3'>
                                                    <label for='input-user'>$text_langue</label>
                                                </div>
            
                                                <div class='col-9'>
                                                    <input type='email' id='input-user' name='courreil' required>
                                                </div>
                                            </div>
        
                                        
                                        
                                        </div>
                                    ");
                                }else if(strval($text->Title) == 'No' && (strval($text_langue) == 'Mot de passe' || strval($text_langue) == 'Password')){
                                    echo("
                                        <div class='col-12' style='margin-top: 15px;'>
        
                                            <div class='row'>
                                                <div class='col-3'>
                                                    <label for='input-mod-passe'>$text_langue</label>
                                                </div>
            
                                                <div class='col-9'>
                                                    <input type='password' id='input-mot-passe' name='motPasse' required minlength='8'>
                                                </div>
                                            </div>
                                    
                                        </div>
                                    ");
                                }
                                else if(strval($text->Title) == 'No' && (strval($text_langue) == 'Langue' || strval($text_langue) == 'Language')){
                                    echo("
                                        <div class='col-12' style='margin-top: 15px;'>
        
                                            <div class='row'>
                                                <div class='col-3'>
                                                    <label for='input-mod-passe'>$text_langue</label>
                                                </div>
            
                                                <div class='col-9'>
                                                <select class='form-select' aria-label='Default select example' name='langue' required>
                                                    <option selected value='Francais'>Francais</option>
                                                    <option value='Anglais'>English</option>
                                                </select>
                                            </div>
                                    
                                        </div>
                                    ");
                                }else{
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    const redirectToCatalogue = ()=>{
        console.log('redirect')
        window.location.href = 'http://127.0.0.1:5500/catalogue.html'
    }
</script>