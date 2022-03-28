

<?php 


 

 $page="login";

    require_once("classeU.php");


    include("moule/top_bar.php");
    
    include("moule/leftside.php");

    if (isset($_POST['valider']))

    {


/*$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'Dupont';
$_SESSION['age'] = 24;*/
  
  
  
     $email = htmlspecialchars(trim($_POST['email']));
     $password= htmlspecialchars(trim($_POST['password']));

    $valider = new gestion_permissions();
    $valider -> verification($email,$password);

     


    }


  

 ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <div class="content hold-transition login-page">
     <div class="login-box" style="transform: scale(1.1)">
  <div class="login-logo">
    <h5><b>Démarrer une session maintenant!</b></h5>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"></p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Saisir votre Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Saisir votre Mot de passe" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Se souvenir de moi
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name='valider' class="btn btn-primary btn-block">ENVOYER</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="resetpassword">Mot de passe oublié</a>
      </p>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php 




    include("moule/footer.php");

  

 ?>



