<?php
  $titrePage = "L'équipe";
  include('top.php');
?>

<style>
section {
  width: 990px;
  background-position-y: -50px;
  height: 450px;
  position: relative;
  margin: auto;
  z-index: 10;
  -webkit-box-shadow: inset 0px 0px 15px 0px black;
  -moz-box-shadow: inset 0px 0px 15px 0px black;
  box-shadow: inset 0px 0px 15px 0px black;
}
.layout table {
   margin: auto;
   max-width: 990px;
}
.layout td img {
  width: 165px;
}
.members8 td img {
  width: 123px;
}
.members7 td img {
  width: 141px;
}
.layout td {
  font-size: 16px;
}
.layout {
  padding: 0;
}
.postes {
   color: #1b66cf;
   font-size: 16px;
   line-height: 10px;
}
article td table tr {
  display: table-row;
}
article td table td {
  display: table-cell;
  padding-bottom: 10px;
  width: 100%;
}
.bandeau {
  margin-top: 30px;
}/*
.bandeau {
  position: relative;
  top: 60px;
  z-index: 15;
   margin-top: -30px;
}
.bandeauSansTab {
  top: 37px;
}*/
</style>

<script>
  function parallax() {
    var ss = document.getElementsByTagName('section');
    for (var i = 0 ; i < ss.length ; i++)
    {
      var e = document.getElementsByTagName('section')[i];
      //var height = isNaN(window.innerHeight) ? window.clientHeight : window.innerHeight;
      var pos = (window.innerHeight / 2) - e.getBoundingClientRect().top;
      pos = pos / window.innerHeight * 200;
      pos -= e.id;
      e.style.backgroundPosition = "0 " + pos + "px";
    }
  }
</script>

<section style="background: url('img/groupe.jpg'); background-size: 100%;" id="145">
</section>

<img src="img/titres/bureau.png" alt="Bureau" class="bandeau" />
<section style="background: url('img/bureau.jpg'); background-size: 100%;" id="145">
</section>
<table>
  <tr>
    <td><img src="img/Bureau/0.jpg" /></td>
    <td><img src="img/Bureau/1.jpg" /></td>
    <td><img src="img/Anim/5.jpg" /></td>
    <td><img src="img/Bureau/3.jpg" /></td>
    <td><img src="img/Bureau/4.jpg" /></td>
    <td><img src="img/Bureau/5.jpg" /></td>
  </tr>
  <tr>
    <td>J&eacute;r&eacute;my Br&eacute;e</td>
    <td>Marine Icard</td>
    <td>Loïc Planchenault</td>
    <td>Joseph Hien</td>
    <td>Romain Kermorvant</td>
    <td>C&eacute;cile Delage</td>
  </tr>
  <tr class="postes">
    <td>Pr&eacute;sident</td>
    <td>Vice-présidente</td>
    <td>Vice-président</td>
    <td>Tr&eacute;sorier</td>
    <td>Tr&eacute;sorier</td>
    <td>Secr&eacute;taire</td>
  </tr>
</table>

<img src="img/titres/event.png" alt="Event" class="bandeau" />
<section style="background: url('img/event.jpg'); background-size: 100%;" id="170">
</section>
<table>
  <tr>
    <td><img src="img/Event/0.jpg" /></td>
    <td><img src="img/Event/1.jpg" /></td>
    <td><img src="img/Event/2.jpg" /></td>
    <td><img src="img/Event/3.jpg" /></td>
    <td><img src="img/Bureau/2.jpg" /></td>
    <td><img src="img/Event/4.jpg" /></td>
  </tr>
  <tr>
    <td>Romain Mesnil<br><span class="postes">Responsable</span></td>
    <td>Marwan<br><span style="font-size: 15px;">Boughammoura</span></td>
    <td>Samia<br>Charaa</td>
    <td>Alexis<br>Demay</td>
    <td>Rodolphe Dubant</td>
    <td>Pierre<br>Flouvat-Cavier</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><img src="img/Event/5.jpg" /></td>
    <td><img src="img/Event/6.jpg" /></td>
    <td><img src="img/Event/7.jpg" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Julie<br>Frichet</td>
    <td>Eva<br>Legrand</td>
    <td>Flavien<br>Reynaud</td>
    <td>Enzo<br>Grieneisen</td>
  </tr>
</table>

<img src="img/titres/anim.png" alt="Anim" class="bandeau" />
<section style="background: url('img/anim.jpg'); background-size: 100%;" id="170">
</section>
<table>
  <tr>
    <td><img src="img/Anim/0.jpg" /></td>
    <td><img src="img/Anim/1.jpg" /></td>
    <td><img src="img/Anim/2.jpg" /></td>
    <td><img src="img/Anim/3.jpg" /></td>
    <td><img src="img/Anim/4.jpg" /></td>
    <td><img src="img/Com/1.jpg" style="opacity: 0;" /></td>
  </tr>
  <tr>
    <td>Yoann Beuch&eacute;</td>
    <td>Arnaud Billy</td>
    <td>Antoine Bret&eacute;cher</td>
    <td>Aur&eacute;lien Clause</td>
    <td>Clément Letailleur</td>
    <td>Samy Leroux</td>
  </tr>
  <tr class="postes">
    <td>Responsable</td>
    <td colspan="5">&nbsp;</td>
  </tr>
</table>

<img src="img/titres/club.png" alt="Club" class="bandeau" />
<section style="background: url('img/club.jpg'); background-size: 100%;" id="170">
</section>
<table style="width: 660px;">
  <tr>
    <td><img src="img/Club/0.jpg" /></td>
    <td><img src="img/Club/1.jpg" /></td>
    <td><img src="img/Club/2.jpg" /></td>
    <td><img src="img/Club/3.jpg" /></td>
  </tr>
  <tr>
    <td>Ludivine Leal</td>
    <td>Nicolas Basily</td>
    <td>In&egrave;s Deliaire</td>
    <td>Marie Quervarec</td>
  </tr>
  <tr class="postes">
    <td>Responsable</td>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

<img src="img/titres/com.png" alt="Com" class="bandeau" />
<section style="background: url('img/com.jpg'); background-size: 100%;" id="110">
</section>
<table>
  <tr>
    <td><img src="img/Com/0.jpg" /></td>
    <td><img src="img/Com/2.jpg" /></td>
    <td><img src="img/Com/3.jpg" /></td>
    <td><img src="img/Com/4.jpg" /></td>
    <td><img src="img/Com/5.jpg" /></td>
    <td><img src="img/Com/6.jpg" /></td>
  </tr>
  <tr>
    <td>Axel Cahier</td>
    <td>Sonasi Katoa</td>
    <td style="font-size: 15px;">François Leparoux</td>
    <td>Alexis Louis</td>
    <td>Thomas Naudet</td>
    <td>Axel Rollo</td>
  </tr>
  <tr class="postes">
    <td>Responsable</td>
    <td colspan="6">&nbsp;</td>
  </tr>
</table>

<img src="img/titres/rexinterpole.png" alt="REX/Interpole" class="bandeau bandeauSansTab" />
<table style="width: 495px;">
  <tr>
    <td><img src="img/REX/0.jpg" /></td>
    <td><img src="img/REX/1.jpg" /></td>
    <td><img src="img/REX/2.jpg" /></td>
  </tr>
  <tr>
    <td>Victor Voirand</td>
    <td>Perrine Blaudet</td>
    <td>Victoria Louboutin</td>
  </tr>
  <tr class="postes">
    <td>Responsable</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

<img src="img/titres/log.png" alt="Log" class="bandeau" />
<section style="background: url('img/log.jpg'); background-size: 100%;" id="170">
</section>
<table style="width: 495px;">
  <tr>
    <td><img src="img/Log/0.jpg" /></td>
    <td><img src="img/Log/1.jpg" /></td>
    <td><img src="img/Log/2.jpg" /></td>
    <td><img src="img/Com/1.jpg" style="opacity: 0;" /></td>
  </tr>
  <tr>
    <td>Baudouin de Miniac</td>
    <td>Baptiste Gouesbet</td>
    <td>Antoine de Pouilly</td>
    <td>Solange de Sevin</td>
  </tr>
  <tr class="postes">
    <td>Responsable</td>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

<img src="img/titres/rcii.png" alt="RCII" class="bandeau" />
<section style="background: url('img/rcii.jpg'); background-size: 100%;" id="170">
</section>
<table style="width: 495px;">
  <tr>
    <td><img src="img/RCII/0.jpg" /></td>
    <td><img src="img/RCII/1.jpg" /></td>
    <td><img src="img/RCII/2.jpg" /></td>
  </tr>
  <tr>
    <td>Alexandre Cosneau</td>
    <td>Margaux Blanchard</td>
    <td>Ana&iuml;s Croisnier</td>
  </tr>
  <tr class="postes">
    <td>Responsable</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

<img src="img/titres/voyage.png" alt="Voyage" class="bandeau bandeauSansTab" />
<table style="width: 330px;">
  <tr>
    <td><img src="img/Voyage/0.jpg" /></td>
    <td><img src="img/Voyage/1.jpg" /></td>
  </tr>
  <tr>
    <td>&Eacute;lodie Boiteux</td>
    <td>Isabelle Baudvin</td>
  </tr>
  <tr class="postes">
    <td>Responsable</td>
    <td>&nbsp;</td>
  </tr>
</table>

<img src="img/titres/sponsors.png" alt="Sponsors" class="bandeau" />
<section style="background: url('img/sponsors.jpg'); background-size: 100%;" id="175">
</section>
<table style="width: 495px;">
  <tr>
    <td><img src="img/Sponsors/0.jpg" /></td>
    <td><img src="img/Sponsors/1.jpg" /></td>
    <td><img src="img/Sponsors/2.jpg" /></td>
    <td><img src="img/Com/1.jpg" style="opacity: 0;" /></td>
    <td><img src="img/Com/1.jpg" style="opacity: 0;" /></td>
  </tr>
  <tr>
    <td>&Eacute;lise Habib</td>
    <td>Jean Hardy</td>
    <td>Nicolas Lign&eacute;e</td>
    <td>Cl&eacute;ment Jeanroy</td>
    <td>Lucas Amiaud</td>
  </tr>
  <tr class="postes">
    <td>Responsable</td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>


<script>
  parallax();
  window.addEventListener('scroll', function(event){
    parallax();
  });
</script>

<?php
  include('bottom.php');
?>