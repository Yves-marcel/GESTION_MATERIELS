<?php 

 require_once('classeU.php');
    

    $page="Demande ";


    include("moule/top_bar.php");
    
    include("moule/leftside.php");

 /* $user_name="nom";
  $user_namep="prenoms";

  $user_id =25;
*/


  //Verification de l'existence du bouton d'envoie
    if(isset($_POST['enregister']))
    {
      //recuperation des donnees du formulaire
      $nom=htmlspecialchars(strip_tags($_POST['nom']));
      $prenoms=htmlspecialchars(strip_tags($_POST['prenoms']));
      $service=htmlspecialchars(strip_tags($_POST['service']));
      $materiel=htmlspecialchars(strip_tags($_POST['materiel']));
      $date_debut=htmlspecialchars(strip_tags($_POST['date_debut']));
      $date_fin=htmlspecialchars(strip_tags($_POST['date_fin']));
      $commentaire=htmlspecialchars($_POST['commentaire']);
       $deman=$_GET["deman"];
      //verifions si les donnees ne sont pas nul

       $addmande = new gestion_demande;
      $addmande->adddemande($nom, $prenoms, $service, $materiel,$date_debut,$date_fin,$commentaire);
    }
 
 //suppression des donnees
    
    if(isset($_GET["deman"])){
      $sup=new gestion_demande;
      $sup->supprimerdemande($_GET["deman"]);
      echo'<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
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

                   if (empty($_GET['action'])) {
                    
                    ?>

                        <center>


                         <h4> Quel type d'équipement souhaitez vous Demander ? </h4> <br> <br>  

                       
                        
                         <span style="display: inline-flex;">  <h5 style="padding: 5px">  <a href="demande.php?action=phone"> <i class="fa fa-phone">  </i>Téléphone</a> </h5> 
                         <h5 style="padding: 5px">  <a href="demande.php?action=ordi"><i class="fa fa-desktop">  </i> Ordinateur</a> </h5>
                         <h5 style="padding: 5px">  <a href="demande.php?action=imprimante"> <i class="fa fa-print">  </i> Imprimante</a> </h5></span>  

                         <br> <br>  

                       </center>

                      


                    <?php 


                   


               } else{


                    ?>

                   <form class="form-horizontal" method="post">
                        <div class="card-body">

                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">  </label>
                            <div class="col-sm-10">
                              <input type="hidden" class="form-control" name="id_user" id="inputEmail3" value="<?php  echo $user_id ?>"   >
                            </div>
                          </div>
                         
                          

                         <div class="form-group row">
                       <label for="inputEmail3" class="col-sm-2 col-form-label">Nom  </label>
                        <div class="col-sm-10">
                      <select class="select2" style="width: 100%;"   name="nom" value="<?php  echo $user_name ?>" >
                         
                         
                    <?php
                     $cmbl=new gestion_service;
                      $cmbl->listernom();
                       ?>
                         
                     
                          
              
                        </select>
                      
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Prenoms </label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="prenoms" value="<?php  echo $user_namep ?>" >
                      <?php

                      $cmbl=new gestion_service;
                      $cmbl->listerprenoms();

                       ?>
 
                        </select>
                    </div>
                  </div>


                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> service </label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="service" >
                      <?php

                      $cmbl=new gestion_demande;
                      $cmbl->listeservice();

                       ?>
 
                        </select>
                    </div>
                  </div>



                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label"> nom du  matériel souhaité </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail3"  name="materiel"  placeholder=" Nom + Model ">
                               
                            </div>
                          </div>

                         
                      
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Date_Debut</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" id="inputEmail3"  name="date_debut">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Date_Fin </label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control"  id="inputEmail3" name="date_fin" >
                            </div>
                          </div>

                         
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Commentaire</label>
                            <div class="col-sm-10">
                              <textarea type="text" class="form-control" id="inputEmail3"  name="commentaire"></textarea>
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
             
              <div class="card-header border-0">
                <h3 class="card-title">Liste des demandes</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prenoms</th>
                    <th>Service</th>
                    <th>Materiel</th>
                    <th>date_debut</th>
                    <th>date_fin</th>
                    <th>commantaire</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>

                   <?php 
                      $aff=new gestion_demande;
                      $aff->affiche();
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
