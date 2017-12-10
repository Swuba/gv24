<?php
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
/*
summonerName: Name vom Spieler
summonerID: Die SummonerID vom Spieler
championID: Die championID des aktuellen gespielten Champion
spell1Id: spell1 //flash, heal
spell2Id: spell2 //flash, heal
*/
  $team1 = [
    1 => [
      "summonerName" => $result2->participants[0]->summonerName,
      "summonerId" => $result2->participants[0]->summonerId,
      "championId" => $result2->participants[0]->championId,
      "spell1Id" => $result2->participants[0]->spell1Id,
      "spell2Id" => $result2->participants[0]->spell2Id
    ],
    2 => [
      "summonerName" => $result2->participants[1]->summonerName,
      "summonerId" => $result2->participants[1]->summonerId,
      "championId" => $result2->participants[1]->championId,
      "spell1Id" => $result2->participants[1]->spell1Id,
      "spell2Id" => $result2->participants[1]->spell2Id
    ],
    3 => [
      "summonerName" => $result2->participants[2]->summonerName,
      "summonerId" => $result2->participants[2]->summonerId,
      "championId" => $result2->participants[2]->championId,
      "spell1Id" => $result2->participants[2]->spell1Id,
      "spell2Id" => $result2->participants[2]->spell2Id
    ],
    4 => [
      "summonerName" => $result2->participants[3]->summonerName,
      "summonerId" => $result2->participants[3]->summonerId,
      "championId" => $result2->participants[3]->championId,
      "spell1Id" => $result2->participants[3]->spell1Id,
      "spell2Id" => $result2->participants[3]->spell2Id
    ],
    5 => [
      "summonerName" => $result2->participants[4]->summonerName,
      "summonerId" => $result2->participants[4]->summonerId,
      "championId" => $result2->participants[4]->championId,
      "spell1Id" => $result2->participants[4]->spell1Id,
      "spell2Id" => $result2->participants[4]->spell2Id
    ],
  ];
  $team2 = [
    1 => [
      "summonerName" => $result2->participants[5]->summonerName,
      "summonerId" => $result2->participants[5]->summonerId,
      "championId" => $result2->participants[5]->championId,
      "spell1Id" => $result2->participants[5]->spell1Id,
      "spell2Id" => $result2->participants[5]->spell2Id
    ],
    2 => [
      "summonerName" => $result2->participants[6]->summonerName,
      "summonerId" => $result2->participants[6]->summonerId,
      "championId" => $result2->participants[6]->championId,
      "spell1Id" => $result2->participants[6]->spell1Id,
      "spell2Id" => $result2->participants[6]->spell2Id
    ],
    3 => [
      "summonerName" => $result2->participants[7]->summonerName,
      "summonerId" => $result2->participants[7]->summonerId,
      "championId" => $result2->participants[7]->championId,
      "spell1Id" => $result2->participants[7]->spell1Id,
      "spell2Id" => $result2->participants[7]->spell2Id
    ],
    4 => [
      "summonerName" => $result2->participants[8]->summonerName,
      "summonerId" => $result2->participants[8]->summonerId,
      "championId" => $result2->participants[8]->championId,
      "spell1Id" => $result2->participants[8]->spell1Id,
      "spell2Id" => $result2->participants[8]->spell2Id
    ],
    5 => [
      "summonerName" => $result2->participants[9]->summonerName,
      "summonerId" => $result2->participants[9]->summonerId,
      "championId" => $result2->participants[9]->championId,
      "spell1Id" => $result2->participants[9]->spell1Id,
      "spell2Id" => $result2->participants[9]->spell2Id
    ]
  ];
}
function getChampionNameByID($championID)
{
  $result3 = json_decode(file_get_contents('https://ddragon.leagueoflegends.com/cdn/7.23.1/data/de_DE/champion.json'));
  foreach ($result3->data as $champ) {
    if ($champ->key == $championID) {
      if ($champ->name == "Lee Sin") {
        echo "LeeSin";
      }else if($champ->name == "Kog'Maw"){
        echo "KogMaw";
      }elseif ($champ->name == "Miss Fortune") {
        echo "MissFortune";
      }elseif ($champ->name == "Cho'Gath") {
        echo "ChoGath";
      }elseif ($champ->name == "Kha'Zix") {
        echo "KhaZix";
      }elseif ($champ->name == "Jarvan IV") {
        echo "JarvanIV";
      }elseif ($champ->name == "Vel'Koz") {
        echo "VelKoz";
      }elseif ($champ->name == "Dr. Mundo") {
        echo "DrMundo";
      }elseif ($champ->name == "Master Yi") {
        echo "MasterYi";
      }elseif ($champ->name == "Aurelion Sol") {
        Echo "AurelionSol";
      }elseif ($champ->name == "Rek'Sai") {
        echo "RekSai";
      }elseif ($champ->name == "Tahm Kench") {
        echo "TahmKench";
      }elseif ($champ->name == "Xin Zhao") {
        echo "XinZhao";
      }else {
        echo $champ->name;
      }
    }
  }
}

function getCurrentChampLevel($matchPlayerID, $championID){
  include 'apikey.php';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,'https://euw1.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'.$matchPlayerID.'/by-champion/'.$championID.'?api_key='.$api_key);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 300);
  $content = curl_exec( $ch );
  $response = curl_getinfo( $ch );
  curl_close ( $ch );
  if ($response['http_code'] == 404) {
    $alreadyPlayed = false;
    echo "First Game";
  }else {
    $result4 = json_decode(file_get_contents('https://euw1.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'.$matchPlayerID.'/by-champion/'.$championID.'?api_key='.$api_key));
    echo $result4->championPoints;
  }

}

function getPlayerRank($summonerId){
  include 'apikey.php';
  $result5 = json_decode(file_get_contents('https://euw1.api.riotgames.com/lol/league/v3/positions/by-summoner/'.$summonerId.'?api_key='.$api_key));
  if (!isset($result5[0])) {
    echo "Kein Rank";
  }else{
    if ($result5[0]->queueType == "RANKED_SOLO_5x5") {
      echo $result5[0]->tier.' '.$result5[0]->rank;
    }elseif ($result5[1]->queueType == "RANKED_SOLO_5x5") {
      echo $result5[1]->tier.' '.$result5[0]->rank;
    }elseif ($result5[2]->queueType == "RANKED_SOLO_5x5") {
      echo $result5[2]->tier.' '.$result5[0]->rank;
    }else {
      echo "Nichts gefunden";
    }
  }


  //echo $result5[1]->queueType;
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
  <article class="currentGame">
    <div class="container currentGame">
      <div class="row">
        <div class="col-xs-6">
          <div class="team1">
          <table>
            <thead>
            <tr>
              <th>Name</th>
              <th>Champion</th>
              <th>Champion Points</th>
              <th>Rank</th>
              <th>Guides</th>
            </tr>
            </thead>
            <?php
            for ($i=1; $i < 6; $i++) {
              if($summonerID == $team1[$i]["summonerId"]){
                ?>
                <tr>
                  <td><b><?php echo $team1[$i]["summonerName"]; ?></b></td>
                  <td><img height="32" width="32" src="http://ddragon.leagueoflegends.com/cdn/7.23.1/img/champion/<?php getChampionNameByID($team1[$i]["championId"]);?>.png" alt="lul" /><?php echo getChampionNameByID($team1[$i]["championId"]); ?></td>
                  <td><?php echo getCurrentChampLevel($team1[$i]["summonerId"], $team1[$i]["championId"]); ?></td>
                  <td><?php echo getPlayerRank($team1[$i]["summonerId"]); ?></td>
                  <td><a target="_blank" href="http://www.probuilds.net/champions/details/<?php getChampionNameByID($team1[$i]["championId"]);?>">Probuilds</a>
                  <a target="_blank" href="https://www.mobafire.com/league-of-legends/<?php getChampionNameByID($team1[$i]["championId"]);?>-guide">Mobafire</a></td>
                </tr>
                <?php
              }else {
                ?>
                <tr>
                  <td><?php echo $team1[$i]["summonerName"]; ?></td>
                  <td><img height="32" width="32" src="http://ddragon.leagueoflegends.com/cdn/7.23.1/img/champion/<?php getChampionNameByID($team1[$i]["championId"]);?>.png" alt="lul" /><?php echo getChampionNameByID($team1[$i]["championId"]); ?></td>
                  <td><?php echo getCurrentChampLevel($team1[$i]["summonerId"], $team1[$i]["championId"]); ?></td>
                  <td><?php echo getPlayerRank($team1[$i]["summonerId"]); ?></td>
                  <td><a target="_blank" href="http://www.probuilds.net/champions/details/<?php getChampionNameByID($team1[$i]["championId"]);?>">Probuilds</a>
                  <a target="_blank" href="https://www.mobafire.com/league-of-legends/<?php getChampionNameByID($team1[$i]["championId"]);?>-guide">Mobafire</a></td>
                </tr>
                <?php
              }
            }
             ?>

          </table>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="team2">
          <table>
            <thead>
            <tr>
              <th>Name</th>
              <th>Champion</th>
              <th>Champion Points</th>
              <th>Rank</th>
              <th>Guides</th>
            </tr>
            </thead>
            <?php
            for ($i=1; $i < 6; $i++) {
              if($summonerID == $team2[$i]["summonerId"]){
                ?>
                <tr>
                  <td><a href="summonerinfo.php?summonername=<?php echo $team2[$i]["summonerName"]; ?>"><b><?php echo $team2[$i]["summonerName"]; ?></b></a></td>
                  <td><img height="32" width="32" src="http://ddragon.leagueoflegends.com/cdn/7.23.1/img/champion/<?php getChampionNameByID($team2[$i]["championId"]);?>.png" alt="lul" /><?php echo getChampionNameByID($team2[$i]["championId"]); ?></td>
                  <td><?php echo getCurrentChampLevel($team2[$i]["summonerId"], $team2[$i]["championId"]); ?></td>
                  <td><?php echo getPlayerRank($team2[$i]["summonerId"]); ?></td>
                  <td><a target="_blank" href="http://www.probuilds.net/champions/details/<?php getChampionNameByID($team2[$i]["championId"]);?>">Probuilds</a>
                  <a target="_blank" href="https://www.mobafire.com/league-of-legends/<?php getChampionNameByID($team2[$i]["championId"]);?>-guide">Mobafire</a></td>
                </tr>
                <?php
              }else {
                ?>
                <tr>
                  <td><a href="summonerinfo.php?summonername=<?php echo $team2[$i]["summonerName"]; ?>"><?php echo $team2[$i]["summonerName"]; ?></a></td>
                  <td><img height="32" width="32" src="http://ddragon.leagueoflegends.com/cdn/7.23.1/img/champion/<?php getChampionNameByID($team2[$i]["championId"]);?>.png" alt="lul" /><?php echo getChampionNameByID($team2[$i]["championId"]); ?></td>
                  <td><?php echo getCurrentChampLevel($team2[$i]["summonerId"], $team2[$i]["championId"]); ?></td>
                  <td><?php echo getPlayerRank($team2[$i]["summonerId"]); ?></td>
                  <td><a target="_blank" href="http://www.probuilds.net/champions/details/<?php getChampionNameByID($team2[$i]["championId"]);?>">Probuilds</a>
                  <a target="_blank" href="https://www.mobafire.com/league-of-legends/<?php getChampionNameByID($team2[$i]["championId"]);?>-guide">Mobafire</a></td>
                </tr>
                <?php
              }
            }
             ?>
          </table>
          </div>
        </div>
      </div>
    </div>
  </article>
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
