<?php
require("head.php");

if (isset($_SESSION["pseudo"])){
    header("Location:recettes.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="dist/css/style.css">
</head>
<body>
    <div class="formulaire">
        <h1>レシピボックス</h1>
        <div class="form">
            <h2>Connexion</h2>
            <h4>Votre pseudo</h4>
            <form action="functions/loginAction.php" method="post">
            <input type="text" name="pseudo" placeholder="Votre pseudo">
            <input type="submit" value="Connexion">
            </form>
        </div>
    </div>
</body>
</html>