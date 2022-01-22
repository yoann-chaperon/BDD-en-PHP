<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL les jointures externes LEFT JOIN.php</title>
</head>
<body>
    <h2>MySQL les jointures externes LEFT JOIN.php</h2>
    <!-- recupere tous les prenoms(table de gauche) de tous les inscrits et seulement les coms(table de droite) qui sont liés les autueur/prenom
    <?php
    $serveur = "localhost";
    $login = "root";
    $pass = "guizmo";

    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=pierregi",$login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo'ok';

        //1° crée notre requête SQL // "AS"->alias = raccourci les nom données aux tables ex: commemtaires AS com
        $jointure_int="
        SELECT visi.prenom, com.commentaire
        FROM visiteurs AS visi
        LEFT JOIN commentaires AS com
        ON visi.id = com.id_inscrit";

        //2°préparation de la requête
        $requete = $connexion->prepare($jointure_int);

        //3° execute la requête
        $requete->execute();

        //4° reesultat en array
        $resultat = $requete->fetchAll();

        //5° afficher le array
        echo '<pre>resultat ';
        print_r($resultat);                
        echo '</pre><br>';
    }
    catch(PDOException $e) {
        echo'erreur de connexion'.$e->getMessage();     
    }
    ?>
</body>
</html>