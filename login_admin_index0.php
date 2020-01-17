<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to home page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home_admin.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Saisir votre adresse mail!";
    } else{
        $username = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Mot de passe?";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, password, email FROM users WHERE email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $email = $row["email"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: home_admin.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Mot de passe non valide";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "Pas de compte à ce nom...";
                }
            } else{
                echo "Oops! Erreur interne...";
            }
        }
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>login_admin_index0.php</title>
    <!--Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--style css-->
    <link rel="stylesheet" href="css/style.css">
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap|Work : semi-bold" rel="stylesheet">
    <!--animation-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

</head>

<body>
<!--Carousel-->
    <div class="carousel zero slide carousel-fade" data-ride="carousel" data-interval="4000">
        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
                <div class="img"><img class="d-block img-fluid" src="images/bp1.jpg" alt="slide 1"></div>
            </div>
            <div class="carousel-item">
                <div class="img"><img class="d-block img-fluid" src="images/bp4.jpg" alt="slide 4"></div>
            </div>
            <div class="carousel-item">
                <div class="img"><img class="d-block img-fluid" src="images/bp2.jpg" alt="slide 2"></div>
            </div>
            <div class="carousel-item">
                <div class="img"><img class="d-block img-fluid" src="images/bp3.jpg" alt="slide 3"></div>
            </div>
            <div class="carousel-item">
                <div class="img"><img class="d-block img-fluid" src="images/bp4.jpg" alt="slide 4"></div>
            </div>
        </div>
    </div>
    <!--End Carousel-->    
       
     
<!--login-->
<div class ="container-fluid row col-sm-12 col-lg-12 justify-content-center">
    <div class="col-sm-12 col-md-4 col-lg-3 border border-light shadow global">

        <div class="text-center marge_contact">
            <h2>Accéder à votre espace</h2>
            <p>Se connecter</p>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label><small class="form-text text-muted">Email</small></label>
                <input type="email" name="email" class="form-control" placeholder="Votre nom cc@gmail.com" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label><small class="form-text text-muted">Mot de passe</small></label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe 8x">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-secondary btn-sm" value="Login">
            </div>
        </form>
    </div>
</div>
<!--end login-->



     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--Animationns animate wow-->
    <script src="js/wow.min.js"></script>
    <script src="js/scripts.js"></script>
    <!--Pour l'envoi des mails-->
    <script src="js/contact.js"></script>
</body>

</html>