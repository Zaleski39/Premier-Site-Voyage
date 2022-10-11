<?php
            session_start();
            require_once "config.php";

            if (isset($_GET['mail']) AND !empty($_GET['mail']) AND isset($_GET['verification']) AND  !empty($_GET['verification'])) {

                // Récupération des variables nécessaires à l'activation
                    $mail = $_GET['mail'];
                    $verification = $_GET['verification'];
                
                // Récupération de la clé correspondant au $mail dans la base de données
                    $sql="SELECT verification, isactive FROM login WHERE mail = '$mail'";
                    $req=mysqli_query($link, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error());
                    $row= mysqli_fetch_assoc($req);

                    $verifbdd = $row['verification']; // Récupération de la clé
                    $isactif = $row['isactive']; // $isactif contiendra alors 0 ou 1

                if($isactif == '1' ){   //Si le compte est déjà actif on prévient 
                    echo "Votre compte est déjà actif !";
                }   else {
                    // Si ce n'est pas le cas on passe aux comparaisons
                    if($verification == $verifbdd) { // On compare nos deux clés  
                        // Si elles correspondent on active le compte !    
                            echo "Votre compte a bien été activé !";

                        // La requête qui va passer notre champ isactif de 0 à 1
                        $req ="UPDATE login SET isactive = 1 WHERE mail = '$mail' ";
                        mysqli_query($link, $req);
                        }   else { // Si les deux clés sont différentes on provoque une erreur...
                                echo "Erreur ! Votre compte ne peut être activé...";
                            }   
                    }
            }

            ?> 