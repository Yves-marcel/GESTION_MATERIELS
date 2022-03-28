
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo 
    <a href="http://agencecipme.ci" class="brand-link" target="blank">
      <img src="http://agencecipme.ci/wp-content/uploads/thegem-logos/logo_430ba165501e350bd5bcad53e10e09d2_1x.png" alt="GESTION MATERIELS" class=" " style="opacity: .8">
     
    </a>-->

    <?php

      if($page!=="login"){



        if($_SESSION["role"]=="Administrateur")
        {

          ?>

          <?php

        }

        

    ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
        </div>
        <div class="media">
              <a href="gestion_profil?empl=<?php echo $_SESSION['idEmploye'] ?>"><img src="dist/img/<?php $img= new accueil;$img->aff_photo($_SESSION["idEmploye"]) ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">

              <div class="media-body">
                <h3 class="dropdown-item-title" style="color: white;">

                <?php echo  $_SESSION['username'] ;?> </a>

                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm" style="color: white;"> <?php echo  $_SESSION['email'] ;?></p>
                
              </div>
            </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="acceuil" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Accueil
                
                </p>
              </a>
           
          </li>


          <?php

              if($_SESSION["role"]=="Administrateur")
              {

                ?>
                <li class="nav-item">
            <a href="gestion_sites" class="nav-link">
            <i class="fa fa-map-marker"></i>
              <p>
                Gestion des Sites
              
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="gestion_direction" class="nav-link">
            <i class='fab fa-artstation'></i>
              <p>
                Gestion direction
              
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="gestion_service" class="nav-link">
              <i class='fab fa-servicestack'></i>
              <p>
                Ajouter un Service
              
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="gestion_personnes" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestion du Personnel
              
              </p>
            </a>
           
          </li>
          
          <li class="nav-item">
            <a href="gestion_projet" class="nav-link">
              <i class="fas fa-project-diagram"></i>
              <p>
                Ajouter un Projet
              
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="gestion_categorie" class="nav-link">
                <i class="fas fa-plus"></i>
                  
                  <p>Ajouter Catégorie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="gestion_materiels" class="nav-link">
                <i class="fas fa-plus"></i>
                  <p>Ajouter materiels</p>
                </a>
              </li>
          
          <li class="nav-item">
            <a href="affectation_materiels" class="nav-link">
            <i class="fa fa-desktop"></i>
              <p>
                Affectation de Materiels
              
              </p>
            </a>
          </li>
              
                <li class="nav-item">
                          <a href="gestion_demandeurs" class="nav-link">
                          <i class="nav-icon fas fa-exchange-alt"></i>
                              <p>
                            Gestion d'Attribution
                              
                              </p>
                            </a>
                          
                          </li>
                          <li class="nav-item">
                          <a href="gestion_rapport" class="nav-link">
                          <i class='fas fa-clone'></i>
                              <p>
                            Rapport des Attributions
                              
                              </p>
                            </a>
                          
                          </li>

                <?php

              }

              

            ?>
          
        
          <?php

              if($_SESSION["role"]=="Manageur")
              {

                ?>
                    <li class="nav-item">
                        <a href="demandeurs" class="nav-link">
                          <i class="fa fa-user"></i>
                          <p>
                            Demande
                          
                          </p>
                        </a>
                      
                      </li>
                
                <?php

              }



              ?>
         
          <li class="nav-item">
            <a href="deconnection" class="nav-link">
              <i class='fas fa-sign-in-alt'></i>
              <p>
                Se deconnecter
              </p>
            </a>
           
          </li>
        </ul>
      </nav>

      <?php 

}


?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  



  