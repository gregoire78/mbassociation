<?php 
session_start();
include('php/connect_bdd.php');

//verifion si il est bien connecté (et verifie les cookies également)
if(!isset($_SESSION['pseudo_user']) || !isset($_SESSION['id_user']))
{
	header('location:/login');
}
//si pas activé compte
$redirin="login";
include_once('php/connection_auto.php');

//initialisation
$string=30;
$pseudo_user=$_SESSION['pseudo_user'];
$id_user=$_SESSION['id_user'];

//récupérer infos utlisateur
$sql="SELECT lastname_user,firstname_user,email_user FROM users WHERE pseudo_user= :pseudo_user AND id_user= :id_user AND active_compt=1";
$query=$connect->prepare($sql);
$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,$string);
$query->bindParam(':id_user',$id_user,PDO::PARAM_INT);
$query->execute();
$info_user=$query->fetch(PDO::FETCH_ASSOC);

//on verifie si le compte est activé
$lastname_user=ucfirst($info_user['lastname_user']);
$firstname_user=ucfirst($info_user['firstname_user']);
$email_user=$info_user['email_user'];

//si modifie le nom (last_name)
if(isset($_POST['submit-lastname']))
{
	$input_lastname_user = htmlentities(trim($_POST["input_lastname_user"]));
	//vérifions si l'utilisateur a rempli.
	if(empty($input_lastname_user))
	{
		$errors_lastname[1] = "Veuillez saisir un nom";
	}
	//vérifions si la chaine dépasse 30 caractères
	if(strlen(trim($_POST["input_lastname_user"])) >= $string)
	{
		$errors_lastname[2] = "Votre nom ne doit pas dépasser <b>".$string." caractères</b>";
	}
	//verifie si valeur inchangée
	if($input_lastname_user==$lastname_user)
	{
		$errors_lastname[4] = "Valeur inchangé";
	}
	//vérifions si il y a des chiffres
	if(preg_match('/[0-9]/',$input_lastname_user))
	{
		$errors_lastname[3] = "Votre nom ne doit pas contenir de chiffre(s)";
	}
	//affichons les erreurs
	if(!empty($errors_lastname))//si la variable erreur n'est pas vide ca qui veut dire qu'il y a une erreur
	{
		/*foreach($errors as $error)
		{
			echo $error;//afficher les erreurs
		}*/
	}
	else
	{
		//on actualise la date de derniere connection dans la bdd
		$sql="UPDATE users SET lastname_user= :input_lastname_user WHERE pseudo_user= :pseudo_user AND id_user= :id_user AND active_compt= 1";
		$query=$connect->prepare($sql);
		$query->bindParam(':input_lastname_user',$input_lastname_user,PDO::PARAM_STR,$string);
		$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,$string);
		$query->bindParam(':id_user',$id_user,PDO::PARAM_INT);
		$query->execute();
		header('Location:membre');
	}
}
//si modifie le prénom (first_name)
if(isset($_POST['submit-firstname']))
{
	$input_firstname_user = htmlentities(trim($_POST["input_firstname_user"]));
	//vérifions si l'utilisateur a rempli.
	if(empty($input_firstname_user))
	{
		$errors_firstname[1] = "Veuillez saisir un prénom";
	}
	//vérifions si la chaine dépasse 30 caractères
	if(strlen(trim($_POST["input_firstname_user"])) >= $string)
	{
		$errors_firstname[2] = "Votre prénom ne doit pas dépasser <b>".$string." caractères</b>";
	}
	//verifie si valeur inchangée
	if($input_firstname_user==$firstname_user)
	{
		$errors_firstname[4] = "Valeur inchangé";
	}
	//vérifions si il y a des chiffres
	if(preg_match('/[0-9]/',$input_firstname_user))
	{
		$errors_firstname[3] = "Votre prénom ne doit pas contenir de chiffre(s)";
	}
	//affichons les erreurs
	if(!empty($errors_firstname))//si la variable erreur n'est pas vide ca qui veut dire qu'il y a une erreur
	{
		/*foreach($errors as $error)
		{
			echo $error;//afficher les erreurs
		}*/
	}
	else
	{
		//on actualise la date de derniere connection dans la bdd
		$sql="UPDATE users SET firstname_user= :input_firstname_user WHERE pseudo_user= :pseudo_user AND id_user= :id_user AND active_compt= 1";
		$query=$connect->prepare($sql);
		$query->bindParam(':input_firstname_user',$input_firstname_user,PDO::PARAM_STR,$string);
		$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,$string);
		$query->bindParam(':id_user',$id_user,PDO::PARAM_INT);
		$query->execute();
		header('Location:membre');
	}
}
include_once('php/membre.html');
?>