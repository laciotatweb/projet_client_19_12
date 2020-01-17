<!DOCTYPE html>
<html lang="fr">

<head>
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

   
    <!--Navbar-->
<header>    
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-3">
  <div class="container">
    <a class="navbar-brand" href="home_admin.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
            </a>
          <!-- Animation du menu -->
            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="message_admin.php">Messages</a>
                <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="reset_pass.php">Changer le mot de passe</a>
                <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout_admin.php">Se déconnecter</a>
            </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Base de données
        </a>
          <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index_import_question.php">Questions</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index_import_users.php">Utilisateurs</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index_import_messages.php">messages</a>
          </div>
        </li>
    </ul> 

    </div>

</div>
</nav>
</header>
<!--End Navbar-->