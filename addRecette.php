<?php
 session_start();

 if(!isset($_SESSION["pseudo"])){
     header("Location:login.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter une recette</title>
    <link rel="stylesheet" href="dist/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru|Quicksand:400,500,700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="ajouter">
            <a href="recettes.php">Retour</a>
        </div>
        <div class="disconnect">
            <a href="functions/disconnect.php">Déconnexion</a>
        </div>
    </nav>
    <div class="formulaireAdd">
        <form action="functions/insertRecette.php" method="post">
            <h2>Créez votre recette</h2>
            <div class="firstStep"> 
                <input type="text" name="titre" placeholder="Nom de votre recette" class="addFood">
                <input type="text" name="image" placeholder="Url de l'image" class="addFood">
            </div>
            <div class="secondStep"> 
                <textarea class="ingredientsForm" id="ingredients" name="ingredients" rows="15" placeholder="Ingrédients"></textarea>
                <textarea class="stepsForm" id="steps" name="steps" rows="15" placeholder="Etapes "></textarea>     
            </div>
            <div class="validation">
                <input type="submit" class="submitRecette">
            </div>
        </form>
    </div>



    <script src="https://kit.fontawesome.com/b606adccc0.js" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>