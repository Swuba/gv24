<?php
  session_start();
  include '../includes/dbh.php';
  if(isset($_SESSION['logged_in'])){
    ?>
    <?php
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[1];
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
        <title>DeinTutorial24 - Admintool</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Eine Seite für alles">
        <meta name="keywords" content="html, css, php, mysql, raspberry pi, java,
         news, games, tutorials, blog, how to, gamescom, programmieren lernen, webserver installieren, apache2, led-strip, rfid, wordpress installieren">
        <!--bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--css -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../">DeinTutorial24</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Dashboard</a></li>
            <li><a href="createcategory.php">Kategorie erstellen</a></li>
            <li><a href="createtutorial.php">Tutorial erstellen</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="editprofile.php?edit=<?php echo $_SESSION['id'];?>">Hallo, <?php echo $_SESSION['username']; ?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Our Site</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="createtutorial.php">Add Page</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <?php
  }else {
    if (isset($_POST['username'], $_POST['password'])) { //Überprüft ob Login gedrückt wurde
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      if (empty($username) or empty($password)) { // überprüft ob benutzername oder passwort leer ist
        $_SESSION['error'] = "Alle Felder werden benötigt";
      }else { // Wenn ausgefüllt
        //Überprüfen ob es den Benutzernamen schon gibt
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
          //Existiert
          $hash_password = $row['password'];
          $hash = password_verify($password, $hash_password);
          if ($hash) {
            //Passwort ist korrekt;
            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['admin'] = $row['admin'];
            header('Location: index.php');
          }else {
            //Passwort stimmt nicht überein
            $_SESSION['error'] = "Benutzername oder Passwort sind nicht korrekt";
          }
        }else {
          //Existiert nicht
          $_SESSION['error'] = "Benutzername wurde nicht gefunden";
        }
      }
    }
    ?>
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
         <title>Home</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="description" content="Eine Seite für alles">
         <meta name="keywords" content="html, css, php, mysql, raspberry pi, java,
          news, games, tutorials, blog, how to, gamescom, programmieren lernen, webserver installieren, apache2, led-strip, rfid, wordpress installieren">
         <!--bootstrap -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <!--css -->
         <link rel="stylesheet" type="text/css" href="css/style.css">
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
         <nav class="navbar navbar-default">
       <div class="container">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="../">DeinTutorial24</a>
         </div>
         <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav">
             <li class="active"><a href="index.php">Dashboard</a></li>
           </ul>

         </div><!--/.nav-collapse -->
       </div>
     </nav>

     <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <?php
            if (isset($_SESSION['error'])) {
              ?>
              <div class="alert alert-danger" role="alert" style="text-align: center">
               <strong>Fehler!</strong> <?php echo $_SESSION['error']; ?>!
             </div>
              <?php
              unset($_SESSION['error']);
            }
             ?>
            <form id="login" method="post" action="index.php" class="well">
                  <div class="form-group">
                    <label>Benutzername</label>
                    <input type="text" class="form-control" name="username" placeholder="Benutzername">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-default btn-block">Login</button>
              </form>
          </div>
        </div>
      </div>
    </section>
    <?php
  }
 ?>
