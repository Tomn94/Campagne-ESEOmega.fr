<?php
/*
  © Thomas NAUDET pour ESEOmega
  
  CRÉATION D'ÉQUIPE
  0x0 : pas d’erreur et l’équipe a été créée via PHP depuis le serveur
  0x1 : nom d’équipe déjà existant
  0x2 : nom du chef d’équipe déjà présent dans une équipe
  
  GET
  e = nom d'équipe
  n = nom du chef
  p = prénom du chef
*/
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

if (isset($_GET['e']) AND isset($_GET['n']) AND isset($_GET['p']))
{
  $res = 0;
	$nomSimple = strtolower(preg_replace('/[^\da-z]/i', '', $_GET['e']));
	
	// Vérif équipe unique
	$req = $bdd->prepare('SELECT count(1) AS nbrE FROM `megascore` WHERE nom_equipe=?');
	$req->execute(array($nomSimple));
	$count = $req->fetch();
	$req->closeCursor();
	if ($count['nbrE'] > 0)
	  $res |= 1;

	// Vérif joueur unique
	$req = $bdd->prepare('SELECT count(1) AS nbrN FROM `megascore` WHERE (LOWER(chef_nom)=:nom1 AND LOWER(chef_prenom)=:prenom1) OR (LOWER(p1_nom)=:nom2 AND LOWER(p1_prenom)=:prenom2) OR (LOWER(p2_nom)=:nom3 AND LOWER(p2_prenom)=:prenom3) OR (LOWER(p2_nom)=:nom4 AND LOWER(p2_prenom)=:prenom4)');
	$req->execute(array(
    'nom1'    => strtolower($_GET['n']),
    'prenom1' => strtolower($_GET['p']),
    'nom2'    => strtolower($_GET['n']),
    'prenom2' => strtolower($_GET['p']),
    'nom3'    => strtolower($_GET['n']),
    'prenom3' => strtolower($_GET['p']),
    'nom4'    => strtolower($_GET['n']),
    'prenom4' => strtolower($_GET['p'])
    ));
	$count = $req->fetch();
	$req->closeCursor();
	if ($count['nbrN'] > 0)
	  $res |= 2;
	
	if ($res == 0)
	{
  	// Ajout
    $req = $bdd->prepare('INSERT INTO megascore(equipe, nom_equipe, chef_nom, chef_prenom) VALUES(:equipe, :nom_equipe, :chef_nom, :chef_prenom)');
    $req->execute(array(
    	'equipe'      => $_GET['e'],
    	'nom_equipe'  => $nomSimple,
    	'chef_nom'    => $_GET['n'],
    	'chef_prenom' => $_GET['p']
    	));
  }
  
  echo($res);
}
?>