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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWR4K0m_9VINVwNbNVBn8HhcNlKvE4yhA&callback=initMap" type="text/javascript"></script>
    <script src="assets/js/Google.js"></script>
    <script src="assets/js/Marker.Text.js"></script>
    
    
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="assets/pancontrol/L.Control.Pan.css" />
    
    
    <center><div id="map"></div></center>
      
<!--------------------------------------------  script untuk mengatur peta  ------------------------------------------------------->    
    <script type='text/javascript'> 
      var rsLayer = new L.LayerGroup();
      var dokterLayer = new L.LayerGroup();
      
      var rsico = L.icon({
        iconUrl: 'poin/<?php echo''.$row['foto'].'' ?>',
        shadowUrl: 'leaf-shadow.png',

        iconSize:     [20, 20], // size of the icon
        shadowSize:   [10, 14], // size of the shadow
        iconAnchor:   [22, 64], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 12],  // the same for the shadow
        popupAnchor:  [-3, -16] // point from which the popup should open relative to the iconAnchor
      });
      
      <?php
      $sql="SELECT * FROM rs";
      $result = mysqli_query($dbConn, $sql );
      while($row = mysqli_fetch_array($result)){
        echo" var rsMarker = new L.Marker.Text(new L.LatLng(".$row["y"].' , '.$row["x"]."), '".$row['nama_rs']."',{icon: rsico}).bindPopup('<a href=\"content/dtl_rs.php?dtl_rs=".$row["id_rs"]."\"target=\"_blank\">".$row['nama_rs']."<br><center><img width=\"80px;\" src=\"foto/rs/".$row["foto"]."\"></center>');";
        echo ' rsLayer.addLayer(rsMarker); ';
      }
      ?>
      
      var dokterico = L.icon({
        iconUrl: 'poin/dokter.png',
        shadowUrl: 'leaf-shadow.png',

        iconSize:     [20, 20], // size of the icon
        shadowSize:   [10, 14], // size of the shadow
        iconAnchor:   [22, 64], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 12],  // the same for the shadow
        popupAnchor:  [-3, -16] // point from which the popup should open relative to the iconAnchor
      });
      
      <?php
      $sql="SELECT * FROM dokter ";
      $result = mysqli_query($dbConn, $sql );
      while($row = mysqli_fetch_array($result)){
        echo" var dokterMarker = new L.Marker.Text(new L.LatLng(".$row["y"].' , '.$row["x"]."), '".$row['nama_dokter']."',{icon: dokterico}).bindPopup('<a href=\"content/dtl_dokter.php?dtl_dokter=".$row["id_dokter"]."\"target=\"_blank\">".$row['nama_dokter']."<br><center><img width=\"80px;\" src=\"foto/dokter/".$row["foto"]."\"></center>');";
        echo ' dokterLayer.addLayer(dokterMarker); ';
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
      layers: [googleRoadmap, rsLayer , dokterLayer ]});

      map.addControl(new L.Control.Scale());
      map.addControl(new L.Control.Layers({'Cloudmade':cloudmade, 'Mapnik':mpn, 'MapQuest':qst, 'Google Roadmap':googleRoadmap, 'Google Satellite':googleSatellite, 'Google Hybrid':googleHybrid},
      {'Rumah Sakit':rsLayer , 'Dokter':dokterLayer }));
      
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