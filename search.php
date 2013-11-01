<?php

//definition d'une fonction pour ouvrir une connexion
function connecter($hote,$user,$mot_de_passe)
{
	$bd=@mysqli_connect($hote,$user,$mot_de_passe);
	return $bd;
}
//definition d'une fonction pour Fermer une connexion
function deconnecter($connexion)
{
	if($connexion)
	$ok=@mysqli_close($connexion);
}
//definition d'une fonction pour sélectionner la BDD
function selection_bd($connexion,$bd)
{
	$ok=mysqli_select_db($connexion,$bd);
	if($ok)
	echo "Base de Donnée Sélectionnée <br/>";
	else
	echo "Echec de  Sélection de la Base de Données";
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../admin-panel.css" /> 
<title>Liste des inscrits</title>

</head>

<body>

<?php
	$name_site = $_POST['name_site'];
	
	$bd=connecter("localhost","root","");
	selection_bd($bd,"pwd");
	$name_site="%".$name_site."%";
	
	$sql="select * from pwd where name_site LIKE '$name_site';";

	$res=mysqli_query($bd,$sql);
	$i=mysqli_num_rows($res);
	
	if($i>0)
	{
?>
        <table border="2" align="center">
        <tr class="entete">
			
			<td>Name of siteweb</td>
			<td>E-mail</td>
			<td>Rassword</td>
		
        </tr>
        <?php
        
        while($ligne=mysqli_fetch_array($res))
		{
        
        ?>
        <tr>
			
			<td><?php echo $ligne['name_site']; ?></td>
			<td><?php echo $ligne['e_mail']; ?></td>
			<td><?php echo $ligne['pwd1']; ?></td>
			     
        </tr>
		<?php
		}
		?>
        </table>
        <br/>
		<div id="retour"></div>
    
<?php
	}else{
		echo "<div align=\"center\"><h4>";
		$msg="Aucun utilisateur trouvé!!";
		echo $msg;
		echo "</h4></div>";
	}

?>
<a href="home.html"> Back to home </a>
</body>
</html>
