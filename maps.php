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
      <?php $page = 'maps'; include"content/menu.php"; ?>
    </div>
  </div>
  <div id="search">
    <div class="clearfix">
      <?php include"content/search.php"; ?>
    </div>
  </div>
  <div id="contents">
    <div class="clearfix">
      <div class="sidebar">
        <div>
          <?php include"content/search_komparasi.php"; ?>
        </div>
      </div>
      <div class="main">        
        <?php 
          include"content/peta_utama.php"; 
        ?>
      </div>
    </div>
  </div>
  <div id="footer">
    <div id="footnote">
      <div class="clearfix">
        <div class="connect">
          <a href="http://freewebsitetemplates.com/go/facebook/" class="facebook"></a><a href="http://freewebsitetemplates.com/go/twitter/" class="twitter"></a><a href="http://freewebsitetemplates.com/go/googleplus/" class="googleplus"></a><a href="http://pinterest.com/fwtemplates/" class="pinterest"></a>
        </div>
        <p>
          © Copyright 2023 Manes Winchester. All Rights Reserved.
        </p>
      </div>
    </div>
  </div>
</body>
</html>