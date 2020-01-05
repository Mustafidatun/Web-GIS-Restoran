<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8">
  <title>Maps - Kuliner Malang</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
  <div id="header">
    <div class="clearfix">
      <?php include"content/header.php"; ?>
    </div>
  </div>
  <div id="contents">
    <!-- <div class="clearfix"> -->
      <div class="sidebar">
        <div>
          <?php include"content/search_komparasi.php"; ?>
        </div>
      </div>
      <!-- <div class="main">         -->
        <?php 
          include"content/peta_utama.php"; 
        ?>
      <!-- </div> -->
    <!-- </div> -->
  </div>
  <!-- <div id="footer">
    <div id="footnote">
        <p>
          © Copyright 2020 Web GIS teams
        </p>
    </div>
  </div> -->
</body>
</html>