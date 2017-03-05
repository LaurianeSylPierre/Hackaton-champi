<?php

if(empty($_POST['contributeur'])){
    echo "Vous devez entrer un nom de contributeur";
}

if(empty($_POST['champignon'])){
    echo "Vous devez entrer un type de champignon";
}

if(empty($_POST['difficulty'])){
    echo "Vous devez entrer une difficulté d'accès";
}

?>
