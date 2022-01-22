<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL supp des donnes BDD.php</title>
</head>
<body>
    <h2>MySQL supp des donnes BDD.php</h2>
    <?php
    $serveur = "localhost";
    $login = "root";
    $pass = "guizmo";
    try{
        $connexion = new PDO("mysql:host=$serveur;dbname=pierregi",$login,$pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo'ok';
        
        //1° requte pour suppr id=2
        $suppr = "DELETE FROM visiteurs WHERE id=2";
        
        //2° prepare la requete
        $requete = $connexion->prepare($suppr);

        //3° execute la requete
        $requete->execute();
    }
    catch(PDOException $e){
        echo'Erreur de connexion'.$e->getMessage();
    }
    ?>
</body>
</html>