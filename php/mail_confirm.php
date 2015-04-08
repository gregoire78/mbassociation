<?php
$ipserveur = $_SERVER['SERVER_ADDR'];
ini_set("SMTP", "smtp.completel.net");
// multiple recipients
$to  = $email_user;

// subject
$subject = 'Bienvenue sur M&B association';

// message
$message = '
<html>
<head>
  <title>M&B association - clé activation mail</title>
</head>
<body style="background-color:#EDFDD0;">
<div style="font-family:arial; color:#9D4C45;">
	<p>Bienvenue sur M&B association,</p>
	<p>Pour activer votre compte, veuillez cliquer sur le lien ci dessous<br>
	ou copier/coller dans votre navigateur internet.</p>
	<p>votre nom d\'utilisateur : <strong>'.$pseudo_user.'</strong></p>
	<p>le lien d\'activation : </p>
</div>
<div>
	<a style="font-family:arial;text-decoration:none;color:#9D4C45;" href="http://mbassociation.fr/activation_'.urlencode(html_entity_decode($pseudo_user)).'_'.urlencode($key).'"><b>Cliquez ici</b></a>
</div>
<div style="font-family:arial; color:#808080; font-size:9px;">
	<p>---------------<br/>
	Ceci est un mail automatique, Merci de ne pas y répondre.<br/>
	si ce mail ne vous dit rien, n\'y apprêter aucune attention.</p>
</div>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .='Content-Transfer-Encoding: 8bit' . "\r\n";

// Additional headers
//$headers .= 'To: "'.$mail.'"' . "\r\n";
$headers .= 'From: M&Bassoc <mbassoc@gmail.com>' . "\r\n";

// Mail it
$t = mail($to, $subject, $message, $headers);
if($t==false)
{
    die('Erreur envoie du mail');
}
?>