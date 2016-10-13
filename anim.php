<?php
  $titrePage = 'Animations';
  include('top.php');
?>

<style>
  .layout table h2 {
    font-size: 17px;
    color: #1473E0;
    margin-bottom: -10px;
  }
  .layout table p {
    font-size: 15px;
  }
  .points {
    color: #1473E0;
  }
  .detail {
    color: #9f9f9f;
  }
  .anim {
    color: rgb(75, 200, 75);
  }
  .soiree {
    color: rgb(255, 0, 50);
  }
  .bouffe {
    color: #FFB800;
  }
</style>

&nbsp;<img src="img/titres/anims.png" alt="Animations" class="bandeau" />
<table>
  <tr>
    <td>
      <h2>Lundi 30 mars</h2>
      <p><span class="bouffe">7h-8h &middot; </span>Petit déjeuner<br>
        <span class="bouffe">Toute la journée &middot; </span>Pauses grignotage<br>
        <span class="anim">Sur Facebook &middot; </span>L’Énigme de Métis<br>
        <span class="bouffe">Midi &middot; </span>Open Bouffe<br>
        <span class="anim">Midi &amp; pauses &middot; </span>Cerbère<br>
        <span class="anim">Midi &amp; pauses &middot; </span>La dégustation d’Hadès<br>
        <span class="anim">Midi &amp; pauses &middot; </span>Aphrodite<br>
        <span class="anim">Midi &middot; </span>Cronos<br>
        <span class="anim">Midi &middot; </span>Athéna<br>
        <span class="anim">Midi &middot; </span>Attrapez-les tous ! Poulémon
      </p>
    </td>
    <td>
      <h2>Mardi 31 mars</h2>
      <p><span class="bouffe">7h-8h &middot; </span>Petit déjeuner<br>
        <span class="bouffe">Toute la journée &middot; </span>Pauses grignotage<br>
        <span class="anim">Sur Facebook &middot; </span>L’Énigme de Métis<br>
        <span class="bouffe">Midi &middot; </span>Mega Bouffe<br>
        <span class="anim">Midi &amp; pauses &middot; </span>Cerbère<br>
        <span class="anim">Midi &amp; pauses &middot; </span>Apollon<br>
        <span class="anim">Midi &middot; </span>Arès<br>
        <span class="anim">Midi &middot; </span>Zeus<br>
        <span class="anim">Midi &middot; </span>Poséidon<br>
        <span class="anim">Midi &middot; </span>Dionysos<br>
        <span class="soiree">À partir de 18h30 &middot; </span>Rallye apparts<br>
        <span class="soiree">À partir de 23h &middot; </span>After
      </p>
    </td>
  </tr>
  <tr>
    <td>
      <h2>Jeudi 2 mars</h2>
      <p><span class="detail">À partir de 12h &middot; </span>Débat<br>
        <span class="anim">Midi &middot; </span>Remise des lots
      </p>
    </td>
    <td>
      <h2>Vendredi 3 mars</h2>
      <p>Votez ESEOmega ! 💪⚡️</p>
    </td>
  </tr>
</table>
<p><a onclick="smooth_scroll_to((navigator.userAgent.indexOf('Firefox') > -1) ? document.documentElement : document.body, findPos('apps'), 1000);" style="text-decoration: underline; cursor: pointer;">Plus d'infos dans l'app !</a></p>

<img src="img/titres/defis.png" alt="Défis" class="bandeau" />
<h2>Les 12 Travaux de Gaméon</h2>
<p>
  <strong>Tentez de réaliser le plus de défis possibles !</strong><br>
  Inscrivez-vous et formez un groupe de 4 personnes dont 1 chef.<br>
  Chaque défi, dans chaque thème, rapporte plus ou moins de points.<br>
  Selon la mission, il est nécessaire d'envoyer une preuve par photo ou vidéo<br>sur <a href="http://facebook.com/ESEOmega" target="_blank"><em>Facebook</em></a> ou à <em><span id="liam"></span></em>.<br>
  Vous pouvez utiliser l'app pour vous aider à cocher ce que vous avez déjà réalisé.<br>
  L'équipe gagnante, celle qui aura le plus de points et de QRcodes flashés, sera récompensée !<br>
  <strong>Bon courage !</strong>
</p>
<h2 style="font-size: 20px; margin-bottom: 0px; margin-top: 40px">Défis des 12 Travaux de Gaméon</h2>
<table style="margin-bottom: 30px;">
  <tr>
    <td><h2>Les défis d'Athéna</h2>
    <p><span class="points">2, 4 ou 6 pts selon la difficulté &middot; </span><a onclick="smooth_scroll_to((navigator.userAgent.indexOf('Firefox') > -1) ? document.documentElement : document.body, findPos('QRcodes'), 1000);" style="text-decoration: underline; cursor: pointer;">Chasse aux QRcodes</a><br>
<span class="points">15 pts &middot; </span>Le snap/photo ressemblant le plus à un grec/dieu<br>
<span class="points">15 pts &middot; </span>Le plus de monde sur une chaise<br>
<span class="points">3 pts &middot; </span><a onclick="smooth_scroll_to((navigator.userAgent.indexOf('Firefox') > -1) ? document.documentElement : document.body, findPos('apps'), 1000);" style="text-decoration: underline; cursor: pointer;" title="Télécharger !">Télécharger l'app ESEOmega</a><br>
<span class="points">3 pts &middot; </span><a href="http://facebook.com/ESEOmega" target="_blank" title="Indice !">Liker la page Facebook de la liste</a><br>
<span class="points">3 pts &middot; </span><a onclick="snapchat();" style="text-decoration: underline; cursor: pointer;">Ajouter la liste sur Snapchat</a></p></td>
  </tr>
  <tr>
    <td><h2>Top Cronos</h2>
    <p><span class="points">9 pts &middot; </span>Lancer un aviron bayonnais (paquito) à Ralliement<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">3 pts &middot; </span>Danser YMCA sur la fontaine du Ralliement : torse nu<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">6 pts &middot; </span>Danser YMCA sur la fontaine du Ralliement : en soutif<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">6 pts &middot; </span>Pyramide humaine à au moins 6 à Ralliement<span class="detail"> &middot; photo nécessaire</span><br>
<span class="points">3 pts &middot; </span>Course contre le tram entre Ralliement et Molière<span class="detail"> &middot; vidéo nécessaire</span></p></td>
  </tr>
  <tr>
    <td><h2>L'ambroisie des dieux</h2>
    <p><span class="points">9 pts &middot; </span>Manger un sandwich de pâté au chien/chat<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">6 pts &middot; </span>Gober un œuf<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">3 pts &middot; </span>Manger 5 biscuits pour chien<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">3 pts &middot; </span>Gober 5 flans<span class="detail"> &middot; vidéo nécessaire</span></p></td>
  </tr>
  <tr>
    <td><h2>Artémis à la chasse</h2>
    <p><span class="points">9 pts &middot; </span>Boire tout seul 33 cL de Coca cul sec<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">3 pts &middot; </span>Boire un café/verre d’eau salé(e)<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">3 pts &middot; </span>Tenir un glaçon dans sa main jusqu’à ce qu’il fonde<span class="detail"> &middot; vidéo nécessaire</span></p></td>
  </tr>
  <tr>
    <td><h2>Les plaisirs d'Hermès</h2>
    <p><span class="points">9 pts &middot; </span><a href="https://www.youtube.com/watch?v=2CfJQAM3yXA" target="_blank" title="Indice !">Faire une commande parfaite à McDo</a><span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">6 pts &middot; </span>Poser dans une vitrine de magasin avec une tenue de grec<span class="detail"> &middot; photo nécessaire</span><br>
<span class="points">6 pts &middot; </span>Passer au Drive à pied en imitant la voiture<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">6 pts &middot; </span>Aller chercher des échantillons gratuits dans un sex-shop<span class="detail"> &middot; nous les apporter</span></p></td>
  </tr>
  <tr>
    <td><h2>Les supplices d'Hadès</h2>
    <p><span class="points">12 pts &middot; </span>Se faire épiler les aisselles à la cire<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">9 pts &middot; </span>Se laver les dents au tabasco<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">6 pts &middot; </span>Snifer un rail de poivre<span class="detail"> &middot; vidéo nécessaire</span></p></td>
  </tr>
  <tr>
    <td><h2>Les folies d'Apollon</h2>
    <p><span class="points">12 pts &middot; </span>Chanter une chanson paillarde à la BU (St Serge ou Belle-Beille)<br>
<span class="points">6 pts &middot; </span>Réussir à refaire la chorégraphie de la liste<br>
<span class="points">3 pts &middot; </span>Chanter le Célestin dans le tram</p></td>
  </tr>
  <tr>
    <td><h2>Zeus à l'ESEO</h2>
    <p><span class="points">12 pts &middot; </span>Avoir un autographe d'une fille de la liste sur le derrière<span class="detail"> &middot; photo avec la fille</span><br>
<span class="points">3 à 12 points, à voir avec Billy pts &middot; </span>Faire le lèche-cul auprès de Billy<br>
<span class="points">9 pts &middot; </span>Demander les numéros de la liste (50 %)<span class="detail"> &middot; nous les apporter</span><br>
<span class="points">6 pts &middot; </span>Venir en sandales/chaussettes à l’ESEO<span class="detail"> &middot; photo nécessaire</span><br>
<span class="points">6 pts &middot; </span>Prendre un selfie avec le Directeur ou M. Madeline<span class="detail"> &middot; photo nécessaire</span></p></td>
  </tr>
  <tr>
    <td><h2>Les caprices d'Hestia</h2>
    <p><span class="points">9 pts &middot; </span>Embrasser (bouche, avec/sans langue) 3 inconnu(e)s dans la rue<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">9 pts &middot; </span>« Je te tiens, tu me tiens » avec un ASVP/policier<span class="detail"> &middot; photo nécessaire</span><br>
<span class="points">3 pts &middot; </span>Arroser un inconnu<span class="detail"> &middot; vidéo nécessaire</span></p></td>
  </tr>
  <tr>
    <td><h2>La vengeance de Poséidon</h2>
    <p><span class="points">6 pts &middot; </span>Se laver au lavage auto au Karcher : habillé(e)<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">9 pts &middot; </span>Se laver au lavage auto au Karcher : en sous-vêtements<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">9 pts &middot; </span>Se laver au lavage auto au Karcher : à 3<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">12 pts &middot; </span>Se laver au lavage auto au Karcher : nu(e)<span class="detail"> &middot; vidéo nécessaire</span><br>
<span class="points">6 pts &middot; </span>Se laver les cheveux à la farine<span class="detail"> &middot; photo nécessaire</span><br>
<span class="points">6 pts &middot; </span>Laver le pare-brise de 3 voitures à un feu rouge<span class="detail"> &middot; vidéo nécessaire</span></p></td>
  </tr>
  <tr>
    <td><h2>Les délires de Cupidon</h2>
      <p><span class="points">9 pts &middot; </span>Lécher les aisselles d’un mec poilu<span class="detail"> &middot; photo nécessaire</span><br>
<span class="points">    6 pts &middot; </span>Se mettre une capote sur la tête jusqu’au nez et réussir à la gonfler<span class="detail"> &middot; photo nécessaire</span><br>
<span class="points">    6 pts &middot; </span>Réaliser une prise du Kâmasûtra<span class="detail"> &middot; photo nécessaire</span></p></td>
  </tr>
</table>

<img src="img/titres/qrcode.png" alt="QRcode" class="bandeau" id="QRcodes" />
<p>
  <strong>Sillonnez les terres, explorez les mers,<br>partez à la recherche des QRcodes ESEOmega !</strong><br>
<span>  Une ancienne légende raconte qu'ils sont éparpillés à l'ESEO et dans tout Angers…<br>
<span>  Tel Ulysse, partez à l'aventure !
</p>
<p>
  Créez votre équipe de 4 membres maximum<br>
<span>  Téléchargez l'app et flashez les QRcodes avec dès que vous en trouvez un.<br>
<span>  Un QRcode rapporte 2, 4 ou 6 points à l'équipe pour l'anim de 3 jours « <em>Les 12 Travaux de Gaméon</em> ».<br>
<span>  2 points sont rajoutés si tous les QRcodes moyens sont trouvés, 4 pour tous les difficiles.
</p>
<p style="line-height: 42px;" id="apps">
  <strong>Téléchargez nos applications pour jouer !</strong>
  <br>
  <a href="https://play.google.com/store/apps/details?id=fr.bde_eseo.eseomega" target="_blank"><img src="res/badgeAndroid.png" class="badge" /></a>&nbsp;&nbsp;&nbsp;
  <a href="https://itunes.apple.com/fr/app/eseomega/id966385182?mt=8" target="_blank"><img src="res/badgeiOS.png" class="badge" /></a>
  <br>&nbsp;
</p>


<img src="img/titres/quiestce.png" alt="Qui Est-Ce ?" class="bandeau" />
<p>
  <strong>Trouvez en qui sont déguisés les membres !</strong><br>
  Voici la liste de tous les dieux et héros grecs,<br>remplissez-la et rendez-la avant mercredi 23h59<br>sur papier, par mail <em>(<span id="liam2"></span>)</em> ou via l'app.<br>
  Le gagnant est celui qui a le plus de bonnes réponses et qui a été le plus rapide.<br>
  Cherchez bien, chaque membre porte un indice !
</p>
<p>
  <a href="QuiEstCe" download>Télécharger la fiche-réponses</a>
  &nbsp;<br>
  &nbsp;<br>
</p>

<script>
	var string  = "<span>e</span>@<span>es";
	var string2 = "mega.</span>fr";
	document.getElementById('liam').innerHTML = "bd" + string + "eo" + string2;
	document.getElementById('liam2').innerHTML = "bd" + string + "eo" + string2;
</script>

<?php
  include('bottom.php');
?>