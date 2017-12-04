<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Color Picker</title>
    <style type="text/css">
    body{
      font-family: "Helvetica Neue", Helvetica;
    }
      .picker{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 720px;
        height: 180px;
      }
      #display{
        width: 100%;
        height: 100px;
        background: #730aa2;
        transition: background 100ms;
        margin-top: 30px;
        border: 1px solid black;
      }
      input{
        display: block;
        width: 100%;
      }
    </style>
  </head>
  <body>
    <div class="picker">
      Rot <input type="range" min="0" max="255" step="1" id="red" value="115">
      Grün <input type="range" min="0" max="255" step="1" id="green" value="10">
      Blau <input type="range" min="0" max="255" step="1" id="blue" value="162">
      <div id="display">

      </div>
      <script type="text/javascript">
        var input = document.querySelectorAll("input");

        for (var i = 0; i < input.length; i++) {
          input[i].addEventListener("input", function(){
            var red = document.getElementById("red").value,
                green = document.getElementById("green").value,
                blue = document.getElementById("blue").value;

                var display = document.getElementById("display");
                display.style.background = "rgb(" + red + ", " + green + ", " + blue + ")";
          });
        }
      </script>
    </div>
  </body>
</html>
