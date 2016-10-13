<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <?php
      $anim = !isset($_SESSION['anim']);
      $_SESSION['anim'] = 'nope';
    ?>
    <title>ESEOmega<?php if ($titrePage != "") echo ' &ndash; '.$titrePage; ?></title>
    <meta name="description" content="Site de campagne d'ESEOmega pour le BDE de l'ESEO">
    <link rel="stylesheet" href="style.css">
    <?php
      if ($titrePage == "L'équipe")
        echo ('<meta name="viewport" content="width=990">');
      else
        echo ('<meta name="viewport" content="initial-scale=0.5">');
    
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false) { ?>
    <style>
      @media screen and (max-width: 1098px) {
        #liNuage3 {
          top: -264px;
        }
        #liNuage4 {
          top: -260px;
        }
      }
    </style>
    <?php } ?>
    
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="favicon.png">
    <link rel="icon" sizes="192x192" href="favicon2.png">
    <meta name="apple-mobile-web-app-title" content="Site ESEOmega">
    <meta name="msapplication-TileImage" content="favicon.png"/>
    <meta name="msapplication-TileColor" content="#2A82C8"/>
    <meta name="application-name" content="Site ESEOmega">
    <meta name="theme-color" content="#2A82C8">
    <meta name="apple-itunes-app" content="app-id=966385182">
    <!--
      Thomas Naudet, Sonasi Katoa, Alexis Louis et François Leparoux
                              pour ESEOmega
                                                                  _
                 _                     __  __          __     __ | |
       _______  | |  __  __           |  \/  |         \ \   / / | |
      |__   __| | | |  \/  |  ______  | \  / |     /\   \ \_/ /  | |
         | |    | | | \  / | |______| | |\/| |    /  \   \   /   |_|
         | |    | | | |\/| |          | |  | |   / /\ \   | |    (_)
         | |    |_| | |  | |          |_|  |_|  / ____ \  |_|
         |_|        |_|  |_|                   /_/    \_\
                            _______,.........._
                       _.::::::::::::::::::::::::._
                    _J::::::::::::::::::::::::::::::-.
                 _,J::::;::::::!:::::::::::!:::::::::::-."\_ ___
              ,-:::::/::::::::::::/''''''-:/   \::::::::::::::::L_
            ,;;;;;::!::/         V               -::::::::::::::::7
          ,J:::::::/ \/                              '-'`\:::::::.7
          |:::::::'                                       \::!:::/
         J::::::/                                          `.!:\ dp
         |:::::7                                             |/\:\
        J::::/                                               \/ \:|
        |:::/                                                    \:\
        |::/                                                     |:.Y
        |::7                                                      |:|
        |:/                              `OOO8ooo._               |:|
        |/               ,,oooo8OO'           `"`Y8o,             |'
         |            ,odP"'                      `8P            /
         |          ,8P'    _.__         .---.._                /
         |           '   .-'    `-.    .'       `-.            /
         `.            ,'          `. /            `.          L_
       .-.J.          /              Y               \        /_ \
      |    \         /               |                Y      // `|
       \ '\ \       Y          8B    |   8B           |     /Y   '
        \  \ \      |                |                ;    / |  /
         \  \ \     |               ,'.              /    /  L |
          \  J \     \           _.'   `-._       _.'    /  _.'
           `.___,\    `._     _,'          '-...-'     /'`"'
                  \      '---'  _____________         /
                   `.           \|T T T T T|/       ,'
                     `.           \_|_|_|_/       .'
                       `.         `._.-..'      .'
                         `._         `-'     _,'
                            `--._________.--'
      -->
    
    <script src="script.js"></script>
  </head>
  <body>
    <div id="popupnvsite" style="display: block; position: fixed; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.9; background: black; z-index: 9998;">
    </div>
    <div id="popupnvsitemsg" style="display: block; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999;">
      <div style="position: relative; width: 250px; margin: auto; background: white; border-radius: 10px; padding: 20px; margin-top: 200px;">
        <p>Vous êtes sur le site de campagne d'ESEOmega.
        <br>Nous vous invitons à visiter le nouveau site du BDE de l'ESEO sur <a href="http://eseomega.fr">ESEOmega.fr</a>.</p>
        <p><a href="#" onclick="document.getElementById('popupnvsite').style.display = 'none'; document.getElementById('popupnvsitemsg').style.display = 'none';">Rester sur ce site</a></p>
      </div>
    </div>
    <header>
      <div id="logo">
        <a href="index" title="Accueil">
          <img id="logo" src="res/logo.png" />
        </a>
      </div>
      <nav>
        <ul>
          <li id="liNuage1"<?php if($titrePage == "L'équipe") echo ' class="pageSelect"'; ?>>
            <a href="liste" title="Membres de la liste" onmouseover="nuage(1);" onmouseout="denuage(1);">
              <img id="nuage1" src="res/nuage1.png" />
              <p style="top: -60px;">Equipe</p>
            </a>
          </li>
          <li id="liNuage2"<?php if($titrePage == "Programme") echo ' class="pageSelect"'; ?>>
            <a href="programme" title="Programme de la campagne" onmouseover="nuage(2);" onmouseout="denuage(2);">
              <img id="nuage2" src="res/nuage2.png" />
              <p>Programme</p>
            </a>
          </li>
          <li id="liNuageVide">&nbsp;</li>
          <li id="liNuage3"<?php if($titrePage == "Animations") echo ' class="pageSelect"'; ?>>
            <a href="anim" title="Animations et événements lors de la campagne" onmouseover="nuage(3);" onmouseout="denuage(3);">
              <img id="nuage3" src="res/nuage3.png" />
              <p>Animations</p>
            </a>
          </li>
          <li id="liNuage4"<?php if($titrePage == "Partenaires") echo ' class="pageSelect"'; ?>>
            <a href="partenaires" title="Nos partenaires" onmouseover="nuage(4);" onmouseout="denuage(4);">
              <img id="nuage4" src="res/nuage4.png" />
              <p style="top: -52px;">Partenaires</p>
            </a>
          </li>
        </ul>
      </nav>
    </header>
    <img src="res/colh.png" class="hautg" />
    <img src="res/colh.png" class="hautd"<?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false ||
                                                   strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false ||
                                                   strpos($_SERVER['HTTP_USER_AGENT'], 'iPod') !== false)
                                                    echo 'style="left: 478.5px;"'; ?> /><br/>
    <a href="#" title="Télécharger l'app ESEOmega" onmouseover="appMenu(1);" onmouseout="appMenu(0);"><img src="res/app.png" id="linkg" /></a>
    <a href="http://facebook.com/ESEOmega" title="ESEOmega sur Facebook" target="_blank"><img src="res/facebook.png" id="linkd" /></a>
    <div id="popapp" onmouseover="appMenu(1);" onmouseout="appMenu(0);">
      <a href="https://play.google.com/store/apps/details?id=fr.bde_eseo.eseomega" title="Télécharger l'app ESEOmega pour Android" target="_blank"><img src="res/android.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="https://itunes.apple.com/fr/app/eseomega/id966385182?mt=8" title="Télécharger l'app ESEOmega pour iOS" target="_blank"><img src="res/apple.png" /></a></div>
    <article>
      <table>
        <tr>
          <td colspan="3" id="toprow"></td>
        </tr>
        <tr>
          <td class='colonne layout'></td>
          <td class='layout'>