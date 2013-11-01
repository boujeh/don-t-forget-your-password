<?PHP
//récupération des données
	$idU = $_POST["id"];

	//Declare the parameters
	$serveur = "localhost";
	$base_de_donnes = "pwd";
	$user = "root";
	$pwd = "";
	
	//Connect to the database server
	$lien = mysql_connect($serveur,$user,$pwd)or die("Impossible de se connecter");
	
	//Selection of database
	mysql_select_db($base_de_donnes, $lien);
	
	//definition de la requete 
	$query = "
	DELETE FROM pwd WHERE id_pwd='$idU' ";
	 echo (mysql_error());
	
	//execution de la requete
	$cur = mysql_query($query);
	
	header("location:validation.php");
	
	?>
