<?php
/*
  © Thomas NAUDET pour ESEOmega
  
  SCANNER UN QRcode
  0x0 : pas d’erreur, PHP rajoute les points à l’équipe et valide le QRcode concerné dans la base de données
  0x1 : le QRcode a déjà été scanné par l’équipe
  0x2 : le QRcode scanné est erroné (ex : paquet de céréales), incrémentation du compteur triche
  0x4 : l'équipe n'existe pas
  
  GET
  e = nom d'équipe
  c = code (hashé en SHA1)
*/

$nbr_total_QR = 18;

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

if (isset($_GET['e']) AND isset($_GET['c']))
{
  $res = 0;
	$nomSimple = strtolower(preg_replace('/[^\da-z]/i', '', $_GET['e']));
	
	// Vérif code correct
	$num = -1;
  for ($i = 1 ; $i <= $nbr_total_QR ; $i++)
  {
    if ($_GET['c'] == sha1('danse_du_crabe'.$i.'TechnoToujoursPareil'))
      $num = $i;
  }
  if ($num == -1)
    $res |= 2;
	
	// Vérif équipe existe
	$req = $bdd->prepare('SELECT count(1) AS nbrE FROM `megascore` WHERE nom_equipe=?');
	$req->execute(array($nomSimple));
	$count = $req->fetch();
	$req->closeCursor();
	if (!$count['nbrE'])
	  $res |= 4;
  
  if ($num != -1)
  {
    // Vérif code déjà scanné
  	$req = $bdd->prepare('SELECT qr'.$num.', nbr FROM `megascore` WHERE nom_equipe=?');
  	$req->execute(array($nomSimple));
  	$rep = $req->fetch();
  	$req->closeCursor();
  	if (!empty($rep['qr'.$num]))
  	  $res |= 1;
  }
  
	if ($res == 0)
	{
  	$nvPoints = 2;
  	if ($num > 13)
  	  $nvPoints += 4;
  	else if ($num > 7)
  	  $nvPoints += 2;
    $nvPoints += $rep['nbr'];
  	
  	// Validation du QRcode
    $req = $bdd->prepare('UPDATE megascore SET qr'.$num.' = NOW(), nbr = :nbr WHERE nom_equipe = :nom_equipe');
    $req->execute(array(
    	'nbr'        => $nvPoints,
      'nom_equipe' => $nomSimple
      ));
      
    // Vérif des bonus
  	$req = $bdd->prepare('SELECT * FROM `megascore` WHERE nom_equipe=?');
  	$req->execute(array($nomSimple));
  	$rep = $req->fetch();
  	$req->closeCursor();
  	$bonusMoy = FALSE;
  	$bonusDif = FALSE;
  	if ($rep['bonusMoy'] == 0 && !empty($rep['qr8']) && !empty($rep['qr9']) && !empty($rep['qr10']) && !empty($rep['qr11']) && !empty($rep['qr12']) && !empty($rep['qr13']))
  	{
      $bonusMoy = TRUE;
      $nvPoints += 2;
    }
  	if ($rep['bonusDif'] == 0 && !empty($rep['qr14']) && !empty($rep['qr15']) && !empty($rep['qr16']) && !empty($rep['qr17']) && !empty($rep['qr18']))
  	{
      $bonusDif = TRUE;
      $nvPoints += 4;
    }

    // Ajout d'un bonus moyen
    if ($bonusMoy)
    {
      $req = $bdd->prepare('UPDATE megascore SET bonusMoy = 1, nbr = :nbr WHERE nom_equipe = :nom_equipe');
      $req->execute(array(
      	'nbr'        => $nvPoints,
        'nom_equipe' => $nomSimple
        ));
    }
    // Ajout d'un bonus difficile
    if ($bonusDif)
    {
      $req = $bdd->prepare('UPDATE megascore SET bonusDif = 1, nbr = :nbr WHERE nom_equipe = :nom_equipe');
      $req->execute(array(
      	'nbr'        => $nvPoints,
        'nom_equipe' => $nomSimple
        ));
    }
  }
	else if (($res & 2) == 2 AND ($res & 4) == 0)
	{
  	// Ajout d'une tentative de triche
  	$req = $bdd->prepare('SELECT triche FROM `megascore` WHERE nom_equipe=?');
  	$req->execute(array($nomSimple));
  	$rep = $req->fetch();
  	$req->closeCursor();

  	// Ajout d'une tentative de triche
    $req = $bdd->prepare('UPDATE megascore SET triche = :triche WHERE nom_equipe = :nom_equipe');
    $req->execute(array(
    	'triche'     => $rep['triche']+1,
      'nom_equipe' => $nomSimple
      ));
  }
  
  echo ($res);
}

?>