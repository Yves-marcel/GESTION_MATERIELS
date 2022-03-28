<?php 

   
   require_once("classeU.php");

    $page="gestion_materiels";

		include("moule/top_bar.php");
		
    include("moule/leftside.php");

    //recuperation et filtrage des donnees
    if(isset($_POST['enregister']))
    {

    $filtre_materiel=htmlspecialchars(strip_tags($_POST["filtre_materiel"]));
    $num_ordre=htmlspecialchars(strip_tags($_POST["num_ord"]));
    $reference=htmlspecialchars(strip_tags($_POST["reference"]));
    $direction=htmlspecialchars(strip_tags($_POST["dir"]));
    $date_achat=htmlspecialchars(strip_tags($_POST["date"]));
    $numserie=htmlspecialchars(strip_tags($_POST["numserie"]));
    $description=htmlspecialchars(strip_tags($_POST["desc"]));
    $typemat=htmlspecialchars(strip_tags($_POST["typemat"]));
    $marque=htmlspecialchars(strip_tags($_POST["marque"]));
    $model=htmlspecialchars(strip_tags($_POST["model"]));
    $idcategorie=htmlspecialchars(strip_tags($_POST["idcategorie"]));
    $idProjet=htmlspecialchars(strip_tags($_POST["idProjet"]));    
    $processeur=htmlspecialchars(strip_tags($_POST["processeur"]));
    $dateEn=htmlspecialchars(strip_tags($_POST["dateEn"]));
    $mat=$_GET["materiel"];
    //Instaciation de la classe
    $add= new gestion_materiel;
    $add->add_materiel($filtre_materiel, $reference, $num_ordre, $direction, $date_achat, $numserie, $description, $typemat, $marque, $model, $processeur, $idcategorie, $idProjet, $dateEn);
     //var_dump($filtre_materiel,$reference, $num_ordre, $direction,$date_achat, $numserie, $description, $idcategorie,$idProjet, $dateEn) ;
    //die(); 
 
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
            window.location= 'gestion_materiels';
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
                <h3>Ajouter materiels </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <?php  

               if (empty($_GET['action'])) {
                 ?>
                   <center>
                    <h4> Quel type de materiel souhaitez vous ajouter ? </h4> <br> <br>
                    <span style="display: inline-flex;">  <h5 style="padding: 5px">  <a href="gestion_materiels.php?action=phone"> <i class="fa fa-phone">  </i>Téléphone</a> </h5><br>  
                    <h5 style="padding: 5px">  <a href="gestion_materiels?action=ordi"><i class="fa fa-desktop">  </i> Ordinateur</a> </h5><br> 
                    <h5 style="padding: 5px">  <a href="gestion_materiels?action=imprimante"> <i class="fa fa-print">  </i> Imprimante</a> </h5>
                    <h5 style="padding: 5px">  <a href="gestion_immobilier?action=immobilier"> <i class="fa fa-print">  </i> Immobilier</a> </h5></span> 
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
                <!-- Fin action -->
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Filtre appareil </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" required id="inputEmail3" readonly="" value="<?php  echo(strtoupper($_GET['action'])) ?>"   name="filtre_materiel">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Numéro d'ordre </label>
                     <div class="col-sm-10">
                       <input type="number" class="form-control" id="inputEmail3" placeholder="Numéro d'ordre" name="num_ord">
                     </div>
                   </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Référence </label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" id="inputEmail3" placeholder="Reference" name="reference">
                     </div>
                   </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Direction</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="dir">
                      <option value="">choisir</option>
                         <?php
                        $rect= new gestion_service;
                         $rect->lister_dir();
                         ?>
                         
                        </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date d'achat </label>
                     <div class="col-sm-10">
                       <input type="date" class="form-control"  name="date">
                     </div>
                   </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Numero_serie </label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" id="inputEmail3" placeholder="numero_serie" name="numserie">
                     </div>
                   </div>
                   
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Categorie</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="idcategorie">
                      <option value="<?php echo $donnees["idcategorie"] ?>">choisir</option>
                      <?php $cmb=new gestion_materiel;
                       $cmb->comboBox();?>
                         
                        </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Projet</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="idProjet">
                      <option value="<?php echo $donnees["idProjet"] ?>">choisir</option>
                         <?php
                        $cmb=new gestion_materiel;
                        $cmb->combprojet();
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
                            <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail3" placeholder="Description" name="desc">
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
                <h3 class="card-title">Liste materiels </h3> 
              </div>
              <div  class="col-sm-12">
               <div class="card-header">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Filtre</th>
                      <th>Numéro d'ordre</th>
                      <th>Référence</th>
                      <th>Direction</th>
                      <th>Numero_série</th>
                      <th>Description</th>
                      <th>Catégories</th>
                      <th>Projets</th>
                      <th>Date Ajout</th>
                      <th>Modifier</th>
                      <th>Supprimer </th>
                        
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                     $getaffiche=$_GET["action"];
                        $aftout= new gestion_materiel;
                        $aftout->af_immobilier($getaffiche);
                     
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
