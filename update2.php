<?PHP
//récupération des données
	$idU = $_POST["id"];
	$name_site = $_POST["name_site"];
	$e_mail = $_POST["e_mail"];
	$pwd1 = $_POST["pwd1"];
	
	
	
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
	UPDATE pwd 
	SET name_site='$name_site' , e_mail='$e_mail' , pwd1='$pwd1' 
	WHERE id_pwd='$idU' "; echo (mysql_error());
	
	//execution de la requete
	$cur = mysql_query($query);
	
	header("location:validation.php");
	
	?>
