<?php
  include "header.php";
 ?>
<article class="tutheader">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>API Tutorial mit PHP</h2>
        <h1>API richtig auslesen und verwerten mit php und Bildern</h1>
      </div>
    </div>
  </div>
</article>
<article class="webserver-erstellen-tutorial">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">

      </div>
      <div class="col-xs-8">
        <br>
        <h2 style="text-align: center">Was ist eine API?</h2>
        <br>
        <p>

        </p>
        <br><hr>
        <div class="lolapi">
        <h2 style="text-align: center;">League of Legends API</h2>
        <p>
          Mit der League of Legends API, können wir alle möglichen Daten von
          dem Spiel bekommen, wie z.B. Spielerlevel, den Rank und rankgpunkte
          wie die Division.<br>
          </p>
        <p>
          Um zu starten, müsst ihr als allererstes euren LoL account als
          Developer account bei Riot Games anmelden. Dazu geht ihr
          auf <a href="https://developer.riotgames.com/">developer.riotgames.com</a>.
          Hier meldet ihr euch oben rechts unter Sign in mit euren normalen
          LoL daten an.
        </p>
        <img src="img/developer-riotgames.png" alt="startseite developer.riotgames " width="750px"/><br><br><br>
        <p>
          Wenn ihr nun angemeldet seid, sollte ihr nun dass hier sehen <br>
          <img src="img/Dashboard.png" alt="dashboard" / width="750px">
        </p>
        <p>
          Hier seht ihr nun euren API Key. Ohne diesen geht nichts! <br>
          Der Api Key, den wir von Riot bekommen, läuft nach ca. einem Tag ab,
          da dieser Key nur zum Entwickeln und Testen ist. Einen Permanenten Key
          bekommen wir wenn wir die Seite veröffentlichen.<br>
        </p>
        <p>
          Als nächtes starten wir unsere IDE. In meinem Fall benutze ich Atom.<br>
          Wenn ihr nicht wisst, wie ihr ein neues HTML projekt erstellt, könnt
          ihr <a href="#">hier</a> klicken. Dort wird dir gezeigt, wie du auf
          deinem PC einen kleinen Webserver installierst und wie du ein neues
          Projekt erstellst.<br>
          Wir erstellen uns in dem Ordner <br>
          <code>C: Xampp htdocs</code><br>
          einen neuen Ordner. Bei Atom wähle ich den Ordner nun als
          Projektordner aus und erstelle mir dort einen neue Datei mit dem
          Namen <br>
          <code>index.html</code><br>
           Auf dieser Seite wird nachher ein Suchfeld sein, indem wir den
           Benutzernamen eingeben können, von dem wir die Informationen sehen
           möchten.<br>
        </p>
        <p>
          Fangen wir an.<br>
          Wir erstellen in der <b>index.html</b> nun das Html grundgerüst.<br>
          <img src="img/htmlgrundseite.png" alt="html" /><br><br>
          Als erstes setzen wir den title der Seite zu <br>
          <code>&lt;title&gt;Home&lt;/title&gt;</code><br><br>
          Nun erstellen wir im Body eine Form <br>
          <pre>
&lt;form action="api.php" method="get"&gt;
  &lt;input type="text" placeholder='Summonername' name='summonername' required&gt;
  &lt;button type="submit">Suchen&lt;/button&gt;
&lt;/form&gt;</pre>
<img src="img/html-form.png" alt="" width="750px;"/><br><br>
        </p>
        <hr>
        <h2 style="text-align: center;">PHP teil</h2>
        <p>
          Nun erstellen wir eine neue Datei namens <br>
          <code>api.php</code><br><br>
          In dieser Datei werden wir alle Daten auslesen und verwerten.<br>
        </p>
        <p>
          Wenn ihr euch mit PHP noch nicht befasst habt oder euch ein paar schritte noch nichts sagen, könnt ihr vieles <a href="https://www.w3schools.com/php/">auf</a> nachlesen!
        </p>
        <p>
          Wir starten in der leeren Datei mit:<br>
          <code>&lt;?php</code><br><br>
          dann deklarieren wir eine Variable mit dem API key
          <code>$api_key = 'API_KEY'</code><br><br>
          API_KEY müsst ihr nun mir eurem Api key ersetzen, den ihr auf der
          Startseite von <a href="https://developer.riotgames.com/">developer.riotgames.com</a> bekommt.<br>
          <img src="img/api_key.png" alt="" /><br>
        </p>
        <p>
          Als nächtes müssen wir noch den Namen, den wir von der <code>Index.html</code> bekommen, als variable speichern.<br>
          Dazu machen wir <br>
          <code>$summonerName = $_GET['summonername'];</code><br>
          <img src="img/api-summonername.png" alt="" />
        </p>
        <p>
          <br>
          Jetzt kommen wir zum Interressanten Teil.<br><br>
          Wir erstellen unsere erste API anfrage.<br>
          Dazu müssen wir aber zuerst auf <a href="https://developer.riotgames.com/api-methods/">diese</a> Seite geht.<br>
          Dort solltet ihr nun folgendes sehen
          <img src="img/alleapis.png" alt="" width="750px;"/>  <br><br>
          auf der linken Seite wählen wir nun <b>Summoner-V3</b> aus.
          Von den 3 aufgelisteten, interresiert uns nur <br>
          <code>/lol/summoner/v3/summoners/by-name/{summonerName}</code><br>
          Wenn wir darauf klicken, bekommen wir die Informationen angezeigt die wir aus dieser anfrage bekommen.<br>
          <img src="img/summoner-v3-infos.png" alt="" width="750px;"/><br><br>
          Scrollen wir nun runter, bis wir zu <br>
          <img src="img/sm-v3-eingabe.png" alt="" width="750px;"/><br>
          kommen, könnt ihr bei <b>SummonerName</b> euren LoL namen eingeben.<br>
          Bei <b>Include Api Key as</b> wählt ihr <b>Query Param</b> aus und dann auf <b>Execute Request</b> klicken.
          Scrollt ihr nun runter bis ihr zu <b>Response Body</b> kommt, solltet
          ihr Informationen zu eurem LoL account finden, wie z.B. euer Level
          und eure Account ID´s, die ihr für später benötigt.<br>
        </p>
        <p>
          Aber wie bekommen wir nun diese Informationen auf unsere Seite?<br>
          Das geht ganz einfach, indem wir in der <code>api.php</code> nun folgendes hinzufügen
          <pre>
$result = json_decode(file_get_contents('https://euw1.api.riotgames.com/lol/summoner/v3/summoners/by-name/'.$summonerName . '?api_key=' . $api_key));
          </pre>
          Dies speichert nun die Informationen die wir eben sehen konnten in die Variable <code>$result</code>.<br>
          Doch wie komme ich an den Link für diese Anfrage?<br>
          Diesen findest du unter <b>Execute Request</b> bei <b>Request URL</b><br>
          <img src="img/sm-v3-request-url.png" alt="" width="750px;"/><br><br>
          Den Summonername ersetzen wir in unserer Abfrage mit dem Namen, den wir auf der <code>Index.html</code> eingeben und den Api key ersetzen wir mit dem Key, den wir in der <code>api.php</code> zugewiesen haben.
        </p>
        <hr>
        <h2 style="text-align: center;">Json teil</h2>
        <p>
          So...<br>
          Wenn wir auf den Link in der <b>Request URL</b> klicken, sehen wir so etwas <br>
          <img src="img/json-roh.png" alt="" /><br><br>
          Jede einzelne Information, können wir nun in einzelne variablen stecken.<br>
          Als erstes wollen wir das <b>SummonerLevel</b> in eine Variable tun, dies tun wir so<br>
          <code>$summonerLevel = $result->summonerLevel;</code><br>
          <img src="img/api-php.png" alt="" width="750px;"/><br><br>
          Um zu testen ob es funktioniert hat, schreiben wir unter das <code>$summonerLevel</code><br>
          <code>echo $summonerLevel;</code>
        </p>
        <p>
          Wenn ihr nun auf die <code>Index.html</code> geht und dort euren Namen eingibt, solltet ihr auf api.php weitergeleitet werden und dort sollte nun eure id stehen.<br>
          Nun speichern wir alle Werte in eine variable.<br>
          <pre>
$summoner= $result->name;
$summonerID = $result->id;
$accountID = $result->accountId;</pre>

        </p>
        </div>
        <hr>
        <br>
        <div class="destiny2api">
        <h2 style="text-align: center;"></h2>


        </div>
        <hr>
        <br>
      </div>
      <div class="col-xs-2">

      </div>
    </div>
  </div>
</article>
<?php include "footer.php" ?>
