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
  Dort downloadest du dir dann <b>RASPBIAN STRETCH LITE</b>. Wenn du vor hast den Pi mit einem HDMI kabel anzuschließen oder remotedesktop zu verwerden, musst du hier <b>RASPBIAN STRETCH</b> herunterladen.<br>
  Während das Betriebssystem heruntergeladen wird, kannst du dir auch schonmal das Programm <a href="https://etcher.io/">Etcher</a> herunterladen und installieren. Dieses wird benötigt um das Betriebssystem auf der SD karte zu installieren.<br>
  Wenn beide Downloads abgeschlossen sind, steckst du deine SD karte in dein SD-kartenlesegerät. Wenn di KArte erkannt wird, öffnest du <b>Etcher</b>.<br>
  <img src="img/etcher.png" alt="sdfs">
  Dort klickst du dann auf <strong>Select Image</strong>, wo du dann das gedownloadete Betriebsystem auswählst.<br>
  Bei <strong>Select drive</strong> wählst du dann deine SD-Karte aus, falls sie nicht schon automatisch erkannt wurde, wie es bei mir der Fall war.<br>
  <img src="img/etcher2.png" alt="">
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
  <img src="img/sshdateiendung.png" width="800px" alt="">
  Dann erstellst du eine neue Textdatei in dem Hauptverzeichniss.<br>
  <img src="img/sshordner.png" alt="">
  Diese nennst du <b>ssh</b> und entfernst das <b>.txt</b> am ende.<br>
  <img src="img/sshtxt.png" alt=""><br>
  <img src="img/ssh.png" alt=""><br>
  <img src="img/sshconf.png" alt=""><br>
  Mit klick auf bestätigung, dass du die Datei wirklich so nennen willst, ist SSH aktiviert.<br>
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
  Bei den meisten routern ist die IP des Routers 192.168.0.1. Falls du einen CBN Router von Vodafone hast, bekommst du <a href="#">hier</a> eine kleine Anleitung.<br>
  Dann kannst du <b>Putty</b> starten. In dem Feld <b>Host name(or IP adress)</b> schreibst du jetzt die IP des PI´s hin.<br>
  <img src="img/putty.png" alt=""><br> und drückst auf <b>Open</b>.<br>
  Jetzt solltest du nach einer Bestätigung gefragt werden. <br>
  <img src="img/puttysecure.png" alt=""> <br>
  Diese bestätigst du mit Ja um fortzufahren.<br>
  Es öffnet sich ein schwarzes Fenster, wo steht: <b>Login as: </b><br>
  Der standart Loginname ist <code>pi</code>. <kbd>Enter</kbd><br>
  Das standart Passwort ist <code>raspberry</code>. Das Passwort wird bei der Eingabe nicht angezeigt.<br>
  <img src="img/puttyloginusername.png" alt=""><br>
  Danach sollte dieses Bild zu sehen sein <br>
  <img src="img/puttylogin.png" alt=""><br>
</p>
<h2>Konfiguration</h2>
<p>
  Jetzt müssen wir noch ein paar Sachen Konfigurieren.<br>
  Dazu geben wir <code>sudo raspi-config</code> ein. <b>Sudo</b> ist unter Linux der Befehl es als Admin auszuführen, wie bei Windows das Programm als Administrator auszuführen.<br>
  <img src="img/raspi-config1.png" alt=""><br>
  So sollte es jetzt aussehen.<br>
  Dort wählst du als erstes <b>1 Change User Passwort</b>, um ein neues Passwort zu vergeben. Navigieren tust du mit den <b>Pfeiltasten</b>.
  Jetzt wirst du gebeten ein neues Passwort einzugeben und zu bestätigen.<br>
  <br>
  Danach gehst du in die <b>Localisation Options</b><br>
  <img src="img/raspi-config-main.png" alt=""><br>
  Du wählst <b>Change Locale</b> aus und bekommst diese Ansicht.<br>
  <img src="img/location-de.png" alt=""><br>
  Dort scrollst du mit den <b>Pfeiltasten</b> soweit runter bis du <b>de_DE.UTF8 UTF8</b> siehst. Dieses markierst du mit der <kbd>Leertaste</kbd>. Mit der <kbd>Pfeilrechts</kbd> taste wechselst du zu <b>Ok</b> und bestätigst mit <kbd>Enter</kbd>.<br>
  Jetzt kommt dieses Fenster <br>
  <img src="img/location-de1.png" alt=""><br>
  Dort wählst du <b>de_DE.UTF8</b> aus und drückst wieder die <kbd>rechte Pfeiltaste</kbd> und <kbd>Enter</kbd>.
  <br>
  <br>
  Danach wählst du <b>Change Timezone</b> aus, <br>
  <img src="img/timezone-eu.png" alt=""><br>
  wählst <b>Europa</b> aus bestätigst mit <kbd>Enter</kbd>.<br>
  Dann öffnet sich ein anderes Fenster <br>
  <img src="img/timezone-eu1.png" alt=""><br>
  Dort Berlin auswählen, Fertig!<br>
  Danach machst du das Selbe noch bei <b>Wi-fi Country</b><br>
  <img src="img/country.png" alt="">
  Dort einfach <b>Germany auswählen</b>.<br>
  <br>
  Als letztes gehen wir in die <b>7 Advanced Options</b><br>
  <img src="img/advanced-options.png" alt=""><br>
  Dort wählst du <b>Expand Filesystem</b> aus und bestätigst mit <kbd>Enter</kbd>. Die meldung das danach ein Neustart nötig ist, bestätigen wir auch und sind damit Fertig mit den Einstellungen.<br>
  <br>
  Wenn du jetzt mit mit der <kbd>rechten Pfeiltaste</kbd> <b>Finish</b> auswählt
  und mit <kbd>Enter</kbd> bestätigt, werdet ihr gefragt, ob ihr jetzt einen
  Neustart machen wollt. Dies bestätigt ihr. Jetzt sollte euch <b>Putty</b>
  eine benachrichtigung zeigen, dass zu dem Raspberry Pi keine verbindung mehr
  beteht. Ihr müsst Putty nun schließen und neu starten.<br>
  Ihr loggt euch wieder ein, diesmal mit eurem neuen Passwort, und gibt noch als vorletzten Befehl <code>sudo apt-get update</code> ein.
  Wenn dieser alles fertig installiert hat, müsst ihr noch als letzten Befehl <code>sudo apt-get upgrade</code> ausführen.<br>
  <strong>Fertig!</strong>
</p>
<p>
  Jetzt ist euer Raspberry Pi fertig konfiguriert und einsatzbereit. Viel Spaß!
</p>
      </div>
      <div class="col-xs-2">

      </div>
    </div>
  </div>
</article>
