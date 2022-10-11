<?php
        /* Database credentials. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'alexisr');
            define('DB_PASSWORD', 'gmzUwb97+yvFrw==');
            define('DB_NAME', 'alexisr_lrcvoyage_renseignement');
        
        /* Attempt to connect to MySQL database */
            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        // Check connection
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

?>