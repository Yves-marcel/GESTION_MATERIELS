<?php 

 require('classeU.php');

      $page="Acceuil";
		include("moule/top_bar.php");
		
    include("moule/leftside.php");

	

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
      <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title"></h3>
                
                <!-- <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div> -->
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <?php
                   if($_SESSION["role"]=="Utilisateur" || $_SESSION["role"]=="Manageur"){
                    
                      ?>
                      <tr>
                     <th>Projet d'Attribution</th>
                     <th>Materiel Attribué</th>
                     <th>Justificatif</th>
                     <th>Date de traitement</th>
                   </tr>
                   </thead>
                   <tbody>
                    <tr>
                    <?php
                    $donnees= new accueil;
                    $donnees->mat_specifique($_SESSION["idEmploye"]);
                    ?>
                    </tr>
                    </table>
                      <?php
                     
                     
                   }
                   ?>
      <?php
      if($_SESSION["role"]=="Administrateur"){
        ?>
          <div class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                <?php
                $Total_empl= new accueil;
                $Total_empl->total_perso();
                 ?></h3>

                <b>Nombre total d'employé</b>
              </div>
              <div class="icon">
              <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php $Total_empl->total_femme(); ?><sup style="font-size: 20px">%</sup></h3>

                <b>Nombre total de Femme  = <?php $Total_empl->nbr_femme(); ?></b>
              </div>
              <div class="icon">
              <i class="fa fa-venus" style="font-size:70px;"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php $Total_empl->total_homme(); ?><sup style="font-size: 20px">%</sup></h3>

              <b>Nombre total d'Homme = <?php $Total_empl->nbr_homme(); ?></b>
              </div>
              <div class="icon">
              <i class="fa fa-mars" style="font-size:70px;"></i>
              </div>
              
            </div>
          </div>
          
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- Stock /.col-md-6 -->
          <div class="col-lg-6">           

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Stock actuel</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                    
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="">
                    <i class="fas fa-desktop"></i>
                    Ordinateurs
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <!-- <i class="ion ion-android-arrow-up text-success"></i>  -->
                  <?php 
               //affichage des donnees
               $aff=new accueil;
               $aff->total_ordi();
           ?>
                    </span>
                    <span class="text-muted">Nombre total</span>
                  </p>
                </div>
               <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="">
                    <i class="fas fa-phone"></i>
                    Téléphones
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <!-- <i class="ion ion-android-arrow-up text-success"></i>  -->
                    <?php 
               //affichage des donnees
               $aff=new accueil;
               $aff->total_phone();
           ?>
                    </span>
                    <span class="text-muted">Nombre total</span>
                  </p>
                </div>
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="">
                    <i class="fas fa-print"></i>
                    Imprimantes
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <!-- <i class="ion ion-android-arrow-up text-success"></i> -->
                    <?php 
               //affichage des donnees
               $aff=new accueil;
               $aff->total_imprimante();
           ?>
                    </span>
                    <span class="text-muted">Nombre total</span>
                  </p>
                </div>
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="">
                  <i class='fas fa-campground'> </i>
                    immobilier
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <!-- <i class="ion ion-android-arrow-up text-success"></i> -->
                    <?php 
               //affichage des donnees
               $aff=new accueil;
               $aff->total_immo();
           ?>
                    </span>
                    <span class="text-muted">Nombre total</span>
                  </p>
                </div>
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="">
                  <b>&sum;</b>
                    Stock Total
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <!-- <i class="ion ion-android-arrow-up text-success"></i> -->
                    <?php 
               //affichage des donnees
               $aff=new accueil;
               $aff->mat_stocck();
           ?>
                    </span>
                    <span class="text-muted">Nombre total</span>
                  </p>
                </div>
                <!-- /.d-flex -->
               
              </div>
            </div>
          </div>
           <!-- Stock /.col-md-6 -->

          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Données Statistique des Matériels Attribués</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            </div>

          </div>
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
              <div  class="col-sm-12">
              <div class="card-header">
                <h3 class="card-title"><a class="btn bg-gray" href="acceuil.php?at" title="Cliquez pour voir Liste des Matériels Attribué"> Liste des Matériels Attribué </a>  <a class="btn bg-black " href="acceuil.php?dispo" title="Cliquez pour voir Liste des Matériels disponible">  Liste des Matériels disponible </a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <!-- Debut de la condition pour l'affichage dynamique -->
                  	<!-- <th>Responsable</th> -->
                    <?php
                    if(isset($_GET["dispo"])){
                      ?>
                    <th>type</th>
                  <th>Marque</th>
                  <th>Numero de serie</th>
                  <th>Model</th>
                  <th>Processeur</th> 
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                         
                          //affichage des donnees
                      $aff=new accueil;
                      $aff->liststock();
                          
                          
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
                    
                    
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $cb=new gestion_attribuer;
                  $cb->afficheAttributionAccueil();
                        
                           ?>
                 
                  </tbody>

                    <?php
                  }
                     ?>
                    
                </table>
               
              </div>
              <!-- /.card-body -->
              <!-- /.col-md-6 -->
              <hr>
            </div>
            <!-- /.col-md-6 -->
            </div>
                  </tr>
                    <?php
                    }
                    ?>
    </div>
    <!-- /.content -->
  </div>
  </div>
  </div>
  <!-- /.content-wrapper -->
  <?php 
		include("moule/footer.php");

	

 ?>
