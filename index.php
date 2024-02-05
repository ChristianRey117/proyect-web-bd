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
    <?php include "header.php" ?>

    <div class="container">
        <div class="row" style="margin-top: 5%;">
            <div class="col-6">
                <img src="./images/cinema-principal.jpg" alt="" style="max-width: 32rem;">

            </div>

            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <h1>
                            Cine <span style="font-weight: bold;">Mark</span>
                        </h1>
                    </div>
                </div>
                <p>
                    Bienvenue dans le monde du cinéma, où la magie de l'écran prend vie ! Sur notre site web, nous vous invitons à vous immerger dans une expérience cinématographique unique. Explorez notre programmation passionnante, qui comprend les films les plus récents et les plus attendus, tous genres confondus. Des aventures palpitantes aux histoires réconfortantes, il y en a pour tous les goûts.
                </p>
    
                <button type="button" class="btn btn-success" onclick="redirectToConnexion()">Commande</button>
            </div>
        </div>

    </div>


    <?php include "footer.php" ?>
</body>
</html>

<script>
    const redirectToConnexion = ()=>{
        window.location.href = './connexion.html'
    }
</script>