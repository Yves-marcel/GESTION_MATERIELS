<?php 

	include ("db_connect.php");
	 $dossier= $_SESSION['dossier'];
	 $id= $_SESSION['id'];			  		
	 $username= $_SESSION['username'];
	 $role= $_SESSION['role'];

	 /**
	* 
	*/     
	class app 
	{
		public function login ($email,$pwd){

			 $hash = sha1($pwd);
			 $error= array();	

			  global $db;
			  $query = $db-> prepare("SELECT * FROM login 
			  WHERE email ='$email' and pwd ='$hash'");
			  $query->execute();
			  $result = $query->rowCount();

   			 $nbresults = $query->fetch(PDO::FETCH_ASSOC);

			  if ($result==0) {
			  		
			  		$error['1']="<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                    <strong>L'utilisateur n'êxiste pas ;  !!! </strong>
                  </div>";

                  echo $error['1'];
			  }else{

			  	if ($nbresults["active"]==0) {

			  		$error['2']="<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                    <strong>Ce compte n'est plus actif</strong>
                  </div>";

                  echo $error['2'];

			  	}else{
			  		$_SESSION['dossier'] = $nbresults["dossier"];			  		
			  		$_SESSION['username'] = $nbresults["username"];			  					  		
			  		$_SESSION['id'] = $nbresults["id"];
			  		$_SESSION['role'] = $nbresults["role"];
			  		/*$dir=$_SESSION['dossier'];

			  		header("location:$dir");*/

			  		echo "<script> window.location = 'root/dashbord'</script>";
			  	}
			  }
		}

		public function auto_code(){

			$type="RE";
			global $db;

			  $mois=date("m");
			  $annee=date("Y");

			  $max = $db-> prepare("SELECT max(reservation.id) as max_id FROM reservation ");
			  $max->execute();

   			 $result = $max->fetch(PDO::FETCH_ASSOC);

   			 if ($result[max_id]<=1000) {

   			 	$code = "$result[max_id]";
   			 	# code...
   			 }

   			 if ($result[max_id]<100) {

   			 	$code = "0$result[max_id]";
   			 	# code...
   			 }

   			 if ($result[max_id]<10) {

   			 	$code = "00$result[max_id]";
   			 	# code...
   			 }


   			echo "<input readonly name='code' class='form-control' type='text' value='$type$annee$code'><br>";
			


		}}	



	/**
	* 
	*/
	class utilisateurs{

		
			public function creer($role,$pseudo,$mdp,$email,$date_ajout,$date_fin,$username)
			
			{
			
			      global $db;

			      		$error = array();

			      		 $verif_email = $db-> prepare("SELECT email  FROM login where email='$email'");
						 $verif_email->execute();
						 $res_email = $verif_email->rowCount();


						  if ($res_email==1) 

						  {
						  		
						  		$error[1]="<div class='alert alert-danger'>
			                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
			                    <strong>Cette adresse e-mail est déjà utilisée</strong>
			                  </div>";	                  
						  	

						  }

						 $verif_user = $db-> prepare("SELECT email  FROM login where username='$pseudo'");
						 $verif_user->execute();						 
						 $res_user = $verif_user->rowCount();

						   if ($res_user==1)

						    {
						  		

						  		$error[2]="<div class='alert alert-danger'>
			                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
			                    <strong>Ce pseudo est déjà utilisé</strong>
			                  </div>";
		                  					  	

						    }


						 if (empty($error))
						  {
						 		

		   						 $pwd = sha1($mdp);
		   						 $dossier="root";
						  
				                  $b = array(

				                        'role'=> $role,
				                        'pseudo'=> $pseudo,		                        
				                        'pwd'=> $pwd,               
				                        'email'=> $email,
				                        'dossier'=> $dossier,		                        
				                        'date_ajout'=> $date_ajout,
				                        'date_fin'=> $date_fin,		                        
				                        'username'=> $username,				                         


				                    );

					   			$sql = "INSERT into login(role,email,username,pwd,dossier,date_ajout,date_expiration,ajouter_par) values(:role,:email,:pseudo,:pwd,:dossier,:date_ajout,:date_fin,:username)";

					       		$req = $db -> prepare($sql);
					       		$req -> execute($b);



					      		echo "<script> alert('ENREGISTREMENT EFFECTUE AVEC SUCCESS')</script>";

					       		echo "<script> window.location='lister-utilisateurs'</script>";

					                

						 }


			     return $error;
		
			}

			

			public function lister_utilisateurs($param)
			{


			      global $db;

			    
			      $recent = $db-> prepare("SELECT DISTINCT * from login
					WHERE active ='$param'  Order by role asc, username asc");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>
			            	<tr>						
			            			<td ><?php echo "$i"; ?></td>
									<td><?php echo $result['username'] ?></td>

									<td>
										<?php echo 

										$str=$result['pwd'];

                                        $str = substr($str, 0, 1) . '...';

                                        echo "$str";


                                        ?>
                                        	
                                    </td>
									<td><?php echo $result['email'] ?></td>
									<td><?php echo $result['date_expiration'] ?></td>
									<td><?php echo $result['ajouter_par'] ?></td>

									<td>
										<a href="Modifier_user?id=<?php echo($result['id']) ?>"><h6 style="font-size: 11px"> Modifier</h6></a>
										<a href="settings?requette=admin&&id=<?php echo $result['id'] ?>&&name=<?php echo $result['username'] ?>"><h6 style="font-size: 11px;color:green">Password</h6></a><?php 

												if ($param=="1") {

													?>
												
														<a href="lister-utilisateurs?etat=Desactiver&&id=<?php echo $result['id'] ?>"><h6 style="font-size: 11px;color: red"> Désactiver</h6></a>

													<?php 

												}else{

													?>
														<a href="lister-utilisateurs?etat=Activer&&id=<?php echo $result['id'] ?>"><h6 style="font-size: 11px;color: red"> Activer</h6></a>

													<?php 

												}

										 ?>
										
									</td>

														
								</tr>
											
			           <?php

			           $i++;
			          }}

			public function  modifier_utilisateur($email,$role,$date_expiration,$username,$code,$date_jour_type1)
			{


			      global $db;

		                  $b = array(

		                        'code'=> $code,
		                        'email'=> $email,
		                        'role'=> $role,
		                        'date_expiration'=> $date_expiration,
		                        'modifier_par'=> "Modifier/$username/$date_jour_type1",	

		                    );


			            $sql = "UPDATE login set  email=:email,role= :role,date_expiration= :date_expiration,modifier_par=:modifier_par WHERE id= :code";

			            $req = $db -> prepare($sql);
			            $req -> execute($b);





			           echo "<script> alert('MODIFIER AVEC SUCCESS')</script>";

			           echo "<script> window.location='lister-utilisateurs'</script>";
			
			}  


	

			public function  modifier_password($new_password,$username,$code,$date_jour_type1,$role)
			{


			      global $db;

			      	 $pwd = sha1($new_password);

		                  $b = array(

		                        'new_password'=> $pwd,
		                        'code'=> $code,
		                        'modifier_par'=> "Modifier/$username/$date_jour_type1",	

		                    );



			            $sql = "UPDATE login set pwd= :new_password,modifier_par= :modifier_par WHERE id= :code";

			            $req = $db -> prepare($sql);
			            $req -> execute($b);

			           echo "<script> alert('MODIFIER AVEC SUCCESS')</script>";

			           if ($role=="Administrateur") {
			           		
			           		 echo "<script> window.location='lister-utilisateurs'</script>";

			           }else{

			           		 echo "<script> window.location='dashbord'</script>";
			           		 

			           }

			          			
			} 
      


			public function  desactiver_utilisateur($code,$etat,$date_jour_type1,$username)
			{


			      global $db;


					    if ($etat=="Desactiver")

					    {

					    	$action="Desactiver";

		                 	$b = array

		                 	(

		                        'code'=> $code,			                        
		                        'active'=>0,		                       
		                        'modifier_par'=> "$action/$username/$date_jour_type1",	

		                    );
		               
		                	
		                	$sql = "UPDATE login set active=:active,modifier_par=:modifier_par WHERE id= :code";

				            $req = $db -> prepare($sql);
				            $req -> execute($b);


				            echo "<script> alert('COMPTE DESACTIVE AVEC SUCCESS')</script>";

				            echo "<script> window.location='lister-utilisateurs'</script>";

		               	 }

		               	 else

		               	 {

		                	$action="Activer";

		                	 $b = array

		                	 (

		                        'code'=> $code,
		                        'active'=>1,	                       
		                        'modifier_par'=> "$action/$username/$date_jour_type1",	

		                    );


		                	 $sql = "UPDATE login set  active=:active,modifier_par=:modifier_par WHERE id= :code";

				            $req = $db -> prepare($sql);
				            $req -> execute($b);

				           echo "<script> alert('COMPTE RE-ACTIVE AVEC SUCCESS')</script>";

				           echo "<script> window.location='lister-utilisateurs'</script>";


		                }
		    }          


	}


	/**
	* 
	*/
	class actualite 
	{


			public function  creer($type,$titre,$description,$date_ajout,$username)
			
			{
			
			      global $db;

			      		 $max = $db-> prepare("SELECT max(actualite.id) as max_id FROM actualite ");
						 $max->execute();

   						 $result = $max->fetch(PDO::FETCH_ASSOC);

   						  $nom_file="img-actu-$result[max_id]";




			      		if (isset($_FILES['recto']) AND $_FILES['recto']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				                if ($_FILES['recto']['size'] < 90000000000000000000) 

				              {
				                 
				                 
				                  $infoscotation = pathinfo($_FILES['recto']['name']);
				            
				                      $extension_upload = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                      $extensions_autorisees = array('JPG','jpg','png','PNG','PDF','pdf');
				                     
				                     if (in_array($extension_upload, $extensions_autorisees))

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['recto']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['recto']['tmp_name'], "../partage/$nom_file.$extension_upload");

		               				// pour les pochain on faire le update
				               }
				               else{


				               		echo "<script> alert('ERREUR  TAILLE OU L\' EXTENSION DU FICHIER INCORRECT,VOTRE ENREGISTREMENT A ETE ANNULE')</script>";

			               			echo "<script> window.location='ajout_actualites'</script>";


				               }
				          

				          }

				        }

				  
		                  $b = array(

		                        'type'=> $type,
		                        'titre'=> $titre,		                        
		                        'description'=> $description,
		                        'date_ajout'=> $date_ajout,		                        
		                        'username'=> $username,				                         


		                    );



			            $sql = "INSERT into actualite(type,titre,description,date_ajout,username) 
		                         values(:type,:titre,:description,:date_ajout,:username)";

			                $req = $db -> prepare($sql);
			                $req -> execute($b);

			               $dernier_id = $db->lastInsertId(); 


					        $sql = "UPDATE actualite  SET image = '$nom_file.$extension_upload' WHERE id = '$dernier_id'";
 
                   			$update = $db->exec($sql);
			                echo "<script> alert('ENREGISTREMENT EFFECTUE AVEC SUCCESS')</script>";

			                echo "<script> window.location='lister-actualites'</script>";

		
			}

			public function lister_actualite($param){


			      global $db;

			    
			      $recent = $db-> prepare("SELECT DISTINCT * from actualite
					WHERE type ='$param' Order by id desc");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>

			            	<tr>						
			            		<td><img style="width: 180px" src="../partage/<?php echo $result[image] ?>"></td>
														<td><?php echo $result['titre'] ?></td>
														<td><?php echo $result['date_ajout'] ?></td>
														<td><?php echo $result['username'] ?></td>

														<td></td>

														
													</tr>
											
			           <?php


			          }
			}

			public function lister_actualite_home(){


			      global $db;

			    
			      $recent = $db-> prepare("SELECT DISTINCT * from actualite
						 Order by id desc LIMIT 3");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>

			           		<center><img style="width: 80%" src="../partage/<?php echo $result[image] ?>"> <h6><font style="color:black">[Date:<?php echo $result[date_ajout] ?>] - <?php echo $result[titre] ?></font></h6></center>
							
														
							</tr>
											
			           <?php


			          }

			}}



	/**
	* 
	*/
	class pme 
	{


			public function  creer_pme($domaine,$nom,$description,$long,$lat,$date_ajout,$username)
			
			{
			
			      global $db;

			      		 $max = $db-> prepare("SELECT count(pme.id) as max_id FROM pme ");
						 $max->execute();

   						 $result = $max->fetch(PDO::FETCH_ASSOC);

   						


			      		if (isset($_FILES['recto']) AND $_FILES['recto']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				                if ($_FILES['recto']['size'] < 90000000000000000000) 

				              {
				                 
				                 
				                  $infoscotation = pathinfo($_FILES['recto']['name']);
				            
				                      $extension_upload = $infoscotation['extension'];
				                      $nom_ext = $infoscotation['filename'];

				                      $nom_file="$nom_ext.$extension_upload";

				                      $extensions_autorisees = array('JPG','jpg','png','PNG','gif','GIF');
				                     
				                     if (in_array($extension_upload, $extensions_autorisees))

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['recto']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['recto']['tmp_name'], "../partage/$nom_file");

		               				// pour les pochain on faire le update
				               }
				               else{


				               		echo "<script> alert('ERREUR  TAILLE OU L\' EXTENSION DU FICHIER INCORRECT,VOTRE ENREGISTREMENT A ETE ANNULE')</script>";

			               			echo "<script> window.location='ajout_pme'</script>";


				               }
				          

				          }

				        }

				  
		                  $b = array(

		                        'domaine'=> $domaine,
		                        'nom'=> $nom,	
		                        'long'=> $long,	
		                        'lat'=> $lat,		                        
		                        'description'=> $description,
		                        'date_ajout'=> $date_ajout,		                        
		                        'username'=> $username,				                         


		                    );




			            $sql = "INSERT into pme(domaine,nom,description,longitude,latitude,date_ajout,username) 
		                         values(:domaine,:nom,:description,:long,:lat,:date_ajout,:username)";

			                $req = $db -> prepare($sql);
			                $req -> execute($b);

			               $dernier_id = $db->lastInsertId(); 


					        $sql = "UPDATE pme  SET logo = '$nom_file' WHERE id = '$dernier_id'";
 
                   			$update = $db->exec($sql);


			               echo "<script> alert('ENREGISTREMENT EFFECTUE AVEC SUCCESS')</script>";

			               echo "<script> window.location='ajout-pme'</script>";

		
			}

			public function lister_actualite($param){


			      global $db;

			    
			      $recent = $db-> prepare("SELECT DISTINCT * from actualite
					WHERE type ='$param' Order by id desc");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>

			            	<tr>						
			            		<td><img style="width: 180px" src="../partage/<?php echo $result[image] ?>"></td>
														<td><?php echo $result['titre'] ?></td>
														<td><?php echo $result['date_ajout'] ?></td>
														<td><?php echo $result['username'] ?></td>

														<td><a href="">Visualiser</a> </td>

														
													</tr>
											
			           <?php


			          }}

	}



	/**
	* 
	*/
	class projet 
	{


			public function  creer($type,$titre,$description,$date_ajout,$username)
			
			{
			
			      global $db;

			      		 $max = $db-> prepare("SELECT max(projet.id) as max_id FROM projet ");
						 $max->execute();

   						 $result = $max->fetch(PDO::FETCH_ASSOC);

   						  $nom_file="img-projet-$result[max_id]";


			      		if (isset($_FILES['recto']) AND $_FILES['recto']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				                if ($_FILES['recto']['size'] < 90000000000000000000) 

				              {
				                 
				                 
				                  $infoscotation = pathinfo($_FILES['recto']['name']);
				            
				                      $extension_upload = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                      $extensions_autorisees = array('JPG','jpg','png','PNG','PDF','pdf');
				                     
				                     if (in_array($extension_upload, $extensions_autorisees))

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['recto']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['recto']['tmp_name'], "../partage/$nom_file.$extension_upload");

		               				// pour les pochain on faire le update
				               }
				               else{


				               		echo "<script> alert('ERREUR  TAILLE OU L\' EXTENSION DU FICHIER INCORRECT,VOTRE ENREGISTREMENT A ETE ANNULE')</script>";

			               			echo "<script> window.location='ajout_projets'</script>";


				               }
				          

				          }

				        }

				  
		                  $b = array(

		                        'type'=> $type,
		                        'titre'=> $titre,		                        
		                        'description'=> $description,
		                        'date_ajout'=> $date_ajout,		                        
		                        'username'=> $username,				                         


		                    );



			            $sql = "INSERT into projet(type,titre,description,date_ajout,username) 
		                         values(:type,:titre,:description,:date_ajout,:username)";

			                $req = $db -> prepare($sql);
			                $req -> execute($b);

			               $dernier_id = $db->lastInsertId(); 


					        $sql = "UPDATE projet  SET image = '$nom_file.$extension_upload' WHERE id = '$dernier_id'";
 
                   			$update = $db->exec($sql);




			                echo "<script> alert('ENREGISTREMENT EFFECTUE AVEC SUCCESS')</script>";

			                echo "<script> window.location='lister-projets'</script>";

		
			}

			public function lister_projets($param){


			      global $db;

			    
			      $recent = $db-> prepare("SELECT DISTINCT * from projet
					WHERE type ='$param' Order by id desc");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>

			            	<tr>						
			            		<td><img style="width: 180px" src="../partage/<?php echo $result[image] ?>"></td>
														<td><?php echo $result['titre'] ?></td>
														<td><?php echo $result['date_ajout'] ?></td>
														<td><?php echo $result['username'] ?></td>

														<td></td>

														
													</tr>
											
			           <?php


			          }}

			public function lister_projets_home(){


			      global $db;

			    
			      $recent = $db-> prepare("SELECT DISTINCT * from projet Order by id desc LIMIT 1");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>

			           		<center><img style="width: 80%" src="../partage/<?php echo $result[image] ?>"></center>

			           		<h5 style="text-align: center;color: black">[Date :<?php echo "$result[date_ajout]" ?>] - <?php echo "$result[titre]" ?></h5>
											
			           <?php


					}
			}


			public function deroulant_client(){


			      global $db;

			    
			      $menu = $db-> prepare("SELECT DISTINCT client.id , concat(civilite,' ',nom,' ',prenom,' - ',cni) as nom_complet from client Order by nom_complet desc");

			        $menu->execute();

			      	
			      
			         while ($result = $menu->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>
			            	<option value="<?php echo "$result[id]" ?>"><?php echo "$result[nom_complet]" ?></option>
			            				
			           <?php

			          
			          }


			}}


	/**
	* 
	*/
	class presse 
	{


			public function  creer($type,$titre,$description,$date_ajout,$username)
			
			{


			
			      global $db;

			      		 $max = $db-> prepare("SELECT max(presse.id) as max_id FROM presse");
						 $max->execute();

   						 $result = $max->fetch(PDO::FETCH_ASSOC);

   						 $nom_file="img-presse-$result[max_id]";


			      		if (isset($_FILES['recto']) AND $_FILES['recto']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				        

				          	if (!empty($_FILES['recto']['name']))
				          	 {
				          		
				          		 if ($_FILES['recto']['size'] < 90000000000000000000) 

				              	{

				              	
				                  $infoscotation = pathinfo($_FILES['recto']['name']);
				            
				                      $extension_img = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                      $extensions_autorisees = array('GIF','gif','JPG','jpg','png','PNG');
				                     
				                     if (in_array($extension_img, $extensions_autorisees))
				                     	

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['recto']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['recto']['tmp_name'], "../partage/$nom_file.$extension_img");


		               				// pour les pochain on faire le update
					               }
					               else{

					               


					               	echo "<script> alert('ERREUR  TAILLE OU L\' EXTENSION DU FICHIER INCORRECT,VOTRE ENREGISTREMENT A ETE ANNULE')</script>";

				               		echo "<script> window.location='ajout-presse'</script>";


					               }
					          

					         	 }
				          	}

				        }

				        if (isset($_FILES['pdf1']) AND $_FILES['pdf1']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier


				          	if (!empty($_FILES['pdf1']['name'])) {

					           
					                 $titre_pdf1=$_FILES['pdf1']['name'];


					                 
					                 
					                  $infoscotation = pathinfo($_FILES['pdf1']['name']);
					            
					                      $extension_upload = $infoscotation['extension'];
					                      $nom_du_cotation = $infoscotation['filename'];

					                      $extensions_autorisees = array('PDF','pdf');
					                     
					                     if (in_array($extension_upload, $extensions_autorisees))

					                    {
					                      
					                    $liste = explode(".", basename($_FILES['pdf1']['name']));
					                    $extension= $liste[count($liste)-1];
					                    
					                    move_uploaded_file($_FILES['pdf1']['tmp_name'], "../pdf/$titre_pdf1");
					          			}
					           }

				        }

				        if (isset($_FILES['pdf2']) AND $_FILES['pdf2']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier


				          	if (!empty($_FILES['pdf2']['name'])) {

					           
					                 $titre_pdf2=$_FILES['pdf2']['name'];


					                 
					                 
					                  $infoscotation = pathinfo($_FILES['pdf2']['name']);
					            
					                      $extension_upload = $infoscotation['extension'];
					                      $nom_du_cotation = $infoscotation['filename'];

					                      $extensions_autorisees = array('PDF','pdf');
					                     
					                     if (in_array($extension_upload, $extensions_autorisees))

					                    {
					                      
					                    $liste = explode(".", basename($_FILES['pdf2']['name']));
					                    $extension= $liste[count($liste)-1];
					                    
					                    move_uploaded_file($_FILES['pdf2']['tmp_name'], "../pdf/$titre_pdf2");

			               		
					          			}
					           }

				        }


				        if (isset($_FILES['pdf3']) AND $_FILES['pdf3']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier


				          	if (!empty($_FILES['pdf3']['name'])) {

					           
					                 $titre_pdf3=$_FILES['pdf3']['name'];


					                 
					                 
					                  $infoscotation = pathinfo($_FILES['pdf3']['name']);
					            
					                      $extension_upload = $infoscotation['extension'];
					                      $nom_du_cotation = $infoscotation['filename'];

					                      $extensions_autorisees = array('PDF','pdf');
					                     
					                     if (in_array($extension_upload, $extensions_autorisees))

					                    {
					                      
					                    $liste = explode(".", basename($_FILES['pdf3']['name']));
					                    $extension= $liste[count($liste)-1];
					                    
					                    move_uploaded_file($_FILES['pdf3']['tmp_name'], "../pdf/$titre_pdf3");

			               		
					          			}
					           }

				        }

				  
		                  $b = array(

		                        'type'=> $type,
		                        'titre'=> $titre,		                        
		                        'description'=> $description,
		                        'date_ajout'=> $date_ajout,		                        
		                        'username'=> $username,				                         


		                    );



			            $sql = "INSERT into presse(type,titre,description,date_ajout,username) 
		                         values(:type,:titre,:description,:date_ajout,:username)";

			                $req = $db -> prepare($sql);
			                $req -> execute($b);

			               $dernier_id = $db->lastInsertId(); 


			               if (!empty($_FILES['recto']['name'])) {

			               		 $sql = "UPDATE presse  SET image = '$nom_file.$extension_img',pdf1 = '$titre_pdf1',pdf2 = '$titre_pdf2',pdf3= '$titre_pdf3' WHERE id = '$dernier_id'";

			               }else{

			               		 $sql = "UPDATE presse  SET image = 'armoirie.png',pdf1 = '$titre_pdf1',pdf2 = '$titre_pdf2',pdf3= '$titre_pdf3' WHERE id = '$dernier_id'";
			               }


					       
 
                   			$update = $db->exec($sql);




			                echo "<script> alert('ENREGISTREMENT EFFECTUE AVEC SUCCESS')</script>";

			               //echo "<script> window.location='lister-presses'</script>";

		
			}

			public function lister_presse($param){


			      global $db;

			    
			      $recent = $db-> prepare("SELECT DISTINCT * from presse
					WHERE type ='$param' Order by id desc");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>

			            	<tr>						
			            		<td><img style="width: 180px" src="../partage/<?php echo $result[image] ?>"></td>
														<td><?php echo $result['titre'] ?></td>
														<td><?php echo $result['date_ajout'] ?></td>
														<td><?php echo $result['username'] ?></td>

														<td></td>

														
													</tr>
											
			           <?php


			          }}


			public function lister_presse_home(){


			      global $db;

			    
			      $recent = $db-> prepare("SELECT DISTINCT * from presse  Order by id desc LIMIT 7");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>
			           		<h6><font style="color:#f60">[Date:<?php echo $result[date_ajout] ?>] - <?php echo $result[type] ?></font></h6>
			           		<h5>
			           			<font style="color:black"><?php echo $result[titre] ?></font>
			           		</h5>
			           		<hr>
											
			           <?php


			          }}         }


	/**
	* 
	*/
	class offre 
	{


			public function  creer($type,$titre,$description,$date_ajout,$username)
			
			{


			
			      global $db;

			      		 $max = $db-> prepare("SELECT count(presse.id) as max_id FROM presse");
						 $max->execute();

   						 $result = $max->fetch(PDO::FETCH_ASSOC);

   						 $nom_file="img-offre-$result[max_id]";


			      		if (isset($_FILES['recto']) AND $_FILES['recto']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				        

				          	if (!empty($_FILES['recto']['name']))
				          	 {
				          		
				          		 if ($_FILES['recto']['size'] < 90000000000000000000) 

				              	{

				              	
				                  $infoscotation = pathinfo($_FILES['recto']['name']);
				            
				                      $extension_img = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                      $extensions_autorisees = array('GIF','gif','JPG','jpg','png','PNG');
				                     
				                     if (in_array($extension_img, $extensions_autorisees))
				                     	

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['recto']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['recto']['tmp_name'], "../partage/$nom_file.$extension_img");


		               				// pour les pochain on faire le update
					               }
					               else{

					               


					               	echo "<script> alert('ERREUR  TAILLE OU L\' EXTENSION DU FICHIER INCORRECT,VOTRE ENREGISTREMENT A ETE ANNULE')</script>";

				               		echo "<script> window.location='ajout-presse'</script>";


					               }
					          

					         	 }
				          	}

				               

				        }


				        if (isset($_FILES['pdf1']) AND $_FILES['pdf1']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier


				          	if (!empty($_FILES['pdf1']['name'])) {

					           
					                 $titre_pdf1=$_FILES['pdf1']['name'];


					                 
					                 
					                  $infoscotation = pathinfo($_FILES['pdf1']['name']);
					            
					                      $extension_upload = $infoscotation['extension'];
					                      $nom_du_cotation = $infoscotation['filename'];

					                      $extensions_autorisees = array('PDF','pdf');
					                     
					                     if (in_array($extension_upload, $extensions_autorisees))

					                    {
					                      
					                    $liste = explode(".", basename($_FILES['pdf1']['name']));
					                    $extension= $liste[count($liste)-1];
					                    
					                    move_uploaded_file($_FILES['pdf1']['tmp_name'], "../pdf/$titre_pdf1");

			               		
					          			}
					           }

				        }

				     

				  
		                  $b = array(

		                        'type'=> $type,
		                        'titre'=> $titre,		                        
		                        'description'=> $description,
		                        'date_ajout'=> $date_ajout,		                        
		                        'username'=> $username,				                         


		                    );




			            $sql = "INSERT into presse(type,titre,description,date_ajout,username) 
		                         values(:type,:titre,:description,:date_ajout,:username)";

			                $req = $db -> prepare($sql);
			                $req -> execute($b);

			               $dernier_id = $db->lastInsertId(); 


			               if (!empty($_FILES['recto']['name'])) {

			               		 $sql = "UPDATE presse  SET image = '$nom_file.$extension_img',pdf1 = '$titre_pdf1' WHERE id = '$dernier_id'";

			               }else{

			               		 $sql = "UPDATE presse  SET image = 'armoirie.png',pdf1 = '$titre_pdf1' WHERE id = '$dernier_id'";
			               }


					       
 
                   			$update = $db->exec($sql);




			              //  echo "<script> alert('ENREGISTREMENT EFFECTUE AVEC SUCCESS')</script>";

			                //echo "<script> window.location='lister-offres'</script>";

		
			}

			public function lister_offres($param){


			      global $db;

			    
			      $recent = $db-> prepare("SELECT DISTINCT * from presse
					WHERE type ='$param' Order by id desc");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>

			            	<tr>						
			            		<td><img style="width: 180px" src="../partage/<?php echo $result[image] ?>"></td>
														<td><?php echo $result['titre'] ?></td>
														<td><?php echo $result['date_ajout'] ?></td>
														<td><?php echo $result['username'] ?></td>

													

														
													</tr>
											
			           <?php


			          }}

			}


	/**
	* 
	*/
	class media 
	{


			public function  creer_album($type,$titre,$description,$date_ajout,$username)
			
			{
			
			      global $db;

			      		 $max = $db-> prepare("SELECT count(media.id) as max_id FROM media WHERE type='photo'");
						 $max->execute();

   						 $result = $max->fetch(PDO::FETCH_ASSOC);

   						


				        if (isset($_FILES['img1']) AND $_FILES['img1']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				                if ($_FILES['img1']['size'] < 90000000000000000000) 

				             	{
				                 
				                

				                 
				                 
				                  $infoscotation = pathinfo($_FILES['img1']['name']);
				            
				                      $extension_upload = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                      $extensions_autorisees = array('GIF','gif','JPG','jpg','png','PNG');

				                      $nom_image1="album$result[max_id]-img1.$extension_upload";




				                     if (in_array($extension_upload, $extensions_autorisees))

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['img1']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['img1']['tmp_name'], "../partage/$nom_image1");

		               				
				              		 }
				              

				       			 }



				    	}




				        if (isset($_FILES['img2']) AND $_FILES['img2']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				                if ($_FILES['img2']['size'] < 90000000000000000000) 

				             	{
				                 
				                 

				                 
				                 
				                  $infoscotation = pathinfo($_FILES['img2']['name']);
				            
				                      $extension_upload = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                    $extensions_autorisees = array('GIF','gif','JPG','jpg','png','PNG');

				                    $nom_image2="album$result[max_id]-img2.$extension_upload";

				                     
				                     if (in_array($extension_upload, $extensions_autorisees))

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['img2']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['img2']['tmp_name'], "../partage/$nom_image2");

		               				
				              		 }
				              

				       			 }



				    	}


				    	  if (isset($_FILES['img3']) AND $_FILES['img3']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				                if ($_FILES['img3']['size'] < 90000000000000000000) 

				             	{
				                 
				                 
				                  $infoscotation = pathinfo($_FILES['img3']['name']);
				            
				                      $extension_upload = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                      $extensions_autorisees = array('GIF','gif','JPG','jpg','png','PNG');
				                      $nom_image3="album$result[max_id]-img3.$extension_upload";

				                     
				                     if (in_array($extension_upload, $extensions_autorisees))

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['img3']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['img3']['tmp_name'], "../partage/$nom_image3");

		               				
				              		 }
				              

				       			 }

				    	}


				    	  if (isset($_FILES['img4']) AND $_FILES['img4']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				                if ($_FILES['img4']['size'] < 90000000000000000000) 

				             	{
				                
				                  $infoscotation = pathinfo($_FILES['img4']['name']);
				            
				                      $extension_upload = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                      $extensions_autorisees = array('GIF','gif','JPG','jpg','png','PNG');

				                      $nom_image4="album$result[max_id]-img4.$extension_upload";

				                     if (in_array($extension_upload, $extensions_autorisees))

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['img4']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['img4']['tmp_name'], "../partage/$nom_image4");

		               				
				              		 }
				              

				       			 }



				    	}


				    	  if (isset($_FILES['img5']) AND $_FILES['img5']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				                if ($_FILES['img5']['size'] < 90000000000000000000) 

				             	{
				                 
				                  
				                 
				                  $infoscotation = pathinfo($_FILES['img5']['name']);
				            
				                      $extension_upload = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                      $extensions_autorisees = array('GIF','gif','JPG','jpg','png','PNG');
				                      $nom_image5="album$result[max_id]-img5.$extension_upload";

				                     if (in_array($extension_upload, $extensions_autorisees))

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['img5']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['img5']['tmp_name'], "../partage/$nom_image5");

		               				
				              		 }
				              

				       			 }

				    	}


				    	  if (isset($_FILES['img6']) AND $_FILES['img6']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				                if ($_FILES['img6']['size'] < 90000000000000000000) 

				             	{
				                 
				                  $nom_image6="album-img6-$result[max_id]";

				                 
				                 
				                  $infoscotation = pathinfo($_FILES['img6']['name']);
				            
				                      $extension_upload = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                      $extensions_autorisees = array('GIF','gif','JPG','jpg','png','PNG');
				                     
				                     $nom_image6="album$result[max_id]-img6.$extension_upload";

				                    if (in_array($extension_upload, $extensions_autorisees))

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['img6']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['img6']['tmp_name'], "../partage/$nom_image6");

		               				
				              		 }
				              

				       			 }



				    	}

				    	
				    	if (isset($_FILES['img7']) AND $_FILES['img7']['error'] == 0)

				          {
				              //$_FILES['cotation']['name']; nom du fichier tel qu'il est sur le nom du client
				              //$_FILES['cotation']['tmp_name'];nom temporaire du fichier
				              //$_FILES['cotation']['size']; taille du fichier
				              //$_FILES['cotation']['type'];type de fichier

				                if ($_FILES['img7']['size'] < 90000000000000000000) 

				             	{
				                 
				                  $nom_image7="album-img7-$result[max_id]";

				                 
				                 
				                      $infoscotation = pathinfo($_FILES['img7']['name']);
				            
				                      $extension_upload = $infoscotation['extension'];
				                      $nom_du_cotation = $infoscotation['filename'];

				                      $extensions_autorisees = array('GIF','gif','JPG','jpg','png','PNG');

				                       $nom_image7="album$result[max_id]-img7.$extension_upload";
				                     
				                     if (in_array($extension_upload, $extensions_autorisees))

				                    {
				                      
				                    $liste = explode(".", basename($_FILES['img7']['name']));
				                    $extension= $liste[count($liste)-1];
				                    
				                    move_uploaded_file($_FILES['img7']['tmp_name'], "../partage/$nom_image7");

		               				
				              		 }
				              

				       			 }



				    	}



		                  $b = array(

		                        'type'=> $type,
		                        'titre'=> $titre,		                        
		                        'description'=> $description,
		                        'date_ajout'=> $date_ajout,		                        
		                        'username'=> $username,				                         

		                    );


		         

			            $sql = "INSERT into media(type,titre,description,date_ajout,username) 
		                         values(:type,:titre,:description,:date_ajout,:username)";

			                $req = $db -> prepare($sql);
			                $req -> execute($b);

			               $dernier_id = $db->lastInsertId(); 


					        $sql = "UPDATE media  SET img1 = '$nom_image1',img2 = '$nom_image2',img3 = '$nom_image3',img4 = '$nom_image4',img5 = '$nom_image5',img6 = '$nom_image6',img7 = '$nom_image7' WHERE id = '$dernier_id'";
 
                   			$update = $db->exec($sql);



			                echo "<script> alert('ALBUM CREE AVEC SUCCESS')</script>";

			                echo "<script> window.location='lister-medias'</script>";

		
			}

			public function  creer_video($type,$titre,$lien,$date_ajout,$username)
			
			{
			
			      global $db;

			      	
		                  $b = array(

		                       
		                        'type'=> $type,
		                         'titre'=> $titre,		                        
		                        'lien'=> $lien,
		                        'date_ajout'=> $date_ajout,		                        
		                        'username'=> $username,				                         


		                    );



			            $sql = "INSERT into media(type,titre,lien,date_ajout,username) 
		                         values(:type,:titre,:lien,:date_ajout,:username)";

			                $req = $db -> prepare($sql);
			                $req -> execute($b); 



			                echo "<script> alert('VIDEO AJOUTEE')</script>";

			                echo "<script> window.location='lister-medias'</script>";

		
			}


			public function lister_media($param){


			      global $db;




			    
			      $recent = $db-> prepare("SELECT DISTINCT * from media
					WHERE type ='$param'  Order by id desc");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC))

			         {
			           
			           ?>

			           	 <?php 


			           	 		if ($param=="video") {
			           	 		
			           	 			 ?>

			           	 			 <tr>						
			            				<td> <iframe style="width: 100%;height: 150px" src="https://www.youtube.com/embed/<?php echo($result[lien]) ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></td>
														<td><?php echo $result['titre'] ?></td>
														<td><?php echo $result['date_ajout'] ?></td>
														<td><?php echo $result['username'] ?></td>

														<td></td>

														
													</tr>

			           	 			<?php


			           	 		}else{


			           	 			?>

			           	 			 <tr style="overflow-y: hidden;">						
			            				<td>
			            				
			            						<div style="display: inline-flex">
			            								<a target="_blank" >
						            						<div style="width: 70px;height: 70px;padding: 3px">
						            							<img style="width: 70px;height: 70px" src="../partage/<?php echo $result[img1] ?>">
						            						</div>

						            						<div style="width: 70px;height: 70px;padding: 3px">
						            							<img style="width: 70px;height: 70px" src="../partage/<?php echo $result[img2] ?>">
						            						</div>

						            					</a>
			            						</div>

				            					<div style="display: inline-flex">
				            						<a target="_blank" href="t">
					            						<div style="margin-top:5px;width: 70px;height: 70px;padding: 3px">
					            							<img style="width: 70px;height: 70px" src="../partage/<?php echo $result[img3] ?>">
					            						</div>
					            						<div style="margin-top:5px; margin-left:5px;width: 70px;height: 70px;background: #9a9898;padding: 3px;color: black;">
					            							<center><h3 style="width: 70px;height: 70px">+4</h3></center>
					            						</div>
					            					</a>
				            					</div>
			            					</a>
			            					
			            				</td>
										<td><?php echo $result['titre'] ?></td>
										<td><?php echo $result['date_ajout'] ?></td>
										<td><?php echo $result['username'] ?></td>

										<td></td>

														
									</tr>




			           	 			<?php


			           	 		}



			           	  ?>

			            	
											
			           <?php


			          }}


			 public function lister_media_home($param){


			      global $db;




			    
			      $recent = $db-> prepare("SELECT DISTINCT * from media
					WHERE type ='$param'  Order by id desc LIMIT 1");

			        $recent->execute();

			      	$i=1;
			      
			         while ($result = $recent->fetch(PDO::FETCH_ASSOC)) {
			           
			           ?>
			            						<div style="display: inline-flex">

			            							
			            								<a>
						            						<div style="">
						            							<img style="width: 100px;height: 100px" src="../partage/<?php echo $result[img1] ?>">
						            						</div>

						            						<div style="">
						            							<img style="width: 100px;height: 100px" src="../partage/<?php echo $result[img2] ?>">
						            						</div>

						            					</a>

						            					<a>

						            						<div >
						            							<img style="width: 100px;height: 100px" src="../partage/<?php echo $result[img3] ?>">
						            						</div>
						            						<div style="background: #9a9898;margin-top:-20px;color: black;">
						            							<center><h3 style="width: 100px;height: 100px">+4</h3></center>
						            						</div>
						            					</a>

						            				

						            					
			            						</div>
			            						<h6><font style="color:black">[Date:<?php echo $result[date_ajout] ?>] - <?php echo $result[titre] ?></font></h6>
			           <?php


			          }}}


 ?>