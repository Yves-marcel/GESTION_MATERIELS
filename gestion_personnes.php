<?php 

    //require('classeU.php');
    require_once("classeU.php");

    $page="gestion_prersonnel ";


    include("moule/top_bar.php");
    
    include("moule/leftside.php");

    //Verification de l'existence du bouton d'envoie
    if(isset($_POST['enregister']))
    {
      //recuperation des donnees du formulaire
      $nom=htmlspecialchars(strip_tags($_POST['nom']));
      $prenoms=htmlspecialchars(strip_tags($_POST['prenoms']));
      $fonction=htmlspecialchars(strip_tags($_POST['fonction']));
      $email=htmlspecialchars(strip_tags($_POST['email']));
      $contact=htmlspecialchars(strip_tags($_POST['contact']));
      $sexe=htmlspecialchars(strip_tags($_POST['sexe']));
      $role=htmlspecialchars($_POST['role']);
      $date_ajout=htmlspecialchars($_POST['date_ajout']);
      $service=htmlspecialchars(strip_tags($_POST["ser"]));
      $direct=htmlspecialchars(strip_tags($_POST["dir"]));
      $ville=htmlspecialchars(strip_tags($_POST["ville"]));
      $pwd=htmlspecialchars(strip_tags($_POST["code"]));
      $perso=$_GET["perso"];


      if(preg_match("#^[0-9]{8}$#", $contact)){
         //verifions si les donnees ne sont pas nul

      $addpersonne = new gestion_prersonnel;
      $addpersonne->addpersonnel($nom, $prenoms, $fonction, $email, $contact, $sexe, $role, $date_ajout, $pwd, $service,$direct,$ville);
      $succes_ad='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> ENREGISTREMENT EFFECTUE AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span> </button> </div>';


      }else{
        $num='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
        <strong><i class="fa fa-check-circle"></i></strong> veuillez Mettre le Numero au bon format
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span> </button> </div>';
      }
     


     
    }else{
      $erreur_ad='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> ENREGISTREMENT NON EFFECTUE
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span> </button> </div>';
    }
    

    //suppression des donnees
    
    if(isset($_GET["perso"]) && $_GET["sup"]=="ok"){
      $sup=new gestion_prersonnel;
      $sup->supprimerpersonnel($_GET["perso"]);
      $succes_sup='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> EMPLOYE SUPPRIME AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
 

      echo "<script language='javascript'>
          setInterval(function(){
            window.location= 'gestion_personnes';
          }, 2500);
          </script>";

     
    }else{
      $erreur_sup='<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> DONNEES NON SUPPRIMEE
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    //Fin suppression
    
   //Generer un mot de pass
   
    $code= new gestion_prersonnel;
    $nb=$code->code_auto();
   //Fin Generation de mot de pass

    
     
 

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
                <h3 class="card-title"><i class="nav-icon fas fa-users"></i>Ajouter personnes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post">
              <!-- Affichage de message -->
                <div class="card-footer">
                 <?php
                 

                  if(isset($_GET["employe"])){
                    if(isset($succes_mod)){
                      echo $succes_mod;
                    }elseif(isset($erreur_mod)){
                      echo $erreur_mod;
                    }

                  }
                  
                 if(isset($_GET["perso"])){
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
                  }elseif(isset($num)){
                    echo $num;
                  }

                 }
                 
                 
                  ?>
                  
                </div>
                <!--Affichage de message -->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nom </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"  placeholder="nom" name="nom">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Prénoms </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="prénoms" name="prenoms">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Fonction</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  id="inputEmail3" placeholder="fonction" name="fonction">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">email </label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control"  id="inputEmail3" name="email" placeholder="exemple@">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Contact </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  id="inputEmail3" name="contact" placeholder="+225 08720431" maxlength="14">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3"   class="col-sm-2 col-form-label">Sexe</label>
                    <div class="col-sm-10">
                      <select class="custom-select" name="sexe" required="">

                          <option value="">- FIRE UN CHOIX- </option>
                          <option>Femme</option>
                          <option>Homme</option>
                       
                        </select>
                      
                    </div> 
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Direction</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="dir">
                      <option value="">- FAIRE UN CHOIX- </option>
                        <?php
                        $service= new gestion_prersonnel;
                        $service->selection_direction();
                         ?>
                        </select>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Service</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="ser">
                      <option value="">- FAIRE UN CHOIX- </option>
                        <?php
                        $service= new gestion_prersonnel;
                        $service->selection_ser();
                         ?>
                        </select>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label" >Role</label>
                    <div class="col-sm-10">
                      <select class="custom-select"  name="role" required="">

                          <option value="">- FAIRE UN CHOIX- </option>
                          <option>Administrateur</option>
                          <option>Manageur</option>
                          <option>Utilisateur</option>
                        </select>
                      
                    </div> 
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sites</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="ville">
                      <option value="">- FAIRE UN CHOIX- </option>
                        <?php
                        $service= new gestion_prersonnel;
                        $service->selection_site();
                         ?>
                        </select>
                      
                    </div>
                  </div>

                  
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="hidden" value="<?php echo date('yy/m/d') ?>" class="form-control" id="inputEmail3" placeholder="prénoms" name="date_ajout">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> MOT DE PASSE </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $nb ?>" class="form-control"  id="inputEmail3" name="code" placeholder="Generer un mot de pass" readonly style="color:#000;font-weight: bold;">
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
            </div>
             
            </div>

          </div>
          <!-- /.col-md-6 -->

            <br> <br>

          <div class="col-md-12">
            
            <div class="card card card-info">
             
              <div class="card-header border-0">
                <h3 class="card-title">Liste du personnel</h3>
                
              </div>
              
            <div  class="col-sm-12">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Fonction</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Direction</th>
                    <th>Service</th>
                    <th>sites</th>
                    <th>Date Ajout</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      //affichage des donnees
                      $aff=new gestion_prersonnel;
                      $aff->aff_empl();
                      ?> 
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <?php
                /*$af= new gestion_projet;
                $af->afficheb();*/
                 ?>

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
<script>
</script>
  <?php 


    include("moule/footer.php");

  

 ?>
