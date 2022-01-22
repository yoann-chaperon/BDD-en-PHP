<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL suppr une table.php</title>
</head>
<body>
    <h2>MySQL suppr une table.php</h2>
    <?php
    $serveur = "localhost";
    $login = "root";
    $pass = "guizmo";

    try{
        $connexion = new PDO("mysql:host=$serveur;dbname=test",$login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo'ok<br>';

        //1° requête pour suppr 'DROP' la table 'test'
        $suppr = "DROP TABLE news";

        //2° preparation de la requête
        $requete =$connexion->prepare($suppr);

        //3° execute la requête
        $requete->execute();
        echo 'table supprimer';
    }
    catch(PDOException $e){
        echo'erreur de connexion'.$e->getMessage();
    }
    ?>
</body>
</html>