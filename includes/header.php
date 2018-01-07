<?php
session_start();
//include_once("includes/analyticstracking.php");
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[2];
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2802451501665411",
    enable_page_level_ads: true
  });
</script>
    <meta charset="utf-8">
    <title><?php
    switch ($first_part) {
      case '':
        echo "DeinTutorial24";
        break;
      case 'index.php':
        echo "DeinTutorial24";
        break;
      case 'tutorials.php':
        echo "DeinTutorial24 - Tutorials";
        break;
      default:
        echo "DeinTutorial24";
        break;
    }
     ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Eine Seite für alles">
    <meta name="keywords" content="html, css, php, mysql, raspberry pi, java,
     news, games, tutorials, blog, how to, gamescom, programmieren lernen, webserver installieren, apache2, led-strip, rfid, wordpress installieren">
    <!--bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--css -->
    <link rel="stylesheet" type="text/css" href="https://deintutorial24.de/css/style.css">
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
    <!-- Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">DeinTutorial24</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li <?php if($first_part == "index.php"){echo "class='active'";} ?>><a href="index.php">Home</a></li>
                <li <?php if($first_part == "tutorials.php"){echo "class='active'";} ?>><a href="tutorials.php">Tutorials</a></li>
            </ul>
        </div>
    </div>
</nav>
