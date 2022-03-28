<?php 


    require_once("moule/classe.php");
    require('classeU.php');

    $page="gestion Direction";

    include("moule/top_bar.php");
    
    include("moule/leftside.php");

    //Debut modification des donnees
    
    if(isset($_POST["modifier"])){
        //recuperation des donnees du formulaire
        $nom=htmlspecialchars(strip_tags($_POST["nom"]));
        $iden=$_POST["sup"];
        if(!empty($nom)){
            //execution de la mdification
            $modificateur= new direction;
            $modificateur->modifier_dir($nom, $iden);
            $succes_mod='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
          <strong><i class="fa fa-check-circle"></i></strong> MODIFICATION EFFECTUER AVEC SUCCES
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }else{
          $erreur_mod='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
          <strong><i class="fa fa-check-circle"></i></strong> MODIFICATION NON EFFECTUER
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    //Fin modification des donnees

    
    //suppression des donnees
    
    if(isset($_POST["suppresion"])){
      $suppression = new direction;
      $suppression->supprimer_dir($_POST["delca"]);
      $succes_sup='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> DONNEES SUPPRIMEES AVEC SUCCES
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
                <h3 class="card-title"></i>Modifier une Direction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post">
              <!--Debut affichage de Message -->
              <div class="card-footer">
              <?php
                    if(isset($succes_mod)){
                      echo $succes_mod;
                    }elseif(isset($erreur_mod)){
                      echo $erreur_mod;
                    }

                    if(isset($_POST["suppresion"])){
                      if(isset($succes_sup)){
                        echo $succes_sup;
                      }elseif(isset($erreur_sup)){
                        echo $erreur_sup;
                      }
    
                     }
                   ?>
                  
                </div>
                <!--Fin Affichage de message -->
                <div class="card-body">
                  <div class="form-group row">
                      <?php 
                      $getidcat_mod=$_GET["cat"];
                      if(!empty($getidcat_mod)){
                        $affichageMod= new direction;
                        $affichageMod->affmod_dir($getidcat_mod);
                      }else{
                          //Redirection vers une page d'erreur
                          //header("location:")
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" name="modifier" class="btn btn-info"><i class="fas fa-pencil-alt"></i>MODIFIER</button>
                 
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
                <h3 class="card-title">Liste des Directions</h3>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Nom des Directions</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      //affichage des donnees
                     
                      $affichageMod->affiche_dir();
                      ?> 
                  
                  </tbody>
                  
                </table>
              </div>
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
