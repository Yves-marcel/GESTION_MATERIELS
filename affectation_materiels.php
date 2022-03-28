<?php 

   
   require_once("classeU.php");

    $page="affectation_matériels";

    include("moule/top_bar.php");
		
    include("moule/leftside.php");

    //recuperation et filtrage des donnees
    if(isset($_POST['enregister']))
    {

    $filtre_materiel=htmlspecialchars(strip_tags($_POST["filtre_materiel"]));
    $employe=htmlspecialchars(strip_tags($_POST["employe"]));
    $materiel=htmlspecialchars(strip_tags($_POST["materiel"]));
    $projet=htmlspecialchars(strip_tags($_POST["projet"]));
    $justificatif=htmlspecialchars(strip_tags($_POST["justificatif"]));
    $date_afect=htmlspecialchars(strip_tags($_POST["date_affect"]));
    $status=htmlspecialchars(strip_tags($_POST["status"]));
   
    
    //Instaciation de la classe
    $affdctation= new affectation;
    //addaffect($filtre, $empl, $mat, $proj, $justi, $date_tr)
    $affdctation->addaffect($filtre_materiel, $employe, $materiel, $projet, $justificatif, $date_afect, $status);
    $succes_ad='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
    <strong><i class="fa fa-check-circle"></i></strong>ENREGISTREMENT EFFECTUE AVEC SUCCES
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>';
        
   
   }

    //suppression des donnees
      if(isset($_GET["materiel"])){
        $sup=new gestion_materiel;
        $sup->supprimer_mat($_GET["materiel"]);
        echo'<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
        <strong><i class="fa fa-check-circle"></i></strong> DONNEES SUPPRIMEEES AVEC SUCCES
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        echo "<script language='javascript'>
          setInterval(function(){
            window.location='affectation_materiels';
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
              <h4 style="text-align:center"> Quel type d'équipement souhaitez vous Affecter ? </h4>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <?php  

               if (empty($_GET['action'])){
                 ?>
                   <center>
                    <br> <br>
                    <span style="display: inline-flex;">  <h5 style="padding: 5px">  <a href="affectation_materiels.php?action=phone"> <i class="fa fa-phone">  </i>Téléphone</a> </h5><br>  
                    <h5 style="padding: 5px">  <a href="affectation_materiels.php?action=ordi"><i class="fa fa-desktop">  </i> Ordinateur</a> </h5><br> 
                    <h5 style="padding: 5px">  <a href="affectation_materiels.php?action=imprimante"> <i class="fa fa-print">  </i> Imprimante</a> </h5>
                    <h5 style="padding: 5px">  <a href="affectation_immobilier?action=immobilier"><i class='fas fa-campground'></i>Immobilier</a> </h5></span> 
                    <br> <br> 
                  </center>
                 <?php 
               }else{
                  ?>
              <form class="form-horizontal" method="post">
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Filtre appareil </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" required id="inputEmail3" readonly="" value="<?php  echo(strtoupper($_GET['action'])) ?>"   name="filtre_materiel">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Employé</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="employe">
                      <option value="">- FAIRE UN CHOIX- </option>
                        <?php
                         $cmbl=new gestion_demande;
                         $cmbl->contact_data();
                         ?>
                        </select>
                      
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Matériels</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="materiel">
                      <option value="">- FAIRE UN CHOIX- </option>
                        <?php
                        $service= new gestion_attribuer;
                        $service->listemateriel($_GET['action']);
                         ?>
                        </select>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">pojet d'Attribution</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="projet">
                      <option value="">- FAIRE UN CHOIX- </option>
                        <?php
                         $cmb=new gestion_materiel;
                         $cmb->combprojet();
                         
                         ?>
                        </select>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">justificatif</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="inputEmail3"  name="justificatif"></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                    <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">email </label> -->
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control"  id="inputEmail3" name="status" value="1">
                    </div>
                  </div>
                   <div class="form-group row">
                    <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Date_affectation </label> -->
                     <div class="col-sm-10">
                       <input type="hidden" class="form-control" id="inputEmail3"  name="date_affect" value="<?php echo date("Y/m/d h:i:s")?>">
                     </div>
                   </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" name="enregister" class="btn btn-info mr-4"><i class='fas fa-cash-register'></i>ENREGISTRER</button>
                            <button type="submit" class="btn btn-default ml-4"><i class='fas fa-trash-restore-alt'></i>ANNULER </button>
                            </div>
                            <!-- /.card-footer -->
                          </form>
                    <?php
               }
?>
              
            </div>
             
            </div>

          </div>
          <!-- /.col-md-6 -->

            <br> <br>

          <div class="col-md-12">
            
            <div class="card card card-info">
             
              <div class="card-header border-0">
                <h3 class="card-title">Liste équipements affecter</h3>
                
              </div>
              

              <div  class="col-sm-12">
              <div class="card-header">
                
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <?php
                     if(isset($_GET["action"])){
                       ?>
                      <th>Filtre appareil </th>
                      <th>Employés</th>
                      <th>projet d'attribution</th>
                      <th>Materiel Attribuer</th>
                      <th>Justificatif</th>
                      <th>Date de traitement</th>
                      <th>statut</th>
                      <th>Désactribuer</th>
                      <?php

                     }else{
                      ?>
                      <th>Employés</th>
                      <th>projet d'attribution</th>
                      <th>Materiel Attribuer</th>
                      <th>Justificatif</th>
                      <th>Date de traitement</th>
                      <th>statut</th>
                      <th>Modifier</th>
                      <th>Désactribuer</th>
                      <?php
                     }
                     ?>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      $getaffiche=$_GET["action"];
                      if(!empty($getaffiche)){
                        $af= new affectation;
                        $af->aff_affectaion($getaffiche);
  
                      }else{
  
                        $cb=new gestion_attribuer;
                        $cb->afficheAttribution();
                      }
                      ?> 
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            </div>

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
