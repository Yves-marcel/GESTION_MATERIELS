<?php 
   
    require('classeU.php');

    $page="Contact des Employés";

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

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col-md-6 -->
          <div class="col-md-12" style="margin-bottom: 25px">           

            
             
            </div>

          </div>
          <!-- /.col-md-6 -->

            <br> <br>
            <div class="col-md-12">
            
            <div class="card card card-info">
             
              <div class="card-header border-0">
                <h3 class="card-title">Liste de Contact Des employes</h3>
                
              </div>
              
              <div  class="col-sm-12">
              <div class="card-header">
                
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Fonction</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Service</th>
                    <th>site</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      //affichage des donnees
                      $afcat= new accueil();
                      $afcat->liste_contact();
                      ?> 
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- Fin Super tableau -->
          
          </div>
          </div>

          

          

          <!-- fn -->
          
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
