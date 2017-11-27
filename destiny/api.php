<?php
 $apiKey = 'f478500e4d0949b6bb7e49ddfafd5528';
 $filz = '15370704';
 $name = $_GET['name'];
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, 'https://www.bungie.net/Platform/User/SearchUsers/?q='.$name);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-Key: ' . $apiKey));
 $json = json_decode(curl_exec($ch));
 if(empty($json->Response[0])){
   echo "Name wurde nicht gefunden";
 }else{
   $membershipId = $json->Response[0]->membershipId;
   $uniqueName = $json->Response[0]->uniqueName;
   $displayName = $json->Response[0]->displayName;
   $profilePicture = $json->Response[0]->profilePicture;
   $blizzardDisplayName = $json->Response[0]->blizzardDisplayName;
   $about = $json->Response[0]->about;
   $locale = $json->Response[0]->locale;

   $ch1 = curl_init();
   curl_setopt($ch1, CURLOPT_URL, 'https://www.bungie.net/Platform/User/GetMembershipsById/'.$membershipId.'/0/');
   curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch1, CURLOPT_HTTPHEADER, array('X-API-Key: ' . $apiKey));
   $json1 = json_decode(curl_exec($ch1));
   $destinyMemberships = $json1->Response->destinyMemberships[0]->membershipId;

   $ch2 = curl_init();
   curl_setopt($ch2, CURLOPT_URL, 'https://www.bungie.net/Platform/Destiny2/4/Profile/'.$destinyMemberships.'/?components=100');
   curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-Key: ' . $apiKey));
   $json2 = json_decode(curl_exec($ch2));
   $characterIDMain = $json2->Response->profile->data->characterIds[0];

   //Währungsanzeige
   $ch3 = curl_init();
   curl_setopt($ch3, CURLOPT_URL, 'https://www.bungie.net/Platform/Destiny2/4/Profile/'.$destinyMemberships.'/?components=200');
   curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch3, CURLOPT_HTTPHEADER, array('X-API-Key: ' . $apiKey));
   $json3 = json_decode(curl_exec($ch3));
   $minutesPlayedTotal = $json3->Response->characters->data->$characterIDMain->minutesPlayedTotal;
   $light = $json3->Response->characters->data->$characterIDMain->light;
   $hoursPlayedTotal = round($minutesPlayedTotal / 60);

   $ch4 = curl_init();
   curl_setopt($ch4, CURLOPT_URL, 'https://www.bungie.net/Platform/Destiny2/4/Account/'.$destinyMemberships.'/Character/'.$characterIDMain.'/Stats/?groups=1&modes=7&periodType=2');
   curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch4, CURLOPT_HTTPHEADER, array('X-API-Key: ' . $apiKey));
   $json4 = json_decode(curl_exec($ch4));
   $deathsAllTime = $json4->Response->allPvE->allTime->deaths->basic->displayValue;
   $killsAllTime = $json4->Response->allPvE->allTime->kills->basic->displayValue;
   $heroicPublicEventsCompleted = $json4->Response->allPvE->allTime->heroicPublicEventsCompleted->basic->displayValue;
   $weaponKillsAutoRifle = $json4->Response->allPvE->allTime->weaponKillsAutoRifle->basic->displayValue;
   $weaponKillsFusionRifle = $json4->Response->allPvE->allTime->weaponKillsFusionRifle->basic->displayValue;
   $weaponKillsHandCannon = $json4->Response->allPvE->allTime->weaponKillsHandCannon->basic->displayValue;
   $weaponKillsMachinegun = $json4->Response->allPvE->allTime->weaponKillsMachinegun->basic->displayValue;
   $weaponKillsPulseRifle = $json4->Response->allPvE->allTime->weaponKillsPulseRifle->basic->displayValue;
   $weaponKillsRocketLauncher = $json4->Response->allPvE->allTime->weaponKillsRocketLauncher->basic->displayValue;
   $weaponKillsScoutRifle = $json4->Response->allPvE->allTime->weaponKillsScoutRifle->basic->displayValue;
   $weaponKillsShotgun = $json4->Response->allPvE->allTime->weaponKillsShotgun->basic->displayValue;
   $weaponKillsSniper = $json4->Response->allPvE->allTime->weaponKillsSniper->basic->displayValue;
   $weaponKillsSubmachinegun = $json4->Response->allPvE->allTime->weaponKillsSubmachinegun->basic->displayValue;
   $weaponKillsSword = $json4->Response->allPvE->allTime->weaponKillsSword->basic->displayValue;
   $weaponKillsGrenade = $json4->Response->allPvE->allTime->weaponKillsGrenade->basic->displayValue;
   $weaponKillsGrenadeLauncher = $json4->Response->allPvE->allTime->weaponKillsGrenadeLauncher->basic->displayValue;
   $weaponKillsSuper = $json4->Response->allPvE->allTime->weaponKillsSuper->basic->displayValue;
   $weaponKillsMelee = $json4->Response->allPvE->allTime->weaponKillsMelee->basic->displayValue;
   $weaponBestType = $json4->Response->allPvE->allTime->weaponBestType->basic->displayValue;
   $orbsDropped = $json4->Response->allPvE->allTime->orbsDropped->basic->displayValue;
   $orbsGathered = $json4->Response->allPvE->allTime->orbsGathered->basic->displayValue;
   $highestLightLevel = $json4->Response->allPvE->allTime->highestLightLevel->basic->displayValue;
   $suicides = $json4->Response->allPvE->allTime->suicides->basic->displayValue;


   $ch5 = curl_init();
   curl_setopt($ch5, CURLOPT_URL, 'https://www.bungie.net/Platform/Destiny2/4/Account/4611686018470700809/Character/2305843009301626287/Stats/?groups=1&modes=5&periodType=2');
   curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch5, CURLOPT_HTTPHEADER, array('X-API-Key: ' . $apiKey));
   $json5 = json_decode(curl_exec($ch5));
 }

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Stats von <?php echo $displayName ?></title>
   </head>
   <body>
     <a href="index.php">Zurück</a>
       <h1><?php echo $displayName; ?></h1>
       <p>Region: <?php echo $locale; ?></p>
       <p>
         <?php echo $blizzardDisplayName; ?>
       </p>
       <p>
         <?php echo $about; ?>
       </p>
       <h2>Main character</h2>
       <p>
         spielzeit: <?php echo $hoursPlayedTotal; ?> stunden.<br>
         Aktuelles Powerlevel: <?php echo $light; ?><br>
         Höchstes Powerlevel: <?php echo $highestLightLevel; ?><br>
         <br>
         <h3>PvE</h3>
         Engramme gedropped: <?php echo $orbsDropped; ?><br>
         Engramme gesammelt: <?php echo $orbsGathered; ?><br>
         <br>
         Ult kills: <?php echo $weaponKillsSuper; ?><br>
         Beste waffenart: <?php echo $weaponBestType; ?><br>
         Kills mit Automatikgewehr: <?php echo $weaponKillsAutoRifle; ?><br>
         Kills mit Fusionsgewehr: <?php echo $weaponKillsFusionRifle; ?><br>
         Kills mit Handfeuerwaffe: <?php echo $weaponKillsHandCannon; ?><br>
         Kills mit Granate: <?php echo $weaponKillsGrenade; ?><br>
         Kills mit Schwert <?php echo $weaponKillsSword; ?><br><br>
         Heroicevents abgeschlossen: <?php echo $heroicPublicEventsCompleted; ?><br>

         Kills: <?php echo $killsAllTime; ?><br>
         Tode: <?php  echo $deathsAllTime;?> davon <?php echo $suicides; ?> selbstmorde <br>

       </p>
       <p>
         <br><br><br><br><br><br><br>
         ID´s:<br>
         membershipId: <?php echo $membershipId; ?>
         <br>
         destinyMemberships: <?php echo $destinyMemberships; ?>
         <br>
         characterIDMain: <?php echo $characterIDMain; ?>

       </p>
   </body>
 </html>
