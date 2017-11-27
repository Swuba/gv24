<?php

$api_key = 'RGAPI-3cfe5460-e809-4aee-9be4-a3660aeedf9a';
$summonerName = preg_replace("/ /", "%20", $_GET['summonername']);

//SummonerInfo

$result = json_decode(file_get_contents('https://euw1.api.riotgames.com/lol/summoner/v3/summoners/by-name/'.$summonerName . '?api_key=' . $api_key));
$summonerLevel = $result->summonerLevel;
$summoner= $result->name;
$summonerID = $result->id;
$accountID = $result->accountId;
$summonerIcon = $result->profileIconId;

//Current Game
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'https://euw1.api.riotgames.com/lol/spectator/v3/active-games/by-summoner/'.$summonerID . '?api_key=' . $api_key);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 300);
$content = curl_exec( $ch );
$response = curl_getinfo( $ch );
curl_close ( $ch );
if ($response['http_code'] == 404) {
  $ingame = false;
}else{
  $ingame = true;
  $result2 = json_decode(file_get_contents('https://euw1.api.riotgames.com/lol/spectator/v3/active-games/by-summoner/'.$summonerID . '?api_key=' . $api_key));
  $gameId = $result2->gameId;
  $mapId = $result2->mapId;
  $gameLength = $result2->gameLength;
  $gameLength = ($gameLength / 60) + 3;
  $gameMode = $result2->gameMode;
  $gameType = $result2->gameType;
  $gameQueueConfigId = $result2->gameQueueConfigId;
}
function getChampionNameByID($championID)
{
  $result3 = json_decode(file_get_contents('https://ddragon.leagueoflegends.com/cdn/7.22.1/data/de_DE/champion.json'));
  foreach ($result3->data as $champ) {
    //echo $champ->key;
    if ($champ->key == $championID) {
      echo $champ->name;
    }
  }
}
function getCurrentChampLevel($matchPlayerID, $championID){
  $api_key = 'RGAPI-3cfe5460-e809-4aee-9be4-a3660aeedf9a';
  $result4 = json_decode(file_get_contents('https://euw1.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'.$matchPlayerID.'/by-champion/'.$championID.'?api_key='.$api_key));
  echo $result4->championPoints;
}

//$gamesPlayed = $wins + $losses;
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title><?php echo $summoner . " " .$summonerID; ?></title>
    <!--bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--css -->
    <link rel="stylesheet" type="text/css" href="/lol/style.css">
    <!--google-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Saira" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
<!--google-analytics -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-87147130-1', 'auto');
  ga('send', 'pageview');
</script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/lol" class="navbar-brand">League of Legends</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <form action="summonerinfo.php" class="navbar-form" role="search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Summonername" name="summonername">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
              </div>
        </form>
      </li>
            </ul>
        </div>
    </div>
    </nav>
<article class="summonerinfo">
  <div class="container">
    <div class="row">
      <div class="col-xs-3">

      </div>
      <div class="col-xs-6">
        <div class="summoner">


        <h3>
		<image height="64" width="64" class="img-circle" src="http://avatar.leagueoflegends.com/euw/<?php print $summoner; ?>.png" valign="middle"/>
		<?php print $summonerLevel." ".$summoner ?>
	</h3>
</div>

<?php
  if($ingame){
    ?>
    <h2>Current Game</h2><hr><br>
    <strong style="font-size: 32px;"><?php
    switch ($gameQueueConfigId) {
      case 400:
        //normal
        echo "Normal";
        break;
      case 420:
        //ranked
        echo "Ranked";
        break;
      case 450:
        //aram
        echo "Aram";
        break;
    }

     ?></strong>
    <br>
    Karte: <?php
    switch ($mapId) {
      case 10:
        echo "Twisted Treeline";
        break;
      case 11:
        echo "Summoner's Rift";
        break;
      case 12:
        echo "Howling Abyss";
        break;
    }
     ?><br>
     Spiellänge: <?php echo round($gameLength); ?> Minuten<br>
     <br>
     <hr>
     <h2>Mitspieler</h2>
     <hr>
     <h3>Team1</h3>

      <?php for ($i=0; $i < 5; $i++) {
        if ($summonerID == $result2->participants[$i]->summonerId) {
          ?>
          <a href="summonerinfo.php?summonername=<?php echo $result2->participants[$i]->summonerName; ?>"><b><?php echo $result2->participants[$i]->summonerName; ?></b></a> - <b><?php getChampionNameByID($result2->participants[$i]->championId); ?></b><br>
          <a target="_blank" href="http://www.probuilds.net/champions/details/<?php getChampionNameByID($result2->participants[$i]->championId);?>">Probuilds</a> -
          <a target="_blank" href="https://www.mobafire.com/league-of-legends/<?php getChampionNameByID($result2->participants[$i]->championId);?>-guide">Mobafire</a><br>
          <br>
          <?php
        }else {
          ?>
          <a href="summonerinfo.php?summonername=<?php echo $result2->participants[$i]->summonerName; ?>"><?php echo $result2->participants[$i]->summonerName?></a> - <?php getChampionNameByID($result2->participants[$i]->championId); ?><br>
          ChampionPoints: <?php getCurrentChampLevel($result2->participants[$i]->summonerId, $result2->participants[$i]->championId); ?>
          <br><br>
          <?php
        }
        ?>

        <?php
      } ?>
      <hr>
     <h3>Team2</h3>
     <?php for ($i=5; $i < 10; $i++) {
       if ($summonerID == $result2->participants[$i]->summonerId) {
         ?>
         <a href="summonerinfo.php?summonername=<?php echo $result2->participants[$i]->summonerName; ?>"><b><?php echo $result2->participants[$i]->summonerName; ?></b></a> - <b><?php getChampionNameByID($result2->participants[$i]->championId); ?></b><br>
         <a target="_blank" href="http://www.probuilds.net/champions/details/<?php getChampionNameByID($result2->participants[$i]->championId);?>">Probuilds</a> -
         <a target="_blank" href="https://www.mobafire.com/league-of-legends/<?php getChampionNameByID($result2->participants[$i]->championId);?>-guide">Mobafire</a><br>
         <br>
         <?php
       }else {
         ?>
          <a href="summonerinfo.php?summonername=<?php echo $result2->participants[$i]->summonerName; ?>"><?php echo $result2->participants[$i]->summonerName?></a> - <?php getChampionNameByID($result2->participants[$i]->championId); ?><br>
          ChampionPoints: <?php getCurrentChampLevel($result2->participants[$i]->summonerId, $result2->participants[$i]->championId); ?>
         <br><br>
         <?php
       }
     } ?>
    <?php
  }else {
    ?>
    <br>
    <div class="alert alert-danger">
      Der Spieler befindet sich in keinem Spiel.
</div>
    <?php
  }
 ?>
 <hr>
        <p>
          summonerID: <?php echo $summonerID; ?><br>
        </p>
      </div>
      <div class="col-xs-3">

      </div>
    </div>
  </div>
</article>
