<?php

$pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
$pdo->exec("set names utf8");

//Insertion de la localisation du coin à champignon ET du nom du champignon par transaction

    try {
        $ID_localisation = "";
        $posx = $_POST['longitude'];
        $posy = $_POST['latitude'];
        $ville = $_POST['ville'];
        $accessibilite = $_POST['difficulty'];
        $ID_champignon = "";
        $nom = $_POST['champignon'];
        $toxique = $_POST['toxcomestible'];

        $stmt = $pdo->prepare("BEGIN;
                                INSERT INTO localisation (ID_localisation, posx, posy, ville, accessibilite)
                                VALUES (:ID_localisation, :posx, :posy, :ville, :accessibilite);
                                INSERT INTO champignon (ID_champignon, nom, ID_localisation, toxique)
                                VALUES (:ID_champignon, :nom, (SELECT MAX(ID_localisation) FROM localisation), :toxique);
                            COMMIT;");

          //bindparam va relier les valeurs aux fonctions des valeurs
        $stmt->bindparam(':ID_localisation', $ID_localisation);
        $stmt->bindparam(':posx', $posx);
        $stmt->bindparam(':posy', $posy);
        $stmt->bindparam(':ville', $ville);
        $stmt->bindparam(':accessibilite', $accessibilite);
        $stmt->bindparam(':ID_champignon', $ID_champignon);
        $stmt->bindparam(':nom', $nom);
        $stmt->bindparam(':toxique', $toxique);
        $stmt->execute();

        return $stmt;
    }

    catch (PDOException $e) {
        echo $e->getMessage();
    }

?>
