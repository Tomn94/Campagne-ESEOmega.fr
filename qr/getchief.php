<?php
/*  
  RECUPERER LE NOM DU CHEF D'UNE EQUIPE
  A partir du nom simplifié de l'équipe
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

if (isset($_GET['e'])) {

	$res = 'Erreur';
	$nomSimple = strtolower(preg_replace('/[^\da-z]/i', '', $_GET['e']));

	$req = $bdd->prepare('SELECT chef_prenom, chef_nom FROM `megascore` WHERE `nom_equipe` = ?');
	$req->execute(array($nomSimple));
	$rep1 = $req->fetch();
	$req->closeCursor();
	
	echo ($rep1['chef_prenom'].' '.$rep1['chef_nom']);

}



?>
