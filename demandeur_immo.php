<?php 

 require_once('classeU.php');
 $page="Demande ";


 include("moule/top_bar.php");

 include("moule/leftside.php");

  /*$user_name="nom";*/
 // $user_demandeur = 17;


  //Verification de l'existence du bouton d'envoie
    if(isset($_POST['enregister'])){
      //recuperation des donnees du formulaire
      $employe=htmlspecialchars(strip_tags($_POST['empl_conserner']));
      $service=htmlspecialchars(strip_tags($_POST['service']));
      $materiel=htmlspecialchars(strip_tags($_POST['materiel']));
      $date_debut=htmlspecialchars(strip_tags($_POST['date_debut']));
      $date_fin=htmlspecialchars(strip_tags($_POST['date_fin']));
      $date_emi=htmlspecialchars(strip_tags($_POST['date_emi']));
      $commentaire=htmlspecialchars($_POST['commentaire']);
      $fitre=htmlspecialchars(strip_tags($_POST['fitre']));
       
      //verifions si les donnees ne sont pas nul

       $addmande = new gestion_demande;
      $addmande->addDemande($employe, $service, $materiel, $date_debut, $date_fin, $date_emi, $commentaire, $fitre,$user_demandeur);
    }
 
 //suppression des donnees
    
    if(isset($_GET["type"])){
      $sup=new gestion_demande;
      $sup->del_up($_GET["type"]);
      $succes='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> DONNEES SUPPRIMEEES AVEC SUCCES
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
                <h3 class="card-title"><i class="nav-icon fas fa-users"></i>demande</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <?php   

                   if (empty($_GET['action'])){
                    
                    ?>
                        <center>
                         <h4> Quel type d'équipement souhaitez vous Demander ? </h4> <br> <br> 
                         <span style="display: inline-flex;">  <h5 style="padding: 5px">  <a href="demandeurs.php?action=phone"> <i class="fa fa-phone">  </i>Téléphone</a> </h5> 
                         <h5 style="padding: 5px">  <a href="demandeurs.php?action=ordi"><i class="fa fa-desktop">  </i> Ordinateur</a> </h5>
                         <h5 style="padding: 5px">  <a href="demandeurs.php?action=imprimante"> <i class="fa fa-print">  </i> Imprimante</a> </h5>
                         <h5 style="padding: 5px">  <a href="demandeur_immo?action=immobilier"><i class='fas fa-campground'></i>Immobilier</a> </h5></span>
                         <br> <br>  
                       </center>
                    <?php 
                  }else{
                    ?>
                   <form class="form-horizontal"  method="post" >
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">  </label>
                            <div class="col-sm-10">
                              <input type="hidden" class="form-control" name="user_name" id="inputEmail3"  value="<?php echo $user_name ?>"  >
                            </div>
                          </div>
                         <div class="form-group row">
                       <label for="inputEmail3" class="col-sm-2 col-form-label"> Employé concerné </label>
                        <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="empl_conserner" required> 
                      <option value=""> Choisir </option>  
                       <?php
                        $cmbl=new gestion_demande;
                        $cmbl->contact_data();
                       ?>
                        </select>
                      
                    </div>
                  </div>

                   


                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> service </label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="service" required>
                      <option value=""> Choisir </option>


                      <?php

                        $cmbl=new gestion_demande;
                        $cmbl->listeservice();

                       ?>
 
                        </select>
                    </div>
                  </div>
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Matériel souhaité de(<?php echo $_GET['action'] ?>) </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail3" required  name="materiel"  placeholder="Saisir le nom de  (<?php echo $_GET['action'] ?>) + Model ">
                               
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Date_Debut</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" id="inputEmail3" required name="date_debut">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Date_Fin </label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control"  id="inputEmail3" required name="date_fin">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <input type="hidden" class="form-control" id="inputEmail3"  name="date_emi" value="<?php echo date("Y/m/d h:i:s") ?>">
                               
                            </div>
                          </div>

                         
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Commentaire</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="inputEmail3" required  name="commentaire"></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Filtre </label> -->
                            <div class="col-sm-10">
                              <input type="hidden" class="form-control" id="fitrer" value="<?php echo $_GET["action"] ?>"  name="fitre">
                               
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <input type="hidden" class="form-control" id="inputEmail3"  name="existe" value="<?php echo 1 ?>">
                               
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
             
              <?php
              if(isset($_GET["type"])){
                if(isset($succes)){
                  echo $succes;
                }
              }
              ?>
              <div class="col-md-12">
            
            <div class="card card card-info">
             
              <div class="card-header border-0">
                <h3 class="card-title">Liste des demandes</h3>
                
              </div>
              
              <div  class="col-sm-12">
              <div class="card-header">
                
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                 
                    <th>Employés</th>
                    <th>Services</th>
                    <th>Materiel Demandé</th>
                    <th>date_debut</th>
                    <th>date_fin</th>
                    <th>Messages</th>
                    <th>Date d'envoie</th>
                    <th>status</th>
                    <th>Supprimer</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php

                  $getaffiche=$_GET["action"];
                  if(!empty($getaffiche)){
                    $aff=new gestion_demande;
                    $aff->af_ma_immo($_GET["action"]);
                }
                  
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
