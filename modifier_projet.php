<?php 

 require('classeU.php');
    require_once("moule/classe.php");

    $page="gestion projet";

    include("moule/top_bar.php");
    
    include("moule/leftside.php");
      //recuperation des donnees du formulair pour effectue des traitement
      $nom=htmlspecialchars(strip_tags($_POST['projet']));
      $des=htmlspecialchars(strip_tags($_POST['des']));
      $dtD=htmlspecialchars(strip_tags($_POST['dateD']));
      $dtF=htmlspecialchars(strip_tags($_POST['dateF']));
      $iden=$_POST["sup"];

    //Debut enregistrement des donnees
    //Verification de l'existence du bouton d'envoie
    if(isset($_POST['enregister']))
    {
      //verifions si les donnees ne sont pas nul
      if(!empty($nom) && !empty($des) && !empty($dtD) && !empty($dtF)){

        $ajouter = new gestion_projet;
        $ajouter->addprojet($nom, $des, $dtD, $dtF);

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

    //Debut Modification des donnees
      //Detection du bouton d'enregistrement lors di clic
      if(isset($_POST["modifier"])){
        //Verication si tous les champs sont remplies
        if(!empty($nom) && !empty($des) && !empty($dtD) && !empty($dtF)){
          //appel de la methode de modification
          $modfi=new gestion_projet;
          $modfi->modifier($nom, $des, $dtD, $dtF, $iden);
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
      $sup=new gestion_projet;
      $sup->supprimer($_POST["sup"]);
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
    <!-- Content Header Page header-->
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
                <h3 class="card-title"> <i class="fas fa-project-diagram"></i>Modification projet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post">
              <!--Debut affichage de Message -->
              <div class="card-footer">
              <?php
                 if(isset($_GET["sup"])){
                  if(isset($succes_sup)){
                    echo $succes_sup;
                  }elseif(isset($erreur_sup)){
                    echo $erreur_sup;
                  }

                 }

                 if(isset($_POST["modifier"])){
                  if(isset($succes_mod)){
                    echo $succes_mod;
                  }elseif(isset($erreur_mod)){
                    echo $erreur_mod;
                  }

                 }
                 
                 
                  ?>
                  
                </div>
                <!--Fin Affichage de message -->
                <div class="card-body">
                <!--execution de methode -->
                <?php
                //recuperation de l'identifiant passer en parrametre
                $get_id=$_GET["projet"];
                if(!empty($get_id)){
                  $affupd=new gestion_projet;
                  $affupd->affiche_Data_Mod($get_id);

                }else{
                  //redirection vers une page d'erreur
                }
                ?>
                <!--Fin execution de la methode -->
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="modifier" class="btn btn-info"><i class="fas fa-pencil-alt"></i>MODIFIER</button>
                 
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
                <h3 class="card-title">Liste des Projets</h3>
              </div>
              <div  class="col-sm-12">
              <div class="card-header">
                
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Nom Projet</th>
                   <th>Describtion</th>
                    <th>Date Debut</th>
                    <th>Date Fin</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                      //affichage des donnees
                      $aff=new gestion_projet;
                      $aff->affiche();
                      ?> 
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            
            </div>
            <?php
                /*$af= new gestion_projet;
                $af->afficheb();*/
                 ?>

          </div>
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
</script>
  <?php 


    include("moule/footer.php");

  

 ?>
