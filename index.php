<!--
Our code to get the data from the wonderful site of the Misrad le 'quality' of ha Sviva

http://www.svivaaqm.net/Default.rtl.aspx

-->
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Israel Air</title>
    <meta name="description" content="Check the (on the face) air quality in Israel">
    <meta name="author" content="Ido Green">

    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      #airhtml {
        background: lightcyan;
        border-radius: 25px;
        padding: 15px;
      }
      #plusone {
        padding-top: 7px;
      }
    </style>
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
  </head>
  <body>
    <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Israel Air</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="http://about.me/greenido" target="_blank">About</a></li>
              <li><a href="http://plus.ly/greenido" target="_blank">Contact</a></li>
              <li><div id="plusone"><g:plusone></g:plusone></div></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">


      <!-- Example row of columns -->
      <div class="row">
        <div class="span6">
          <h2>Map</h2>
          <p>
            <a href="http://www.svivaaqm.net/Default.rtl.aspx">
              <img src="http://www.svivaaqm.net/Index_Image_Generator.aspx?REGION=-3" />
            </a>
          </p>

        </div>

        <div class="span6">
          <h2>The Quality of the Air</h2>
          <?php
          $path = "http://n.sviva.gov.il/subjectsEnv/Air/AirQualityData/Pages/EnvAirForecasting.aspx";
          $rawHtml = file_get_contents($path);
          $inx1 = strpos($rawHtml, "<!---GovxMainTitle-->") + 21;
          $inx2 = strpos($rawHtml, "</h1>", $inx1);
          $title = substr($rawHtml, $inx1, $inx2 - $inx1);
          $title = strip_tags($title);
          echo "<h3 dir='rtl'>$title</h3>";

          $inx1 = strpos($rawHtml, "PLAirQFDivGreenBoxCenter", $inx2);
          $inx2 = strpos($rawHtml, "PLAirQFDivWpGreenBoxBottom", $inx1);

          $airHtml = substr($rawHtml, $inx1, $inx2 - $inx1);
          $airHtml = strip_tags($airHtml, "<p>");
          $airHtml = str_replace("PLAirQFDivGreenBoxCenter\">", "", $airHtml);
          $airHtml = str_replace("GovXShortDescription", "", $airHtml);
          $airHtml = str_replace("<p> </p>", "", $airHtml);
          echo "<div id='airhtml' dir='rtl'>$airHtml <p><a class='btn' href='http://www.svivaaqm.net/Default.rtl.aspx' target='_blank'>More &raquo;</a></p></div>";
          ?>

        </div>
      </div>

      <hr>

      <footer>

        <p>&copy; Ido Green 2012</p>
      </footer>

    </div> <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

    <script src="http://apis.google.com/js/plusone.js"></script>

    <script src="js/libs/bootstrap/transition.js"></script>
    <script src="js/libs/bootstrap/collapse.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
    <script>
      var _gaq=[['_setAccount','UA-27750723-1'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>

  </body>
</html>
