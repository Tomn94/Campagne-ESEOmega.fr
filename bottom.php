            </td>
          <td class='colonne layout'></td>
        </tr>
        <tr>
          <td colspan="3" class="bas"></td>
        </tr>
      </table>
    </article>
    <img src="res/basg.png" class="basg" />
    <img src="res/basd.png" class="basd" />
    <footer>
      <p>2&Omega;15 ESEOmega</p>
    </footer>
<?php
  if ($anim) {
    echo "    <script>\n      window.onload = lancerAnim();\n    </script>\n";
  } ?>
  <script> 
    var $buoop = {vs:{i:9,f:20,o:17,s:6},c:2}; 
    function $buo_f(){ 
     var e = document.createElement("script"); 
     e.src = "//browser-update.org/update.js"; 
     document.body.appendChild(e);
    };
    try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
    catch(e){window.attachEvent("onload", $buo_f)}
  </script>
  </body>
</html>