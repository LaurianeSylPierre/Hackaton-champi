<?php

require_once 'bdd.php';

    try {

        $ID_localisation = "";
        $posx = $_POST['longitude'];
        $posy = $_POST['latitude'];
        $ville = $_POST['ville'];
        $accessibilite = $_POST['difficulty'];

        $stmt = $pdo->prepare("INSERT INTO localisation (ID_localisation, posx, posy, ville, accessibilite)
                                    VALUES (:ID_localisation, :posx, :posy, :ville, :accessibilite)");

          //bindparam va relier les valeurs aux fonctions des valeurs
        $stmt->bindparam(':ID_localisation', $ID_localisation);
        $stmt->bindparam(':posx', $posx);
        $stmt->bindparam(':posy', $posy);
        $stmt->bindparam(':ville', $ville);
        $stmt->bindparam(':accessibilite', $accessibilite);
        $stmt->execute();

        return $stmt;
    }

    catch (PDOException $e) {
        echo $e->getMessage();
    }

        if(isset($_POST['champignonplus'])){
            try {
                $ID_champignon = "";
                $nom = $_POST['champignon'];
                $toxique = $_POST['comestibleplus'];

                $id = $pdo->prepare("SELECT ID_localisation FROM localisation WHERE ID_localisation = lastInsertId()");
                $id = $pdo->execute();
                $ID_localisation = $id->fetch(PDO::FETCH_ASSOC);

                $stmt = $pdo->prepare("INSERT INTO champignon (ID_champignon, nom, ID_localisation, toxique)
                                            VALUES (:ID_champignon, :nom, :ID_localisation, :toxique)");

                  //bindparam va relier les valeurs aux fonctions des valeurs
                $stmt->bindparam(':ID_champignon', $ID_champignon);
                $stmt->bindparam(':nom', $nom);
                $stmt->bindparam(':ID_localisation', $ID_localisation);
                $stmt->bindparam(':toxique', $toxique);
                $stmt->execute();

                return $stmt;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
            try {
                $ID_champignon = "";
                $nom = $_POST['champignonplus'];
                $toxique = $_POST['toxcomestible'];

                $id = $pdo->prepare("SELECT ID_localisation FROM localisation WHERE ID_localisation = lastInsertId()");
                $id = $pdo->execute();
                $ID_localisation = $id->fetch(PDO::FETCH_ASSOC);

                $stmt = $pdo->prepare("INSERT INTO champignon (ID_champignon, nom, ID_localisation, toxique)
                                            VALUES (:ID_champignon, :nom, :ID_localisation, :toxique)");

                  //bindparam va relier les valeurs aux fonctions des valeurs
                $stmt->bindparam(':ID_champignon', $ID_champignon);
                $stmt->bindparam(':nom', $nom);
                $stmt->bindparam(':ID_localisation', $ID_localisation);
                $stmt->bindparam(':toxique', $toxique);
                $stmt->execute();

                return $stmt;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        else{
            try {

                $ID_champignon = "";
                $nom = $_POST['champignon'];
                $toxique = $_POST['toxcomestible'];

                $id = $pdo->prepare("SELECT ID_localisation FROM localisation WHERE ID_localisation = lastInsertId()");
                $id = $pdo->execute();
                $ID_localisation = $id->fetch(PDO::FETCH_ASSOC);

                $stmt = $pdo->prepare("INSERT INTO champignon (ID_champignon, nom, ID_localisation, toxique)
                VALUES (:ID_champignon, :nom, :ID_localisation, :toxique)");

                //bindparam va relier les valeurs aux fonctions des valeurs
                $stmt->bindparam(':ID_champignon', $ID_champignon);
                $stmt->bindparam(':nom', $nom);
                $stmt->bindparam(':ID_localisation', $ID_localisation);
                $stmt->bindparam(':toxique', $toxique);
                $stmt->execute();

                return $stmt;
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }


?>
