<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récuperer des donnees BDD en php MySQL</title>
</head>
<body>
    <h3>Récuperer des donnees BDD en php MySQL</h3>
        <?php
            $serveur = "localhost";
            $login = "root";
            $pass = "guizmo";

            try{
            $connexion = new PDO("mysql:host=$serveur;dbname=pierregi", $login, $pass);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo'ok';

            //1° préparer la requête

            $requete = $connexion->prepare(
                "SELECT * FROM Visiteurs");
            
            //2° exexcuter la requête
            $requete->execute();

            //3° return les résultat en array dans une $var
            $donnees = $requete->fetchAll();

            //4° afficher array
            echo '<pre>requete ';
            print_r($donnees);                
            echo '</pre><br>';

            }
            catch(PDOException $e){
                echo'Erreur de connexion'.$e->getMessage();
            }
        ?>
</body>
</html>