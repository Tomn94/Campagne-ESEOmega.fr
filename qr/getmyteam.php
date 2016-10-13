<?php
/*  
  AFFICHER UNE ÉQUIPE
  Permet de récupérer le nom de l'équipe COMPLET à parti de son nom -> simplifié
  Ex : 
  Les buveurs de bière -> lesbuveursdebire -> Les Buveurs De Bière
  
  GET
  e = nom d'équipe
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

	$req = $bdd->prepare('SELECT `equipe` FROM `megascore` WHERE `nom_equipe` = ?');
	$req->execute(array($nomSimple));
	$rep = $req->fetch();
	$req->closeCursor();

	echo ($rep['equipe']);

}



?>
