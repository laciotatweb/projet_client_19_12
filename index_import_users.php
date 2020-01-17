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
        <!-- Modal -->
<div class="modal fade border-light shadow" id="tableau" tabindex="-1" role="dialog" aria-labelledby="tableau" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tableau">Création du fichier CSV Questions</h5>
        

        <button type="button btn-secondary btn-sm" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-left">
            <p>- Database Mysql : "process" - Table : "users"<br>
        - Colonnes : "email" - "société - "département"<br>
        - "id" auto-incrémenté
        - "identifiant" créé par l'utilisateur
        - "approuvé" Par acceptation des conditions</p>
        </div>
           <div class="card-header bg-transparent text-center ">
                <h4>Avec Excel ou LibreOffice Calc</h4>
            </div>
       
            <img src="images/Capture_1.png" alt="Tableau">
            <h5 class="text-left">- Créer un tableau en trois colonnes.<br>
        - Sauvegarder au Format .csv<br>- Jeu de caractères : (Unicode) Utf-8<br>- Séparateur de champ : ,</h5>
      </div>

      <div class="modal-footer">   
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fermer</button>
      </div>        
    </div>
  </div>
</div>
<!-- End Modal -->

<!--form create import insert-->
<div class ="container-fluid col-sm-12 justify-content-center"><!--container-->
 
    <div class="row justify-content-center border border-light shadow blanc">
        <div class="row form-group btn-database col-sm-1 text-center"></div>
        <div class="row form-group btn-database col-sm-3 text-center">
             <label><small class="form-text text-muted"><h3 class="wow fadeInLeft titre-texte" data-wow-delay="1s">Ajouter des utilisateurs</h3></small></label>
        </div>
        <div class="form-group btn-database col-sm-2">
            <label><small class="form-text text-muted"><h4 class="wow fadeInLeft titre-texte" data-wow-delay="1s">Créer le fichier </h4></small></label>
            <a href="#" data-toggle="modal" data-target="#tableau">ICI</a><!--lien popup modal -->        
        </div>                        
       
        <div class="form-group btn-database col-sm-6">
            <form enctype="multipart/form-data" action="csv_import_users.php" method="post">
                <label><small class="form-text text-muted"><h4 class="wow fadeInLeft titre-texte" data-wow-delay="1s">Importer les utilisateurs</h4></small></label>
                <input type="file" class="btn-submit btn-secondary btn-sm" name="file" id="file" accept=".csv">
        
                <button type="submit" id="submit" name="import" class="btn btn-secondary btn-sm">Insérer</button>        
            </form>
        </div>
   
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
    <div class="list-group col-sm-2"><h3 class="col-titre">société</h3></div>
    <div class="list-group col-sm-2"><h3 class="col-titre">département</h3></div>
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
$reponse = $bdd->query('SELECT * FROM users');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>

<!--listing-->
 <div class ="container-fluid row col-sm-12 col-lg-12 justify-content-center">
    
    <div class="list-group col-sm-2"><h4 class="col-titre"><?php echo $donnees['id']; ?><br></h4></div>
    <div class="list-group col-sm-2"><h5 class="col-titre"><?php echo $donnees['identifiant']; ?><br></h5></div>
    <div class="list-group col-sm-2"><h4 class="col-titre"><?php echo $donnees['email']; ?><br></h4></div>
    <div class="list-group col-sm-2"><h5 class="col-titre"><?php echo $donnees['société']; ?><br></h5></div>
    <div class="list-group col-sm-2"><h5 class="col-titre"><?php echo $donnees['département']; ?><br></h5></div>
    <div class="list-group col-sm-2"><h5 class="col-titre"><?php echo $donnees['approuvé']; ?><br></h5></div>


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