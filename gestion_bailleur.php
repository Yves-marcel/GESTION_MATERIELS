<?php 
   
    require('classeU.php');

    $page="gestion Bailleur";

    include("moule/top_bar.php");
    
    include("moule/leftside.php");

    //Verification de l'existence du bouton d'ajout
    if(isset($_POST["enregister"])){
      //recuperation et filtrage des donnees du formulaire
      $bailleur=htmlspecialchars(strip_tags($_POST["bailleur"]));
      $dateEn=htmlspecialchars(strip_tags($_POST["dateEn"]));
      //instanciation de notre classe pour utiliser le bouton d'enregistrement
      $ajoutercat= new categorie();
      $ajoutercat->addcat($libelle,$dateEn);
      $succes_ad='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> ENREGISTREMENT EFFECTUE AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }else{
      $erreur_ad='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> ENREGISTREMENT NO EFFECTUE
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      
    }
    //suppression des donnees
    
    if(isset($_GET["cat"])){
      $suppression = new categorie;
      $suppression->supprimerCat($_GET["cat"]);
      $succes_sup='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> DONNEES SUPPRIMEES AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      echo "<script language='javascript'>
          setInterval(function(){
            window.location= 'gestion_personnes';
          }, 2500);
          </script>";
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
                <h3 class="card-title"></i>Ajouter Catégorie</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post">
              <!--Debut affichage de Message -->
              <div class="card-footer">
                  <?php
                 if(isset($_GET["cat"])){

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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nom_Bailleur </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="nom de la catégorie" name="bailleur">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> </label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="inputEmail3" name="dateEn" value="<?php echo date("Y/m/d h:i:s") ?>">
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="enregister" class="btn btn-info"><i class="fas fa-plus"></i>Ajouter</button>
                  <button type="submit" class="btn btn-default float-right"><i class='fas fa-trash-restore-alt'></i>ANNULER </button>
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
                <h3 class="card-title">Liste des catégories</h3>
                
              </div>
              
              <div  class="col-sm-12">
              <div class="card-header">
                
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Nom_catégorie</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      //affichage des donnees
                      $afcat= new categorie();
                      $afcat->affiche();
                      ?> 
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- Fin Super tableau -->
          
          </div>
          </div>

          

          

          <!-- fn -->
          
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
