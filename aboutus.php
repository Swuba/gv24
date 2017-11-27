<?php include "includes/header.php" ?>
<article class="aboutus">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">

      </div>
      <div class="col-xs-8">
        <h2>Wer wir sind</h2>
        <p>
          Wir sind 3 coole dudes mit dem Ziel...
        </p>
      </div>
      <div class="col-xs-2">

      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-xs-4">
        <a href="mailto:felixbickelmann@hotmail.de"><img src="img/Filzknoetche.jpg"  class="img-circle img-responsive" alt="Lol" /></a>
        <h2>Felix</h2>
        <h3>Anwendungsentwickler und Hobbybastler</h3>
        <p>
          I Bims Felix,
        <?php
        $tag = 26;
        $mon = 9;
        $jah = 1997;
        $jetzt = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $gebur = mktime(0, 0, 0, $mon, $tag, $jah);
        $age   = intval(($jetzt - $gebur) / (3600 * 24 * 365));
        echo $age;
         ?>
        Jahre
      </p>
      </div>
      <div class="col-xs-4">
        <img src="img/filler.png" class="img-circle img-responsive" alt="Lol" />
        <h2>Kersten</h2>
        <h3>Asiate</h3>
        <?php
        $tag = 19;
        $mon = 1;
        $jah = 1997;
        $jetzt = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $gebur = mktime(0, 0, 0, $mon, $tag, $jah);
        $age   = intval(($jetzt - $gebur) / (3600 * 24 * 365));
        echo $age;
         ?>
      </div>
      <div class="col-xs-4">
        <img src="img/filler.png" class="img-circle img-responsive" alt="Lol" />
        <h2>Lars</h2>
        <h3>Anwendungsentwickler und Hobbybastler</h3>
        <?php
        $tag = 16;//idk
        $mon = 10;
        $jah = 1998;
        $jetzt = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $gebur = mktime(0, 0, 0, $mon, $tag, $jah);
        $age   = intval(($jetzt - $gebur) / (3600 * 24 * 365));
        echo $age;
         ?>
      </div>
    </div>
  </div>
</article>
