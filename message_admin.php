<?php
include('include/common.php');
?>


<body>
    
<div class ="container-fluid row col-sm-12 col-lg-12 justify-content-center">
    <div class="col-sm-12 col-md-4 col-lg-3 border  border-light shadow global">

        <div class="text-center marge-contact">  
               
            <h2>Votre message</h2>
            <p>Merci de compléter votre demande</p>  
        </div>    


    <form action="send_data.php" method="POST">
        <div class="form-group">
            <label><small class="form-text text-muted">Nom</small></label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label><small class="form-text text-muted">Email</small></label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label><small class="form-text text-muted">Message</small></label>
            <textarea class="form-control" name="message" required></textarea>
        </div>

        <div class="form-group">
            <!--   <button class="btn btn-success" type="submit">Submit</button>-->
            <input type="submit" class="btn btn-secondary btn-sm" value="Envoyer">
        </div>

    </form>
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
