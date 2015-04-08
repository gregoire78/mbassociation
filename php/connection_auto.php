<?php
/************************************************
Script de connexion si utilisateur déjà connecté
************************************************/
$p=1;
if(isset($_COOKIE["pseudo_login"]) && isset($_COOKIE['id_login']))
{
	$cookiepseudo=$_COOKIE['pseudo_login'];
	$cookieid=$_COOKIE['id_login'];
	
	$sql="SELECT id_user,pseudo_user FROM users";
	$query=$connect->prepare($sql);
	$query->execute();
	
	while($verif=$query->fetch(PDO::FETCH_ASSOC))
	{
		$pseudopart[$p] = $verif['pseudo_user'];
		$idpart[$p] = $verif['id_user'];

		$cryptpseudopart[$p] = sha1(sha1($pseudopart[$p])."4007@!charlie");
		$cryptidpart[$p] = sha1(sha1($idpart[$p])."4007@!charlie");

		if($cryptpseudopart[$p]==$cookiepseudo && $cryptidpart[$p]==$cookieid)
		{
			$pseudo_user = $pseudopart[$p];
			$id_user = $idpart[$p];
			$_SESSION['pseudo_user']=$pseudopart[$p];
			$_SESSION['id_user']=$idpart[$p];
			$sql="SELECT count(pseudo_user) FROM users WHERE pseudo_user= :pseudo_user AND id_user= :id_user AND active_compt=1";
			$query=$connect->prepare($sql);
			$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,30);
			$query->bindParam(':id_user',$id_user,PDO::PARAM_INT);
			$query->execute();
			$count_pseudo=$query->fetchColumn();
			//resultat recherche
			if($count_pseudo==1)
			{
				if($redirin=='membre')
				{
					header('location:membre');
				}
			}
			else
			{
				header('location:logout');
			}
		}
	}
	$p++;
}
else if(isset($_SESSION['pseudo_user']) && isset($_SESSION['id_user']))
{
	$pseudo_user = $_SESSION['pseudo_user'];	
	$id_user = $_SESSION['id_user'];
	$sql="SELECT count(pseudo_user) FROM users WHERE pseudo_user= :pseudo_user AND id_user= :id_user AND active_compt=1";
	$query=$connect->prepare($sql);
	$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR,30);
	$query->bindParam(':id_user',$id_user,PDO::PARAM_INT);
	$query->execute();
	$count_pseudo=$query->fetchColumn();
	//resultat recherche
	if($count_pseudo==1)
	{
		if($redirin=='membre')
		{
			header('location:membre');
		}
	}
	else
	{
		header('location:logout');
	}
}
?>