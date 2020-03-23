<?php
require("../head.php");
    //si session pseudo vide
        //redirige vers login
    if(empty($_SESSION)){
        header("Location: ../login.php");
    }
?>

<div>
<?php
    
    // Connect to database
    require("database.php");
    var_dump($_SESSION);
    var_dump($_POST);
    // prepare request (select)
    $req = $db->prepare("INSERT INTO recettes (pseudo, RecetteName, ingredients, etapes, image) VALUES(:pseudo, :titre, :ingredients, :etapes, :image)");
    $req->bindParam(":pseudo", $_SESSION["pseudo"]);
    $req ->bindParam( ":titre", $_POST["titre"]);
    $req ->bindParam( ":ingredients", $_POST["ingredients"]);
    $req ->bindParam( ":etapes", $_POST["steps"]);
    $req ->bindParam( ":image", $_POST["image"]);

    //$sth->bindParam(":id", $_SESSION["id"]);
    // execute
    $req->execute();

    /* Récupération de toutes les lignes d'un jeu de résultats
    print("Récupération de toutes les lignes d'un jeu de résultats :\n");*/

    header("Location: ../recettes.php");

    ?>
</div>