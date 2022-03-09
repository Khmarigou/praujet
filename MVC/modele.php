
<!-- Gestion connection admin -->
<?php

// global $bdd;
// $sql = "CREATE TABLE User(
//     id INT NOT NULL AUTO_INCREMENT,
//     nom VARCHAR(50) NOT NULL,
// 	prenom VARCHAR(50) NOT NULL,
// 	username VARCHAR(50) NOT NULL,
// 	password VARCHAR(50) NOT NULL,
// 	is_admin TINYINT,

//     CONSTRAINT Pk_Dvd PRIMARY KEY (id))";
 
// $result = mysqli_query($bdd, $sql); 



if(isset($_POST["login"])){
	session_start();
	if(!empty($_POST['username']) AND !empty($_POST['password']))
	{
		$db = mysqli_connect("localhost", "root","","l2_info_11");
		$username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
		$password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
		
		$requete = "SELECT * FROM `User` WHERE `username` = '". $username ."' AND `password` = '". $password ."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_assoc($exec_requete);
		
		if(!empty($reponse["username"]))
        {
			$_SESSION["username"] = $_POST['username'];
			$_SESSION["password"] = $_POST['password'];
			$_SESSION["is_admin"] = $reponse['is_admin'];
			header('Location: ../index.php?page=admin');

        }
		else
		{
			header('Location: ../index.php?page=connexion&error=1');
		}
	}
	else
	{
		header('Location: ../index.php?page=connexion&error=2');
	}
}


if(isset($_POST["register"])){
	session_start();
	if(!empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['name']) AND !empty($_POST['surname']))
	{
		$db = mysqli_connect("localhost", "root","","l2_info_11");
		$sql = "INSERT INTO `User` (`id`, `nom`, `prenom`, `username`, `password`, `is_admin`) VALUES (NULL,'$_POST[surname]', '$_POST[name]', '$_POST[username]', '$_POST[password]', 0);";
		$results = mysqli_query($db,$sql);

		header('Location: ../index.php?page=connexion');
	}
	else
	{
		header('Location: ../index.php?page=inscription&error=1');
	}
}


function afficher_admin()
{	
	global $bdd;
	$sql = "SELECT * FROM `User`";
	$results = mysqli_query($bdd,$sql);
	$row = mysqli_fetch_assoc($results);
	echo "<h2>Liste des administrateurs :</h2>";
	while($row != null) {
		echo "<article>\n";
		echo "<p>Pseudo : ".$row["username"]."</p>\n";
		echo "</article>\n";
		$row = mysqli_fetch_assoc($results);
	}
}

function creer_utilisateur()
{
	global $bdd;
	if($_POST['pseudo'] !== "" and $_POST['mdp'] !== ""){
		$sql = "INSERT INTO `User` (`id`, `username`, `password`, `is_admin`) VALUES (NULL, '$_POST[username]', '$_POST[password]', 0);";
		$results = mysqli_query($bdd,$sql);
	}
	else{
		echo("champ vide.");
	}
}

/*function recup_dvd ()
{
	global $bdd;
	$sql = "SELECT * FROM dvd";
	$result = mysqli_query($bdd, $sql);
    while($row = mysqli_fetch_assoc($result))
		$list[] = $row;
	return $list;
}

*/

function afficher_dvd ($list)
{
	if ($list == null)
	{
		echo "<article><h2>Aucun résultat ne correspond à votre recherche.</h2></article>";
	} else {
		foreach ($list as $key => $value) {
		echo "<article class='background'>";
		echo "<h2>".$value["Titre"]."</h2>";
		echo "<p><b>Realisateur : </b>".$value["Realisateur"]."</p>";
		echo "<p><b>Annee :</b> ".$value["Annee"]."</p>";
		echo "<p><b>Duree : </b>".$value["Duree"]." min</p>";
		}
	}
}

?>