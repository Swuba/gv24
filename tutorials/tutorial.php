<?php
  session_start();
  //include_once("includes/analyticstracking.php");
  $directoryURI = $_SERVER['REQUEST_URI'];
  $path = parse_url($directoryURI, PHP_URL_PATH);
  $components = explode('/', $path);
  $first_part = $components[1];
  include '../includes/dbh.php';
  if (empty(mysqli_real_escape_string($conn, $_GET['tutorial']))) {
    include 'header.php';
  }else {
    $tutorial = mysqli_real_escape_string($conn, $_GET['tutorial']);
    $sql = "SELECT * FROM tutorials WHERE name_link='$tutorial'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $date = $row['erstellt'];
    ?>
    <!DOCTYPE html>
    <html lang="de">
      <head>
        <meta charset="utf-8">
        <title>DeinTutorial24 - <?php echo $row['title']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?php echo $row['metadesc']; ?>">
        <meta name="keywords" content="<?php echo $row['metatags']; ?>">
        <meta name="author" content="<?php echo $row['erstelltvon'];?>">
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
                <a href="../" class="navbar-brand">DeinTutorial24</a>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if($first_part == "index.php"){echo "class='active'";} ?>><a href="../">Home</a></li>
                    <li <?php if($first_part == "tutorials.php"){echo "class='active'";} ?>><a href="../tutorials.php">Tutorials</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <article class="tutheader" style="background-image: url('../img/<?php echo $row['banner']; ?>');  !important">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h2><?php echo $row['title']; ?></h2>
          <h1><?php echo $row['titleheader']; ?></h1>
        </div>
      </div>
    </div>
   </article>
   <div class="container">
     <div class="row">
       <div class="col-xs-2">
       </div>
       <div class="col-xs-8" style="text-align: center">
         <button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="<?php echo date("h:i", strtotime(str_replace('-','/', $date))); ?>">
          Erstellt von <strong><?php echo $row['erstelltvon']; ?></strong> am <strong><?php echo date("d.m.Y", strtotime(str_replace('-','/', $date))); ?></strong>
        </button>

       </div>
       <div class="col-xs-2">

       </div>
     </div>
   </div>
   <article class="tutorial">
     <div class="container">
       <div class="row">
         <div class="col-xs-2">
         </div>
         <div class="col-xs-8">
           <?php
           echo $row['content'];
            ?>
         </div>
         <div class="col-xs-2">

         </div>
       </div>
     </div>
   </article>
   <div class="container">
     <div class="row">
       <div class="col-xs-2">
       </div>
       <div class="col-xs-8">
         <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://deintutorial24.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
       </div>
       <div class="col-xs-2">

       </div>
     </div>
   </div>
   <?php include "footer.php" ?>
    <?php
  }
 ?>
