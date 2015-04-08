<?php
	/***************************************************************
	page connection à la base de donnée 'mbassociation' en PDO
	***************************************************************/
	try
	{
		$dns = 'mysql:host=localhost;dbname=mbassociation;charset=UTF8';
		$user = 'root';
		$password = 'root';
		$connect = new PDO($dns,$user,$password);
	}
	catch(Exception $e)//si la connection échoue
	{
		die("Impossible de se connecter à la base de donnée ".$e->getMessage());
	}
?>