<?php
  include "header.php";
 ?>
<article class="webserver-erstellen">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Webserver auf dem Raspberry Pi erstellen</h2>
        <h1>Apache, PHP, MySql,phpmyadmin und Ftp Schritt für Schritt installieren und einrichten</h1>
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
        <p>Die Installation von PHP7 ist genauso einfach wie die von Apache2</p>
        <p>
          Beginnenen tun wir mit<br>
          <code>sudo apt-get install php7.0</code><br>
          Falls dies nicht funktioniert, müssen wir zuerst noch die Sourcelist bearbeiten, dass php7 installiert werden kann.<br>
          Zuerst:<br>
          <code>sudo nano /etc/apt/sources.list</code><br><br>
          Dann fügt ihr am ende der Datei:<br>
          <code>deb http://repozytorium.mati75.eu/raspbian jessie-backports main contrib non-free</code><br>
          ein.<br><br>
          Die Datei mit <code>Strg+x</code> schließen und mit <code>j</code> die Änderungen übernehmen. Anschließend muss die Paketverwaltung noch upgedatet und php nun installiert werden:<br>
          <code>sudo nano apt-get update</code><br>
          <code>sudo apt-get install php7.0</code><br>
          <br>
          Nach einem Neustart von Apache:<br>
          <code>sudo /etc/init.d/apache2 restart</code><br><br>
          ist php installiert.
        </p>

        <p>Wenn die installation abgeschlossen ist, können wir dies auch testen, indem wir
          in das Verzeichnis des Apache-server gehen
          <br>
          <code>cd /var/www/html</code>
        </p>
        <p>Hier erstellen wir eine neue Datei namens phpinfo.php <br>
        <code>sudo nano phpinfo.php</code>
      </p>
        <p>In diese Datei schrieben wir nun folgendes</p>
        <pre>
&lt;?php
  phpinfo();
?&gt;
</pre>
        <p>Habt ihr das getan, speichert ihr mit <strong>STRG + O</strong> und beendet mit
        <strong>STRG + X</strong> den Editor.</p>
        <p>Öffnen wir nun https://raspberrypi/phpinfo.php im Browser, sollten
        wir alle informationen über das installierte php5 sein.</p>
        <!--            Bild von phpinfo anzeigen-->
        </div>
        <br><hr>
        <div class="mysql">
        <h2 style="text-align: center;">Mysql Installieren</h2>
        <p>
          MySql benötigen wir um auf unserem Server, um Datenbanken zu erstellen
          und zu benutzen. Mit Datenbanken können wir z.B. Benutzerdaten oder Temperaturen speichern.<br>
        </p>
        <p>Die installation beginnen wir mit <br>
        <code>sudo apt-get install mysql-server mysql-client</code>
        </p>
        <p>Danach werden wir aufgefordet ein Passwort einzugeben und es danach
        nochmal zu bestätigen</p>
        <p>Nachdem alles eingerichtet wurde, müssen wir den Raspberry Pi neu starten. Das
        machen wir mit <br>
        <code>sudo reboot</code>
        </p>
        </div>
        <br><hr>
        <div class="phpmyadmin">
        <h2 style="text-align: center;">phpMyAdmin Installieren</h2>
        <p>phpMyAdmin ist ein Tool um Datenbanken mit grafischer Benutzeroberfläche zu erstellen und zu verwalten</p>
        <p>Installieren können wir es mit <br>
        <code>sudo apt-get install php5-mysql phpmyadmin</code>
        </p>
        <p>In dem Konfigurationsfenster wählen wir <strong>apache2</strong> mittels
        der <strong>Leertaste</strong> und <strong>Enter</strong> aus.</p>
        <p>Daraufhin wird gefragt, ob einige Datenbanken, die phpMyAdmin benötigt,
        erstellt werden sollen. Dies bestätigen wir und fahren fort.</p>
        <p>Als nächstes wird nach dem Passwort gefragt, welches wir für den
        root-User eingegeben haben.</p>
        <p>Jetzt wird noch nach einem Passwort zum Einloggen in phpMyAdmin
        gefragt.</p>
        <p>Nachdem wir alles erfolgreich war, müssen wir noch Apache mit
        phpMyAdmin verknüpfen. Dazu müssen wir die Datei
        /etc/php5/apache2/php.ini bebarbeiten <br>
        <code>sudo nano /etc/php5/apache2/php.ini</code>
        </p>
        <p>In der Datei scrollen wir ganz runter bis wir unter <strong>; END;</strong>
        sind und fügen <strong>extension=mysql.so</strong> ein.</p>
        <p>Nun Speichern wir noch mit <strong>STRG + O</strong> und beenden mit
        <strong>STRG + X</strong> den Editor.</p>
        <p>So, das wars auch schon mit der Installation. Jetzt können wir uns unter
        <a href="http://raspberrypi/phpmyadmin/">http://raspberrypi/phpmyadmin/</a>
        bzw eurer IP des Raspberry Pi´s anmelden.</p>
        <p>Der Standartbenutzername ist <strong>root</strong></p>
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
<?php include "footer.php" ?>
