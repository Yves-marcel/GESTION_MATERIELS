<?php 


    //require_once("moule/classe.php");
    require_once("classeU.php");

    $page="gestion service";

    include("moule/top_bar.php");
    
    include("moule/leftside.php");

    $service = new gestion_service;
    //appel a la methode pour ajouter des donnees
    if(isset($_POST['enregister']))
    {
     
      //recuperation des donnees du formulaire
      $intitule=htmlspecialchars(strip_tags($_POST['intitule']));
      $nomRes=htmlspecialchars(strip_tags($_POST['nomRes']));
      $dateEn=htmlspecialchars(strip_tags($_POST['dateEn']));
      $dir=htmlspecialchars(strip_tags($_POST['dir']));
      //verifions si les donnees ne sont pas nul
      $service->addservice($intitule, $nomRes, $dateEn, $dir);
      $succes_ad='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> ENREGISTREMENT EFFECTUE AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }else{
      $erreur_ad='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> ENREGISTREMENT NON EFFECTUE
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
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
      echo "<script language='javascript'>
          setInterval(function(){
            window.location= 'modifier_service';
          }, 2500);
          </script>";
    }


  

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
                <h3 class="card-title"> <i class="fas fa-project-diagram"></i>Ajouter un Service </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" >
              <!--Debut affichage de Message -->
              <div class="card-footer">
              <?php
                 if(isset($_GET["servi"])){
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Intutile</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Intutile" name="intitule">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> Responsable </label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="nomRes">
                      <option value="">choisir</option>
                         <?php
                         $service->lister_nom();
                         ?>
                        </select>
                      
                    </div>
                  </div>
                  
                 

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Direction</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="dir">
                      <option value="">choisir</option>
                         <?php
                         $service->lister_dir();
                         ?>
                         
                        </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> </label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="inputEmail3" name="dateEn" value="<?php echo date("Y/m/d h:i:s") ?>">
                    </div>
                  </div>
                </div>
                </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="enregister" class="btn btn-info"><i class='fas fa-cash-register'></i>ENREGISTRER</button>
                  <button type="submit" class="btn btn-default float-right"><i class='fas fa-trash-restore-alt'></i>ANNULER </button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
             
            </div>

          </div>
          <!-- /.col-md-6 -->

            
            <div class="col-md-12">
            
            <div class="card card card-info">
             
              <div class="card-header border-0">
                <h3 class="card-title">Liste des services</h3>
                
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
                    <th>E-mail responsable</th>
                    <th>Direction</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      //affichage des donnees
                      
                      $service->affiche_ser();
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
