<?php
session_start();
include('php/connect_bdd.php');
if (isset($_POST['envoyer'])){
$bdd = mysqli_connect("localhost", "root", "root", "mbassociation");
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$email=$_POST["email"];
$message=mysqli_real_escape_string($bdd,$_POST["message"]);

	$query = " INSERT INTO message(Nom, Prenom, Adresse_mail, Message) VALUES('".$nom."','".$prenom."','".$email."','".$message."');";
	$res = mysqli_query($bdd, $query) or die(mysqli_error($bdd));
}

include_once("php/contact.html");
?>