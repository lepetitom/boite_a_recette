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
    <title>Document</title>
    <link rel="stylesheet" href="dist/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru|Quicksand:400,500,700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="ajouter">
            <a href="addRecette.php">Ajouter une recette</a>
        </div>
        <div class="disconnect">
            <a href="functions/disconnect.php">Déconnexion</a>

        </div>
    </nav>
    <div class="feed">

   
    <?php
        // Connect to database
        require("functions/database.php");
        // prepare request (select)
        $req = $db->prepare("SELECT id, pseudo, RecetteName, ingredients, etapes, image FROM recettes WHERE pseudo = :pseudo");
        // $req = $db->prepare("SELECT id, pseudo, RecetteName, ingredients, etapes, image FROM recettes ORDER BY id DESC WHERE pseudo = :pseudo");
        $req->bindParam(":pseudo", $_SESSION["pseudo"]);
        // execute
        $req->execute();
        /* Récupération de toutes les lignes d'un jeu de résultats
        print("Récupération de toutes les lignes d'un jeu de résultats :\n");
        $result = $sth->fetchAll();  */
        $nbr = 0;
        while($result = $req->fetch(PDO::FETCH_ASSOC)){
            $result=str_replace(array("\r\n","\n"),'<br />',$result);
            $nbr++;
            ?>

        <div class="recette">
            <div class="description">
                <div class="HeaderRecette">
                    <div class="setting">
                        <a href="functions/deleteRecette.php?id=<?php echo $result["id"];?>">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <a href="functions/copyRecette.php?id=<?php echo $result["id"];?>">
                            <i class="fas fa-copy"></i>
                        </a>
                    </div>
                    <img src="<?php echo $result["image"]; ?>" alt="">
                </div>
                <div class="text">
                    <h2>
                        <?php echo $result["RecetteName"];?>
                    </h2>
                    <div class="presition">
                        <div class="ingre">
                            <h4>Ingrédiant</h4>
                            <p>
                                <?php echo $result["ingredients"];?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="steps">
                        <h4>Steps</h4>
                        <p>
                            <?php echo $result["etapes"];?>
                        </p>     
                    </div>
            
        </div>

    <?php
        
    }  
        if($nbr == 0){
            echo ("Vous n'avez pas de recette !");
        }
    ?>
     </div>


    <script src="https://kit.fontawesome.com/b606adccc0.js" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>