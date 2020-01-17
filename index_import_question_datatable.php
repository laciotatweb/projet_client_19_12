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
<title>index_import_question.php</title>
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
            <p>- Database Mysql : "process" - Table : "questions"<br>
        - Colonnes : "question" - "classe"<br>
        - "id" auto-incrémenté - "date" automatique à l'insertion</p>
        </div>
           <div class="card-header bg-transparent text-center ">
                <h4>Avec Excel ou LibreOffice Calc</h4>
            </div>
       
            <img src="images/Capture_1.png" alt="Tableau">
            <h5 class="text-left">- Créer un tableau en deux colonnes.<br>
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
             <label><small class="form-text text-muted"><h3 class="wow fadeInLeft titre-texte" data-wow-delay="1s">Ajouter des questions</h3></small></label>
        </div>
        <div class="form-group btn-database col-sm-2">
            <label><small class="form-text text-muted"><h4 class="wow fadeInLeft titre-texte" data-wow-delay="1s">Créer le fichier </h4></small></label>
            <a href="#" data-toggle="modal" data-target="#tableau">ICI</a><!--lien popup modal -->        
        </div>                        
       
        <div class="form-group btn-database col-sm-6">
            <form enctype="multipart/form-data" action="csv_import_questions.php" method="post">
                <label><small class="form-text text-muted"><h4 class="wow fadeInLeft titre-texte" data-wow-delay="1s">Importer les questions</h4></small></label>
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

 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTable</h6>
            </div>
 <div class ="container-fluid row col-sm-12 col-lg-12 justify-content-center">
    <div class="list-group col-sm-2"><h3 class="col-titre">id</h3></div>
    <div class="list-group col-sm-6"><h3 class="col-titre">question</h3></div>
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

// On récupère tout le contenu de la table questions
$reponse = $bdd->query('SELECT * FROM questions');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>

<!--listing-->
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
    

    <div class ="container-fluid row col-sm-12 col-lg-12 justify-content-center" width="100%" cellspacing="0">  
    
    <div class="list-group col-sm-2"><h4 class="col-titre"><?php echo $donnees['id']; ?><br></h4></div>
    <div class="list-group col-sm-6"><h5 class="col-titre"><?php echo $donnees['question']; ?><br></h5></div>
    <div class="list-group col-sm-2"><h4 class="col-titre"><?php echo $donnees['classe']; ?><br></h4></div>
    <div class="list-group col-sm-2"><h5 class="col-titre"><?php echo $donnees['date']; ?><br></h5></div>  

        </div>
        <!-- /.container-fluid -->

<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; CC 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


<?php
include('include/common_script.php');
?> 
</body>

</html>