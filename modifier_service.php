<?php 


    //require_once("moule/classe.php");
    require_once("classeU.php");

    $page="gestion service";

    include("moule/top_bar.php");
    
    include("moule/leftside.php");

    $service = new gestion_service;

    //Recuperation des données du formulaire
      $intitule=htmlspecialchars(strip_tags($_POST['intitule']));
      $nomRes=htmlspecialchars(strip_tags($_POST['nomRes']));
      $dir=htmlspecialchars(strip_tags($_POST['dir']));
      $getservi=$_GET["service"];

    //appel a la methode pour ajouter des donnees
    if(isset($_POST['enregister']))
    {
      //verifions si les donnees ne sont pas nul
      $ajouter = new gestion_service;
      $ajouter->addservice($intitule, $nomRes, $prenRes, $email);
    }
    //Fin ajout des donnees


    //Action pour supprimer les donnees
    if(isset($_GET["servi"])){
      $suprime= new gestion_service;
      $suprime->sup_ser($_GET["servi"]);
      $succes_sup='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> DONNEES SUPPRIMEEES AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    //Fin suppression des données

    //Debut Modification des donnees
      //Detection du bouton d'enregistrement lors di clic
      if(isset($_POST["modifier"])){
        //Verication si tous les champs sont remplies
        if(!empty($intitule) && !empty($nomRes) && !empty($dir) ){
          //appel de la methode de modification
          $modfi=new gestion_service;
          $modfi->modifierservice($intitule, $nomRes, $dir, $getservi);
          $succes_mod='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
          <strong><i class="fa fa-check-circle"></i></strong> MODIFICATION EFFECTUER AVEC SUCCES
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
            </button>
          </div>';


        }else{
          $erreur_mod='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
          <strong><i class="fa fa-check-circle"></i></strong>MODIFICATION NON EFFECTUE
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

      }
    //Fin modification des donnees


  

 ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header Page header-->
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
                <h3 class="card-title"> <i class="fas fa-project-diagram"></i>Ajouter un Service </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" >
              <!--Debut affichage de Message -->
              <div class="card-footer">
              <?php
                    if(isset($succes_mod)){
                      echo $succes_mod;
                    }elseif(isset($erreur_mod)){
                      echo $erreur_mod;
                    }

                  if(isset($_GET["perso"])){
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
                <?php
                $getmod=$_GET["service"];
                if(!empty($getmod)){
                    $dtupd =new gestion_service;
                    $dtupd->aff_mod_service($getmod);

                }
                 
                 ?>
                  
                </div>
                
                <!-- /.card-body -->
               
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
                <h3 class="card-title">Liste des Services</h3>
              </div>
              <div  class="col-sm-12">
              <div class="card-header">
                
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Services</th>
                    <th>Noms Responsable</th>
                    <th>Prenoms Responsable</th>
                    <th>Email Responsable</th>
                    <th>Direction</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      //affichage des donnees
                      $service=new gestion_service;
                      $service->affiche_ser();
                      ?> 
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
         
            <!-- Fin Super tableau -->
      <!-- /.container-fluid -->
    </div>
    </div>
    </div>
    <!-- /.content -->
  </div>
  </div>
  </div>
  </div>
  <!-- /.content-wrapper -->


  <?php 

    include("moule/footer.php");

 ?>
