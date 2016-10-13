<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nosnippet" />
    <title>ESEOmega &mdash; T&eacute;l&eacute;charger</title>
    <meta name="description" content="Site de campagne d'ESEOmega pour le BDE de l'ESEO">
    
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="favicon.png">
    <link rel="icon" sizes="192x192" href="favicon2.png">
    <meta name="apple-mobile-web-app-title" content="Site ESEOmega">
    <meta name="msapplication-TileImage" content="favicon.png"/>
    <meta name="msapplication-TileColor" content="#2A82C8"/>
    <meta name="application-name" content="Site ESEOmega">
    <meta name="theme-color" content="#2A82C8">
    <meta name="apple-itunes-app" content="app-id=966385182">
    <style>
    	body {
			font-family: "Helvetica Neue", "Segoe UI Light", "Segoe WP", "Roboto", Helvetica, Arial, sans-serif;
			text-align: center;
			font-weight: lighter;
		}
		h1 {
			color: #AAA;
			font-weight: 100;
			font-size: 5em;
			margin: 0;
		}
		h2 {
			color: #555;
			font-weight: 100;
			font-size: 3em;
			margin-top: 5px;
		}
		h3 {
			color: #222;
			font-weight: 100;
			font-size: 1.7em;
		}
		section {
			color: #888;
			margin: 0 5px 50px 5px;
		}
		a {
			color: inherit;
		}
		footer {
			color: #595959;
			font-size: 0.8em;
			margin-top: 25px;
			margin-bottom: 7px;
		}
		footer aside {
			color: #999;
			margin-top: -7px;
		}
    </style>
  </head>
  <body>
    <?php
    	$ua = $_SERVER['HTTP_USER_AGENT'];
    	$os = '';
    	$url = 'http://eseomega.fr';
    	$store = 'le site ESEOmega';
    	if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'iPod') !== false)
    	{
	    	$os    = 'iOS';
	    	$store = "l'App Store";
	    	$url   = 'https://itunes.apple.com/fr/app/eseomega/id966385182?mt=8';
	    }
    	else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false)
    	{
	    	$os    = 'Android';
	    	$store = 'Google Play';
	    	$url   = 'https://play.google.com/store/apps/details?id=fr.bde_eseo.eseomega';
	    }
    ?>
  	<header>
	  	<h1>ESEOmega</h1>
	  	<h2><?php if ($os != '') echo('pour '.$os); ?></h2>
  	</header>
  	<section>
  		<h3>Redirection vers <a href="<?php echo($url); ?>" title="Aller"><?php echo($store); ?></a>&hellip;</h3>
  		<?php if ($os != '') echo('<p>Aller à <a title="Site d\'ESEOMega" href="http://eseomega.fr">ESEOmega.fr</a></p>'); ?>
    <footer>
    	<aside>&copy; 2015 &middot; Thomas Naudet pour ESEOmega</aside>
    </footer>
    <script>
    	document.location.href = "<?php echo($url); ?>";
    </script>
  </body>
</html>