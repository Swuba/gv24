<?php
 include "includes/header.php";
?>
<!-- Headerbanner und Überschrift -->
<article class="index-intro">
  <div class="container">
    <div class="row">
      <div class="col-xs-3">

      </div>
      <div class="col-xs-6">
        <h2>DeinTutorial24</h2>
        <h1>Eine Seite für alles!</h1>
        <a id="index-cta" href="tutorials.php">Zu den Tutorials</a>
      </div>
      <div class="col-xs-3">

      </div>
    </div>
  </div>
</article>
<!-- Seiteninfo -->
<article class="index-info">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">

      </div>
      <div class="col-xs-8">
        <h2>Was wir bieten</h2>
        <p>
          Hauptsächlich findest du hier kostenlose, aktuelle und verständliche Schritt für Schritt Tutorials auf Deutsch.
          Von Tutorials für den Raspberry Pi wie z.B das aufsetzten des Pi´s, Webserver erstellen, Temperatur und Luftfeuchtigkeit messen und abrufbar machen, LED´s ansteuern und vieles mehr...
        </p>
      </div>
      <div class="col-xs-2">

      </div>
    </div>
    <hr>

  </div>
</article>
<article class="index-courses">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Empfehlenswerte Tutorials</h2>
        <h3 class="index-courses-subheader"></h3>
        <div class="row">
            <div class="col-xs-6">
              <!-- Getting started -->
              <a href="tutorials/getting-started.php">
                <div class="index-courses-outerbox courses-gs">
                  <div class="index-courses-icon">
                    <div>
                      <img src="img/startup-white.png" alt="">
                    </div>
                  </div>
                  <div class="index-courses-box">
                    <div>
                      <h3>Getting started</h3>
                      <p>Tutorials, die dir Zeigen, wie du einen Raspberry Pi 3 anschließt und einrichtest, einen Webserver installierst und vieles mehr!</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-xs-6">
              <!-- Webserver erstellen -->
              <a href="tutorials/raspberry-pi-webserver-erstellen.php">
                <div class="index-courses-outerbox courses-webserver">
                  <div class="index-courses-icon">
                    <div>
                      <img src="img/www-white.png" alt="">
                    </div>
                  </div>
                  <div class="index-courses-box">
                    <div>
                      <h3>Webserver erstellen</h3>
                      <p>Basics, wie du deine Entwicklungsumgebung einrichtest, der Start deiner eigenen Website, API´s verwendest z.B. von League of Legends und vieles mehr!</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
        </div>
      </div>
    </div>
  </div>
</article>
<article class="webserver-erstellen-tutorial">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">
        <ul class="kapitel-auswahl">
          <li><a href="#apache2">Apache2</a></li>
          <li><a href="#php">PHP</a></li>
          <li><a href="#mysql">MYSQL</a></li>
          <li><a href="#phpmyadmin">phpmyadmin</a></li>
          <li><a href="#ftp">FTP</a></li>
        </ul>
      </div>
      <div class="col-xs-8">
        <br>
        <h2 style="text-align: center">Was ist ein Webserver eigentlich und was
          braucht man dafür?</h2>
        <br>
        <p>
          Ein Webserver ist eine spezielle Software, welche Dienste, Daten bzw.
          Inhalte für das Internet zum Abruf bereitstellt.<br>
          Um einen Webserver auf dem Raspberry Pi aufzusetzen, brauchst du nur
          einen Raspberry Pi(wie du deinen Raspberry Pi am besten aufsetzt, kannst
          du <a href="getting-started.php">hier</a> nachlesen),
          eine stabile Internetleitung und zugriff auf deinen Router um den Server
          auch von außerhalb erreichbar zu machen und eventuell eine Domain.
        </p>
        <br><hr>
        <div class="apache2">
        <h2 style="text-align: center;">Apache2 Installieren</h2>
        <p>
          Als aller erstes müssen die Pakete auf dem neusten Stand gebracht werden.<br>
          <code>sudo apt-get update</code>
        </p>
        <p>Danach installieren wir Apache2. Dies macht ihr mit <br><code>sudo apt-get install apache2 </code></p>
        <p>Die installation von Apache sollte nun fertig sein. Um dies zu überprüfen
          gehst du einfach in deinen Browser und gibst die IP-Adresse von deinem Raspberry Pi´s ein oder <a href="http:raspberrypi/ ">http:raspberrypi/ </a>. Dazu musst du nur im selben Netzwerk sein.
        </p>
        </div>
        <hr>
        <br>
        <div class="php">
        <h2 style="text-align: center;">PHP7 Installieren</h2>
        Um PHP7 zu installieren, benötigt ihr die neuste version von Rasbian, in meinem Fall benutze ich <a href="https://www.raspberrypi.org/downloads/raspbian/">Raspbian Stretch Lite</a>
        version: November 2017.<br>
        <br>

        <?php
        //Eventuell noch erklärung falls ältere Version
        /*


        */
         ?>
        <p>
          Beginnenen wir mit<br>
          <code>sudo apt-get install php7.0</code><br>
          <br>
          Nach einem Neustart von Apache:<br>
          <code>sudo /etc/init.d/apache2 restart</code><br><br>
          ist php installiert.
          <br>
        </p>
        <p>Nun kannst du testen ob es funktioniert, indem du
          in das Verzeichnis des Apache-server gehst
          <br>
          <code>cd /var/www/html</code>
        </p>
        <p>Hier erstellst du eine neue Datei namens phpinfo.php <br>
        <code>sudo nano phpinfo.php</code>
      </p>
        <p>In diese Datei schreibst du nun folgendes</p>
        <pre>
&lt;?php
  phpinfo();
?&gt;
</pre>
        <p>Habt ihr das getan, speicherst du mit <strong>STRG + O</strong> und beendest mit
        <strong>STRG + X</strong> den Editor.</p>
        <p>Öffnest du nun <a href="https://raspberrypi/phpinfo.php">https://raspberrypi/phpinfo.php</a> im Browser, sollst
        du alle informationen über das installierte php7 sehen.</p><br>
        <img src="img/phpinfo.png" alt="phpinfo" width="100%" />
        <!--            Bild von phpinfo anzeigen-->
        </div>
        <br><hr>
        <div class="mysql">
        <h2 style="text-align: center;">Mysql Installieren</h2>
        <p>
          MySql benötigen wir um auf unserem Server, um Datenbanken zu erstellen
          und zu benutzen. Mit Datenbanken können wir z.B. Benutzerdaten oder Temperaturen speichern und abrufen.<br>
        </p>
        <p>Die installation beginnen wir mit <br>
        <code>sudo apt-get install mysql-server mysql-client</code>
        </p>

        <p>Nachdem alles installiert wurde, müssen wir den Raspberry Pi neu starten. Das
        machen wir mit <br>
        <code>sudo reboot</code>
        </p>
        </div>
        <br><hr>
        <div class="phpmyadmin">
        <h2 style="text-align: center;">phpMyAdmin Installieren</h2>
        <p>phpMyAdmin ist ein Tool um Datenbanken mit grafischer Benutzeroberfläche zu erstellen und zu verwalten</p>
        <p>Installieren können wir es mit <br>
        <code>sudo apt-get install phpmyadmin</code>
        </p>
        Nun solltet ihr nach einem Passwort gefragt werden <br>
        <img src="img/phpmyadmin-installation1.png" alt="phpmyadmin" width="100%" /><br>
        Da es, zumindest bei mir, zu vielen problemen mit dem einloggen in phpMyAdmin gegeben hat, da ich mich mit dem <strong>Root</strong> user nicht einloggen konnte,
        habe ich zum Glück eine einfache Lösung gefunden.<br>
        Dafür müssen wir einen neuen Benutzer mit Root rechten anlegen, das machen wir so indem wir zuerst<br>
        <code>sudo mysql</code>
        eingeben.<br><br>
        Dort geben wir dann <br>
        <code>CREATE USER 'test'@'localhost' IDENTIFIED BY '12345';</code> ein. <strong>'test'</strong> ist der Benutzername und <strong>'12345'</strong> ist das Passwort. Benutzername und Passwort könnt ihr mit eurem wunschnamen und wunschpasswort ersetzen.<br>
        <br>
        Danach geben wir dem neu angelegten Benutzer root Rechte <br>
        <code>GRANT ALL PRIVILEGES ON *.* TO 'test'@'localhost' WITH GRANT OPTION;</code><br>
        <strong>'test'</strong> müsst ihr mit eurem gewählten Benutzernamen ersetzen.<br>
        <br>
        Abschliessen tun wir es mit <br>
        <code>FLUSH PRIVILEGES;</code><br>
        <br>
        Um die Mysql eingabe zu beenden, müssen wir <strong>STRG</strong>+<strong>D</strong> drücken.<br><br>
        <p>So, das wars mit der Einrichtung. Jetzt können wir uns unter
        <a href="http://raspberrypi/phpmyadmin/">http://raspberrypi/phpmyadmin/</a>
        bzw eurer IP des Raspberry Pi´s anmelden.</p><br>
        <img src="img/phpmyadmin-login.png" alt="phpmyadmin-login" width="100%"/>
        <p>Als Benutzernamen und Passwort nehmt ihr nun den vorhin erstellten Benutzer.</p>
        <p><strong>Fertig!</strong><br> Jetzt können wir über das Interface
        Datenbanken erstellen und verwalten.</p>
        </div>
        <br><hr>
        <div class="ftp">
        <h2 style="text-align: center;">FTP Installieren</h2>
        <p>Zum einfachen Upload sämtlicher Dateien benutzen wir FTP. Dazu richten wir in diesem Teil einen
        FTP Server mit Zugang auf dem Raspberyy Pi ein.</p>
        <p>Dieses Tutorial kann auch zum einfachen Austauschen von Dateien
        zwischen PC und Raspberry benutzt werden und ist nicht zwingendermaßen
        nur für einen Webserver.</p>
        <p>Als erstes installieren wir proftpd <br>
        <code>sudo apt-get install proftpd</code>
        </p>
        <p>Nun werden wir nach der Startvariante gefragt. Hier wählen wir
        <strong>Servermodus</strong> aus</p>
        <p>Jetzt können wir schon z.B. mit Filezilla auf unseren PI zugreifen
        und Dateien rüberschicken. Um auf unseren Webserver zugriff zu haben
        müssen wir jetzt nurnoch einen neuen Benutzer anlegen.</p>
        <p>Dazu wecheseln wir erstmal das Verzeichnis <br>
        <code>cd /etc/proftpd</code>
        </p>
        <p>Hier soll der virtuelle Benutzer erstellt werden. Im folgenden
        Beispiel erstelle ich den Benutzer <strong>felix</strong> mit dem
        Homevezeichnis <strong>/var/www/</strong> <br>
        <code>sudo ftpasswd --passwd  --name felix --gid 33 --uid 33 --home /var/www/ --shell /bin/false</code></p>
        <p>Nun nur noch das Passwort eingeben und bestätigen. Falls du das
        Passwort irgentwann mal ändern willst, dann musst du einfach nur die
        obigen 2 schritte wiederholen.</p>
        <p>Um den virtuellen User noch zu registrieren, müssen wir ihn in die
        Konfigurationsdatei schreiben <br>
        <code>sudo nano /etc/proftpd/proftpd.conf</code></p>
        <p>Dort scrollen wir wieder bis zum Ende und fügen folgenden Code ein:</p>
        <pre>
DefaultRoot ~
AuthOrder mod_auth_file.c  mod_auth_unix.c
AuthUserFile /etc/proftpd/ftpd.passwd
AuthPAM off
RequireValidShell off
</pre>
        <p>Nun Speichern wir noch mit <strong>STRG + O</strong> und beenden mit
        <strong>STRG + X</strong> den Editor.</p>
        <p>Jetzt starten wir den FTP Server neu.</p>
        <p>Bevor wir uns auf unseren angelegten Benutzer einloggen können,
        müssen wir noch die entsprechenden Rechte geben.</p>
        <pre>
sudo chmod g+s /var/www
sudo chmod 775 /var/www
sudo chown -R www-data:www-data /var/www
</pre>
        <p>
          Somit wären wir mit der Installation von FTP fertig und können jetzt
          alle unsere Dateien auf unseresn Raspberry Pi übertragen. Wie ihr das machen könnt
          erfahrt ihr im nächsten Schritt.
        </p>
      </div>
        <br><hr>
        <div class="verbinden-ftp">
        <h2 style="text-align: center;">Verbindung mit dem Raspberry Pi</h2>
        <p>Um eine Verbindung mit dem Raspberry Pi herzustellen, brauchen wir
          ein Programm namens Filezilla, dass ihr <b><a href="https://filezilla-project.org/">hier</a></b> herunterladen könnt.
        </p>

      </div>
      </div>
      <div class="col-xs-2">

      </div>
    </div>
  </div>
</article>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- tut1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2802451501665411"
     data-ad-slot="6303639429"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php include "includes/footer.php"; ?>
  </body>
</html>
