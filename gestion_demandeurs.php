<?php 


    require_once("classeU.php");

    $page="Liste des demandeurs";

		include("moule/top_bar.php");
		
    include("moule/leftside.php");

    //Appel a la methode pour rejet des demandes
    //recuperation du variable passer en parametre
    //$idy_rejet=htmlspecialchars(strip_tags($_GET["rejet"]));
    if(isset($_GET["rejet"])){
      $rejet=new gestion_demande();
      $rejet->rejeter_demande($_GET["rejet"]);
    }
    //Fin methode pour rejet des demandes 


    //Verification sur la condition sur la desactivation des donnéees
    if(isset($_GET["des"])){
      $desa= new gestion_attribuer();
      $desa->desattribution($_GET["des"]);
      $succes_desa='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> DESATTRIBUTION EFFECTUER AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }else{
      $erreur_desa='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong>DESATTRIBUTION NON EFFECTUER
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
   

  //Fin Verication sur la condition de desactivation des donnees 
  


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
          <!-- test -->
          
          <!-- fin test -->
          

           
          <div class="col-md-12">
            
            <div class="card card card-info">
             
              <div class="card-header border-0">
                <h3 class="card-title">Liste des Demandeurs</h3>
                
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
                    <th>Rejeter</th>
                    <th>Attribuer</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      $aff=new gestion_demande;
                      $aff->affichedemandeurs();
                      ?> 
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
                <br>
                <hr>

            <!-- suupp -->
          <div class="col-md-12">
            
            <div class="card card card-info">
             <?php
             if(isset($_GET["des"])){

              if(isset($succes_desa)){
                echo $succes_desa;
              }else{
                echo $erreur_desa;
              }

             }
             
             ?>
             
              <div class="card-header border-0">
                <h3 class="card-title"> <a class="btn bg-black " href="gestion_demandeurs.php?equip" title="Cliquez pour voir la liste des équipements attribuer">  Liste des équipements attribuer </a>  <a class="btn bg-gray" href="gestion_demandeurs.php?rej" title="Cliquez pour voir la liste des demandes rejeter"> liste des demande rejeter </a></h3>
                
              </div>
             
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                  <!-- Debut de la condition pour l'affichage dynamique -->
                  	<!-- <th>Responsable</th> -->
                    <?php
                    if(isset($_GET["rej"])){
                      ?>
                      <th>Employés</th>
                   <th>Service</th>
                     <th>Materiels Demandé</th>
                     <th>Date Début</th>
                     <th>Date Fin</th>
                    <th>Commentaire</th>
                    <th>Date émission</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php   
                         $cb=new gestion_demande;
                         $cb->afficheRejet();
                          
                          
                           ?>
                 
                  </tbody>
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
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                   $cb=new gestion_attribuer;
                   $cb->afficheAttribution();
                        
                           ?>
                 
                  </tbody>

                    <?php
                  }
                     ?>
                    
                </table>
              </div>
              
            </div>
            </div>

            </div>

          </div>
          <!-- c la  -->
          
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
