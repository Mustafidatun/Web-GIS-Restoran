<table id="tbl_cari"width="auto" border="0">
 <tr height="5px;">
  <form action="konten.php?src" method="POST"> 
    <td height="26"><select id="kotak-cari" name="ktgr">
      <option value="">Pilih Objek</option>
      <option value="rs">Rumah Sakit</option>
      <option value="puskesmas">Puskesmas</option>
      <option value="apotek">Apotek</option>
      <option value="dokter">Dokter Praktek</option>
    </select>
  </td>
    <td><input id="boxkey" type="text" name="key" value="" /></td>
    <td>
    <input type="submit"  value="Cari" style="border:1px solid black;-webkit-border-radius: 3px; height:30px; width:50px; -moz-border-radius: 3px; border-radius: 3px;margin-top:-10px;background:#92c613; line-height: 20px;"/>
  </form>
  </td>
  <form action="konten.php?cr_per_kec" method="POST"> 
    <td>
  <?php
  include"koneksi/koneksi.php";

    $dbConn = mysqli_connect($dbServer, $dbUsr, $dbPasswd) 
      or die("Koneksi gagal");
        mysqli_select_db($dbConn, $dbName);
    $sql = "SELECT * FROM kecamatan";
    $result = mysqli_query($dbConn, $sql );
    echo'<select id="kotak-cari" name="kecamatan">
      <option value="">Pilih Kecamatan</option>';
    while($row = mysqli_fetch_array($result))
    {
      echo'<option value='.$row["id_kecamatan"].'>'.$row["nama_kecamatan"].'</option>';
    }
    ?>
    </td>
    <td>
    <input type="submit"  value="Cari" style="border:1px solid black;-webkit-border-radius: 3px; height:30px; width:50px; -moz-border-radius: 3px; border-radius: 3px;margin-top:-10px; background:#92c613;line-height: 20px;"/>
  </td></form>
  <form action="konten.php?src_per_kelurahan" method="POST"> 
    <td>
  <?php
  include"koneksi/koneksi.php";

    $dbConn = mysqli_connect($dbServer, $dbUsr, $dbPasswd) 
      or die("Koneksi gagal");
        mysqli_select_db($dbConn, $dbName );
    $sql = "SELECT 
          kecamatan.id_kecamatan ,
          kecamatan.nama_kecamatan ,
          kelurahan.id_kelurahan ,
          kelurahan.nama_kelurahan 
        FROM 
          kecamatan , kelurahan
        WHERE 
          kecamatan.id_kecamatan=kelurahan.id_kecamatan
        order by id_kecamatan ASC";
    $result = mysqli_query($dbConn, $sql );
    echo'<select id="kotak-cari" name="kelurahan">
      <option value="">Pilih Kelurahan</option>';
    while($row = mysqli_fetch_array($result))
    {
      echo'<option value='.$row["id_kelurahan"].'>'.$row["nama_kelurahan"].'&nbsp;&nbsp;['.$row["nama_kecamatan"].']</option>';
    }
    ?>
    </td>
    <td>
    <input type="submit"  value="Cari" style="border:1px solid black;-webkit-border-radius: 3px; height:30px; width:50px; -moz-border-radius: 3px; border-radius: 3px;margin-top:-10px;background:#92c613;line-height: 20px;"/>
  </td></form>
  </tr>
</table>
