<?php
  include"koneksi/koneksi.php";
  $dbConn = mysqli_connect($dbServer, $dbUsr, $dbPasswd) 
                  or die("Koneksi gagal");
            mysqli_select_db($dbConn, $dbName);
  
  if(!empty($_GET['id_restoran'])){
    $id_restoran = $_GET['id_restoran'];

    $restoranlist = mysqli_query($dbConn, "SELECT tb_restoran.*, 
                                                  tb_kategori.nama as kategori
                                            FROM tb_restoran
                                            INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_restoran.id_kategori
                                            WHERE tb_restoran.id_restoran = \"$id_restoran\"");  
    $dtresto = mysqli_fetch_assoc($restoranlist);
  }else{
    header("location:index.php");
  }
?>
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8">
  <title>Maps - Kuliner Malang</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <style>   

* {
  box-sizing: border-box;
}

form {
  padding: 1em;
  background: white;
  border-radius: 5px;
  margin-top: 2rem;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
  padding: 1em;
}
form input {
  margin-bottom: 1rem;
  background: #fff;
  border: 1px solid #92c613;
  border-radius: 5px;
}

form img{
  margin: 10px auto 15px auto;
}

form textarea{
  border: 1px solid #92c613;
  margin-bottom: 1rem;
  border-radius: 5px;
  background: #fff;
  font-family: arial;
  padding: 2%;
}

form button {
  background: #92c613;
  border-radius: 5px;
  padding: 0.7em;
  border: 0;
  width: 25%;
  color: white;
}
form button:hover {
  background: gold;
}

label {
  text-align: right;
  display: block;
  padding: 0.5em 1.5em 0.5em 0;
}

input {
  width: 100%;
  padding: 0.7em;
  margin-bottom: 0.5rem;
}
input:focus {
  outline: 3px solid gold;
  border-radius: 5px;
}

@media (min-width: 400px) {
  form {
    overflow: hidden;
  }

  label {
    float: left;
    width: 150px; 
    /* 150 */
  }

  textarea{
    float: left;
    width: calc(100% - 200px);
  }

  input {
    float: left;
    width: calc(100% - 200px);
  }

  button {
    float: left;
    margin-left: 26%;
    width: calc(100% - 200px);
  }
}
  </style>
</head>
<body>
  <div id="header">
    <div class="clearfix">
      <?php include"content/header.php"; ?>
    </div>
  </div>
  <form class="form1" action="">
      <img src="<?php echo "foto/".$dtresto['kategori'].'/'.$dtresto['foto']; ?>" alt="Foto Restoran" width="250" height="150">

      <label for="fname_resto">Nama Restoran</label>
      <input type="text" id="fname_resto" name="nama" value="<?php echo $dtresto['nama']; ?>">

      <label for="fkategori">Kategori</label>
      <input type="text" id="fkategori" name="kategori" value="<?php echo $dtresto['kategori']; ?>">
      
      <label for="falamat">Alamat</label>
      <textarea rows="4" cols="50" nama="alamat"><?php echo $dtresto['alamat']; ?></textarea>  
      
      <label for="ftelepon">No. Telp</label>
      <input type="text" id="ftelepon" name="no_telp" value="<?php echo $dtresto['no_telp']; ?>">
      
      <label for="fkapasitas">Kapasitas</label>
      <input type="text" id="fkapasitas" name="kapasitas" value="<?php echo $dtresto['kapasitas']; ?>">
      
      <label for="frating">Rating</label>
      <input type="text" id="frating" name="rating" value="<?php echo $dtresto['rating']; ?>">
      
      <label for="ftot_jam">Total Jam</label>
      <input type="text" id="ftot_jam" name="total_jam" value="<?php echo $dtresto['total_jam']; ?>">
      
      <label for="fjarak">Jarak</label>
      <input type="text" id="fjarak" name="jarak" value="<?php echo $dtresto['jarak']; ?>">
      
      <button>Kembali</button>
      </form>

  <!-- <div id="footer">
    <div id="footnote">
        <p>
          © Copyright 2020 Web GIS teams
        </p>
    </div>
  </div> -->
</body>
</html>