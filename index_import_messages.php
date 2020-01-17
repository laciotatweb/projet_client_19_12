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

<body>
    
<div class ="container-fluid col-sm-12 col-lg-12 justify-content-center admin-slide">


<!--form create import insert-->
<div class ="container-fluid col-sm-12 justify-content-center"><!--container-->
 
    
   
    </div>    
</div>
<!--end import insert-->
<div class="divider-3"><span></span>
</div>
    <div class="row justify-content-center blanc">

        <div class="row form-group btn-database col-sm-1 text-center">
        </div>
        <div class="row form-group btn-database col-sm-11 text-center">
             <label><small class="form-text text-muted"><h4 class="col-titre-2">Contenu de la base de données</h4></small></label>
        </div>
    </div>
 
<!--listing-->
 <div class ="container-fluid row col-sm-12 col-lg-12 justify-content-center">
    <div class="list-group col-sm-2"><h3 class="col-titre">id</h3></div>
    <div class="list-group col-sm-2"><h3 class="col-titre">identifiant</h3></div>
    <div class="list-group col-sm-2"><h3 class="col-titre">email</h3></div>
    <div class="list-group col-sm-2"><h3 class="col-titre">message</h3></div>
    <div class="list-group col-sm-2"><h3 class="col-titre">classe</h3></div>
    <div class="list-group col-sm-2"><h3 class="col-titre">date</h3></div>
 </div>          
<!--end listing-->
<div class="divider-3"><span></span></div>

<?php
try
{
//Connexion à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=process;charset=utf8', 'cc', 'xxxxxxxx');

}
catch(Exception $e)
{
// En cas d'erreur
        die('Erreur : '.$e->getMessage());
}

// On récupère tout le contenu de la table quest
$reponse = $bdd->query('SELECT * FROM contact');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>

<!--listing-->
 <div class ="container-fluid row col-sm-12 col-lg-12 justify-content-center">
    
    <div class="list-group col-sm-2"><h4 class="col-titre"><?php echo $donnees['id']; ?><br></h4></div>
    <div class="list-group col-sm-2"><h5 class="col-titre"><?php echo $donnees['identifiant']; ?><br></h5></div>
    <div class="list-group col-sm-2"><h4 class="col-titre"><?php echo $donnees['email']; ?><br></h4></div>
    <div class="list-group col-sm-2"><h5 class="col-titre"><?php echo $donnees['message']; ?><br></h5></div>
    <div class="list-group col-sm-2"><h5 class="col-titre"><?php echo $donnees['classe']; ?><br></h5></div>
    <div class="list-group col-sm-2"><h5 class="col-titre"><?php echo $donnees['date']; ?><br></h5></div>


 </div>
<div class="divider-3"><span></span></div>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
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