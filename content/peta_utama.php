<?php
  include"koneksi/koneksi.php";
  $dbConn = mysqli_connect($dbServer, $dbUsr, $dbPasswd) 
                or die("Koneksi gagal");
              mysqli_select_db($dbConn, $dbName);
?>
<div id="frm_peta"></div><br>

<script src="assets/js/jquery.js"></script>

    <script src="assets/leaflet/dist/leaflet.js"></script> 
    <script src="assets/js/Control.Scale.js"></script>
    <script src="assets/pancontrol/L.Control.Pan.js" ></script>  
    <!--<script src="http://maps.google.com/maps/api/js?v=3.2&sensor=true"></script>-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWR4K0m_9VINVwNbNVBn8HhcNlKvE4yhA&callback=initMap"></script>
    <script src="assets/js/Google.js"></script>
    <script src="assets/js/Marker.Text.js"></script>
    
    
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="assets/pancontrol/L.Control.Pan.css" />
    
    
    <center><div id="map"></div></center>
      
<!--------------------------------------------  script untuk mengatur peta  ------------------------------------------------------->    
    <script type='text/javascript'> 
      var chineseLayer = new L.LayerGroup();
      var padangLayer = new L.LayerGroup();
      var fastfoodLayer = new L.LayerGroup();
      var cafetariaLayer = new L.LayerGroup();
      var seafoodLayer = new L.LayerGroup();
      
      var chineseico = L.icon({
        iconUrl: 'poin/chinese1.png',
        shadowUrl: 'leaf-shadow.png',

        iconSize:     [20, 20], // size of the icon
        shadowSize:   [10, 14], // size of the shadow
        iconAnchor:   [22, 64], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 12],  // the same for the shadow
        popupAnchor:  [-3, -16] // point from which the popup should open relative to the iconAnchor
      });
      
      <?php
      include"koneksi/koneksi.php";
      $dbConn = mysqli_connect($dbServer, $dbUsr, $dbPasswd) 
                      or die("Koneksi gagal");
                mysqli_select_db($dbConn, $dbName);

      $sql="SELECT tb_restoran.* FROM tb_restoran
            INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_restoran.id_kategori
            WHERE tb_kategori.nama = 'Chinese'";
      $result = mysqli_query($dbConn, $sql );
      while($row = mysqli_fetch_array($result)){
        echo" var chineseMarker = new L.Marker.Text(new L.LatLng(".$row["latitude"].' , '.$row["longitude"]."), '',{icon: chineseico}).bindPopup('<a href=\"content/detail_restoran.php?id_restoran=".$row["id_restoran"]."\"target=\"_blank\">".$row['nama']."<br><center><img width=\"80px;\" src=\"foto/Chinese/".$row["foto"]."\"></center>');";
        echo ' chineseLayer.addLayer(chineseMarker); ';
      }
      ?>
      
      var padangico = L.icon({
        iconUrl: 'poin/padang1.png',
        shadowUrl: 'leaf-shadow.png',

        iconSize:     [20, 20], // size of the icon
        shadowSize:   [10, 14], // size of the shadow
        iconAnchor:   [22, 64], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 12],  // the same for the shadow
        popupAnchor:  [-3, -16] // point from which the popup should open relative to the iconAnchor
      });
      
      <?php
      include"koneksi/koneksi.php";
      $dbConn = mysqli_connect($dbServer, $dbUsr, $dbPasswd) 
                      or die("Koneksi gagal");
                mysqli_select_db($dbConn, $dbName);

      $sql="SELECT tb_restoran.* FROM tb_restoran
            INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_restoran.id_kategori
            WHERE tb_kategori.nama = 'Padang'";
      $result = mysqli_query($dbConn, $sql );
      while($row = mysqli_fetch_array($result)){
        echo" var padangMarker = new L.Marker.Text(new L.LatLng(".$row["latitude"].' , '.$row["longitude"]."), '',{icon: padangico}).bindPopup('<a href=\"content/detail_restoran.php?id_restoran=".$row["id_restoran"]."\"target=\"_blank\">".$row['nama']."<br><center><img width=\"80px;\" src=\"foto/Padang/".$row["foto"]."\"></center>');";
        echo ' padangLayer.addLayer(padangMarker); ';
      }
      ?>
      
      var fastfoodico = L.icon({
        iconUrl: 'poin/fastfood1.png',
        shadowUrl: 'leaf-shadow.png',

        iconSize:     [20, 20], // size of the icon
        shadowSize:   [10, 14], // size of the shadow
        iconAnchor:   [22, 64], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 12],  // the same for the shadow
        popupAnchor:  [-3, -16] // point from which the popup should open relative to the iconAnchor
      });
      
      <?php
      include"koneksi/koneksi.php";
      $dbConn = mysqli_connect($dbServer, $dbUsr, $dbPasswd) 
                      or die("Koneksi gagal");
                mysqli_select_db($dbConn, $dbName);

      $sql="SELECT tb_restoran.* FROM tb_restoran
            INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_restoran.id_kategori
            WHERE tb_kategori.nama = 'FastFood'";
      $result = mysqli_query($dbConn, $sql );
      while($row = mysqli_fetch_array($result)){
        echo" var fastfoodMarker = new L.Marker.Text(new L.LatLng(".$row["latitude"].' , '.$row["longitude"]."), '',{icon: fastfoodico}).bindPopup('<a href=\"content/detail_restoran.php?id_restoran=".$row["id_restoran"]."\"target=\"_blank\">".$row['nama']."<br><center><img width=\"80px;\" src=\"foto/Fastfood/".$row["foto"]."\"></center>');";
        echo ' fastfoodLayer.addLayer(fastfoodMarker); ';
      }
      ?>

      var cafetariaico = L.icon({
        iconUrl: 'poin/cafetaria1.png',
        shadowUrl: 'leaf-shadow.png',

        iconSize:     [20, 20], // size of the icon
        shadowSize:   [10, 14], // size of the shadow
        iconAnchor:   [22, 64], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 12],  // the same for the shadow
        popupAnchor:  [-3, -16] // point from which the popup should open relative to the iconAnchor
      });
      
      <?php
      include"koneksi/koneksi.php";
      $dbConn = mysqli_connect($dbServer, $dbUsr, $dbPasswd) 
                      or die("Koneksi gagal");
                mysqli_select_db($dbConn, $dbName);

      $sql="SELECT tb_restoran.* FROM tb_restoran
            INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_restoran.id_kategori
            WHERE tb_kategori.nama = 'Cafetaria'";
      $result = mysqli_query($dbConn, $sql );
      while($row = mysqli_fetch_array($result)){
        echo" var cafetariaMarker = new L.Marker.Text(new L.LatLng(".$row["latitude"].' , '.$row["longitude"]."), '',{icon: cafetariaico}).bindPopup('<a href=\"content/detail_restoran.php?id_restoran=".$row["id_restoran"]."\"target=\"_blank\">".$row['nama']."<br><center><img width=\"80px;\" src=\"foto/Cafetaria/".$row["foto"]."\"></center>');";
        echo ' cafetariaLayer.addLayer(cafetariaMarker); ';
      }
      ?>

      var seafoodico = L.icon({
        iconUrl: 'poin/seafood1.png',
        shadowUrl: 'leaf-shadow.png',

        iconSize:     [20, 20], // size of the icon
        shadowSize:   [10, 14], // size of the shadow
        iconAnchor:   [22, 64], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 12],  // the same for the shadow
        popupAnchor:  [-3, -16] // point from which the popup should open relative to the iconAnchor
      });
      
      <?php
      include"koneksi/koneksi.php";
      $dbConn = mysqli_connect($dbServer, $dbUsr, $dbPasswd) 
                      or die("Koneksi gagal");
                mysqli_select_db($dbConn, $dbName);

      $sql="SELECT tb_restoran.* FROM tb_restoran
            INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_restoran.id_kategori
            WHERE tb_kategori.nama = 'Seafood'";
      $result = mysqli_query($dbConn, $sql );
      while($row = mysqli_fetch_array($result)){
        echo" var seafoodMarker = new L.Marker.Text(new L.LatLng(".$row["latitude"].' , '.$row["longitude"]."), '',{icon: seafoodico}).bindPopup('<a href=\"content/detail_restoran.php?id_restoran=".$row["id_restoran"]."\"target=\"_blank\">".$row['nama']."<br><center><img width=\"80px;\" src=\"foto/Seafood/".$row["foto"]."\"></center>');";
        echo ' seafoodLayer.addLayer(seafoodMarker); ';
      }
      ?>

      var googleRoadmap = new L.Google('ROADMAP');
      var cloudmade = new L.TileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=EbOl8HM0UdMC6GHcIR5Y', {attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>', 
    });
      var mpn = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
      var qst = new L.TileLayer('http://otile1.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png');
      var googleSatellite = new L.Google('SATELLITE');
      var googleHybrid = new L.Google('HYBRID');
      
      
      var map = new L.Map('map', {center: new L.LatLng(-7.981894, 112.626503),
      zoom: 13, 
      layers: [googleRoadmap, chineseLayer, padangLayer, fastfoodLayer, cafetariaLayer, seafoodLayer]});

      map.addControl(new L.Control.Scale());
      map.addControl(new L.Control.Layers({'Cloudmade':cloudmade, 'Mapnik':mpn, 'MapQuest':qst, 'Google Roadmap':googleRoadmap, 'Google Satellite':googleSatellite, 'Google Hybrid':googleHybrid},
      {'Chinese':chineseLayer , 'Padang':padangLayer, 'Fast Food':fastfoodLayer, 'Cafetaria':cafetariaLayer, 'Sea Food':seafoodLayer}));
      
      map.on('click', onMapClick);

      var popup = new L.Popup();

      function onMapClick(e) {
        var latlngStr = '(' + e.latlng.lat + ', ' + e.latlng.lng + ')';

        popup.setLatLng(e.latlng);
        popup.setContent("Koordinat Anda " + latlngStr);

        map.openPopup(popup);
      }
    </script>
  </div>  