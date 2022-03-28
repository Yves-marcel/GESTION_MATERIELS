<?php 


    require_once("classeU.php");

    $page="gestion_attribution";

    include("moule/top_bar.php");
    
    include("moule/leftside.php");

    $userconect=2;
   //Recuperation des élements du formulaire
   $justificatif=htmlspecialchars(strip_tags($_POST["justificatif"]));
   $date_tr=htmlspecialchars(strip_tags($_POST["date_traitement"]));
   $idprojet=htmlspecialchars(strip_tags($_POST["idProjet"]));
   $idmateriel=htmlspecialchars(strip_tags($_POST["idmateriel"]));
   $matexist=$_GET["cmat"];
   $idattr=$_GET["dem"];


    if(isset($_POST['enregister'])){
      //appel a la fonction pour effectuer l'attribution
      $attribuer= new gestion_attribuer;
      $attribuer->addAttribution($date_tr, $justificatif, $idmateriel, $idprojet, $idattr,$userconect, $matexist); 
      $succes_ad='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> ATTRIBUTION EFFECTUE AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';

  }else{
    $erreur_ad='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
    <strong><i class="fa fa-check-circle"></i></strong> ATTRIBUTION NON EFFECTUE
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
 </button>
</div>';


      echo"<script> window.location='gestion_demandeurs'</script>";

      
    }

    

  //Action pour supprimer les donnees
    if(isset($_GET["attri"])){
      $suprime= new gestion_attribuer;
      $suprime->supprimerattribution($_GET["attri"]);
      $succes_sup='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> DONNEES SUPPRIMEEES AVEC SUCCES
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

           <?php

                 //if (!empty($_GET['dem']) && empty($_GET['enregister'])) {
                    

                    ?><!-- /.col-md-6 -->
          <div class="col-md-12" style="margin-bottom: 25px">           

            <div class="card">

              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Attribution</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post">

                <div class="card-body">
                  
                    
                    <!--execution de methode -->
                <?php
                if(isset($_POST['enregister'])){
                  if(isset($succes_ad)){
                    echo $succes_ad;
                  }elseif(isset($erreur_ad)){
                    echo $erreur_ad;
                  }

                }
                
               if(isset($_GET["attri"])){
                if(isset($succes_sup)){
                  echo $succes_sup;
                }

               }

                //recuperation des elements du formulaire demande
                $getd=$_GET["dem"];
                if(!empty($getd)){
                  $afa=new gestion_attribuer;
                  $afa->affiche_formulaire_demande($getd);

                }else{
                  //redirection vers une page d'erreur
                }
                ?>
                         <!--Fin execution de la methode recuperation-->
                   <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Projet d'attribution</label>
                        <div class="col-sm-10">
                        <select class="custom-select" required="" name="idProjet">
                        <option value="">Choisir </option>
                          <?php
                         $cmb=new gestion_materiel;
                          $cmb->combprojet();
                          
                           ?>
                          </select>
                          </div>
                  </div>

                    <?php


                 //}
              
                ?>


                  <?php

                 if (!empty($_GET['dem']) && empty($_GET['enregister'])) {
                    

                    ?>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Matériel Attribuer </label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="idmateriel">
                      <option value="">choisir</option>
                         <?php

                          $afa->listemateriel($_GET['filtre_appareil']);

                         //affichage dynamique
                         /* if(isset($_GET["filtre_appareil"])=="immobilier"){


                           $afa->listemateriel($_GET["filtre_appareil"]);

                         }

                         if(isset($_GET["filtre_appareil"])=="ordi" || isset($_GET["filtre_appareil"])=="phone"){

                          $afa->listemateriel($_GET['filtre_appareil']);

                         }*/
                         
                         
                         ?>
                        </select>
                      
                    </div>
                  </div>


                     <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Justificatif </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3"  name="justificatif" placeholder="Justificatif"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> </label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="inputEmail3" name="date_traitement" value="<?php echo date('y/m/d') ?>">
                    </div>
                  </div>

                  </div>

                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="enregister" class="btn btn-info"><i class='fas fa-cash-register'></i>ACCORDER</button>
                  <button type="submit" class="btn btn-default float-right"><i class='fas fa-trash-restore-alt'></i>ANNULER </button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
             
            </div>

          </div>

           <?php


                 }
              
                ?>


                  
               
          <!-- /.col-md-6 -->

            <br> <br>

          <div class="col-md-12">
            
            <div class="card card card-info">
             
              <div class="card-header border-0">
                <h3 class="card-title">Liste des équipements attribuer</h3>
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
                  	<!-- <th>Responsable</th> -->
                    <th>Employés</th>
                   <th>projet d'attribution</th>
                     <th>Materiel Attribuer</th>
                     <th>Justificatif</th>
                     <th>Date de traitement</th>
                    <th>statut</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                         $cb=new gestion_attribuer;
                          $cb->afficheAttribution();
                          
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
