<?php

	//recovery parameters of the inserted
	$new_site = $_POST['new_site'];
	$mail = $_POST['mail'];
	$pwd1 = $_POST['pwd1'];
	
		
	//Declare the parameters
	$serveur = "localhost";
	$base_de_donnes = "pwd";
	$user = "root";
	$pwd = "";
	
	//Connect to the database server
	$lien = mysql_connect($serveur,$user,$pwd)or die("Impossible de se connecter");
	
	//Selection of database
	mysql_select_db($base_de_donnes, $lien);
	
	
	//definition of the request to add a website
	$query = "insert into pwd
 (name_site,e_mail,pwd1) values ('$new_site','$mail','$pwd1')";
	//execution of application
	
	
	mysql_query($query) or die("erreur requete");
	header("location:validation.php");
	?>
