<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL les jointures externes FULL OUTER avec UNION JOIN 2</title>
</head>
<body>
    <h2>MySQL les jointures externes FULL OUTER avec UNION JOIN 2</h2>
    <!-- FULL OUTER NE MARCHE PAS SUR PHPMYADMIN -->

    <!-- afficher tous les comentaires et les auteurs sans doblon-->
    <?php
    $serveur = "localhost";
    $login = "root";
    $pass = "guizmo";

    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=pierregi",$login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo'ok<br>';

        //1° préparer la requête
            /*recuper tous les prenom d TAB visiteurs
            /*recuper tous les coms d TAB commentaire lie avec auteurs
            /*UNION ALL
            /*recuper les comm sans auteur id=0
            */
        $jointure_ext = "
            SELECT visi.prenom, com.commentaire
            FROM visiteurs AS visi
            LEFT JOIN commentaires AS com
            ON visi.id = com.id_inscrit

            UNION ALL

            SELECT visi.prenom, com.commentaire
            FROM visiteurs AS visi
            RIGHT JOIN commentaires AS com
            ON visi.id = com.id_inscrit
            WHERE visi.id IS NULL
        ";

        //2° crée la requête
        $requete = $connexion->prepare($jointure_ext);

        //3° execute la requête
        $requete->execute();

        //4° recupere l'array
        $resultat = $requete->fetchAll();

        //5° afficher l'array
        echo '<pre>resultat ';
        print_r($resultat);                
        echo '</pre><br>';
    }
catch(PDOException $e){
    echo'Erreur de connexion'.$e->getMessage();
}
    ?>
</body>
</html>