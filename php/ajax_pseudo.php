<?php
//vérifions si le pseudo éxiste
include('connect_bdd.php');
$pseudo_user=htmlentities(trim($_POST['pseudo_user']));
$sql="SELECT count(id_user) FROM users WHERE pseudo_user= :pseudo_user";
$query=$connect->prepare($sql);
$query->bindParam(':pseudo_user',$pseudo_user,PDO::PARAM_STR);
$query->execute();
$count_pseudo=$query->fetchColumn();
//resultat recherche pseudo -false si le pseudo n'existe pas -true si le pseudo éxiste
if($count_pseudo!=0)
{
	//echo "Le pseudo <i>".$pseudo_user."</i> n'est pas disponible";
	echo 1;
}
?>