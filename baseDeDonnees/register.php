<?php
        // Include config file
        require_once "config.php";
        
        // Define variables and initialize with empty values
        $username = $mail = $password = $confirm_password = "";
        $username_err = $mail_err = $password_err = $confirm_password_err = $upload_err = "" ;
 

        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        
            // Validate username
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter a username";
            } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
                $username_err = "Le nom d'utilisateur ne peut contenir que des lettres, et des tirets";
            } else{
                // Prepare a select statement
                $sql = "SELECT id FROM login WHERE username = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_username);
                    
                    // Set parameters
                    $param_username = trim($_POST["username"]);
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                        
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $username_err = "Ce nom d'utilisateur est déjà pris";
                        } else{
                            $username = trim($_POST["username"]);
                        }
                    } else{
                        echo "Oups! Quelque chose s'est mal passé. Veuillez réessayer plus tard";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }
            

            // Validate mail
            if(empty(trim($_POST["mail"]))){
                $mail_err = "Please enter an e-mail.";
            } else{
                // Prepare a select statement
                $sql = "SELECT id FROM login WHERE mail = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_mail);
                    
                    // Set parameters
                    $param_mail = trim($_POST["mail"]);
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                        
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $mail_err = "Cet e-mail est déjà pris.";
                        } else{
                            $mail = trim($_POST["mail"]);
                        }
                    } else{
                        echo "Oups! Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }



            // Validate password
            if(empty(trim($_POST["password"]))){
                $password_err = "Veuillez entrer un mot de passe";     
            } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "Le mot de passe doit avoir au moins 6 caractères";
            } else{
                $password = trim($_POST["password"]);
            }
            
            // Validate confirm password
            if(empty(trim($_POST["confirm_password"]))){
                $confirm_password_err = "Veuillez confirmer le mot de passe";     
            } else{
                $confirm_password = trim($_POST["confirm_password"]);
                if(empty($password_err) && ($password != $confirm_password)){
                    $confirm_password_err = "Le mot de passe ne correspond pas";
                }
            }
            

            // Upload image sur le dosssier 
                        $target_dir = "img/";
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        
                        // Check if image file is a actual image or fake image
                        
                          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                          if($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                          } else {
                            $upload_err = "File is not an image.";
                            $uploadOk = 0;
                          }
                       
                        
                        // Check if file already exists
                        if (file_exists($target_file)) {
                            $upload_err =  "Sorry, file already exists.";
                          $uploadOk = 0;
                        }
                        
                        // Check file size
                        if ($_FILES["fileToUpload"]["size"] > 5000000) {
                            $upload_err =  "Sorry, your file is too large.";
                          $uploadOk = 0;
                        }
                        
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                            $upload_err =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                          $uploadOk = 0;
                        }
                        
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            //$upload_err =  "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } else {
                          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                          } else {
                            $upload_err = "Sorry, there was an error uploading your file.";
                          }
                        }




            // Check input errors before inserting in database
            if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($mail_err) && empty($upload_err)){

                // Génration d'un code aléatoire :
                

                    $verification = substr(md5(mt_rand()),0,15);

                // Prepare an insert statement
                $sql = "INSERT INTO login (username, mail, password, role, isactive, verification) VALUES (?, ?, ?, 'visiteur' , 0 , '$verification')";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_mail, $param_password);
                    
                    // Set parameters
                    $param_username = $username;
                    $param_mail = $mail;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                    

                    // Préparation du mail contenant le lien d'activation
                            $destinataire = $mail;
                            $sujet = "Activer votre compte LRC Voyage" ;
                            $entete = "From: rigoulot.alex@gmail.com" ;
                            
                            // Le lien d'activation est composé du username d'mail et de la clé(verification)
                            $message = 'Bienvenue sur notre site web LRC Voyage,
                            Pour activer votre compte, veuillez cliquer sur le lien ci-dessous :
                            
                            https://alexisr.promo-90.codeur.online/LRC-Voyage/baseDeDonnees/activation.php?username='.urlencode($username). '&mail='.urlencode($mail). '&verification='.urlencode($verification).'
                                                     
                            ---------------
                            Ceci est un mail automatique, Merci de ne pas y répondre.';                           
                        
                            mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail







                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        // Redirect to login page
                        header("location: login.php");
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }
            
            // Close connection
            mysqli_close($link);
        }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">3

    <!-- Lien mon fichier CSS -->
    <link rel="stylesheet" href="register.css">

</head>
<body>
        
            <div class="wrapper">
            <h2><strong>S'inscrire</strong></h2>
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="utilisateur" >Nom d'utilisateur</label>
                        <input type="text" id="utilisateur" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="">
                        <span class="invalid-feedback"><?php echo $username_err ?></span>
                    </div>   
                    
                    <div class="form-group">
                        <label for="mail" >E-mail</label>
                        <input type="email" id="mail" name="mail" class="form-control <?php echo (!empty($mail_err)) ? 'is-invalid' : ''; ?>" value="">
                        <span class="invalid-feedback"><?php echo $mail_err ?></span>
                    </div>  

                    <div class="form-group">
                        <label for="motDePasse" >Mot de passe</label>
                        <input type="password" id="motDePasse" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="">
                        <span class="invalid-feedback">Le mot de passe doit avoir au moins 6 caractères.</span>
                    </div>
                    <div class="form-group">
                        <label for="confirmerMotDePasse">Confirmer le mot de passe</label>
                        <input type="password" id="confirmerMotDePasse" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="">
                        <span class="invalid-feedback">Le mot de passe ne correspond pas</span>
                    </div>

                    <div class="telechargement">
                        
                        Sélectionnez l'image à télécharger :
                        <input class="telechargement1 form-control" type="file" name="fileToUpload" id="fileToUpload">
                        <!-- <input class="telechargement2" type="submit" value="Télécharger l'image" name="submit"> -->
                        <p class="warning "> <?php echo $upload_err; ?></p>
            

                    </div>



                    <div class="form-group boutonSeConnecterabc">
                        <input type="submit" class="boutonSeConnecter" value="Soumettre">
                    </div>
                    <p>Vous avez déjà un compte? <br> <a href="login.php">Connectez-vous ici</a>.</p>
                </form>
            </div>       
        
        
    <!-- Lien fichier animation.js -->
    <script src="animation.js">    </script>
</body>
</html>