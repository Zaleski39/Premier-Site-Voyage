<?php

include('db.php');

$id = $_POST['id_r'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$ville = $_POST['ville'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$message = $_POST['message'];

//Traitement des données
$query = "UPDATE renseignement SET nom='$nom', prenom='$prenom', age='$age', ville='$ville', email='$email', telephone='$telephone', message='$message' WHERE id='$id'";
$result = $connection->query($query);

echo json_encode(true);



