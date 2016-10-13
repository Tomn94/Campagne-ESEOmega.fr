<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>ESE'Omega<?php if ($titrePage) echo ' &ndash; '.$titrePage; ?></title>
    <link href='http://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="initial-scale=0.5">
    
    
    <script src="script.js"></script>
    <!--<meta name="description" content="Description ici">
    
    
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="favicon.png">
    <link rel="icon" sizes="192x192" href="favicon2.png">
    <meta name="apple-mobile-web-app-title" content="ESE'Omega">
    <meta name="msapplication-TileImage" content="favicon.png"/>
    <meta name="msapplication-TileColor" content="#FF7A40"/>
    <meta name="theme-color" content="#FF7A40">
    <meta name="viewport" content="width=device-width">
   <!--[if IE]>
    
   <![endif]-->
    <!--<meta name="apple-itunes-app" content="app-id=913767394">-->
  </head>
  <body>
    <header>
      <div id="logo">
        <a href="index.php" title="Accueil">
          <img id="logo" src="res/logo.png" />
        </a>
      </div>
      <nav>
        <ul>
          <li style="width: 176px;"<?php if($titrePage == "L'équipe") echo ' class="pageSelect"'; ?>>
            <a href="liste.php" title="Membres de la liste" onmouseover="nuage(1);" onmouseout="denuage(1);">
              <img id="nuage1" src="res/nuage1.png" />
              <p style="top: -60px;">Equipe</p>
            </a>
          </li>
          <li<?php if($titrePage == "Programme") echo ' class="pageSelect"'; ?> style="z-index: 75">
            <a href="programme.php" title="Programme de la campagne" onmouseover="nuage(2);" onmouseout="denuage(2);">
              <img id="nuage2" src="res/nuage2.png" />
              <p>Programme</p>
            </a>
          </li>
          <li class="vide">&nbsp;</li>
          <li<?php if($titrePage == "Animations") echo ' class="pageSelect"'; ?> style="z-index: 75">
            <a href="anim.php" title="Animations et événements lors de la campagne" onmouseover="nuage(3);" onmouseout="denuage(3);">
              <img id="nuage3" src="res/nuage3.png" />
              <p>Animations</p>
            </a>
          </li>
          <li<?php if($titrePage == "Partenaires") echo ' class="pageSelect"'; ?>>
            <a href="partenaires.php" title="Nos partenaires" onmouseover="nuage(4);" onmouseout="denuage(4);">
              <img id="nuage4" src="res/nuage4.png" />
              <p style="top: -52px;">Partenaires</p>
            </a>
          </li>
        </ul>
      </nav>
    </header>
    <img src="res/colh.gif" class="colhl" />
    <img src="res/colh.gif" class="colhr" />
    <article>
      <table>
        <tr>
          <td class='colonne layout' style="background-color: white;"></td>
          <td class='layout'>