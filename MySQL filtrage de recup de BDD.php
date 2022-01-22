<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL filtrage de recup de BDD.php</title>
</head>
<body>
    <?php
    $serveur ="localhost";
    $login = "root";
    $pass = "guizmo";

    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=pierregi", $login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo'ok';

        //1° préparation requête
        $requete1 = $connexion->prepare(
            "SELECT prenom FROM visiteurs WHERE sexe= 'H'AND age>25 ORDER BY age DESC "
        );

        //2° esxecuter la requete 
        $requete1->execute();

        //3° recup en array
        $resultat = $requete1->fetchall();

        //4°afficher le array
        echo '<pre>resultat ';
        print_r($resultat);                
        echo '</pre><br>';
    }
    catch(PDOException $e){
        echo'Erreur de connexion'.$e->setMessage;
    }
    ?>
</body>
</html>