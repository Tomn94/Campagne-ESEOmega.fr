<?php
  $titrePage = 'Erreur 404';
  include('top.php');
?>

<h2>Erreur 404</h2>
<p>Page introuvable<br>&nbsp;<br>
  <img src="<?php
    $gif = array("http://31.media.tumblr.com/82e4f76821209da07f8d703f6051c791/tumblr_nl9zg5PBFr1r539hzo1_400.gif",
                 "http://38.media.tumblr.com/daf2de8ca47da96400f403d926eef21a/tumblr_nk7649FoMB1r539hzo1_400.gif",
                 "http://38.media.tumblr.com/5ff955d81aad9ee5e8753e65a8529ebe/tumblr_ni29kgv7if1r539hzo1_400.gif");
    echo ($gif[rand(0,2)]);
    ?>" />
  <br>&nbsp;
</p>

<?php
  include('bottom.php');
?>