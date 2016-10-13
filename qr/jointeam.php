<?php
/*
  © Thomas NAUDET pour ESEOmega
  
  REJOINDRE UNE ÉQUIPE
  0x0 : pas d’erreur, et la personne a rejoint l’équipe, PHP a enregistré son nom dans la base de données mySQL.
  0x1 : l’équipe que la personne tente de rejoindre n’existe pas
  0x2 : le participant est déjà présent dans l’équipe
  0x4 : l’équipe est pleine (n=4)
  0x8 : la personne qui tente de rejoindre l’équipe est déjà présente dans une autre team
  
  GET
  e = nom d'équipe
  n = nom du participant
  p = prénom du participant
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
	
	// Vérif équipe existe
	$req = $bdd->prepare('SELECT count(1) AS nbrE FROM `megascore` WHERE nom_equipe=?');
	$req->execute(array($nomSimple));
	$count = $req->fetch();
	$req->closeCursor();
	if (!$count['nbrE'])
	  $res |= 1;
	  
	// Vérif joueur n'existe pas
	$req = $bdd->prepare('SELECT * FROM `megascore` WHERE (LOWER(chef_nom)=:nom1 AND LOWER(chef_prenom)=:prenom1) OR (LOWER(p1_nom)=:nom2 AND LOWER(p1_prenom)=:prenom2) OR (LOWER(p2_nom)=:nom3 AND LOWER(p2_prenom)=:prenom3) OR (LOWER(p3_nom)=:nom4 AND LOWER(p3_prenom)=:prenom4)');
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
  $i = 0;
  $memeEquipe = FALSE;
	while ($rep = $req->fetch())
	{
  	$i++;
  	if ($rep['nom_equipe'] == $nomSimple)
  	{
  	  $memeEquipe = TRUE;
  	  break;
    }
	}
	$req->closeCursor();
	if ($memeEquipe)
	  $res |= 2;
  else if ($i)
    $res |= 8;
  
  $num = 1;
  if (!$res)  // Grosse flemme : l'erreur `équipe pleine` n'est soulevée que s'il n'y a pas eu d'autre erreur avant
  {
    // Récupération du nombre de membres dans l'équipe
  	$req = $bdd->prepare('SELECT * FROM `megascore` WHERE nom_equipe=?');
  	$req->execute(array($nomSimple));
  	$rep = $req->fetch();
  	$req->closeCursor();
  	if (!empty($rep['p3_nom']) OR !empty($rep['p3_prenom']))
  	  $num = 4;
  	else if (!empty($rep['p2_nom']) OR !empty($rep['p2_prenom']))
  	  $num = 3;
  	else if (!empty($rep['p1_nom']) OR !empty($rep['p1_prenom']))
  	  $num = 2;
  	if ($num == 4)
      $res |= 4;
  }
	
	if ($res == 0)
	{
  	// Ajout du membre dans l'équipe
    $req = $bdd->prepare('UPDATE megascore SET p'.$num.'_nom = :nom, p'.$num.'_prenom = :prenom WHERE nom_equipe = :nom_equipe');
    $req->execute(array(
    	'nom'        => $_GET['n'],
    	'prenom'     => $_GET['p'],
      'nom_equipe' => $nomSimple
      ));
  }
  
  echo ($res);
}

?>