<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL suppr une col.php</title>
</head>
<body>
    <h2>MySQL suppr une col.php</h2>
    <?php
    $serveur = "localhost";
    $login = "root";
    $pass = "guizmo";
    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=pierregi", $login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo'ok';

        //1° requete suppr "DROP" colonne sexe
        $suppr = "ALTER TABLE visiteurs DROP sexe";

        //2° préparation de la requête
        $requete = $connexion->prepare($suppr);

        //3° execute la requête
        $requete->execute();
        echo 'colonne sexe supprimer';
    }
    catch(PDOException $e){
        echo'Erreur de connexion'.$e->getMessage();
    }
    ?>
</body>
</html>