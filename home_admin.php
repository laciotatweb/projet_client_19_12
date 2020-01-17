<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_admin_index0.php");
    exit;
}
?>
<?php
include('include/common.php');
?>
<title>home_admin.php</title>
<body>
 
    <!--Carousel
<div class="carousel admin-slide slide carousel-fade" data-ride="carousel" data-interval="4000">
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
    End Carousel--> 
    <!--bandeau-haut  
    <div class ="container-fluid col-sm-12 justify-content-center">
 
    <div class="row justify-content-center border border-light shadow blanc">
        <div class="row form-group btn-database col-sm-1 text-center"></div>
        <div class="row form-group btn-database col-sm-3 text-center">
             <label><small class="form-text text-muted"><h3 class="wow fadeInLeft titre-texte" data-wow-delay="1s">Ajouter des questions</h3></small></label>
        </div>
    </div>
</div>
end bandeau-haut-->

<div class ="container-fluid row col-sm-12 d-flex justify-content-around">

    <div class="col-sm-3 border  border-light shadow justify-content-center window-1">
        <label><small class="form-text text-muted"><h3 class="wow fadeInLeft" data-wow-delay="1s">Accés à la base de données</h3></small></label>
        
        <div class="row justify-content-center">

            <a class="nav-link" href="index_import_question.php">
            <figure class="figure">
            <img src="icones/u4.png" class="figure-img" width="50" alt="icone u4">
            <figcaption class="figure-caption">Questions</figcaption>
            </figure></a>

            <a class="nav-link" href="index_import_users.php">
            <figure class="figure">
            <img src="icones/u6.png" class="figure-img" width="50" alt="icone u6">
            <figcaption class="figure-caption">Utilisateurs</figcaption>
            </figure></a>

            <a class="nav-link" href="index_import_messages.php">
            <figure class="figure">
            <img src="icones/u10.png" class="figure-img" width="50" alt="icone u6">
            <figcaption class="figure-caption">Messages</figcaption>
            </figure></a>

        </div>

    </div>

   <div class="col-sm-4 border  border-light shadow justify-content-center window-1">
        <label><small class="form-text text-muted"><h3 class="wow fadeInLeft" data-wow-delay="1s">Services</h3></small></label>
        <div class="row justify-content-center">

            <a class="nav-link" href="message_admin.php">
            <figure class="figure">
            <img src="icones/u1.png" class="figure-img" width="50" alt="icone u4">
            <figcaption class="figure-caption">Messages</figcaption>
            </figure></a>

            <a class="nav-link" href="reset_pass.php">
            <figure class="figure">
            <img src="icones/u3.png" class="figure-img" width="50" alt="icone u4">
            <figcaption class="figure-caption">Changer de mot de passe</figcaption>
            </figure></a>

            <a class="nav-link" href="logout_admin.php">
            <figure class="figure">
            <img src="icones/u7.png" class="figure-img" width="50" alt="icone u4">
            <figcaption class="figure-caption">Déconnexion</figcaption>
            </figure></a>
            
        </div>
    </div>

    <div class="col-sm-3 border  border-light shadow justify-content-center window-1">
        <label><small class="form-text text-muted"><h3 class="wow fadeInLeft" data-wow-delay="1s">Outils d'administration</h3></small></label>
        
        <div class="row justify-content-center">

          <a class="nav-link" href="../191105_site_utilisateur/index0.php">
            <figure class="figure">
            <img src="icones/u8.png" class="figure-img" width="50" alt="icone u4">
            <figcaption class="figure-caption">Interface Utilisateur</figcaption>
            </figure></a>

        </div>

    </div>

</div>
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
