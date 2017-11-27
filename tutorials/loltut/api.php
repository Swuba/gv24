<?php
$api_key = 'RGAPI-f0e843db-9d43-402c-ae51-c7ab887606f2';
$summonerName = $_GET['summonername'];

$result = json_decode(file_get_contents('https://euw1.api.riotgames.com/lol/summoner/v3/summoners/by-name/'.$summonerName . '?api_key=' . $api_key));
$summonerLevel = $result->summonerLevel;
echo $summonerLevel;
