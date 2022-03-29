<?php 
        //connection a la base de donnees
		error_reporting(E_ALL ^ E_NOTICE);
		//Creation des variables de connection
		$dbhost ='localhost';
		$dbhost ='localhost';
		$dbname='gestm';
		$dbuser='root';
		$dbpswd='';// Ds4t85?d
		//fin declaration des variables de donnections
		
		/*$dbhost ='localhost';
		$dbname='infrastructures';
		$dbuser='infrastructures';
		
		
		try
		
		{
			$db=new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
					session_start();

				//	session_destroy();

					$m=0;


	             
			} catch (PDOexception $e) {

				die('Erreur : '.$e->getMessage());
			}

 ?>