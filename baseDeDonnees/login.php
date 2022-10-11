<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
    }
 
// Include config file
    require_once "config.php";
 
// Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err =  $isactive_err = $login_err = "";
 
// Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Check if username is empty
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter username.";
            } else{
                $username = trim($_POST["username"]);
            }
       
        // Check if password is empty
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter your password.";
            } else{
                $password = trim($_POST["password"]);
            }

        // Validate credentials
            if(empty($username_err) && empty($password_err)){
                // Prepare a select statement
                $sql = "SELECT id, username, password, role, isactive FROM login WHERE username = ?";
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "s", $param_username);
                    // Set parameters
                        $param_username = $username;
                    // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){
                            // Store result
                            mysqli_stmt_store_result($stmt);
                            // Check if username exists, if yes then verify password
                            if(mysqli_stmt_num_rows($stmt) == 1){                    
                                // Bind result variables
                                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $role, $isactive);
                                mysqli_stmt_fetch($stmt);
                                if($isactive == 1){
                                    if(password_verify($password, $hashed_password)){
                                        // Password is correct, so start a new session
                                        session_start();
                                        // Store data in session variables
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $id;
                                        $_SESSION["username"] = $username;
                                        $_SESSION["role"] = $role;
                                        $_SESSION["isactive"] = $isactive;
                                        // Redirect user to welcome page
                                        header("location: index.php");
                                    } else{
                                        // Password is not valid, display a generic error message
                                        $login_err = "Invalid username or password.";
                                    }
                                }
                            else{
                                $isactive_err = "Votre compte n'est pas encore activé. Merci de consulter votre boite mail et de cliquer sur le lien pour l'activer.";
                            }
                            } else{
                                // Username doesn't exist, display a generic error message
                                $login_err = "Invalid username or password.";
                            }
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
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Lien mon fichier CSS -->
        <link rel="stylesheet" href="login.css">    
</head>
<body>
<section>            
            <div class="login--photo"> </div>
</section>
            <div class="wrapper">                
                <h2><strong>Identifiez</strong>-vous</h2>
                    <!-- <p>Veuillez renseigner vos identifiants pour vous connecter.</p> -->
                                <?php 
                                    if(!empty($login_err)){
                                    echo '<div class="alert alert-danger">' . 'Nom utilisateur ou mot de passe invalide.' . '</div>';
                                    }      
           
                                    if(!empty($isactive_err)){
                                    echo '<div class="alert alert-danger">' . $isactive_err . '</div>';
                                    }        
                                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group">
                        <label for="utilisateur">Nom d'utilisateur</label>
                        <input  type="text" 
                                name="username" 
                                id="utilisateur" 
                                class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" 
                                value="">
                        <span class="invalid-feedback">Nom d'utilisateur invalide.</span>
                    </div>    
                    
                    <div class="form-group">
                        <label for="motDePasse">Mot de passe</label>
                        <input  type="password" 
                                name="password" 
                                id="motDePasse"
                                class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback">Mot de passe invalide.</span>
                    </div>
                    <div class="form-group">
                       <input   type="submit" 
                                class="boutonSeConnecter" 
                                value="Connexion">
                    </div>
                    <p>Vous n'avez pas de compte ? <br><a class="abc" href="register.php">Créer votre compte</a></p>
                </form>
            </div>

    <!-- Lien fichier animation.js -->
    <script src="animation.js">    </script>
</body>
</html>