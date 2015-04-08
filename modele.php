<?php
//on se connecte à la base de donnée
session_start();
include('php/connect_bdd.php');
//verifions si cookie activee
if(SID!='')
{
	$errors[1] = "Les cookies sont désactivés";
	if(!isset($_GET['traceur'])) 
	{
		header('location:/_');
	}
}
include_once('php/modele.html');
?>