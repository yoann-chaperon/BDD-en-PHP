<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL création de données BDD</title>
</head>
<body>
    <h1>MySQL création de données BDD</h1>
    <?php
    $serveur = "localhost";
    $login ='root';
    $pass = 'guizmo';
    
    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=pierregi",$login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $insertion = "INSERT INTO Visiteurs(nom,prenom,email)
                        VALUES ('Gerard','Polo','raud@edhec.com'),
                                 ('Jacky','Michel','jack@mich.com')";
        $connexion->exec($insertion);
            echo'bien enregistré !';                
    }
    catch(PDOException $e){
        echo'Erreur de connection : '.$e->getMessage();
    }
    
    ?>
</body>
</html>