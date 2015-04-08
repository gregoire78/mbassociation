<?php
//vérifions si le mail éxiste
include('connect_bdd.php');
$email_user=htmlentities(trim($_POST['email_user']));
$sql="SELECT count(id_user) FROM users WHERE email_user= :email_user";
$query=$connect->prepare($sql);
$query->bindParam(':email_user',$email_user,PDO::PARAM_STR);
$query->execute();
$count_mail=$query->fetchColumn();
//resultat recherche pseudo -false si le pseudo n'existe pas -true si le pseudo éxiste
if($count_mail!=0)
{
	//echo "Le pseudo <i>".$email_user."</i> n'est pas disponible";
	echo 1;
}
?>