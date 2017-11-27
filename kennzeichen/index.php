<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Saira" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Kennzeichen</title>
  </head>
  <body>
    <h1>Welche Stadt hat dieses Kennzeichen?</h1>
    <form action="kennzeichencheck.php" method="get">
      <input type="text" name="kennzeichen" value="" placeholder="Kennzeichen" required>
      <button class="submit" type="submit">Überprüfen</button>
    </form>

    <form action="plzcheck.php" method="get">
      <input type="text" name="plz" value="" placeholder="Postleizahl">
      <button class="submit" type="submit">Überprüfen</button>
    </form>
  </body>
</html>
