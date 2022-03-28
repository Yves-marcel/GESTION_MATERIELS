<?php 

   
    
   require_once('classeU.php');

    $page="gestion_materiels";

		include("moule/top_bar.php");
		
    include("moule/leftside.php");

    //recuperation des donnees du formulair pour effectue des traitement
     $filtre_materiel=htmlspecialchars(strip_tags($_POST["filtre_materiel"]));
     $num_ordre=htmlspecialchars(strip_tags($_POST["num_ord"]));
     $reference=htmlspecialchars(strip_tags($_POST["reference"]));
     $direction=htmlspecialchars(strip_tags($_POST["dir"]));
     $date_achat=htmlspecialchars(strip_tags($_POST["date"]));
    $numserie=htmlspecialchars(strip_tags($_POST["numserie"]));
    $typemat=htmlspecialchars(strip_tags($_POST["typemat"]));
    $marque=htmlspecialchars(strip_tags($_POST["marque"]));
    $model=htmlspecialchars(strip_tags($_POST["model"]));
    $idcategorie=htmlspecialchars(strip_tags($_POST["idcategorie"]));
    $idProjet=htmlspecialchars(strip_tags($_POST["idProjet"])); 
    $dateEn=htmlspecialchars(strip_tags($_POST["dateEn"]));   
    $processeur=htmlspecialchars(strip_tags($_POST["processeur"]));
      $getmat=$_GET["materiel"];
      

    //Debut enregistrement des donnees
    //Verification de l'existence du bouton d'envoie
    if(isset($_POST['enregister']))
    {
      //verifions si les donnees ne sont pas nul
      if(!empty($filtre_materiel) && !empty($num_ordre) && !empty($reference) &&!empty($direction) &&!empty($date_achat)&& !empty($numserie) && !empty($typemat) &&!empty($marque) &&!empty($model)   && !empty($idcategorie) && !empty($idProjet)){

        $addmat = new gestion_materiel;
        $addmat->add_materiel($filtre_materiel,$reference,$num_ordre,$direction,$date_achat, $numserie, $typemat, $marque, $model, $processeur, $idcategorie, $idProjet, $dateEn);

        echo'<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> ENREGISTREMENT EFFECTUER AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';

      }else{
       

      }
    }
    //Fin enregistrement des donnees

    //Detection du bouton d'enregistrement lors di clic
      if(isset($_POST["modifier"])){
        //Verication si tous les champs sont remplies
        if(!empty($filtre_materiel) && !empty($num_ordre) && !empty($reference) &&!empty($direction) &&!empty($date_achat)&& !empty($numserie) && !empty($typemat) &&!empty($marque) &&!empty($model)  && !empty($idcategorie) && !empty($idProjet)){
          //appel de la methode de modification
          $modfi=new gestion_materiel;
          $modfi->updmat($reference,$num_ordre,$direction,$date_achat, $numserie, $typemat, $marque, $model, $processeur, $idcategorie, $idProjet,$getmat);
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
                    
                    <?php
                     if(isset($_GET["action"])){
                       ?>
                      <th>Numéro d'ordre </th>
                      <th>Référence Matériel </th>
                      <th>Direction </th>
                      <th>Numero_série</th>
                      <th>Marques</th>
                      <th>Models</th>
                      <th>Catégories</th>
                      <th>Projets </th>
                      <th>Types</th>
                      <th>processeurs</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                      <?php

                     }
                     ?>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      $getaffiche=$_GET["action"];
                      if(!empty($getaffiche)){
                        $af= new gestion_materiel;
                        $af->af_materiel($getaffiche);
  
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
