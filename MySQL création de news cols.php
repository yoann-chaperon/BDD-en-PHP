<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL création de news cols.php</title>
</head>
<body>
    <?php
    $serveur = 'localhost';
    $login = 'root';
    $pass = 'guizmo';

    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=pierregi", $login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //1° requête pour ajouter une col sexe ou âge 

        /*$requete = "
                    ALTER TABLE visiteurs 
                    ADD sexe VARCHAR(10)";
                    echo'colonnes sexe ajouter';*/
        $requete = "
                    ALTER TABLE visiteurs
                    ADD age INT(100)";
                    echo'colonnes âge ajouter';

        //2°  execute la requête
        $connexion->exec($requete);
    }
    catch(PDOException $e){
        echo'Erreur de connexion'.$e->setMessage;
    }
    ?>
</body>
</html>