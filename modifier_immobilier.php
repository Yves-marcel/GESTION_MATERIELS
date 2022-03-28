<?php 

   require_once('classeU.php');

    $page="gestion_materiels";

		include("moule/top_bar.php");
		
    include("moule/leftside.php");

    //recuperation des donnees du formulair pour effectue des traitement
     $num_ordre=htmlspecialchars(strip_tags($_POST["num_ord"]));
     $reference=htmlspecialchars(strip_tags($_POST["reference"]));
     $direction=htmlspecialchars(strip_tags($_POST["dir"]));
     $date_achat=htmlspecialchars(strip_tags($_POST["date"]));
     $numserie=htmlspecialchars(strip_tags($_POST["numserie"]));
     $idcategorie=htmlspecialchars(strip_tags($_POST["categorie"]));
     $idProjet=htmlspecialchars(strip_tags($_POST["projet"]));  
     $description=htmlspecialchars(strip_tags($_POST["desc"]));
     $getmat=$_GET["materiel"];

    //Detection du bouton d'enregistrement lors di clic
      if(isset($_POST["modifier"])){
        //Verication si tous les champs sont remplies
        if(!empty($num_ordre) && !empty($reference) && !empty($direction) && !empty($date_achat) && !empty($numserie) && !empty($numserie) && !empty($idcategorie) && !empty($idProjet)){
          //appel de la methode de modification
          $modfi=new gestion_materiel;
          $modfi->updmat_immo($reference, $num_ordre, $direction, $date_achat, $numserie, $idcategorie, $idprojet, $description, $getmat);
          $succes_mod='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
          <strong><i class="fa fa-check-circle"></i></strong> MODIFICATION EFFECTUER AVEC SUCCES
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
            </button>
          </div>';


        }else{
          $erreur_mod='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
          <strong><i class="fa fa-check-circle"></i></strong> TOUS LES CHAMPS DOIVENT ETRE REMPLIR
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

      }
    //Fin modification des donnees
    
    //Debut suppression des donnees
    if(isset($_POST["supprimer"])){
      $sup=new gestion_materiel;
      $sup->supprimermateriel($_POST["sup"]);
      $succes_sup='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> SUPPRESSION EFFECTUER AVEC SUCCES
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
                <h3>Modification du materiels</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post">
                <div class="card-body">
                    <?php

                    if(isset($_POST["modifier"])){
                      if(isset($succes_mod)){
                        echo $succes_mod;
                      }elseif(isset($erreur_mod)){
                        echo $erreur_mod;
                      }
  
                    }
                      
                    if(isset($_POST["supprimer"])){
                      if(isset($succes_sup)){
                        echo $succes_sup;
                      }elseif(isset($erreur_sup)){
                        echo $erreur_sup;
                      }
    
                     }

                     //Affichage du fromulaire
                    $get_id=$_GET["materiel"];
                    $getaction=$_GET["action"];
                    if(!empty($get_id)){
                        $dtupd =new gestion_materiel;
                      $dtupd->aff_mat_upd($get_id, $getaction);
                    }
                    
                     ?>
                  
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
                <h3 class="card-title">Liste équipements</h3>
                
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
