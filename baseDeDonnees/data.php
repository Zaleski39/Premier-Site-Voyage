<?php


include('db.php');

//Traitement des données
$sql = "SELECT * FROM renseignement";
$result = $connection->query($sql);




if ($result->num_rows > 0) {
    // on boucle sur les résultats de la requête pour alimenter le tableau $array
        while ($row = $result->fetch_assoc()) {
            $arraytojs[] = $row;
        }
    // On retourne à la vue index.php nos résultats au format JSON !
        
}   else {
    echo "DIE !";
    }
    
$connection->close();
