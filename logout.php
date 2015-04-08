<?php
/**********************
script d�connection
*********************/
session_start();
session_unset();//on efface toutes les variables de la session
session_destroy(); // Puis on d�truit la session
if(isset($_COOKIE['pseudo_login']) || isset($_COOKIE['id_login']))
{
	setcookie('pseudo_login', NULL, -1); //efface cookie
	setcookie('id_login', NULL, -1); //efface cookie
}
header("location:/" ) ; // On renvoie ensuite sur la page d'accueil
?>


