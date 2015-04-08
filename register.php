<?php
//echo "<pre>";print_r($_SERVER);echo "</pre>";
//on se connecte à la base de donnée
session_start();
include('php/connect_bdd.php');
//verifions si cookie activee
if(SID!='')
{
	$errors[18] = "Les cookies sont désactivés";
	if(!isset($_GET['traceur'])) 
	{
		header('location:/register_');
	}
}
//connection automatique si necessaire
$redirin="membre";
include_once('php/connection_auto.php');
//connection automatique si necessaire
include_once('php/connection_auto.php');
//si il existe post register cad si on clique sur le bouton submit name=register
if(isset($_POST["register"]))
{
	//trim supprime les espaces avant et apres la chaine
	$pseudo_user = htmlentities(trim($_POST["pseudo_user"]));
	$firstname_user = htmlentities(trim($_POST["firstname_user"]));
	$lastname_user = htmlentities(trim($_POST["lastname_user"]));
	$email_user = htmlentities(trim($_POST["email_user"]));
	$pw_user = htmlentities($_POST["pw_user"]);
	$conf_pw_user = htmlentities($_POST["conf_pw_user"]);
	$captcha = htmlentities(trim($_POST["captcha"]));
	// Génération aléatoire d'une clé
	$key = md5(microtime(TRUE)*100000);
	//vérifions si l'utilisateur a rempli son pseudo, son mot de passe, email ...
	if(empty($pseudo_user))
	{
		$errors[1] = "Veuillez saisir un nom d'utlisateur";
	}
	if(empty($firstname_user))
	{
		$errors[2] = "Veuillez saisir votre prénom";
	}
	if(empty($lastname_user))
	{
		$errors[3] = "Veuillez saisir votre nom";
	}
	if(empty($email_user))
	{
		$errors[4] = "Veuillez saisir votre e-mail";
	}
	if(empty($pw_user))
	{
		$errors[5] = "Veuillez saisir votre mot de passe";
	}
	if(empty($conf_pw_user))
	{
		$errors[6] = "Veuillez confirmer votre mot de passe";
	}
	if(empty($_POST["regle"]))
	{
		$errors[7] = "Veuillez accepter les règles d'utilisation";
	}
	if(empty($captcha))
	{
		$errors[8] = "Veuillez remplir le captcha";
	}
	//verifions si les mots de passes sont identiques
	if($pw_user != $conf_pw_user)
	{
		$errors[9] = "Vos deux mots de passe ne sont pas identiques";
	}
	//verifions la taille des chaines
	$string=30;
	if(strlen($_POST["pseudo_user"]) >= $string)
	{
		$errors[10] = "Votre pseudo ne doit pas dépasser <b>".$string." caractères</b>";
	}
	if(strlen($_POST["firstname_user"]) >= $string)
	{
		$errors[11] = "Votre prénom ne doit pas dépasser <b>".$string." caractères</b>";
	}
	if(strlen($_POST["lastname_user"]) >= $string)
	{
		$errors[12] = "Votre nom ne doit pas dépasser <b>".$string." caractères</b>";
	}
	//verifions l'email est valide
	if (filter_var($email_user, FILTER_VALIDATE_EMAIL)) 
	{
	}else{
		$errors[13] = "Ceci n'est pas une adresse mail valide";
	}
	//valide mot de passe
	if(preg_match('/[A-Z]/',$pw_user) && preg_match('/[a-z]/',$pw_user) && preg_match('/[0-9]/',$pw_user) && strlen($pw_user)>4)
	{
	}else{
		$errors[14] = "Mettre au moins une Majuscule, un nombre et 4 caractères !";
	}
	//vérifions si le pseudo éxiste
	$sql="SELECT count(id_user) FROM users WHERE pseudo_user= :pseudo_user";
	$query=$connect->prepare($sql);
	$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,$string);
	$query->execute();
	$count_pseudo=$query->fetchColumn();
	//resultat recherche pseudo -false si le pseudo n'existe pas -true si le pseudo éxiste
	if($count_pseudo!=0)
	{
		$errors[15] = "Le pseudo <b><i>".$pseudo_user."</i></b> n'est pas disponible";
	}
	//
	$sql="SELECT count(id_user) FROM users WHERE email_user= :email_user";
	$query=$connect->prepare($sql);
	$query->bindParam(':email_user',$email_user,PDO::PARAM_STR,$string);
	$query->execute();
	$count_email=$query->fetchColumn();
	if($count_email!=0)
	{
		$errors[16] = "L'adresse <b><i>".$email_user."</i></b> éxiste déjà";
	}
	//verifions le captcha
	if($captcha != $_SESSION["rand"] && !isset($errors[8]))
	{
		$errors[17] = "Le captcha est incorrect";
	}
	//affichons les erreurs
	if(!empty($errors))//si la variable erreur n'est pas vide ca qui veut dire qu'il y a une erreur
	{
		/*foreach($errors as $error)
		{
			echo $error;//afficher les erreurs
		}*/
	}
	//ou mettons dans la bdd		
	else
	{
		$salt = "802587@!alsd";
		$password = sha1(sha1($pw_user).$salt);
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql="INSERT INTO users(pseudo_user,firstname_user,lastname_user,password_user,email_user,ip_user,key_user,date_register,datelast_co) VALUES (:pseudo_user,:firstname_user,:lastname_user,:pw_user,:email_user,:ip,:key,NOW(),NOW());";
		$query=$connect->prepare($sql);
		$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,$string);
		$query->bindParam(':firstname_user',$firstname_user,PDO::PARAM_STR,$string);
		$query->bindParam(':lastname_user',$lastname_user,PDO::PARAM_STR,$string);
		$query->bindParam(':pw_user',$password,PDO::PARAM_STR, 100);
		$query->bindParam(':email_user',$email_user,PDO::PARAM_STR,320);
		$query->bindParam(':ip',$ip,PDO::PARAM_STR,20);
		$query->bindParam(':key',$key,PDO::PARAM_STR,100);
		$query->execute();
		include_once("php/mail_confirm.php");
		//die('Vous êtes inscrit');
		header('location:login');
	}
}
include_once('php/form_register.html');
//include_once('../iphone2.html');
?>