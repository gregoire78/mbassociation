<?php
//on se connecte à la base de donnée
session_start();
include('php/connect_bdd.php');
//verifions si cookie activee
if(SID!='')
{
	$errors[5] = "Les cookies sont désactivés";
	if(!isset($_GET['traceur'])) 
	{
		header('location:/login_');
	}
}
//connection automatique si necessaire
$redirin="membre";
include_once('php/connection_auto.php');
//si il existe post register cad si on clique sur le bouton submit name=login
if(isset($_POST["login"]))
{
	$string=30;
	//trim supprime les espaces avant et apres la chaine
	$pseudo_user = htmlentities(trim($_POST["pseudo_user"]));
	$pw_user = htmlentities($_POST["pw_user"]);
	//vérifions si l'utilisateur a rempli son pseudo, son mot de passe
	if(empty($pseudo_user))
	{
		$errors[1] = "Veuillez saisir un nom d'utlisateur";
	}
	else
	{
		//vérifions si le pseudo éxiste
		$sql='SELECT count(pseudo_user) FROM users WHERE pseudo_user= :pseudo_user AND active_compt= 1;';
		$query=$connect->prepare($sql);
		$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,$string);
		$query->execute();
		$count_pseudo=$query->fetchColumn();
		//resultat recherche
		if($count_pseudo==0)
		{
			$errors[3] = "Le pseudo est incorrecte";
		}
	}
	if(empty($pw_user))
	{
		$errors[2] = "Veuillez saisir votre mot de passe";
	}
	else
	{
		$salt = "802587@!alsd";
		$password_user = sha1(sha1($pw_user).$salt);
		//vérifions si le pseudo éxiste
		$sql='SELECT count(password_user) FROM users WHERE password_user= :password_user AND active_compt= 1';
		$query=$connect->prepare($sql);
		$query->bindParam(':password_user',$password_user,PDO::PARAM_STR,100);
		$query->execute();
		$count_pw_user=$query->fetchColumn();
		if($count_pw_user==0)
		{
			$errors[4] = "Le mot de passe est incorrecte";
		}
	}
	//affichons les erreurs
	if(!empty($errors))//si la variable erreur n'est pas vide ca qui veut dire qu'il y a une erreur
	{
		/*foreach($errors as $error)
		{
			echo $error;//afficher les erreurs
		}*/
	}
	//		
	else
	{
		//récupere pseudo bdd pour le mettre dans la session
		$sql='SELECT id_user,pseudo_user FROM users WHERE pseudo_user= :pseudo_user AND password_user= :password_user AND active_compt= 1';
		$query=$connect->prepare($sql);
		$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,$string);
		$query->bindParam(':password_user',$password_user,PDO::PARAM_STR,100);
		$query->execute();
		$sess=$query->fetch(PDO::FETCH_ASSOC);
		$pseudo=$sess['pseudo_user'];
		$id = $sess["id_user"];
		$_SESSION["pseudo_user"]=$pseudo;
		$_SESSION["id_user"]=$id;
		//on actualise la date de derniere connection dans la bdd
		$sql='UPDATE users SET datelast_co=NOW() WHERE pseudo_user= :pseudo_user AND password_user= :pw_user AND active_compt= 1';
		$query=$connect->prepare($sql);
		$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,$string);
		$query->bindParam(':pw_user',$password_user,PDO::PARAM_STR,100);
		$query->execute();
		if(isset($_POST["stayco"]))
		{
			$salt = "4007@!charlie";
			$cryptpseudo=sha1(sha1($pseudo).$salt);//cryptage sécure avec grain de sel
			$cryptid = sha1(sha1($id).$salt);
			$expire = time() + 365*24*3600;
			setcookie('pseudo_login', $cryptpseudo, $expire);
			setcookie('id_login', $cryptid, $expire);
		}
		//include_once("mail_confirm.php");
		//die('Vous êtes connecte');
		header('location:membre');
	}
}
include_once('php/form_login.html');
?>