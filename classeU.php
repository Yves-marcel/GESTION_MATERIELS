<?php

//Insertion du fichier de connection a la base de donnees
require("moule/db_connect.php");



class gestion_projet{
    //Creation des attributs
    // Creation des methodes

    // Debut creation de la methode pour ajouter des donnnees
    public function addprojet($n_pro,$des_pro, $d_debut_pro, $d_fin_pro, $dtEn ){
        global $db;
        
        //verifions si les donnees ne sont pas vides
        if(!empty($n_pro) && isset($des_pro) && !empty($d_debut_pro) && !empty($d_fin_pro)){
            $req=$db->prepare("INSERT INTO projet(nom, des_projet, dateDebut, dateFin, dateEnre) VALUES(?, ?, ?, ?, ?)");
            $req->execute(array($n_pro, $des_pro, $d_debut_pro, $d_fin_pro, $dtEn));
        }
    }
    //Fin creation de la methode pour ajouter des donnnees

    // Debut creation de methode pour afficher des donnees
    public function affiche(){
        global $db;
        $req=$db->query("SELECT * FROM projet order by dateEnre desc");
        while($donnees=$req->fetch()){
            ?>
                <tr>
                     <td>
                       <?php echo $donnees["nom"] ?>
                      </td>
                      <td>
                     <?php echo $donnees["des_projet"] ?>
                    </td>
                      <td>
                      <?php echo $donnees["dateDebut"] ?>
                      </td>
                      <td>
                      <?php echo $donnees["dateFin"] ?>
                      </td>
                        <td>
                        <button type="submit" name="" class="btn btn-info"> <i class="fas fa-pencil-alt"></i> <a href="modifier_projet.php?projet=<?php echo $donnees["0"]?>">Modifier<a></button>
                        </td>
                        <td>
                        <a onclick="return confirm('voulez vous supprimer?')" href="gestion_projet.php?sup=<?php echo $donnees["0"]?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
                        </td>
                         
                         
                      </tr>
             <?php


        }
    }
    // Fin creation de methode pour afficher des donnees

    //Debut creation de la methode pour supprimer des donnees
     
    public function supprimer($getid){
      global $db;
       
      $req_del=$db->prepare("DELETE FROM projet WHERE idProjet= ?");
      $req_del->execute(array($getid));
    }
    //Fin creation de la methode por supprimer des donnees

    //Debut de la methode pour modififier des donnees
       //methode d'affiche des donnees a modifier
    public function affiche_Data_Mod($getidy){
      global $db;
      $req=$db->prepare("SELECT * FROM projet WHERE idProjet=?");
      $req->execute(array($getidy));
      while($donnees=$req->fetch()){
        ?>
          <div class="form-group row">
             <label for="inputEmail3" class="col-sm-2 col-form-label">Nom Projet </label>
             <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Nom projet" name="projet" value="<?php echo $donnees["1"] ?>">
             </div>
          </div>

          <div class="form-group row">
           <label for="inputEmail3" class="col-sm-2 col-form-label">Description du projet </label>
           <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Description" name="des" value="<?php echo $donnees["2"] ?>" >
           </div>
          </div>
          <div class="form-group row">
           <label for="inputPassword3" class="col-sm-2 col-form-label">Date Debut</label>
           <div class="col-sm-10">
             <input type="date" class="form-control" id="inputPassword3" placeholder="date debut" name="dateD" value="<?php echo $donnees["3"] ?>" >
           </div>
          </div>
          
          <div class="form-group row">
           <label for="inputEmail3" class="col-sm-2 col-form-label">Date fin </label>
           <div class="col-sm-10">
             <input type="date" class="form-control" id="inputEmail3" name="dateF" value="<?php echo $donnees["4"] ?>" >
             <input type="hidden" value="<?php echo $donnees["0"] ?>" name="sup" readonly>
           </div>
          </div>

        <?php
      }
  }
  //Fin methode d'affichage des donnees a modifier

    public function modifier($n_pro, $des_pro, $d_debut_pro, $d_fin_pro, $idy){
      global $db;
      $reqU=$db->prepare("UPDATE projet SET nom=?, des_projet=?, dateDebut=?, dateFin=? WHERE idProjet=? ");
      $reqU->execute(array($n_pro, $des_pro, $d_debut_pro, $d_fin_pro, $idy));

    }
    //Fin methode pour la modification des donnees 
}

#     //\    ||     ||
#    //  \   ||     ||
#   //----\  ||-----||     
#  //      \ ||     ||
# //        \||     ||
#


class categorie{
  //Debut methode pour ajouter des donnees dans la base de donnees
  public function addcat($lib,$dateEn){
    global $db;
    if(!empty($lib)){
      $req=$db->prepare("INSERT INTO categorie(libelle,dateEn) VALUES(?,?)");
      $req->execute(array($lib,$dateEn));
    }
 
  }
  //Fin Methode d'ajout

  //Debut methode pour afficher des donnes donnees
  public function affiche(){
    global $db;
    $req=$db->query("SELECT * FROM categorie order by dateEn desc");
    while($donnees=$req->fetch()){
      ?>
      <tr>
          
          <td>
          <?php echo $donnees["1"] ?>
          </td>
          <td>
            <input type="hidden" value="<?php echo $donnees["0"] ?>" name="delca" readonly>
              <button type="submit" name="enregister" class="btn btn-info"> <i class="fas fa-pencil-alt"></i> <a href="modifier_categorie.php?cat=<?php echo $donnees["0"]?>">Modifier</a></button>    
          </td>
          <td>
          
          <a onclick="return confirm('voulez vous supprimer?')" href="gestion_categorie.php?cat=<?php echo $donnees["0"] ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
          </td>
          
        </tr>
      <?php
    }

  }

  //Fin methode pour afficher des donnees

  //Debut methode pour supprimer des categories
  public function supprimerCat($idcat){
    global $db;
    $req_del=$db->prepare("DELETE FROM categorie WHERE idcategorie=?");
    $req_del->execute(array($idcat));


  }
  //Fin Methode pour supprimer des categories

  //Debut methode pour la modification des donnees
    //Methode pour afficher le formulaire de modification
    public function affmod($getid_cat){
      global $db;
      $req=$db->prepare("SELECT * FROM categorie WHERE idcategorie=?");
      $req->execute(array($getid_cat));
      while($donnees=$req->fetch()){
        ?>
          <label for="inputEmail3" class="col-sm-2 col-form-label">Libelle </label>
          <div class="col-sm-10">
            <input type="hidden" value="<?php echo $donnees["0"] ?>" name="sup" readonly>
            <input type="text" class="form-control" id="inputEmail3" placeholder="nom de la catégorie" name="lib" value="<?php echo $donnees["1"] ?>">
          </div>
        <?php
      }


    }

  public function modifierCat($libl, $idycat){
    global $db;
    $req=$db->prepare("UPDATE categorie SET libelle=? WHERE idcategorie=?");
    $req->execute(array($libl, $idycat));
  }
  //Fin methode pour modification des donnees 
}




#     //\    ||     ||
#    //  \   ||     ||
#   //----\  ||-----||     
#  //      \ ||     ||
# //        \||     ||
#

class gestion_materiel{

  //Debut methode pour remplir les selections categories
  public function comboBox(){
    global $db;
    $req=$db->query("SELECT * FROM categorie");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["0"] ?>"><?php echo $donnees["1"] ?> </option>
      <?php

       }
    }

  public function select_mat_param($param){

    global $db;

    if ( $param =="ordi") {

      $req=$db->query("SELECT concat(marque,' ',model,'- ',processeur) as appareil , idmateriel  FROM materiel where filtre_materiel='$param' and disponible='oui'");

    }else{

        $req=$db->query("SELECT concat(marque,' ',model) as appareil , idmateriel  FROM materiel where filtre_materiel='$param' and disponible='oui'");
    }

   

    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees['idmateriel'] ?>"><?php echo strtoupper($donnees['appareil']) ?> </option>

      <?php


    }

  }
  //Fin methode pour remplir les selections

  //Debut methode pour remplir les selections des projets
  public function combprojet(){
    global $db;
    $req=$db->query("SELECT * FROM projet");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["0"] ?>"><?php echo $donnees["1"] ?> </option>
      <?php

    }
  }
  //Fin methode pour remplire les selections des projets

  //Debut methode pour ajouter des donnees
  public function add_materiel($filtre_materiel, $reference, $num_ordre, $direction, $date_achat, $numserie, $description, $typemat, $marque, $model, $processeur, $idcategorie, $idProjet, $dateEn){

      

    global $db;
      //verification si les champs ne sont pas vide
      if(!empty($filtre_materiel)&& !empty($num_ordre) && !empty($reference) &&!empty($direction) &&!empty($date_achat) && !empty($numserie)  && !empty($idcategorie) && !empty($idProjet) ){
         

          if ($filtre_materiel=="ORDI") {

         


            $req=$db->prepare("INSERT INTO materiels(filtre_materiel, reference, num_ordre_info, id_direction, date_achat, numserie,typemat,marque,model,processeur,idcategorie,idProjet,dateEn) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
            $req->execute(array($filtre_materiel,$reference, $num_ordre, $direction,$date_achat, $numserie, $typemat, $marque, $model,$processeur,$idcategorie,$idProjet, $dateEn));
            # code...

          }elseif($filtre_materiel=="IMMOBILIER"){

           

            $req=$db->prepare("INSERT INTO materiels(filtre_materiel, reference, num_ordre_info, id_direction, date_achat, numserie, descriptions, idcategorie,idProjet,dateEn) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $req->execute(array($filtre_materiel,$reference, $num_ordre, $direction,$date_achat, $numserie, $description, $idcategorie,$idProjet, $dateEn));
            
            # code...
           }else{


            $req=$db->prepare("INSERT INTO materiels(filtre_materiel, reference, num_ordre_info, id_direction, date_achat, numserie,typemat,marque,model,idcategorie,idProjet,dateEn) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $req->execute(array($filtre_materiel,$reference, $num_ordre,$direction,$date_achat,$numserie,$typemat,$marque,$model,$idcategorie,$idProjet,$dateEn));


          }
         

      }
    
    
  }
  //Fin methode d'ajout

  //Debut Methode pour afficher des donnees specifiques aux ordinateurs
  public function af_materiel($action){
    global $db;

      //REQUETTE POUR AFFICHER LES DONNEES SPECIFIQUES AUX ORDINATEURS
      $reqordi=$db->prepare("SELECT * FROM materiels WHERE filtre_materiel=? order by dateEn desc");
      $reqordi->execute(array($action));
      while($donnees=$reqordi->fetch()) {
        ?>
       <tr>
         <td>
           <?php echo $donnees["num_ordre_info"] ?>
         </td>
         <td>
           <?php echo $donnees["reference"] ?>
         </td>

      <td>

          <?php $reqcat=$db->prepare("SELECT nom_direction FROM direction WHERE id_direction = ?");
         $reqcat->execute(array($donnees["id_direction"]));
          while($cat=$reqcat->fetch()){
         echo $cat["nom_direction"];}?>
        </td>
        <td>   
           <?php echo $donnees["numserie"] ?>
          </td>
         <td>
         
         <?php echo $donnees["marque"] ?>
         </td>
         <td>
         
         <?php echo $donnees["model"] ?>
         </td>
         <td>
         <?php $reqcat=$db->prepare("SELECT libelle FROM categorie WHERE idcategorie=?"); $reqcat->execute(array($donnees["idcategorie"])); while($cat=$reqcat->fetch()){

         echo $cat["libelle"];}?> 

         </td>
         <td>
         
         <?php $reqprojet=$db->prepare("SELECT nom FROM projet WHERE idProjet=?"); $reqprojet->execute(array($donnees["idProjet"])); while($pro=$reqprojet->fetch()){
         echo $pro["nom"];}?>
         </td>
         <td>
         
         <?php echo $donnees["typemat"] ?>
         </td>
         <td>
         
         <?php echo $donnees["processeur"] ?>
         </td>
         <td>
             <input type="hidden" value="<?php echo $donnees["0"] ?>" name="sup">
             <button type="submit" name="modifier" class="btn btn-info"> <i class="fas fa-pencil-alt"></i> <a href="modifier_materiels.php?action=<?php echo $action ?>&&materiel=<?php echo $donnees["0"]?>">Modifier<a></button>
           </td>
           <td>
           <a onclick="return confirm('voulez vous supprimer?')" href="gestion_materiels.php?action=<?php echo $action ?>&&materiel=<?php echo $donnees["0"]?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
           </td>
         
       </tr>
      <?php

       
      }

      
  }
  //Fin methode pour afficher les donnees  specifiques aux ordinateurs

  //Debut Methode pour afficher des donnees immobiliers
  public function af_immobilier($action){
    global $db;

      //REQUETTE POUR AFFICHER LES DONNEES SPECIFIQUES AUX ORDINATEURS
      $reqordi=$db->prepare("SELECT * FROM materiels WHERE filtre_materiel=? order by dateEn desc");
      $reqordi->execute(array($action));
      while($donnees=$reqordi->fetch()) {
        ?>
       <tr>
       <td>
           <?php echo $donnees["filtre_materiel"] ?>
         </td>
         <td>
           <?php echo $donnees["num_ordre_info"] ?>
         </td>
         <td>
           <?php echo $donnees["reference"] ?>
         </td>

      <td>

          <?php $reqcat=$db->prepare("SELECT nom_direction FROM direction WHERE id_direction = ?");
         $reqcat->execute(array($donnees["id_direction"]));
          while($cat=$reqcat->fetch()){
         echo $cat["nom_direction"];}?>
        </td>
        <td>   
           <?php echo $donnees["numserie"] ?>
          </td>
         <td>
         <?php echo $donnees["descriptions"] ?>
         </td>
         <td>
         <?php $reqcat=$db->prepare("SELECT libelle FROM categorie WHERE idcategorie=?"); $reqcat->execute(array($donnees["idcategorie"])); while($cat=$reqcat->fetch()){
         echo $cat["libelle"];}?> 
         </td>
         <td>
         <?php $reqprojet=$db->prepare("SELECT nom FROM projet WHERE idProjet=?"); $reqprojet->execute(array($donnees["idProjet"])); while($pro=$reqprojet->fetch()){
         echo $pro["nom"];}?>
         </td>
         <td>
         <?php echo $donnees["dateEn"] ?>
         </td>
         <td>
             <input type="hidden" value="<?php echo $donnees["0"] ?>" name="sup">
             <button type="submit" name="modifier" class="btn btn-info"> <i class="fas fa-pencil-alt"></i> <a href="modifier_immobilier.php?action=<?php echo $action ?>&&materiel=<?php echo $donnees["0"]?>">Modifier<a></button>
           </td>
           <td>
           <a onclick="return confirm('voulez vous supprimer?')" href="gestion_materiels.php?action=<?php echo $action ?>&&materiel=<?php echo $donnees["0"]?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
           </td>
         
       </tr>
      <?php

       
      }

      
  }
  //Fin methode pour afficher les donnees  des immobiliers

  public function af_materieltout(){
    global $db;

    $reqaf=$db->query("SELECT * FROM materiels order by dateEn desc");
    while($donnees=$reqaf->fetch()){
      ?>
       <tr>
         <td>
           
           <?php echo $donnees["filtre_materiel"] ?>
          </td>


          <td>
           
           <?php echo $donnees["num_ordre_info"] ?>
          </td>
          
          <td>
           
           <?php echo $donnees["reference"] ?>
          </td>
          
          <td>

      <?php $reqcat=$db->prepare("SELECT nom_direction FROM direction WHERE id_direction = ?");
      $reqcat->execute(array($donnees["id_direction"]));
       while($cat=$reqcat->fetch()){
      echo $cat["nom_direction"];}?>
     </td>
          
         <td>
           
          <?php echo $donnees["numserie"] ?>
          </td>
         <td>
         
         <?php echo $donnees["marque"] ?>
         </td>
         <td>
         
         <?php echo $donnees["model"] ?>
         </td>
         <td>
         
        <?php $reqcat=$db->prepare("SELECT libelle FROM categorie WHERE idcategorie=?"); $reqcat->execute(array($donnees["idcategorie"])); while($cat=$reqcat->fetch()){

         echo $cat["libelle"];}?>

         </td>
         <td>
         
         <?php $reqprojet=$db->prepare("SELECT nom FROM projet WHERE idProjet=?"); $reqprojet->execute(array($donnees["idProjet"])); while($pro=$reqprojet->fetch()){
         echo $pro["nom"];}?> 
         </td>
         <td>
         
         <?php echo $donnees["typemat"] ?>
         </td>
         <td>
         
         <?php echo $donnees["processeur"] ?>
         </td>

         
       </tr>
      <?php

    }



}

  //Fin Methode pour afficher des donnees au niveau du tableau

  //Debut methode pour supprimer les donnees
  public function supprimer_mat($getid){
    global $db;
    $req=$db->prepare("DELETE FROM materiels WHERE idmateriel= ?");
    $req->execute(array($getid));

  }
  //Fin methode pour supprimer les donnees
  //Methode de modification des immobilier

  //Fin methodes de modification des immobilier

   //Debut methode pour la modification des donnees specifiques
    //Affichage des donnees a modifier dans le formulaire
    public function aff_mat_upd($idy_mod, $getaction){
      global $db;
      $req=$db->prepare("SELECT * FROM materiels WHERE idmateriel=?");
      $req->execute(array($idy_mod));
      while($donnees=$req->fetch()){
        ?>
              <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Filtre appareil</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $donnees["filtre_materiel"] ?>" class="form-control" id="inputEmail3"  name="filtre_materiel" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Numéro d'ordre </label>
                     <div class="col-sm-10">
                       <input type="number"  value="<?php echo $donnees["num_ordre_info"] ?>"class="form-control" id="inputEmail3" placeholder="Numéro d'ordre" name="num_ord">
                     </div>
                   </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Référence </label>
                     <div class="col-sm-10">
                       <input type="text" value="<?php echo $donnees["reference"] ?>" class="form-control" id="inputEmail3" placeholder="Reference" name="reference">
                     </div>
                   </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Categorie</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="categorie">
                      <option value="<?php echo $donnees["idcategorie"] ?>">choisir</option>
                      <?php $cmb=new gestion_materiel;
                       $cmb->comboBox();?>
                         
                        </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Projet</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="projet">
                      <option value="<?php echo $donnees["idProjet"] ?>">choisir</option>
                         <?php
                        $cmb=new gestion_materiel;
                        $cmb->combprojet();
                         ?>
                         
                        </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Direction</label>
                    <div class="col-sm-10">
                      <select class="select2" style="width: 100%;" name="dir">
                      <option value="<?php echo $donnees["id_direction"] ?>">choisir</option>
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
                       <input type="date" class="form-control"  value="<?php echo $donnees["date_achat"] ?>" name="date">
                     </div>
                   </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Numero_serie </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $donnees["numserie"] ?>" class="form-control" id="inputEmail3"  name="numserie">
                    </div>
                  </div>
                  <?php
                  if($getaction=="immobilier"){
                    ?>
                     <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description </label>
                            <div class="col-sm-10">
                              <input type="text" value="<?php echo $donnees["descriptions"] ?>" class="form-control" id="inputEmail3" placeholder="Description" name="desc">
                            </div>
                            </div>
                    <?php


                  }else{
                    ?>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Marque</label>
                    <div class="col-sm-10">

                       <select class="custom-select" required="" name="marque"  value="<?php echo $donnees["marque"] ?>">

                                  <option >Choisir la marque </option>
                                                        <?php   

                                      if ($_GET['action']=="phone") {    

                                            ?>

                                                <option>Samsung</option>
                                                <option>Iphone</option>
                                                <option>Huawei</option>
                                                <option>Techno</option>
                                                <option>Itel</option>
                                                <option>Infinix</option>
                                                <option>Acatel</option>
                                                <option>Motorola</option>
                                            <?php 
                                       }

                                       if ($_GET['action']=="ordi") {                
                                            ?>
                                                <option>HP</option>
                                                <option>Dell</option>
                                                <option>Lenovo</option>                                                
                                                <option>Asus</option>                                                                       
                                                <option>Apple</option>
                                                <option>Acer</option>                                                                       
                                                <option>Apple</option>  
                                            <?php 
                                       }

                                       if ($_GET['action']=="imprimante") {     
                                                     
                                            ?>
                                                <option>HP</option>
                                                <option>Canon</option>
                                                <option>Epson </option>
                                                <option>Ricoh</option>
                                                <option>Lexmark </option> 
                                            <?php 
                                       }
                                 ?>                        
                         </select>
                    </div>
                  </div>

                  <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-2 col-form-label">Model</label>
                       <div class="col-sm-10"> 
                       <input type="text" class="form-control" id="inputPassword3" value="<?php echo $donnees["model"] ?>" name="model">
                        </div>
                    </div>
                   <?php   
                          if ($_GET['action']=="ordi") {
                            ?>
                               <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label">Processeur de l'ordinateur</label>
                                  <div class="col-sm-10">
                                     <select class="custom-select" required="" name="processeur" value="<?php echo $donnees["processeur"] ?>">
                                        <option value="">Choisir le processur </option>
                                          <option>PENTUIM</option>
                                          <option>DUAL CORE</option>
                                          <option>I3 </option>
                                          <option>I5</option>
                                          <option>I7</option>                          
                                          <option>I9</option>
                                        </select>
                                    </div>
                                  </div>
                              <?php 
                                   }
                             ?>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">catégorie</label>
                                <div class="col-sm-10">
                                  <select class="custom-select" required="" name="idcategorie"  value="<?php echo $donnees["idcategorie"] ?>">
                                      <option value="">Choisir </option>
                                      <?php $cmb=new gestion_materiel;
                                             $cmb->comboBox();?>
                                    </select>
                                </div>
                              </div>
                             <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Projet</label>
                                <div class="col-sm-10">
                                <select class="custom-select" required="" name="idProjet" value="<?php echo $donnees["idProjet"] ?>">
                                <option value="">Choisir </option>
                                  <?php
                                  $cmb->combprojet();
                                   ?>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                  <select class="custom-select" required="" name="typemat" value="<?php echo $donnees["typemat"] ?>">
                                      <option value="">Choisir  le type</option>
                                      <?php   
                                      if ($_GET['action']=="phone") {     
                                            ?>
                                                <option>Smartphone</option>
                                                <option>Tablette</option>
                                                <option>Telephone Fixe</option>
                                            <?php 
                                       }
                                       if ($_GET['action']=="ordi") {            
                                            ?>
                                                <option>Desktop</option>
                                                <option>Laptop</option>
                                                <option>Notebook</option>                                                
                                                <option>Macbook</option>                                                                       
                                                <option>Probook</option>
                                            <?php 
                                       }
                                       if ($_GET['action']=="imprimante") {         
                                            ?>
                                                <option>Laser</option>
                                                <option>Jet d'Ancre</option>
                                                <option>Multifonction </option>
                                            <?php 
                            }
                                 ?>
                                    </select>
                                </div>
                              </div> 

                    <?php

                  }

                  ?>
                             
                <!-- /.card-body -->
                <div class="card-footer">
                <input type="hidden" value="<?php echo $donnees["0"] ?>" name="iden">
                <button type="submit" name="modifier" class="btn btn-info mr-4"><i class='fas fa-pencil-alt'></i>MODIFIER</button>
                </div>
                <!-- /.card-footer -->
              </div>
        <?php
      }
    }
    //Debut methode pour afficher les données à modifier
    //Recuperation du parametre et du l'identifiant
    public function modifier_form($para, $identy){
      global $db;
      
    }
    //Fin methode pour afficher les données à modifier
    public function updmat($reference,$num_ordre,$direction,$date_achat, $numserie, $typemat, $marque, $model, $processeur, $idcategorie, $idprojet,$getmat){
      global $db;
      $req=$db->prepare("UPDATE materiels SET reference=?,num_ordre_info=?,id_direction=?,date_achat=?, numserie=?, typemat=?, marque=?, model=?, processeur=?,idcategorie=?, idProjet=? WHERE idmateriel=? ");
       $req->execute(array($reference,$num_ordre,$direction,$date_achat,$numserie, $typemat, $marque, $model, $processeur, $idcategorie, $idprojet, $getmat));
    }

  //Fin methode pour la modification des donnees specifique

  //Fin methode pour afficher les données à modifier des mobilier
  public function updmat_immo($reference, $num_ordre, $direction, $date_achat, $numserie, $idcategorie, $idprojet, $description, $getmat){
    global $db;
    $req=$db->prepare("UPDATE materiels SET reference=?,num_ordre_info=?,id_direction=?,date_achat=?, numserie=?,idcategorie=?, idProjet=?, descriptions=? WHERE idmateriel=? ");
     $req->execute(array($reference, $num_ordre, $direction, $date_achat, $numserie, $idcategorie, $idprojet, $description, $getmat));
  }

//Fin methode pour la modification des donnees specifique des mobilier
  
  

}
#     //\    ||     ||
#    //  \   ||     ||
#   //----\  ||-----||     
#  //      \ ||     ||
# //        \||     ||
#

class gestion_prersonnel{
  //generer du code
  function code_auto($length = 8){ $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;}
  // Creation des methodes
  
    //methode pour remplir les selections des noms
  public function selection_ser(){
    global $db;
    $req=$db->query("SELECT idservice, intitule FROM services");
    while($donnees=$req->fetch()){
      ?>
      <option value="<?php echo $donnees["idservice"] ?>"> <?php echo $donnees["intitule"] ?> </option>
      <?php
    }
  }

  public function selection_direction(){
    global $db;
    $req=$db->query("SELECT id_direction, nom_direction FROM direction");
    while($donnees=$req->fetch()){
      ?>
      <option value="<?php echo $donnees["id_direction"] ?>"> <?php echo $donnees["nom_direction"] ?> </option>
      <?php
    }
  }
  //Fin methode nom
  //methode sites
  public function selection_site(){
    global $db;
    $req=$db->query("SELECT id_site, ville FROM site");
    while($donnees=$req->fetch()){
      ?>
      <option value="<?php echo $donnees["id_site"] ?>"> <?php echo $donnees["ville"] ?> </option>
      <?php
    }
  }
  //fin 
  //Methode pour afficher des donnees lors de la modification
   //Debut methode pour remplir les selections mail
   public function list_direction($iden){
    global $db;
    $req=$db->query("SELECT id_direction, FROM employe WHERE idEmploye!=$iden");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["email"] ?>"><?php echo $donnees["email"] ?> </option>
      <?php

    }
  }
  //Fin methode pour remplir les selections mail

  //Methode pour la selection des donnees a modifier
    //Debut methode pour selectionner le nom specifique a modifier
    public function select_nom($serv){
      global $db;
      $req=$db->query("SELECT nomRes FROM services WHERE idService=$serv");
      $donnees=$req->fetch();
      ?>
      <option value="<?php echo $donnees["nomRes"] ?>" selected="selected"><?php echo $donnees["nomRes"]?></option>
      <?php
    }
    //Fin methode pour selectionner le nom specifique a modifier
  //Fin methode d'affichage des donnees dans les form avant la modification



 

  // Debut creation de la methode pour ajouter des donnnees
  public function addpersonnel($nom, $prenoms, $fonction, $email, $contact, $sexe, $role, $date_ajout, $pwd, $serv,$direct,$ville ){
      global $db;
      

      $error = array();
          $verif_email = $db-> prepare("SELECT email  FROM employe where email='$email'");
          $verif_email->execute();
          $res_email = $verif_email->rowCount();
            if ($res_email>=1){
                
                $error[1]="<div class='alert alert-danger'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                        <strong>Cette adresse e-mail est déjà utilisée</strong>
                        </div>";    

                      echo "$error[1]";                
            }else{
                  if (empty($error))
                      {
                                  $b = array(
                                        'nom'=> $nom,
                                        'prenoms'=> $prenoms,                           
                                        'fonction'=> $fonction,               
                                        'email'=> $email,
                                        'contact'=> $contact,                           
                                        'sexe'=> $sexe,
                                        'roles'=> $role,                           
                                        'date_ajout'=> $date_ajout,
                                        'mot_passe'=>$pwd,
                                        'id_direction'=>$direct,
                                        'idservice'=>$serv,
                                        'id_site'=>$ville
                                    );
                    //verifions si les donnees ne sont pas vides
                    if(!empty($nom) && !empty($prenoms) && isset($fonction) && !empty($email) && isset($contact) && !empty($sexe) && !empty($role) && !empty($date_ajout) && !empty($pwd) && !empty($serv) && !empty($direct) && !empty($ville)){
                        $req=$db->prepare("INSERT INTO employe(nom, prenoms, fonction, email, contact, sexe, roles, date_ajout, mot_passe, id_direction, idservice, id_site) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $req->execute(array($nom, $prenoms, $fonction, $email, $contact, $sexe, $role, $date_ajout, $pwd, $direct, $serv, $ville));
                        
                    }
                } 


            }  
}
  //Fin creation de la methode pour ajouter des donnnees
 public function affiche(){
      global $db;
      $req=$db->query("SELECT * FROM employe WHERE status=0 ORDER BY  date_ajout DESC");
      while($donnees=$req->fetch()){
          ?>
              <tr>
                   <td>
                     <input type="text" value="<?php echo $donnees["1"] ?>" name="1" readonly>

                    </td>
                    <td>  <input type="text" value="<?php echo $donnees["2"] ?>" name="2" readonly></td>
                    <td>
                    <input type="text" value="<?php echo $donnees["3"] ?>" name="3" readonly>
                    </td>
                    <td>
                    <input type="text" value="<?php echo $donnees["4"] ?>" name="4" readonly>
                    </td>
                    <td>
                    <input type="text" value="<?php echo $donnees["5"] ?>" name="5" readonly>
                    </td>
                    <td>
                    <input type="text" value="<?php echo $donnees["6"] ?>" name="6" readonly>
                    </td>
                    <td>
                    <input type="text" value="<?php echo $donnees["8"] ?>" name="8" readonly>
                    </td>
                    <td>
                    <input type="text" value="<?php
                     $date=date_create($donnees["9"]);
                     echo date_format($date, "d/m/Y"); 
                     ?>" name="9" readonly>
                    </td>
                    
                    <td>
                    
                    <input type="text" value="<?php
                       $redt=$db->prepare("SELECT intitule FROM services WHERE idService=?");
                       $redt->execute(array($donnees["12"]));

                       while($data=$redt->fetch()){
                         echo $data["intitule"];
           
                        }
                        ?> " name="10" readonly>
                    </td>
                    <td>
                       <input type="hidden" value="<?php echo $donnees["0"] ?>" name="sup">
                        <button type="submit" name="" class="btn btn-info"> <i class="fas fa-pencil-alt"></i> <a href="modifier_personnel.php?employe=<?php echo $donnees["0"]?>">Modifier<a></button>
                    </td>
                    <td>
                    <a onclick="return confirm('voulez vous supprimer?')" href="gestion_personnes.php?perso=<?php echo $donnees["0"] ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
                    </td>
                    </tr>
           <?php


      }
  }

  //Debut creation de la methode pour supprimer des donnees
   
  public function supprimerpersonnel($getid){

    global $db;
     
    $req_del=$db->prepare("UPDATE employe SET status=1 , active=0 WHERE idEmploye= ?");
    $req_del->execute(array($getid));
    
    

  }
  //Fin creation de la methode por supprimer des donnees

  //Debut de la methode pour modififier des donnees
     //methode d'affiche des donnees a modifier
  public function affiche_Data_Modp($getpern){
    global $db;
    $req=$db->prepare("SELECT * FROM employe WHERE idEmploye=?");
    $req->execute(array($getpern));
    while($donnees=$req->fetch()){
      ?>




     <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nom </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3"  placeholder="nom" name="nom" value="<?php echo $donnees["1"] ?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Prénoms </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="prénoms" name="prenoms" value="<?php echo $donnees["2"] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Fonction</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  id="inputEmail3" placeholder="fonction" name="fonction" value="<?php echo $donnees["3"] ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">email </label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control"  id="inputEmail3" name="email" placeholder="exemple@" value="<?php echo $donnees["4"] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Contact </label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control"  id="inputEmail3" name="contact" placeholder="contact" value="<?php echo $donnees["5"] ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword3"   class="col-sm-2 col-form-label">Sexe</label>
                  <div class="col-sm-10">
                    <select class="custom-select" name="sexe" required="" value="<?php echo $donnees["6"] ?>">

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
                        $cmbl=new gestion_service;
                        //$cmbl->select_mail($idy_mod);
                        $cmbl->lister_dir($idy_mod);
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
                    <select class="custom-select"  name="role" required=""   value="<?php echo $donnees["7"] ?>">

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
                
                
               
              </div>



      <?php
    }

}
   //Fin methode d'affichage des donnees a modifier

  public function modifierpersonnel($nom, $prenoms, $fonction, $email, $contact, $sexe, $role,$direct, $service,$ville, $getperso){
    global $db;
    $reqU=$db->prepare("UPDATE employe SET nom=?, prenoms=?, fonction=?, email=?, contact=?, sexe=?, roles=?, id_direction=?, idService=?, id_site=? WHERE idEmploye=? ");
    $reqU->execute(array($nom, $prenoms, $fonction, $email, $contact, $sexe, $role,$direct,$service,$ville, $getperso));

  }
 
  //new methode
  public function aff_empl(){
    global $db;
    $req=$db->query("SELECT * FROM employe WHERE status=0 ORDER BY  date_ajout DESC");
    while($donnees=$req->fetch()){
        ?>
            <tr>
                 <td>
                   <?php echo $donnees["nom"] ?>  

                  </td>
                  <td>  <?php echo $donnees["prenoms"] ?></td>
                  <td>
                  <?php echo $donnees["fonction"] ?>
                  </td>
                  <td>
                  <?php echo $donnees["email"] ?>
                  </td>
                  <td>
                  <?php echo $donnees["contact"] ?>
                  </td>
                  
                  <td>
                  <?php
                       $redt=$db->prepare("SELECT nom_direction FROM direction WHERE id_direction=?");
                       $redt->execute(array($donnees["id_direction"]));

                       while($data=$redt->fetch()){
                         echo $data["nom_direction"];
           
                        }
                        ?>
                      </td>
                  
                  
                  <td>
                  <?php
                       $redt=$db->prepare("SELECT intitule FROM services WHERE idService=?");
                       $redt->execute(array($donnees["idService"]));

                       while($data=$redt->fetch()){
                         echo $data["intitule"];
           
                        }
                        ?>
                      </td>
                  
                  <td>
                    
                    <?php
                       $redt=$db->prepare("SELECT ville FROM site WHERE id_site=?");
                       $redt->execute(array($donnees["id_site"]));

                       while($data=$redt->fetch()){
                         echo $data["ville"];
           
                        }
                        ?> 
                    </td>
                  <td>
                    <input type="text" value="<?php
                     $date=date_create($donnees["date_ajout"]);
                     echo date_format($date, "d/m/Y"); 
                     ?>" name="date_ajout" readonly>
                    </td> 
                  <td>
                       <input type="hidden" value="<?php echo $donnees["0"] ?>" name="sup">
                        <button type="submit" name="" class="btn btn-info"> <i class="fas fa-pencil-alt"></i> <a href="modifier_personnel.php?employe=<?php echo $donnees["0"]?>">Modifier<a></button>
                    </td>
                    <td>
                    <a onclick="return confirm('voulez vous supprimer?')" href="gestion_personnes.php?perso=<?php echo $donnees["0"] ?>&&sup=ok" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
                    </td>    
         <?php


    }
}
  //fin
}

#     //\    ||     ||
#    //  \   ||     ||
#   //----\  ||-----||     
#  //      \ ||     ||
# //        \||     ||
#

/*class gestion_demande{

  //methode pour remplir les selections des noms
  public function selection_nom(){
    global $db;
    $req=$db->query("SELECT idEmploye, nom FROM employe");
    while($donnees=$req->fetch()){
      ?>
      <option value="<?php echo $donnees["idEmploye"] ?> "> <?php echo $donnees["nom"] ?> </option>
      <?php
    }
  }
  //Fin methode nom

  //methode pour remplir les selections des prenoms
  public function selection_prenoms(){
    global $db;
    $req=$db->query("SELECT prenoms FROM employe");
    while($donnees=$req->fetch()){
      ?>
      <option value=" "> <?php echo $donnees["prenoms"] ?> </option>
      <?php
    }
  }
  //Fin methode prenoms

  //methode pour remplir les selections des mail
  public function selection_mail(){
    global $db;
    $req=$db->query("SELECT email FROM employe");
    while($donnees=$req->fetch()){
      ?>
      <option value=" "> <?php echo $donnees["email"] ?> </option>
      <?php
    }
  }
  //Fin methode mail

  

  //methode pour remplir les selections des categorie
  public function selection_cat(){
    global $db;
    $req=$db->query("SELECT libelle FROM categorie");
    while($donnees=$req->fetch()){
      ?>
      <option value=" "> <?php echo $donnees["libelle"] ?> </option>
      <?php
    }
  }
  //Fin methode categorie

  //methode pour remplir les selections des projet
  public function selection_pro(){
    global $db;
    $req=$db->query("SELECT nom FROM projet");
    while($donnees=$req->fetch()){
      ?>
      <option value=" "> <?php echo $donnees["nom"] ?> </option>
      <?php
    }
  }
  //Fin methode projet
  
  //Debut methode pour ajouter des donnes
  public function ajouter_demande(){
    

  }
  //Fin methodes pour ajouter des donnees
}*/
#     //\    ||     ||
#    //  \   ||     ||
#   //----\  ||-----||     
#  //      \ ||     ||
# //        \||     ||
#
class gestion_service{
  
  //Methode de selection d'affichage
  public function lister_nom(){
    global $db;
    $req=$db->query("SELECT nom,prenoms,email FROM employe");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["nom"]."/".$donnees["prenoms"]."/".$donnees["email"] ?>"><?php echo $donnees["nom"]."/ ".$donnees["prenoms"]." /".$donnees["email"] ?> </option>
      <?php

    }
  }
  //Fin methode pour remplir les selections noms

 //Debut methode pour remplir les selections prenoms
  public function lister_prenoms(){
    global $db;
    $req=$db->query("SELECT prenoms FROM employe");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["prenoms"] ?>"><?php echo $donnees["prenoms"] ?> </option>
      <?php

    }
  }
  //Fin methode pour remplir les selections prenoms

  //Debut methode pour remplir les selections direction
  public function lister_dir(){
    global $db;
    $req=$db->query("SELECT id_direction, nom_direction FROM direction");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["id_direction"] ?>"><?php echo $donnees["nom_direction"] ?> </option>
      <?php

    }
  }
  //Fin Methode de selection d'affichage direction
  
  //Debut methode pour remplir les selections mail
  public function lister_email(){
    global $db;
    $req=$db->query("SELECT email FROM employe");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["email"] ?>"><?php echo $donnees["email"] ?> </option>
      <?php

    }
  }
  //Fin Methode de selection d'affichage

  //Debut methode pour remplir les selections nom
  public function list_nom($iden){
    global $db;
    $req=$db->query("SELECT nom,prenoms,email FROM employe  WHERE idEmploye!=$iden");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["nom"]."/".$donnees["prenoms"]."/".$donnees["email"] ?>"><?php echo $donnees["nom"]."/ ".$donnees["prenoms"]." /".$donnees["email"] ?> </option>
      <?php

    }
  }
  //Fin methode pour remplir les selections noms

 //Debut methode pour remplir les selections prenoms
  public function list_prenoms($iden){
    global $db;
    $req=$db->query("SELECT prenoms FROM employe WHERE idEmploye!=$iden");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["prenoms"] ?>"><?php echo $donnees["prenoms"] ?> </option>
      <?php

    }
  }
  //Fin methode pour remplir les selections prenoms
  
  //Debut methode pour remplir les selections mail
  public function list_email($iden){
    global $db;
    $req=$db->query("SELECT email FROM employe WHERE idEmploye!=$iden");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["email"] ?>"><?php echo $donnees["email"] ?> </option>
      <?php

    }
  }
  //Fin methode pour remplir les selections mail

  //Methode pour la selection des donnees a modifier
    //Debut methode pour selectionner le nom specifique a modifier
    public function select_nom($serv){
      global $db;
      $req=$db->query("SELECT nomRes FROM services WHERE idService=$serv");
      $donnees=$req->fetch();
      ?>
      <option value="<?php echo $donnees["nomRes"] ?>" selected="selected"><?php echo $donnees["nomRes"]?></option>
      <?php
    }
    //Fin methode pour selectionner le nom specifique a modifier

    //Debut methode pour selectionner le prenom specifique
    public function select_pren($serv){
      global $db;
      $req=$db->query("SELECT prenRes FROM SERVICES WHERE idService=$serv");
      $donnees=$req->fetch();
      ?>
      <option value="<?php echo $donnees["prenRes"] ?>" selected="selected"><?php echo $donnees["prenRes"] ?></option>
      <?php

    }
    //Fin methode pour selectionner le prenom specifique

    //Debut methode pour selectionner le mail
    public function select_mail($serv){
      global $db;
      $req=$db->query("SELECT mailRes FROM SERVICES WHERE idService=$serv");
      $donnees=$req->fetch();
      ?>
      <option value="<?php echo $donnees["mailRes"] ?>" selected="selected"><?php echo $donnees["mailRes"] ?></option>
      <?php
    }
    //Fin methode pour selectionner le mail 

  //Fin methode pour la selection des donnees a modifier


  //Debut methode pour ajouter des donnees
  public function addservice($intitule, $nomRes, $dateEn, $dir){
    
        global $db;
        //verifions si les donnees ne sont pas vides
        if(!empty($intitule) && isset($nomRes) && isset($dir)){
            $req=$db->prepare("INSERT INTO services(intitule, nomRes, dateEn, id_direction) VALUES(?, ?, ?, ?)");
            $req->execute(array($intitule, $nomRes, $dateEn, $dir));
        }
    }
 
  //Fin methode d'ajout

    // Debut creation de methode pour afficher des donnees
    public function affiche_ser(){
        global $db;
        $req=$db->query("SELECT * FROM services order by dateEn desc");
        while($donnees=$req->fetch()){
            ?>
                <tr>
                     <td>
                       <?php echo $donnees["1"] ?>

                      </td>
                      <td>  <?php $data=explode("/",$donnees["2"]);
                      echo $data[0];
                      
                      
                       ?>
                      </td>
                      <td>
                     <?php /*echo $donnees["3"];*/ echo $data[1];?>

                      </td>
                      <td>
                      <?php /*echo $donnees["4"];*/echo $data[2]; ?>
                      </td>
                      <td>

                      <?php $reqcat=$db->prepare("SELECT nom_direction FROM direction WHERE id_direction = ?");
                        $reqcat->execute(array($donnees["id_direction"]));
                        while($cat=$reqcat->fetch()){
                        echo $cat["nom_direction"];}?>
                      </td>
                      <td>
                          <button type="submit" name="modifier" class="btn btn-info"> <i class="fas fa-pencil-alt"></i> <a href="modifier_service.php?service=<?php echo $donnees["0"]?>">Modifier<a></button>
                      </td>
                      <td><a onclick="return confirm('voulez vous supprimer?')" href="gestion_service.php?servi=<?php echo $donnees["0"] ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a></td>
                      </tr>
             <?php
        }
    }
    // Fin creation de methode pour afficher des donnees
    //Debut methode pour supprimer les donnees
  public function sup_ser($getid){
    global $db;
    $req=$db->prepare("DELETE FROM services WHERE idService= ?");
    $req->execute(array($getid));

  }
  //Fin methode pour supprimer les donnees

  //Affichage des donnees a modifier dans le formulaire
    
    //service
    public function aff_mod_service($idy_mod){
      global $db;
      $req=$db->prepare("SELECT * FROM services WHERE idservice=?");
      $req->execute(array($idy_mod));
      while($donnees=$req->fetch()){
        ?>
              <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">intitulé </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $donnees["intitule"] ?>" class="form-control" id="inputEmail3" placeholder="intitulé" name="intitule">
                    </div>
                  </div>


                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> Responsable </label>
                    <div class="col-sm-10">
                      <select class="select2"  value="<?php echo $donnees["nomRes"] ?>" style="width: 100%;" name="nomRes">
                    <?php
                    echo $donnees["nomRes"];
                     $cmbl=new gestion_service;
                     $cmbl->select_nom($idy_mod);
                     $cmbl->list_nom($idy_mod);
                      
                       ?>
                         
              
                        </select>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Direction</label>
                    <div class="col-sm-10">
                      <select class="select2"  value="<?php echo $donnees["4"] ?>" style="width: 100%;" name="dir">
                      <?php
                     $cmbl=new gestion_service;
                     //$cmbl->select_mail($idy_mod);
                      $cmbl->lister_dir($idy_mod);
                       ?>
                     </select>
                    </div>
                  </div>
                  
                <!-- /.card-body -->
                <div class="card-footer">
               
                <button type="submit" name="modifier" class="btn btn-info mr-4"><i class='fas fa-pencil-alt'></i>MODIFIER</button>
                </div>
                <!-- /.card-footer -->
              </div>

        <?php
      }

    }
    //service
    public function modifierservice($intitule, $nomRes, $dir, $getservi){
      global $db;
      $reqU=$db->prepare("UPDATE services SET intitule=?, nomRes=?, id_direction=? WHERE idService=? ");
      $reqU->execute(array($intitule, $nomRes, $dir, $getservi));

    }
    //Fin methode pour la modification des donnees



}
#     //\    ||     ||
#    //  \   ||     ||
#   //----\  ||-----||     
#  //      \ ||     ||
# //        \||     ||
#
class gestion_demande{

  //Debut methode liste concatener nom, prenoms et mail
  public function contact_data(){
    global $db;
    $req=$db->query("SELECT idEmploye, nom, prenoms, email FROM employe WHERE status=0");
    while($donnees=$req->fetch()){
      ?>
      <option value="<?php echo  $donnees["idEmploye"] ?>"> <?php echo $donnees["nom"]. " " .$donnees["prenoms"]." ".$donnees["email"];?></option>
      <?php
    }
  }
  //Fin Methode liste concatener nom, prenoms et mail

  //Debut methode pour ajouter une demande en fonction du materiel
  public function addDemande($employe, $service, $materiel, $date_debut, $date_fin, $date_emi, $commentaire, $fitre,$user_demandeur){

   /*var_dump($employe, $service, $materiel, $date_debut, $date_fin, $date_emi, $commentaire, $fitre,$user_demandeur);
    die();*/
        global $db;
        //verifions si les donnees ne sont pas vides
        if(!empty($employe) && !empty($service) && !empty($materiel)  && !empty($date_debut) && !empty($date_fin) &&!empty($date_emi) && !empty($commentaire) && !empty($fitre)){
            $req=$db->prepare("INSERT INTO attribuer(empl_conserner, services, mate_dem, date_debut, date_fin, date_emi, commentaire, filtre_dem,idEmploye) VALUES(?,?,?,?,?,?,?,?,?)");
            $req->execute(array($employe, $service, $materiel, $date_debut, $date_fin, $date_emi, $commentaire, $fitre,$user_demandeur));
            echo'<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
            <strong><i class="fa fa-check-circle"></i></strong>     ENREGISTREMENT EFFECTUE AVEC SUCCES
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
       </div>';

        }else{
          echo'<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
          <strong><i class="fa fa-check-circle"></i></strong> ENREGISTREMENT NON EFFECTUE
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
     </div>';
        }
    }
 
  //Fin methode d'ajout en fonction du type de materiels
  //Debut Methode pour afficher des donnees specifiques aux ordinateurs
  public function af_ma_immo($action){
    global $db;

      //REQUETTE POUR AFFICHER LES DONNEES SPECIFIQUES AUX ORDINATEURS
      $reqordi=$db->prepare("SELECT id_attr, empl_conserner, services, mate_dem, date_debut, date_fin, date_emi, commentaire, status FROM attribuer WHERE filtre_dem=? AND existe='oui' order by date_emi desc" );
      $reqordi->execute(array($action));
      while($donnees=$reqordi->fetch()) {
        ?>
       <tr>
       <td>
         <?php $reqcat=$db->prepare("SELECT nom FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
         echo $cat["nom"];}?>
         </td>

         <td>
         <?php $reqcat=$db->prepare("SELECT intitule FROM services WHERE idService=?"); $reqcat->execute(array($donnees["services"])); while($cat=$reqcat->fetch()){
         echo $cat["intitule"];}?> 

         <td>
         <?php echo $donnees["mate_dem"] ?>
         </td>
         <td>
        <?php echo $donnees["date_debut"] ?>
         </td>
         <td>
         <?php echo $donnees["date_fin"] ?>
         </td>
         <td>
        <?php echo $donnees["commentaire"] ?>
         </td>

         <td>
         <?php $date=date_create($donnees['date_emi']); echo date_format($date,'Y/m/d');?>
         </td>
         <td>
         <?php
          $status= $donnees["status"];
          if($status==0){
            ?>
             <button type="submit" name="encours" class="btn btn-info"> <i class="glyphicon glyphicon-ok"></i>En cours...</button>
            <?php

          }elseif($status==1){
            ?>
            <button type="submit" name="attribuer" class="btn btn-success"> <i class="glyphicon glyphicon-ok"></i>Attribuer</button>
           <?php

          }else{
            ?>
            <button type="submit" name="Rejeter" class="btn btn-warning"> <i class="glyphicon glyphicon-ok"></i>Rejeter</button>
            <?php

          }
         ?>
            <!-- <button id="" type="submit" name="rejeter" class="btn btn-warning"> <i class="glyphicon glyphicon-ok"></i>traiter</button> -->
          </td>
          <td>
           <a onclick="return confirm('voulez vous supprimer?')" href="demandeurs.php?action=<?php echo $_GET["action"]?>&&type=<?php echo $donnees['id_attr'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
         </td>
           
       </tr>
      <?php
      }
  }
  //Fin methode pour afficher les donnees  specifiques aux ordinateurs
  //Debut Methode pour afficher des donnees specifiques aux ordinateurs
  public function af_ma_dem($action){
    global $db;

      //REQUETTE POUR AFFICHER LES DONNEES SPECIFIQUES AUX ORDINATEURS
      $reqordi=$db->prepare("SELECT id_attr, empl_conserner, services, mate_dem, date_debut, date_fin, date_emi, commentaire, status FROM attribuer WHERE filtre_dem=? AND existe='oui' order by date_emi desc" );
      $reqordi->execute(array($action));
      while($donnees=$reqordi->fetch()) {
        ?>
       <tr>
       <td>
         <?php $reqcat=$db->prepare("SELECT nom FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
         echo $cat["nom"];}?>
         </td>

         <td>
         <?php $reqcat=$db->prepare("SELECT intitule FROM services WHERE idService=?"); $reqcat->execute(array($donnees["services"])); while($cat=$reqcat->fetch()){
         echo $cat["intitule"];}?> 

         <td>
         <?php echo $donnees["mate_dem"] ?>
         </td>
         <td>
        <?php echo $donnees["date_debut"] ?>
         </td>
         <td>
         <?php echo $donnees["date_fin"] ?>
         </td>
         <td>
        <?php echo $donnees["commentaire"] ?>
         </td>

         <td>
         <?php $date=date_create($donnees['date_emi']); echo date_format($date,'Y/m/d');?>
         </td>
         <td>
         <?php
          $status= $donnees["status"];
          if($status==0){
            ?>
             <button type="submit" name="encours" class="btn btn-info"> <i class="glyphicon glyphicon-ok"></i>En cours...</button>
            <?php

          }elseif($status==1){
            ?>
            <button type="submit" name="attribuer" class="btn btn-success"> <i class="glyphicon glyphicon-ok"></i>Attribuer</button>
           <?php

          }else{
            ?>
            <button type="submit" name="Rejeter" class="btn btn-warning"> <i class="glyphicon glyphicon-ok"></i>Rejeter</button>
            <?php

          }
         ?>
            <!-- <button id="" type="submit" name="rejeter" class="btn btn-warning"> <i class="glyphicon glyphicon-ok"></i>traiter</button> -->
          </td>
          <td>
           <a onclick="return confirm('voulez vous supprimer?')" href="demandeurs.php?action=<?php echo $_GET["action"]?>&&type=<?php echo $donnees['id_attr'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
         </td>
           
       </tr>
      <?php
      }
  }
  //Fin methode pour afficher les donnees  specifiques aux ordinateurs

  //Methode pour supprimer les données de la demande chez l'utilisateur et non dans la base
  public function del_up($identity){


    global $db;
    $req=$db->prepare("UPDATE attribuer SET existe='non' WHERE id_attr=?");
    $req->execute(array($identity));

  }
 
  //Fin methode pour supprimer les données de la demande chez l'utilisateur et non dans la base
  //Methode pour afficher la liste des demandes
    public function affichedemandeurs(){

      global $db;
      $req=$db->query("SELECT id_attr,filtre_dem, empl_conserner, services, mate_dem, date_debut, date_fin, date_emi, commentaire FROM attribuer where status=0 and existe='oui' order by date_emi desc" );
      while($donnees=$req->fetch()){
          ?>
             <tr>
             <td>
         <?php $reqcat=$db->prepare("SELECT nom,prenoms,email FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
         echo $cat["nom"]. " " .$cat["prenoms"]." ".$cat["email"];}?>
         </td>

         <td>
         <?php $reqcat=$db->prepare("SELECT intitule FROM services WHERE idService=?"); $reqcat->execute(array($donnees["services"])); while($cat=$reqcat->fetch()){
         echo $cat["intitule"];}?>
         </td>

         <td>
        <?php echo $donnees["mate_dem"] ?>
         </td>
         <td>
         <?php echo $donnees["date_debut"] ?>
         </td>
         <td>
         <?php echo $donnees["date_fin"] ?>
         </td>
         <td>
         <?php echo $donnees["commentaire"] ?>
         </td>

         <td>
        <?php $date=date_create($donnees['date_emi']); echo date_format($date,'Y/m/d');?>
         </td>
         <td>
              <button onclick="return confirm('voulez vous Rejeter?')" type="submit" name="rejeter" class="btn btn-warning"> <i class="glyphicon glyphicon-ok"></i><a href="gestion_demandeurs.php?rejet=<?php echo $donnees["id_attr"]?>">Réjeter<a> </button>
           </td>
                <td>
              <button  onclick="return confirm('voulez vous Attribuer?')"id="attribuer" type="submit" name="attribuer" class="btn btn-info"> <i class="glyphicon glyphicon-ok"></i> <a href="gestion_attribution.php?dem=<?php echo $donnees["id_attr"]?>&&filtre_appareil=<?php echo $donnees["filtre_dem"]?>">Attribuer<a></button>
                </td>
            </tr>      
           <?php
      }
      
  }
  // Fin creation de methode pour afficher des donnees

  //Debut methode pour rejeter des demandes
  public function rejeter_demande($iden){
    global $db;
    $req=$db->prepare("UPDATE attribuer SET status= 2 WHERE id_attr = ? ");
    $req->execute(array($iden));



  }
  
  //liste des rejets
  public function afficheRejet(){
    global $db;
      $req=$db->query("SELECT id_attr,filtre_dem, empl_conserner, services, mate_dem, date_debut, date_fin, date_emi, commentaire FROM attribuer where status=2 and existe='oui' order by date_emi desc" );
      while($donnees=$req->fetch()){
          ?>
             <tr>
             <td>
         <input type="text" value="<?php $reqcat=$db->prepare("SELECT nom,prenoms,email FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
         echo $cat["nom"]. " " .$cat["prenoms"]." ".$cat["email"];}?> " name="empl_conserner" readonly>
         </td>

         <td>
         <input type="text" value="<?php $reqcat=$db->prepare("SELECT intitule FROM services WHERE idService=?"); $reqcat->execute(array($donnees["services"])); while($cat=$reqcat->fetch()){
         echo $cat["intitule"];}?> " name="services" readonly>
         </td>

         <td>
         <input type="text" value="<?php echo $donnees["mate_dem"] ?>" name="mate_dem" readonly>
         </td>
         <td>
         <input type="text" value="<?php echo $donnees["date_debut"] ?>" name="date_debut" readonly>
         </td>
         <td>
         <input type="text" value="<?php echo $donnees["date_fin"] ?>" name="date_fin" readonly>
         </td>
         <td>
         <input type="text" value="<?php echo $donnees["commentaire"] ?>" name="commentaire" readonly>
         </td>

         <td>
         <input type="text" value="<?php $date=date_create($donnees['date_emi']); echo date_format($date,'Y/m/d');?>" name="date_emi" readonly>
         </td>
         <td>
         <b class="text-warning">Réjeter </b>
                </td>
                
            </tr>      
           <?php
      }
      
  }









  //fin de la liste
  //Fin methode pour rejeter des demandes

  //Debut methode pour remplir les selections services
  public function listeservice(){
    global $db;
    $req=$db->query("SELECT * FROM services");
    while($donnees=$req->fetch()){
      ?>
        <option value="<?php echo $donnees["0"] ?>"><?php echo $donnees["1"] ?> </option>
      <?php

    }
  }
  //Fin methode pour remplir les selections
  
  //Methode pour afficher la liste de tous les materiels
  public function af_demandetout(){
    global $db;

    $reqaf=$db->query("SELECT *FROM attribuer where status=0 and existe='oui' order by date_emi desc");
    while($donnees=$reqaf->fetch()){
      ?>
       <tr>
       <td>
         <?php $reqcat=$db->prepare("SELECT nom,prenoms,email FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
         echo $cat["nom"]. " " .$cat["prenoms"]." ".$cat["email"];}?> 
         </td>

         <td>
         <?php $reqcat=$db->prepare("SELECT intitule FROM services WHERE idService=?"); $reqcat->execute(array($donnees["services"])); while($cat=$reqcat->fetch()){
         echo $cat["intitule"];}?> 
         </td>

         <td>
         <?php echo $donnees["mate_dem"] ?>
         </td>
         <td>
         <?php echo $donnees["date_debut"] ?>
         </td>
         <td>
        <?php echo $donnees["date_fin"] ?>
         </td>
         <td>
         <?php echo $donnees["commentaire"] ?>
         </td>

         <td>
         <input type="text" value="<?php $date=date_create($donnees['date_emi']); echo date_format($date,'Y/m/d');?>" name="date_emi" readonly>
         </td>
         <td>
              <button id="" type="submit" name="en_cours" class="btn btn-info"> <i class="glyphicon glyphicon-ok"></i>En cours... </button>
                </td>
         
       </tr>
      <?php

    }



}

  //Fin Methode pour afficher des donnees au niveau du tableau
  //fin methode pour afficher la liste de tous les materiels


}

#     //\    ||     ||
#    //  \   ||     ||
#   //----\  ||-----||     
#  //      \ ||     ||
# //        \||     ||
#

class gestion_attribuer{

  //afficher le formulaire de demande dans attribution
  public function affiche_formulaire_demande($getpern){
    global $db;
    $req=$db->prepare("SELECT id_attr, empl_conserner, mate_dem, date_debut, date_fin, date_emi, commentaire FROM attribuer WHERE id_attr=?");
    $req->execute(array($getpern));
    while($donnees=$req->fetch()){
      ?>
      <div class="form-group row">
           <label for="inputPassword3" class="col-sm-2 col-form-label"> </label>
            <div class="col-sm-10">
           <input type="hidden" class="form-control"  id="inputEmail3" name="use_name"  value="<?php echo $donnees[""] ?>"readonly>    
            </div> 
            </div>
          <div class="form-group row">
           <label for="inputPassword3" class="col-sm-2 col-form-label">Employé </label>
            <div class="col-sm-10">
           <input type="text" class="form-control"  id="inputEmail3" name="empl_conserner"  value="<?php $reqcat=$db->prepare("SELECT nom,prenoms,email FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
         echo $cat["nom"]. " " .$cat["prenoms"]." ".$cat["email"];}?> "readonly>    
            </div> 
            </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">matériel souhaité</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control"  id="inputEmail3" name="mate_dem"  value="<?php echo $donnees["mate_dem"] ?>" readonly>
                  </div>
                </div>
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Date_Debut</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control"  id="inputEmail3" name="date_debut"  value="<?php echo $donnees["date_debut"] ?>" readonly>
                  </div>
                </div>
                   <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Date_fin </label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control"  id="inputEmail3" name="date_fin"  value="<?php echo $donnees["date_fin"] ?>" readonly>
                  </div>
                  </div>
                
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">commentaire</label>
                  <div class="col-sm-10">
                <textarea type="text" class="form-control"  id="inputEmail3" name="commentaire"  value="" readonly><?php echo $donnees["commentaire"] ?></textarea> 
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
             <input type="hidden" class="form-control"  id="inputEmail3" name="date_emi" value="<?php echo $donnees["date_emi"] ?>" readonly>
                  </div>
                </div>   
      <?php
    }
}


//Debut methode liste de materiel immobilier
public function liste_mat_immo($filtre_appareil){

  var_dump($filtre_appareil);

  global $db;
  $req=$db->query("SELECT idmateriel ,descriptions, numserie FROM materiels where filtre_materiel='$filtre_appareil' and status=0");

  while($donnees=$req->fetch()){
      ?>
      <option value="<?php echo  $donnees["idmateriel"] ?>"> <?php echo $donnees["descriptions"]."/ ".$donnees["numserie"];?></option>
      
      <?php
  }
}

//Fin methode pour lister les immobilier

//Debut methode liste concatener nom, prenoms et mail
public function listemateriel($filtre_appareil){
 

  global $db;
  $req=$db->query("SELECT idmateriel, descriptions,typemat, marque, numserie FROM materiels where filtre_materiel='$filtre_appareil' and status=0 ");

  while($donnees=$req->fetch()){

    if($filtre_appareil=='immobilier'){
      ?>
      <option value="<?php echo  $donnees["idmateriel"] ?>"> <?php echo $donnees["descriptions"]."/ ".$donnees["numserie"];?></option>
      <?php

    }

    if($filtre_appareil=='ordi'){
      ?>
      <option value="<?php echo  $donnees["idmateriel"] ?>"> <?php echo $donnees["typemat"]."/ ".$donnees["marque"]."/ ".$donnees["numserie"];?></option>
      <?php

    }else{

      ?>
      <option value="<?php echo  $donnees["idmateriel"] ?>"> <?php echo $donnees["typemat"]."/ ".$donnees["marque"]."/ ".$donnees["numserie"];?></option>
      <?php

    }
  
  }
}
//Fin Methode liste concatener nom, prenoms et mail

public function addAttribution($date_tr, $justificatif,$idmateriel, $idprojet, $idattr,$userconect, $matexist){



  /* var_dump($employe, $service, $materiel, $date_debut, $date_fin, $date_emi, $commentaire);
   die();*/
       global $db;
       //verifions si les donnees ne sont pas vides
       if(!empty($justificatif) && !empty($date_tr) && !empty($idprojet) && !empty($idmateriel)){

        

           $req=$db->prepare("UPDATE attribuer SET date_tr=?,justificatif=?, idmateriel=?, idProjet=?, user_connect = ? , status = 1 WHERE id_attr=? ");
           $req->execute(array($date_tr,$justificatif,$idmateriel,$idprojet, $userconect , $idattr));

           $req=$db->prepare("UPDATE materiels SET status= 0 WHERE idmateriel = ? ");
           $req->execute(array($matexist));

           $req=$db->prepare("UPDATE materiels SET status= 1 WHERE idmateriel = ? ");
           $req->execute(array($idmateriel));
          
       }
   }

 //Fin methode d'ajout en fonction du type de materiels

//Methode pour afficher la liste des demandes
public function afficheAttribution(){
  global $db;
  $req=$db->query("SELECT id_attr,filtre_dem, empl_conserner, services, mate_dem, date_debut, date_fin, date_emi, commentaire, idProjet,idmateriel ,justificatif,date_tr FROM attribuer where status=1 and existe='oui' order by date_tr desc");
  while($donnees=$req->fetch()){
      ?>
         <tr>
         <td>
     <?php $reqcat=$db->prepare("SELECT nom,email FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
     echo $cat["nom"]. " " .$cat["email"];}?> 
     </td>

     <td>
     <?php $reqcat=$db->prepare("SELECT nom FROM projet WHERE idProjet = ?");
     $reqcat->execute(array($donnees["idProjet"]));
     while($cat=$reqcat->fetch()){
     echo $cat["nom"];}?> 
     </td>
     <td>
     <?php $reqcat=$db->prepare("SELECT  marque, numserie FROM materiels WHERE idmateriel =?"); $reqcat->execute(array($donnees["idmateriel"])); while($cat=$reqcat->fetch()){
     echo $cat["marque"]."/ ".$cat["numserie"];}?> 
     </td>

     <td>
     <?php echo $donnees["justificatif"] ?>
     </td>
     <td>
     <?php $date=date_create($donnees['date_tr']); echo date_format($date,'Y/m/d');?>
     </td>
      <td>
      <b class="text-success"> Attribué</b> 
      </td>
      <td>
      <button onclick="return confirm('voulez vous Modifier?')" type="submit" name="attribuer" class="btn btn-info"> <i class="glyphicon glyphicon-ok"></i> <a href="gestion_attribution.php?dem=<?php echo $donnees["id_attr"]?>&&filtre_appareil=<?php echo $donnees["filtre_dem"]?>&&cmat=<?php echo $donnees["idmateriel"]?>">MODIFIER<a></button>
      </td>
      <td>
      <a href="gestion_demandeurs.php?equip&&des=<?php echo $donnees["idmateriel"]?>" onclick="return confirm('voulez vous Désattribuer?')" type="submit" name="attribuer" class="btn btn-danger"> <i class="glyphicon glyphicon-ok"></i> Désattribué</a>
      </td>
        </tr>      
       <?php
  }
}
//Fin creation de methode pour afficher des donnees

//Affiche attribution a l'accueil
public function afficheAttributionAccueil(){
  global $db;
  $req=$db->query("SELECT id_attr,filtre_dem, empl_conserner, services, mate_dem, date_debut, date_fin, date_emi, commentaire, idProjet,idmateriel ,justificatif, date_tr FROM attribuer where status=1 and existe='oui' order by date_tr desc");
  while($donnees=$req->fetch()){
      ?>
         <tr>
         <td>
     <?php $reqcat=$db->prepare("SELECT nom,email FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
     echo $cat["nom"]. " " .$cat["email"];}?> 
     </td>

     <td>
     
     <?php $reqcat=$db->prepare("SELECT nom FROM projet WHERE idProjet = ?");
     $reqcat->execute(array($donnees["idProjet"]));
     while($cat=$reqcat->fetch()){
     echo $cat["nom"];}?>
     </td>
     <td>
     <?php $reqcat=$db->prepare("SELECT  marque, numserie FROM materiels WHERE idmateriel =?"); $reqcat->execute(array($donnees["idmateriel"])); while($cat=$reqcat->fetch()){
     echo $cat["marque"]."/ ".$cat["numserie"];}?>
     </td>

     <td>
      <?php echo $donnees["justificatif"] ?>
     </td>
     <td>
     <?php $date=date_create($donnees['date_tr']); echo date_format($date,'Y/m/d');?>
     </td>
      
        </tr>      
       <?php
  }
}
//Fin 

//Debut methode pour desacttribuer une machine a un utilisateur
public function desattribution($getid){
  global $db;
  $reqt=$db->prepare("UPDATE attribuer SET status=3 WHERE idmateriel = ? ");
  $reqt->execute(array($getid));

  $req=$db->prepare("UPDATE materiels SET status=0 WHERE idmateriel = ? ");
  $req->execute(array($getid));

 
}
//Fin methode pour desactribuer un emachine a un utlisateur



}

//Important Dans la realisation des permissions
/*******
 * ***
 */
class gestion_permissions{

  public function verification ($email,$password){

    //$hash = sha1($pwd);
    $error= array();	

    //var_dump($hash);


     global $db;

     

     $query = $db-> prepare("SELECT * FROM employe 
     WHERE email ='$email' and mot_passe ='$password'");
     $query->execute();
     $result = $query->rowCount();

       $nbresults = $query->fetch(PDO::FETCH_ASSOC);

         if ($result==0) {
         
         $error['1']="<center><div class='alert alert-danger'>
                 <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                 <strong>L'utilisateur n'êxiste pas ! </strong>
               </div></center>";

               echo $error['1'];

       

     }else{

       if ($nbresults["active"]==0) {

         $error['2']="<center><div class='alert alert-danger'>
                 <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                 <strong>Ce compte n'est plus actif</strong>
               </div></center>";

               echo $error['2'];

       }else{

         
         $_SESSION['idEmploye'] = $nbresults["idEmploye"];			  		
         $_SESSION['username'] = $nbresults["nom"];			  					  		
         $_SESSION['email'] = $nbresults["email"];
         $_SESSION['role'] = $nbresults["roles"];

         header('location:acceuil');

       

         /*$dir=$_SESSION['dossier'];

         header("location:$dir");*/

         //echo "<script> window.location = 'root/dashbord'</script>";




       }

       
     }

 }

  
}

class accueil{

  //Afficher super dynamique
  public function profildata($identy){
    global $db;
    $req=$db->query("SELECT * FROM employe WHERE idEmploye=$identy");
    while($donnees=$req->fetch()){
      ?>
      <h3 class="dropdown-item-title" style="color: white;">

     <?php echo  $donnees['nom'] ;?> </a>

  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
  </h3>
  <p class="text-sm" style="color: white;"> <?php echo  $donnees['email'] ;?></p>

      <?php
    }
  }
  //Fin Methode Affichage dynamique
  
  //Methode pour afficher la liste des demandes
public function mat_specifique($idsession){
  global $db;
  $req=$db->query("SELECT id_attr, idProjet,idmateriel, empl_conserner ,justificatif,date_tr FROM attribuer where status=1 and existe='oui' and empl_conserner=$idsession  order by date_tr desc");
  while($donnees=$req->fetch()){
      ?>
         <tr>
     <td>
     
     <?php $reqcat=$db->prepare("SELECT nom FROM projet WHERE idProjet = ?");
     $reqcat->execute(array($donnees["idProjet"]));
     while($cat=$reqcat->fetch()){
     echo $cat["nom"];}?>
     </td>
     <td>
     <?php $reqcat=$db->prepare("SELECT typemat, marque, numserie FROM materiels WHERE idmateriel =?"); $reqcat->execute(array($donnees["idmateriel"])); while($cat=$reqcat->fetch()){
     echo  $cat["typemat"]." / ".$cat["marque"]." /  ".$cat["numserie"];}?> 
     </td>

     <td>
     <?php echo $donnees["justificatif"] ?>
     </td>
     <td>
     <?php $date=date_create($donnees['date_tr']); echo date_format($date,'Y/m/d');?>
     </td>
      </tr>      
       <?php
  }
}

//Fin creation de methode pour afficher des donnees
public function liststock(){
  global $db;
  $req=$db->query("SELECT typemat, marque, numserie,model,processeur FROM materiels where  status=0");

  while($donnees=$req->fetch()){
    ?>
   <tr>
                 <td>
                   <?php echo $donnees["typemat"] ?>  

                  </td>
                  <td>  <?php echo $donnees["marque"] ?></td>
                  <td>
                  <?php echo $donnees["numserie"] ?>
                  </td>
                  <td>
                  <?php echo $donnees["model"] ?>
                  </td>
                  <td>
                  <?php echo $donnees["processeur"] ?>
                  </td>
                  
    <?php
  }
}





public function total_ordi(){
  global $db;
  $req=$db->query(" SELECT count(idmateriel) as T_ordi FROM materiels WHERE filtre_materiel='ORDI' AND status=0");
  $data=$req->fetch();
  echo $data["T_ordi"];

}

public function total_phone(){
  global $db;
  $req=$db->query(" SELECT count(idmateriel) as T_phone FROM materiels WHERE filtre_materiel='PHONE' AND status=0");
  $data=$req->fetch();
  echo $data["T_phone"];
  

}

public function total_imprimante(){
  global $db;
  $req=$db->query(" SELECT count(idmateriel) as T_iprim FROM materiels WHERE filtre_materiel='IMPRIMANTE' AND status=0");
  $data=$req->fetch();
  echo $data["T_iprim"];

}
public function total_immo(){
  global $db;
  $req=$db->query(" SELECT count(idmateriel) as T_immo FROM materiels WHERE filtre_materiel='IMMOBILIER' AND status=0");
  $data=$req->fetch();
  echo $data["T_immo"];

}

public function total_perso(){
  global $db;
  $req=$db->query(" SELECT count(	idEmploye) as T_empl FROM employe WHERE status=0");
  $total=$req->fetch();

  echo $total["T_empl"];

}

public function total_femme(){
  global $db;
  $req=$db->query(" SELECT count(	idEmploye) as T_empl FROM employe WHERE status=0");
  $total=$req->fetch();

  $reqf=$db->query(" SELECT count(idEmploye) as T_femme FROM employe WHERE sexe='Femme' AND status=0 ");
  $nbr_f=$reqf->fetch();
  $resultat=($nbr_f["T_femme"] * 100) / $total["T_empl"];
 echo round($resultat,2);
  

}

//Nbre total de femme
public function nbr_femme(){
  global $db;
  $req=$db->query(" SELECT count(	idEmploye) as T_femme FROM employe WHERE sexe='Femme' AND status=0");
  $total=$req->fetch();
  echo $total["T_femme"];
  

}
//Nbre total d'homme
public function nbr_homme(){
  global $db;
  $req=$db->query(" SELECT count(	idEmploye) as T_homme FROM employe WHERE sexe='Homme' AND status=0 ");
  $total=$req->fetch();
 echo $total["T_homme"];
  

}

public function total_homme(){
  global $db;
  $req=$db->query(" SELECT count(	idEmploye) as T_empl FROM employe WHERE status=0");
  $total=$req->fetch();

  $reqh=$db->query(" SELECT count(idEmploye) as T_homme FROM employe WHERE sexe='Homme' AND status=0 ");
  $nbr_h=$reqh->fetch();
  $resultat=($nbr_h["T_homme"] * 100) / $total["T_empl"];
  echo round($resultat,2);
  
}
public function mat_stocck(){
  global $db;
  $req=$db->query(" SELECT count(idmateriel) as T_stock FROM materiels WHERE status=0");
  $data=$req->fetch();
  echo $data["T_stock"];
  

}

public function ordi_attr(){
  global $db;
  $req_all=$db->query("SELECT COUNT(id_attr) as mat_all FROM attribuer WHERE status=1");
  $total1=$req_all->fetch();
  $req=$db->query("SELECT COUNT(id_attr) as ordi_att FROM attribuer WHERE filtre_dem='ordi' AND status=1");
  $nombre1=$req->fetch();
  $resultat1=($nombre1["ordi_att"] * 100) / $total1["mat_all"];
 echo round($resultat1,2);
  

}
public function immo_attr(){
  global $db;
  $req_all=$db->query("SELECT COUNT(id_attr) as mat_immo FROM attribuer WHERE status=1");
  $total2=$req_all->fetch();
  $req=$db->query("SELECT COUNT(id_attr) as immo_att FROM attribuer WHERE filtre_dem='immobilier' AND status=1");
  $nombre2=$req->fetch();
  $resultat2=($nombre2["immo_att"] * 100) / $total2["mat_immo"];
 echo round($resultat2,2);

}

public function phone_attr(){
  global $db;
  $req_all=$db->query("SELECT COUNT(id_attr) as mat_all FROM attribuer WHERE status=1");
  $total2=$req_all->fetch();
  $req=$db->query("SELECT COUNT(id_attr) as phone_att FROM attribuer WHERE filtre_dem='phone' AND status=1");
  $nombre2=$req->fetch();
  $resultat2=($nombre2["phone_att"] * 100) / $total2["mat_all"];
 echo round($resultat2,2);

}
public function imprim_attr(){
    global $db;
    $req_all=$db->query("SELECT COUNT(id_attr) as mat_all FROM attribuer WHERE status=1");
    $total3=$req_all->fetch();
    $req=$db->query("SELECT COUNT(id_attr) as iprim_att FROM attribuer WHERE filtre_dem='imprimante' AND status=1");
    $nombre3=$req->fetch();
    $resultat3=($nombre3["iprim_att"] * 100) / $total3["mat_all"];
    echo round($resultat3,2);
   }

   //Methode simple pour les contacts
   public function liste_contact(){
    global $db;
    $req=$db->query("SELECT * FROM employe WHERE status=0 ORDER BY  date_ajout DESC");
    while($donnees=$req->fetch()){
        ?>
            <tr>
                 <td>
                   <?php echo $donnees["1"] ?>  

                  </td>
                  <td>  <?php echo $donnees["2"] ?></td>
                  <td>
                  <?php echo $donnees["3"] ?>
                  </td>
                  <td>
                  <?php echo $donnees["4"] ?>
                  </td>
                  <td>
                  <?php echo $donnees["5"] ?>
                  </td>
                  <td>
                  <?php
                       $redt=$db->prepare("SELECT intitule FROM services WHERE idService=?");
                       $redt->execute(array($donnees["12"]));

                       while($data=$redt->fetch()){
                         echo $data["intitule"];
           
                        }
                        ?>
                      </td>
                  
                  <td>
                    
                    <?php
                       $redt=$db->prepare("SELECT ville FROM site WHERE id_site=?");
                       $redt->execute(array($donnees["14"]));

                       while($data=$redt->fetch()){
                         echo $data["ville"];
           
                        }
                        ?> 
                    </td>
                  
         <?php


    }


    }
   //Fin methode des contacts

   //Petite metode pour afficher les phptos de profil
   public function aff_photo($idsession){
     global $db;
     $req=$db->prepare("SELECT photo FROM employe WHERE idEmploye=?");
     $req->execute(array($idsession));
     $donnees=$req->fetch();
     echo $donnees["photo"];
   }
   //Fin Pettite methode pour afficher les photos de profils

   //Methode pour afficher le profil de l'utilisateur
   public function profil($idemployer){
     global $db;
     $req=$db->query("SELECT nom, prenoms, fonction, email, contact, sexe, idService, roles, mot_passe, id_site, photo  FROM employe WHERE idEmploye=$idemployer");
     while($donnees=$req->fetch()){
       ?>
        <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nom </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control col-sm-6" id="inputEmail3"  placeholder="nom" name="nom" value="<?php echo $donnees["nom"] ?>"readonly >
                    </div>
                    
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Prénoms </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control col-sm-6" id="inputEmail3" placeholder="prénoms" name="prenoms"  value="<?php echo $donnees["prenoms"] ?>"readonly >
                    </div>
                   
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Fonction</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control col-sm-6"  id="inputEmail3" placeholder="fonction" name="fonction"  value="<?php echo $donnees["fonction"] ?>"readonly >
                    </div>
                    
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">email </label>
                    <div class="col-sm-6">
                      <input type="email" class="form-control col-sm-6"  id="inputEmail3" name="email" placeholder="exemple@"  value="<?php echo $donnees["email"] ?>" readonly >
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Contact </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control col-sm-6"  id="inputEmail3" name="contact" placeholder="+225 08720431" maxlength="14"  value="<?php echo $donnees["contact"] ?>" readonly >
                    </div>
                   
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sexe </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control col-sm-6" id="inputEmail3"  placeholder="nom" name="nom"  value="<?php echo $donnees["sexe"] ?>" readonly >
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Service </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control col-sm-6" id="inputEmail3"  placeholder="service" name="service"  value="<?php
                      $redt=$db->prepare("SELECT intitule FROM services WHERE idService=?");
                      $redt->execute(array($donnees["idService"]));
                      while($data=$redt->fetch()){
                        echo $data["intitule"];
                       } 
                      ?>" readonly >
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Site </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control col-sm-6" id="inputEmail3"  placeholder="site" name="site"  value="<?php
                      $redt=$db->prepare("SELECT ville FROM site WHERE id_site=?");
                      $redt->execute(array($donnees["id_site"]));
                      while($data=$redt->fetch()){
                        echo $data["ville"];
                       }  
                      ?>" readonly >
                    </div>
                    
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <input type="hidden" value="<?php echo date('yy/m/d') ?>" class="form-control" id="inputEmail3" placeholder="prénoms" name="date_ajout" readonly >
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> MOT DE PASSE </label>
                    <div class="col-sm-4">
                      <input type="text"  class="form-control"  id="pwdaction" name="code"  readonly   value="<?php echo $donnees["mot_passe"] ?>">
                    </div>
                   
                  </div>
                  <style>
     input[type]{
       border:none;
       background-color:transparent;
       outline:none;
     }
   </style>
       <?php
       
     }

   }
   //Fin methode pour afficher le profil de l'utilisateur

   //Methode pour modifier les donnees de l'utilisateur
   public function profil_upd($idemployer){
    global $db;
    $req=$db->query("SELECT nom, prenoms, fonction, email, contact, sexe, idService, roles, mot_passe, id_site, photo  FROM employe WHERE idEmploye=$idemployer");
    while($donnees=$req->fetch()){
      ?>
      <form class="form-horizontal" method="post">
       <div class="form-group row">
                   <label for="inputEmail3" class="col-sm-2 col-form-label">Nom </label>
                   <div class="col-sm-6">
                     <input type="text" class="form-control col-sm-6" id="inputEmail3"  placeholder="nom" name="nom" value="<?php echo $donnees["nom"] ?>" >
                   </div>
                   
                 </div>

                  <div class="form-group row">
                   <label for="inputEmail3" class="col-sm-2 col-form-label">Prénoms </label>
                   <div class="col-sm-6">
                     <input type="text" class="form-control col-sm-6" id="inputEmail3" placeholder="prénoms" name="prenoms"  value="<?php echo $donnees["prenoms"] ?>" >
                   </div>
                  
                 </div>
                 <div class="form-group row">
                   <label for="inputPassword3" class="col-sm-2 col-form-label">Fonction</label>
                   <div class="col-sm-6">
                     <input type="text" class="form-control col-sm-6"  id="inputEmail3" placeholder="fonction" name="fonction"  value="<?php echo $donnees["fonction"] ?>" >
                   </div>
                   
                 </div>

                 <div class="form-group row">
                   <label for="inputEmail3" class="col-sm-2 col-form-label">email </label>
                   <div class="col-sm-6">
                     <input type="email" class="form-control col-sm-6"  id="inputEmail3" name="email" placeholder="exemple@"  value="<?php echo $donnees["email"] ?>"  >
                   </div>
                  
                 </div>
                 <div class="form-group row">
                   <label for="inputEmail3" class="col-sm-2 col-form-label">Contact </label>
                   <div class="col-sm-6">
                     <input type="text" class="form-control col-sm-6"  id="inputEmail3" name="contact" placeholder="+225 08720431" maxlength="14"  value="<?php echo $donnees["contact"] ?>" >
                   </div>
                   
                 </div>
                 <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Sexe</label>
                    <div class="col-sm-3">
                      <select class="custom-select" name="sexe" required="">

                          <option value="">- FIRE UN CHOIX- </option>
                          <option>Femme</option>
                          <option>Homme</option>
                       
                        </select>
                      
                    </div> 
                    
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Service</label>
                    <div class="col-sm-3">
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sites</label>
                    <div class="col-sm-3">
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
                   <div class="col-sm-6">
                     <input type="hidden" value="<?php echo date('yy/m/d') ?>" class="form-control" id="inputEmail3" placeholder="prénoms" name="date_ajout" readonly >
                   </div>
                 </div>
                 

                 <div class="form-group row">
                   <label for="inputEmail3" class="col-sm-2 col-form-label"> MOT DE PASSE </label>
                   <div class="col-sm-3">
                     <input type="text"  class="form-control"  id="pwdaction" name="code" placeholder="Generer un mot de pass" value="<?php echo $donnees["mot_passe"] ?>">
                   </div>
                   
                 </div>
      </form>
                
      <?php
      
    }

  }
  //Fin methode pour modifier les donnees de l'utilisateur

  //Methode pour modifier les données du user
  public function mod_profil_user($nom, $pren, $fonc, $mail, $contact, $sexe, $pwd, $service, $site, $getid){
    global $db;
    $req=$db->prepare("UPDATE employe SET nom=?, prenoms=?, fonction=?, email=?, contact=?, sexe=?, mot_passe=?, idService=?, id_site=? WHERE idEmploye=? ");
    $req->execute(array($nom, $pren, $fonc, $mail, $contact, $sexe, $pwd, $service, $site, $getid)); 
  }
  //Fin methode pour modifier les données du user
  
}

#     //\    ||     ||
#    //  \   ||     ||
#   //----\  ||-----||     
#  //      \ ||     ||
# //        \||     ||
#

class ville{
  //Debut methode pour ajouter des donnees dans la base de donnees
  public function addville($ville, $dateEn){
    global $db;
    if(!empty($ville)){
      $req=$db->prepare("INSERT INTO site (ville,dateEn) VALUES(?,?)");
      $req->execute(array($ville,$dateEn));
    }
 
  }
  //Fin Methode d'ajout

  //Debut methode pour afficher des donnes donnees
  public function afficheville(){
    global $db;
    $req=$db->query("SELECT * FROM site order by dateEn desc");
    while($donnees=$req->fetch()){
      ?>
      <tr>
          
          <td>
          <?php echo $donnees["1"] ?>
          </td>
          <td>
            <input type="hidden" value="<?php echo $donnees["0"] ?>" name="delca" readonly>
              <button type="submit" name="enregister" class="btn btn-info"> <i class="fas fa-pencil-alt"></i> <a href="modifier_sites.php?sit=<?php echo $donnees["0"]?>">Modifier</a></button>    
          </td>
          <td>
          
          <a onclick="return confirm('voulez vous supprimer?')" href="gestion_sites.php?sit=<?php echo $donnees["0"] ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
          </td>
          
        </tr>
      <?php
    }

  }

  //Fin methode pour afficher des donnees

  //Debut methode pour supprimer des categories
  public function supprimerVille($idcat){
    global $db;
    $req_del=$db->prepare("DELETE FROM site WHERE id_site=?");
    $req_del->execute(array($idcat));


  }
  //Fin Methode pour supprimer des categories

  //Debut methode pour la modification des donnees
    //Methode pour afficher le formulaire de modification
    public function affmodVille($getid_cat){
      global $db;
      $req=$db->prepare("SELECT * FROM site WHERE id_site=?");
      $req->execute(array($getid_cat));
      while($donnees=$req->fetch()){
        ?>
          <label for="inputEmail3" class="col-sm-2 col-form-label">Ville </label>
          <div class="col-sm-10">
            <input type="hidden" value="<?php echo $donnees["0"] ?>" name="sup" readonly>
            <input type="text" class="form-control" id="inputEmail3" placeholder="" name="ville" value="<?php echo $donnees["1"] ?>">
          </div>
        <?php
      }


    }

  public function modifierVille($ville, $idycat){
    global $db;
    $req=$db->prepare("UPDATE site SET ville=? WHERE id_site=?");
    $req->execute(array($ville, $idycat));
  }
  //Fin methode pour modification des donnees 
}
 
#     //\    ||     ||
#    //  \   ||     ||
#   //----\  ||-----||     
#  //      \ ||     ||
# //        \||     ||
#
class affectation{
  public function addaffect($filtre, $empl, $mat, $proj, $justi, $date_t, $status){
    global $db;
    if(!empty($filtre)&& !empty($empl)&& !empty($mat)&& !empty($proj) && !empty($date_t)&& !empty($status)){
      $req=$db->prepare("INSERT INTO attribuer(filtre_dem, empl_conserner, date_tr, justificatif, idProjet, idmateriel, status) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $req->execute(array($filtre, $empl, $date_tr, $justi, $proj, $mat, $status));

    $reqm=$db->prepare("UPDATE materiels SET status= 1 WHERE idmateriel = ? ");
    $reqm->execute(array($mat));


    }
    

  }
  //Selection 

  //Debut Methode pour afficher des donnees specifiques aux ordinateurs
  public function af_materiel_aff($action){
    global $db;

      //REQUETTE POUR AFFICHER LES DONNEES SPECIFIQUES AUX ORDINATEURS
      $reqordi=$db->prepare("SELECT * FROM materiels WHERE filtre_materiel=? order by dateEn desc");
      $reqordi->execute(array($action));
      while($donnees=$reqordi->fetch()) {
        ?>
       <tr>
         <td>
           <?php echo $donnees["filtre_materiel"] ?>
         <td>
           <?php echo $donnees["numserie"] ?>
          </td>
         <td>
         
         <?php echo $donnees["marque"] ?>
         </td>
         <td>
         
         <?php echo $donnees["model"] ?>
         </td>
         <td>
         <?php $reqcat=$db->prepare("SELECT libelle FROM categorie WHERE idcategorie=?"); $reqcat->execute(array($donnees["idcategorie"])); while($cat=$reqcat->fetch()){

         echo $cat["libelle"];}?> 

         </td>
         <td>
         
         <?php $reqprojet=$db->prepare("SELECT nom FROM projet WHERE idProjet=?"); $reqprojet->execute(array($donnees["idProjet"])); while($pro=$reqprojet->fetch()){
         echo $pro["nom"];}?>
         </td>
         <td>
         
         <?php echo $donnees["typemat"] ?>
         </td>
         <td>
         
         <?php echo $donnees["processeur"] ?>
         </td>
         <td>
             <input type="hidden" value="<?php echo $donnees["0"] ?>" name="sup">
             <button type="submit" name="modifier" class="btn btn-info"> <i class="fas fa-pencil-alt"></i> <a href="modifier_materiels.php?action=<?php echo $action ?>&&materiel=<?php echo $donnees["0"]?>">Modifier<a></button>
           </td>
           <td>
           <a onclick="return confirm('voulez vous supprimer?')" href="gestion_materiels.php?action=<?php echo $action ?>&&materiel=<?php echo $donnees["0"]?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
           </td>
         
       </tr>
      <?php

       
      }

      
  }
  //Fin methode pour afficher les donnees  specifiques aux ordinateurs

  //Methode affichege dynamique
  //Methode pour afficher la liste des demandes
public function aff_affectaion($getid){
  global $db;
  $req=$db->query("SELECT id_attr, filtre_dem, empl_conserner, date_emi, commentaire, idProjet,idmateriel ,justificatif,date_tr FROM attribuer where existe='oui'and status=1 and filtre_dem='$getid' order by date_tr desc");
  while($donnees=$req->fetch()){
      ?>
         <tr>
         <td>
         <?php echo $donnees["filtre_dem"] ?>
         </td>
         <td>
     <?php $reqcat=$db->prepare("SELECT nom,email FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
     echo $cat["nom"]. " " .$cat["email"];}?> 
     </td>

     <td>
     <?php $reqcat=$db->prepare("SELECT nom FROM projet WHERE idProjet = ?");
     $reqcat->execute(array($donnees["idProjet"]));
     while($cat=$reqcat->fetch()){
     echo $cat["nom"];}?> 
     </td>
     <td>
     <?php $reqcat=$db->prepare("SELECT  marque, numserie FROM materiels WHERE idmateriel =?"); $reqcat->execute(array($donnees["idmateriel"])); while($cat=$reqcat->fetch()){
     echo $cat["marque"]."/ ".$cat["numserie"];}?> 
     </td>

     <td>
     <?php echo $donnees["justificatif"] ?>
     </td>
     <td>
     <?php $date=date_create($donnees['date_tr']); echo date_format($date,'d/m/Y');?>
     </td>
      <td>
      <b class="text-success"> Attribué</b> 
      </td>
     
      <td>
      <a href="gestion_demandeurs.php?equip&&des=<?php echo $donnees["idmateriel"]?>" onclick="return confirm('voulez vous Désattribuer?')" type="submit" name="attribuer" class="btn btn-danger"> <i class="glyphicon glyphicon-ok"></i> Désattribué</a>
      </td>
        </tr>      
       <?php
  }
}
//Fin creation de methode pour afficher des donnees
  //Fin Methode affichage dynamique



}
class rapport{
  public function rapportAttribution(){
    global $db;

    $reqaf=$db->query("SELECT empl_conserner,idProjet,idmateriel FROM attribuer where existe='oui'and status=1 ");
    while($donnees=$reqaf->fetch()){
      ?>
       <tr>
         
         <td>
           
         <?php $reqcat=$db->prepare("SELECT nom,prenoms FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
     echo $cat["nom"]. " " .$cat["prenoms"];}?> 
          </td>
          <td>
           
         <?php $reqcat=$db->prepare("SELECT email FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); while($cat=$reqcat->fetch()){
     echo $cat["email"];}?> 
          </td>
          <td>
           
           <?php $reqcat=$db->prepare("SELECT id_site FROM employe WHERE idEmploye=?"); $reqcat->execute(array($donnees["empl_conserner"])); 
           while($cat=$reqcat->fetch()){
            $reqcat1=$db->query("SELECT ville FROM site WHERE id_site=$cat[id_site]");
            $dt=$reqcat1->fetch();
            echo $dt["ville"];

            //echo $cat["id_site"];
       }
       ?>


            </td>

         <td>
          <?php $reqcat=$db->prepare("SELECT nom FROM projet WHERE idProjet = ?");
     $reqcat->execute(array($donnees["idProjet"]));
     while($cat=$reqcat->fetch()){
     echo $cat["nom"];}?>
         </td>

         <td>

         <?php $reqcat=$db->prepare("SELECT  marque, numserie FROM materiels WHERE idmateriel =?"); $reqcat->execute(array($donnees["idmateriel"])); while($cat=$reqcat->fetch()){
     echo $cat["marque"]."/ ".$cat["numserie"];}?>
         </td>


         
       </tr>
      <?php

    }



}

}
class direction{
  //Debut methode pour ajouter des donnees dans la base de donnees
  public function add_direction($nom,$dateEn){
    global $db;
    if(!empty($nom)){
      $req=$db->prepare("INSERT INTO direction(nom_direction,dateEn) VALUES(?,?)");
      $req->execute(array($nom,$dateEn));
    }
 
  }
  //Fin Methode d'ajout

  //Debut methode pour afficher des donnes donnees
  public function affiche_dir(){
    global $db;
    $req=$db->query("SELECT * FROM direction order by dateEn desc");
    while($donnees=$req->fetch()){
      ?>
      <tr>
          
          <td>
          <?php echo $donnees["1"] ?>
          </td>
          <td>
            <input type="hidden" value="<?php echo $donnees["0"] ?>" name="delca" readonly>
              <button type="submit" name="enregister" class="btn btn-info"> <i class="fas fa-pencil-alt"></i> <a href="modifier_direction.php?cat=<?php echo $donnees["0"]?>">Modifier</a></button>   
          </td>
          <td>
          
          <a onclick="return confirm('voulez vous supprimer?')" href="gestion_direction.php?cat=<?php echo $donnees["0"] ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Supprimer</a>
          </td>
          
        </tr>
      <?php
    }

  }

  //Fin methode pour afficher des donnees

  //Debut methode pour supprimer des categories
  public function supprimer_dir($id_dir){
    global $db;
    $req_del=$db->prepare("DELETE FROM direction WHERE id_direction=?");
    $req_del->execute(array($id_dir));
  }
  //Fin Methode pour supprimer des categories

  //Debut methode pour la modification des donnees
    //Methode pour afficher le formulaire de modification
    public function affmod_dir($getid_cat){
      global $db;
      $req=$db->prepare("SELECT * FROM direction WHERE id_direction=?");
      $req->execute(array($getid_cat));
      while($donnees=$req->fetch()){
        ?>
          <label for="inputEmail3" class="col-sm-2 col-form-label">Nom de la direction </label>
          <div class="col-sm-10">
            <input type="hidden" value="<?php echo $donnees["0"] ?>" name="sup" readonly>
            <input type="text" class="form-control" id="inputEmail3" placeholder="nom de la direction" name="nom" value="<?php echo $donnees["1"] ?>">
          </div>
        <?php
      }


    }

  public function modifier_dir($nom, $idycat){
    global $db;
    $req=$db->prepare("UPDATE direction SET nom_direction=? WHERE id_direction=?");
    $req->execute(array($nom, $idycat));
  }
  //Fin methode pour modification des donnees 

}





?>

