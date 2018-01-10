<?php include "header.php"; ?>
<article class="tutheader">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h2>Getting started</h2>
      <h1>Der Anfang mit dem Raspberry Pi 3b</h1>
    </div>
  </div>
</div>
</article>
<article class="tutorial">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">

      </div>
      <div class="col-xs-8">
        <h2>Was brauche ich für den Einstieg?</h2>
<br>
<p>
<ul class="gegenstandsliste">
<li>
            <strong><a href="http://amzn.to/2AyuVtu">Raspberry Pi 3*</a></strong>:
            In den Tutorials benutzen wir den aktuellsten Raspberry Pi. Das ist momentan das Modell 3b. <br>
            Dieser hat 4x 1,2GHz, 1GB Ram und ein intigriertes WLan- und Bluetooth Modul.<br>
            Zusätzlich hat man noch vier usb-ports und einen HMDI anschluss.
           </li>
          <li>
            <strong><a href="http://amzn.to/2lYLV6Z">Netzteil*</a></strong>:
            Damit der Raspberry Pi genug Strom bekommt, brauchst du ein Netzteil mit MicroUSB stecker.<br>

          </li>
          <li>
            <strong><a href="http://amzn.to/2AyLPIl">SD-Karte*</a></strong>:
            Die SD Karte wird benötigt, um den Raspberry Pi  mit einem Betriebssystem auszustatten.<br>
            Die minimal benötigte größe unterscheidet sich zwar von Betriebssystem zu Betriebssystem, sollte aber nicht unter 2GB sein.
            Die maximale Größe ist 32GB.<br>
            Ich würde euch deshalb eine 16GB SD Karte empfehlen. Diese reicht vollkommen aus. Falls nicht, kannst du auch eine <a href="http://amzn.to/2AwbPo2">externe Festplatte</a> anschließen.
          </li>
<li><a href="http://amzn.to/2lZhVb2">Gehäuse*</a>(optional)</li>
</ul>
</p>
<br><hr>
<h2>Betriebssystem installieren</h2>
<p>
  Um das Betriebssystem zu installieren musst du als erstes auf die <a href="https://www.raspberrypi.org/downloads/raspbian/">Dowload-Seite</a>.<br>
  Dort downloadest du dir dann <b>RASPBIAN STRETCH LITE</b>.<br>
  Während das Betriebssystem heruntergeladen wird, kannst du dir auch schonmal das Programm <a href="https://etcher.io/">Etcher</a> herunterladen und installieren. Dieses wird benötigt um das Betriebssystem auf der SD karte zu installieren.<br>
  Wenn beide Downloads abgeschlossen sind, steckst du deine SD karte in dein SD-kartenlesegerät. Wenn di KArte erkannt wird, öffnest du <b>Etcher</b>.<br>
  Dort klickst du dann auf <strong>Select Image</strong>, wo du dann das gedownloadete Betriebsystem auswählst.<br>
  Bei <strong>Select drive</strong> wählst du dann deine SD-Karte aus.<br>
  Danach kannst du dann auf <strong>Flash!</strong> drücken und das Programm sollte dann den Rest erledigen.<br>
  Damit wäre dann der erste Schritt schonmal erledigt.
</p>
<hr>
<h2>SSH aktivieren</h2>
<p>
  Wenn du deinen Pi nicht über ein HMDI kabel anschließen willst, brauchst du SSH. Über SSH kannst du von jedem Computer in deinem Netzwerk, auf den Raspberry pi zugreifen.<br>
  Dazu benötigst du noch ein Programm namens <a href="http://www.putty.org/">Putty</a>.
</p>
<p>
  Da ssh standartgemäss deaktiviert ist, musst du es zunächst durch einen kleinen Trick aktivieren.<br>
  Dazu steckst du deine Micro SD-Karte nochmal in dein SD-kartenleser. Jetzt navigierst du zu der SD-Karte und öffnest im explorer Menü den Punkt <b>Ansicht</b>. Dort aktivierst du den Punkt <b>Dateinamenerweiterungen</b>.<br>
  Dann erstellst du eine neue Textdatei in dem Hauptverzeichniss. Diese nennst du <b>ssh</b> und entfernst das <b>.txt</b> am ende. Mit klick auf bestätigung, dass du die Datei wirklich so nennen willst, ist SSH aktiviert.
</p>
<h2>Verkabelung</h2>
<p>
  Die Micro SD-Karte kannst du nun unten in den Raspberry Pi stecken. Dann noch das Lan Kabel und zu guter letzt das Stromkabel.
  Nun sollt ein Licht leuchten, dass dir zeigt, dass der Raspberry Pi läuft.<br>
</p>
<h2>Mit SSH verbinden</h2>
<p>
  Um dich mit dem Pi verbinden zu können, benötigen wir jetzt die IP des Pi´s. Diese wissen wir allerdings nicht.<br>
  Um diese herauszufinden, musst du dich auf deinem Router anmelden und dort die IP raussuchen.<br>
  Bei den meisten routern ist die IP des Routers <a href="192.168.0.1">192.168.0.1</a>. Falls du einen CBN Router von Vodafone hast, bekommst du <a href="#">hier</a> eine kleine Anleitung.<br>
  
</p>
      </div>
      <div class="col-xs-2">

      </div>
    </div>
  </div>
</article>
