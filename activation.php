<?php
//on se connecte à la base de donnée
session_start();
include('php/connect_bdd.php');
if(isset($_GET['log']) && isset($_GET['cle']))
{
	$string=30;
	//Récupération des variables nécessaires à l'activation
	$pseudo_user = htmlentities($_GET['log']);
	$key_user = $_GET['cle'];
	//vérifions si activé
	$sql="SELECT pseudo_user,key_user,active_compt FROM users WHERE pseudo_user= :pseudo_user AND key_user= :key_user";
	$query=$connect->prepare($sql);
	$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,$string);
	$query->bindParam(':key_user',$key_user,PDO::PARAM_STR,100);
	$query->execute();
	$info_user=$query->fetch(PDO::FETCH_ASSOC);
	$actif = $info_user["active_compt"];
	$key_bdd = $info_user["key_user"];
	$pseudo_bdd = $info_user["pseudo_user"];
	//On teste la valeur de la variable $actif récupéré dans la BDD
	if($actif != 0)
	{
		$errors[2] = "Votre compte est déjà activé";
	}
	else if($key_user == $key_bdd && $pseudo_bdd == $pseudo_user)
	{
		$sql="UPDATE users SET active_compt= 1 WHERE pseudo_user= :pseudo_user AND key_user= :key_user AND active_compt= 0";
		$query=$connect->prepare($sql);
		$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,$string);
		$query->bindParam(':key_user',$key_user,PDO::PARAM_STR,100);
		$query->execute();
		$success = "Votre compte est activé, vous pouvez <a class='alert-link' href='/login'>vous connecter</a>.";
	}
	else
	{
		$errors[3] = "<strong>Erreur !</strong> Votre compte ne peut être activé...";
	}
	header ("Refresh: 5;URL=/login");
}
else
{
	header('location:/');
}
include_once('php/activation.html');
?>