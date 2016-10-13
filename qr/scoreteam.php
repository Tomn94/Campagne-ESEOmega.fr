<?php
/*
  © Thomas NAUDET pour ESEOmega
  
  SCORE DE L'ÉQUIPE
  retourne le score tout simplement
  
  GET
  e = nom d'équipe
*/

$nbr_total_QR = 30;

try
{
	$bdd = new PDO('mysql:host=176.32.230.7;dbname=cl45-eseomega;charset=utf8', 'cl45-eseomega', '');
  $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}

if (isset($_GET['e']))
{
	$nomSimple = strtolower(preg_replace('/[^\da-z]/i', '', $_GET['e']));
	
	// Vérif équipe existe
	$req = $bdd->prepare('SELECT nbr FROM `megascore` WHERE nom_equipe=?');
	$req->execute(array($nomSimple));
	$rep = $req->fetch();
	$req->closeCursor();

  echo ($rep['nbr']);
}

?>