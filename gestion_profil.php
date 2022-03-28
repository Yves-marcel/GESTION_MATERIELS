<?php 
  session_start();
    //require('classeU.php');
    require_once("classeU.php");

    $page="Profil ";

    include("moule/top_bar.php");
    
    include("moule/leftside.php");
    //Recuperation des données du formulaire
      $nom=htmlspecialchars(strip_tags($_POST['nom']));
      $prenoms=htmlspecialchars(strip_tags($_POST['prenoms']));
      $fonction=htmlspecialchars(strip_tags($_POST['fonction']));
      $email=htmlspecialchars(strip_tags($_POST['email']));
      $contact=htmlspecialchars(strip_tags($_POST['contact']));
      $sexe=htmlspecialchars(strip_tags($_POST['sexe']));
      $service=htmlspecialchars(strip_tags($_POST["ser"]));
      $ville=htmlspecialchars(strip_tags($_POST["ville"]));
      $pwd=htmlspecialchars(strip_tags($_POST["code"]));
      $identy=$_GET["edit"];

    //Modification du rofil du personnel
    //Detection du bouton
    if(isset($_POST["upd_pro"])){
      if(!empty($nom) && !empty($prenoms) && !empty($fonction) && !empty($email) && !empty($contact) && !empty($sexe) &&!empty($service)&& !empty($ville) && !empty($identy)){

      //Appel a la methode de modification des données
      $mod_perso= new accueil;
      $mod_perso->mod_profil_user($nom, $prenoms, $fonction, $email, $contact, $sexe, $pwd, $service, $ville, $identy );
      $succes_ad='<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
      <strong><i class="fa fa-check-circle"></i></strong> MMODIFICATION EFFECTUE AVEC SUCCES
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span> </button> </div>';


      }
      
      
    }
    //Fin Modification du profil du personnel

    //Verification de l'existence du bouton d'envoie
    if(isset($_POST['enregister']))
    {
      //recuperation des donnees du formulaire
      
      $perso=$_GET["perso"];


      if(preg_match("#^[0-9]{8}$#", $contact)){
         //verifions si les donnees ne sont pas nul

      $addpersonne = new gestion_prersonnel;
      $addpersonne->addpersonnel($nom, $prenoms, $fonction, $email, $contact, $sexe, $role, $date_ajout, $pwd, $service,$ville);
      

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
         <!-- Action dynamique -->
          <!-- /.col-md-6 -->
          <div class="col-md-6" style="margin-bottom: 25px; margin-left: 22%">           

            <div class="card">

              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class=" fas fa-user "></i> Votre Profil</h3>
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
                <!-- Debut -->
                  <?php
                  if(isset($_GET["empl"])){
                    
                    $profil_user= new accueil;
                    $profil_user->profil($_GET["empl"]);
                    ?>
                    <div>
                  <input type="checkbox" onclick="myFunction()">Masquer le mot de passe
                  </div>
                   <div style="margin-left: 35%">
                   <button onclick="return confirm('voulez vous Modifier?')" type="submit" name="enregister" class="btn bg-indigo"> <i class="fas fa-pencil-alt"></i> <a href="gestion_profil.php?edit=<?php echo $_SESSION['idEmploye']?>">Modifier</a></button>
                   </div>
                    <?php
                  }
                  if(isset($_GET["edit"])){

                    $profil_edit= new accueil;
                    $profil_edit->profil_upd($_GET["edit"]);
                    ?>
                    <div>
                  <input type="checkbox" onclick="myFunction()">Masquer le mot de passe
                  </div>
                   <div style="margin-left: 35%">
                   <button title="Cliquez pour tout modifier" onclick="return confirm('voulez vous Modifier?')" type="submit" name="upd_pro" class="btn bg-blue"> <i class="fas fa-pencil-alt"></i> Modifier</button>
                   </div>
                    <?php
                  }
                  
                  ?>
                  <!-- Fin -->
                </div>
                
                <!-- /.card-footer -->
              </form>
            </div>
             
            </div>

          </div>
          <!-- /.col-md-6 -->
          <!--Fin  Action dynamique -->

            
          
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
    function myFunction() {
  var x = document.getElementById("pwdaction");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
  <?php 


    include("moule/footer.php");

  

 ?>
