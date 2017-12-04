﻿<?php
include 'apikey.php';
//$api_key = 'RGAPI-4a607434-5f08-4201-bafa-43b3a5f4c611';
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

//Namen von jedem Spieler von Team1
  $team1 = [
    1 => $result2->participants[0]->summonerName,
    2 => $result2->participants[1]->summonerName,
    3 => $result2->participants[2]->summonerName,
    4 => $result2->participants[3]->summonerName,
    5 => $result2->participants[4]->summonerName,
  ];
  $team2 = [
    1 => $result2->participants[5]->summonerName,
    2 => $result2->participants[6]->summonerName,
    3 => $result2->participants[7]->summonerName,
    4 => $result2->participants[8]->summonerName,
    5 => $result2->participants[9]->summonerName
  ];

//Namen von jedem Spieler von Team2
  $team1Id = [
    1 => $result2->participants[0]->summonerId,
    2 => $result2->participants[1]->summonerId,
    3 => $result2->participants[2]->summonerId,
    4 => $result2->participants[3]->summonerId,
    5 => $result2->participants[4]->summonerId
  ];
  $team2Id = [
    1 => $result2->participants[5]->summonerId,
    2 => $result2->participants[6]->summonerId,
    3 => $result2->participants[7]->summonerId,
    4 => $result2->participants[8]->summonerId,
    5 => $result2->participants[9]->summonerId
  ];
}
function getChampionNameByID($championID)
{
  $result3 = json_decode(file_get_contents('https://ddragon.leagueoflegends.com/cdn/7.23.1/data/de_DE/champion.json'));
  foreach ($result3->data as $champ) {
    //echo $champ->key;
    if ($champ->key == $championID) {
      echo $champ->name;
    }
  }
}
function getCurrentChampLevel($matchPlayerID, $championID){
  $api_key = 'RGAPI-4a607434-5f08-4201-bafa-43b3a5f4c611';
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
		     <?php print $summonerLevel." ".$summoner." ".$summonerID; ?>
	     </h3>
      </div>
      </div>
      <div class="col-xs-3">

      </div>
    </div>
  </div>
</article>
<?php if($ingame){
  ?>
  <article class="test">
    <div class="row">
      <div class="col-xs-2">

      </div>
      <div class="col-xs-4">
        <div class="team1">
          <h1>TEAM1</h1>
          <br>
          <?php
          //echo $team1[1];
          for ($i=1; $i < 6; $i++) {
            if ($summonerID == $team1Id[$i]) {
              ?>
              <a href="http://filzknoetche.de/lol/summonerinfo.php?summonername=<?php echo $team1[$i];?>"><b><?php echo $team1[$i];?></b></a>

                <br><br>

              <?php
            }else {
              ?>
              <a href="http://filzknoetche.de/lol/summonerinfo.php?summonername=<?php echo $team1[$i];?>"><?php echo $team1[$i];?></a>

                <br><br>

              <?php
            }
          }
           ?>
        </div>

      </div>
      <div class="col-xs-4">

        <div class="team2">
          <h1>TEAM2</h1>
          <br>
          <?php
          for ($i=1; $i < 6; $i++) {
            if ($summonerID == $team2Id[$i]) {
              ?>
              <a href="http://filzknoetche.de/lol/summonerinfo.php?summonername=<?php echo $team2[$i];?>"><b><?php echo $team2[$i];?></b></a>

                <br><br>

              <?php
            }else {
              ?>
              <a href="http://filzknoetche.de/lol/summonerinfo.php?summonername=<?php echo $team2[$i];?>"><?php echo $team2[$i];?></a>

                <br><br>

              <?php
            }
          }
           ?>
        </div>
      </div>
      <div class="col-xs-2">

      </div>
    </div>
  </article>
  <?php
}else {
  echo "nicht ingame";
}
 ?>
