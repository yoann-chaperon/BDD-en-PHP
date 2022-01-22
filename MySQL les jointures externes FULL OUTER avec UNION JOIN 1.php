<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL les jointures externes FULL OUTER JOIN 1.php</title>
</head>
<body>
    <h2>MySQL les jointures externes FULL OUTER avec UNION JOIN 1.php</h2>
    <!-- FULL OUTER NE MARCHE PAS SUR PHPMYADMIN -->

    <!-- afficher tous les comentaires et les auteurs -->
    <?php
    $serveur = "localhost";
    $login = 'root';
    $pass = 'guizmo';

    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=pierregi",$login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'ok<br>';

        //1° crée notre requête SQL UNION->return la 1°occurence d'une même valeur kdonc s'arrête si il y a 2 auteurs en revanche UNION ALL return tous occurence d'une même valeur ex: les auteurs et commentaires
        $jointure_ext = "
                    SELECT prenom FROM visiteurs
                    UNION ALL
                    SELECT commentaire FROM commentaires
                    ";

        //2° crée la requête
        $requete = $connexion->prepare($jointure_ext);
        
        //3° execute la requête
        $requete->execute();

        //4° recup le resultat en array
        $resultat = $requete->fetchAll();

        //5° afficher l'array
        echo '<pre>resultat ';
        print_r($resultat);                
        echo '</pre><br>';
    }
    catch(PDOException $e){
        echo'Erreur de connection : '.$e->getMessage();
    }
    ?>
</body>
</html>