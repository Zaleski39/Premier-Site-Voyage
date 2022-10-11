<?php

include('db.php');

//var_dump($_POST);
    $idTemp = $_POST['id_r'];

    $id = json_decode($idTemp);


//Traitement des données
    $query = "DELETE FROM renseignement WHERE id='$id'";
    $result = $connection->query($query);
