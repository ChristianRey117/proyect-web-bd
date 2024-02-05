<?php 
    $adress = $_GET['adress'];
    $nomEmployes = $_GET['nomEmployes'];
    $revenu = $_GET['revenu'];
    $travail = $_GET['travail'];

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
    <?php include "header.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Propos
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Adress</th>
                    <th scope="col">Nombre d'employes</th>
                    <th scope="col">Revenu Annuel</th>
                    <th scope="col">Est-ce que les employés travaillent la fin de semaine</th>
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

    <?php include "footer.php" ?>
</body>
</html