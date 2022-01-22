<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL les jointures externes RIGHT JOIN.php</title>
</head>
<body>
    <h2>MySQL les jointures externes RIGHT JOIN.php</h2>
    <!-- recupere tous les coms de table(droite) com même ceux qui ont pas d'auteur
    <?php
    $serveur = "localhost";
    $login = "root";
    $pass = "guizmo";

    try{
        $connexion = new PDO("mysql:host=$serveur;dbname=pierregi",$login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'ok<br>';

        //1° crée notre requête SQL // "AS"->alias = raccourci les nom données aux tables ex: commemtaires AS com
        $jointure_ext = "
        SELECT visi.prenom, com.commentaire
        FROM visiteurs AS visi
        RIGHT JOIN commentaires AS com
        ON visi.id = com.id_inscrit";

        //2° la requête 
        $requete = $connexion->prepare($jointure_ext);

        //3° execute la requete
        $requete->execute();

        //4° resultat en array
        $resultat = $requete->fetchAll();

        //5° affiche l'array
        echo '<pre>resultat ';
        print_r($resultat);                
        echo '</pre><br>';
    }
    catch(PDOException $e) {
        echo 'Erreur de connexion'.$e->getMessage();
    }
    ?>
</body>
</html>