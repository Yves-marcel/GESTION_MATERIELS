<?php 

 require('classeU.php');
    require_once("moule/classe.php");

    $page="gestion projet";

    include("moule/top_bar.php");
    
    include("moule/leftside.php");

    //Verification de l'existence du bouton d'envoie
    if(isset($_POST['enregister']))
    {
      //recuperation des donnees du formulaire
      $nom=htmlspecialchars(strip_tags($_POST['projet']));
      $des=htmlspecialchars(strip_tags($_POST['des']));
      $dtD=htmlspecialchars(strip_tags($_POST['dateD']));
      $dtF=htmlspecialchars(strip_tags($_POST['dateF']));
      $dtEn=htmlspecialchars(strip_tags($_POST['dateEn']));
      if($dtD < $dtF){
        $ajouter = new gestion_projet;
      $ajouter->addprojet($nom, $des, $dtD, $dtF, $dtEn);
      $succes_ad='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> ENREGISTREMENT EFFECTUE AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';

      }else{
        $erreur_ad='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
        <strong><i class="fa fa-check-circle"></i></strong> ENREGISTREMENT NON EFFECTUE VEUILLEZ VERIFIER LES DATES
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        
      }
      //verifions si les donnees ne sont pas nul
      
    }
    

    
    //suppression des donnees
    
    if(isset($_GET["sup"])){
      $sup=new gestion_projet;
      $sup->supprimer($_GET["sup"]);
      $succes_sup='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> DONNEES SUPPRIMEEES AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      echo "<script language='javascript'>
          setInterval(function(){
            window.location= 'gestion_personnes';
          }, 2500);
          </script>";
    }else{
      $erreur_sup='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> DONNEES NON SUPPRIMEEES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';

    }
    //Fin suppression

 

 ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo "$page"; ?></h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo "$page"; ?></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col-md-6 -->
          <div class="col-md-12" style="margin-bottom: 25px">
            
            <div class="card">

              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-project-diagram"></i>Ajouter un projet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post">
              <!--Debut affichage de Message -->
              <div class="card-footer">
              <?php
                 if(isset($_GET["sup"])){
                  if(isset($succes_sup)){
                    echo $succes_sup;
                  }elseif(isset($erreur_sup)){
                    echo $erreur_sup;
                  }

                 }

                 if(isset($_POST["enregister"])){
                  if(isset($succes_ad)){
                    echo $succes_ad;
                  }elseif(isset($erreur_ad)){
                    echo $erreur_ad;
                  }

                 }
                 
                 
                  ?>
                  
                </div>
                <!--Fin Affichage de message -->
                <div class="card-body">
               
                  <div class="form-group row">
 
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nom Projet </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Nom projet" name="projet" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description du projet </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Description" name="des">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Date Debut</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="inputPassword3" placeholder="date debut" name="dateD" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date fin </label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="inputEmail3" name="dateF">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> </label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="inputEmail3" name="dateEn" value="<?php echo date("Y/m/d h:i:s") ?>">
                    </div>
                  </div>
                  

                  
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="enregister" class="btn btn-info action1"><i class="fas fa-plus" id="btn-confirm"></i>AJOUTER</button>
                  <button type="submit" class="btn btn-default float-right action"><i class='fas fa-trash-restore-alt'></i>ANNULER </button>
                </div>
                <!-- /.card-footer -->
              </form>
              
            </div>
             
            </div>

          </div>
          <!-- /.col-md-6 -->

            <br> <br>

          <div class="col-md-12">
            <div class="card card card-info">
              <div class="card-header border-0">
                <h3 class="card-title">Liste des Projets</h3>
                
              </div>
              <div  class="col-sm-12">
              <div class="card-header">
                
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Projet</th>
                    <th>Description du Projet</th>
                    <th>Date_Debut</th>
                    <th>Date_Fin</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      //affichage des donnees
                      $aff=new gestion_projet;
                      $aff->affiche();
                      ?> 
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- Fin Super tableau -->
            <?php
                /*$af= new gestion_projet;
                $af->afficheb();*/
                 ?>

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
<script>
</script>
  <?php 


    include("moule/footer.php");

  

 ?>
