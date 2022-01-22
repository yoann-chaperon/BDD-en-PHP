<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL MAJ de BDD en php</title>
</head>
<body>
    <h2>MySQL MAJ de BDD en php</h2>
    <?php
    $serveur = "localhost";
    $login = "root";
    $pass = "guizmo";
    
    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=pierregi", $login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo'ok<br>';
        
        //1° modifier l'âge de jean id=11
        $modif = "UPDATE visiteurs SET age=105 WHERE id=11";

        //2° preparation de la requête 
        $requete = $connexion->prepare($modif);

        //3° execute la requête
        $requete->execute();
        echo 'age chnager pour jean';
    }
    catch(PDOException $e){
        echo'erreur de connexion'.$e->getMessage();
        }
    ?>
</body>
</html>