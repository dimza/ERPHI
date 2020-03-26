<?PHP
  
  require_once(__DIR__.'/../db_con/db.php'); 

    $nama=$_POST['nm'];
    $alamat=$_POST['alm'];
    $kota=$_POST['kta'];
    $prop=$_POST['prpns'];
    $neg=$_POST['ngr'];
    $kpos=$_POST['kp'];
    $telp=$_POST['tlp'];
    $emil=$_POST['eml'];
    $site=$_POST['sts'];
    $user=$_POST['usr'];
    $date=$_POST['tgl'];
    
    $kode= @$_GET['kd'];
                
    $sql="UPDATE client SET nama_client='$nama', alamat_client='$alamat', kota_client='$kota', kodepos_client='$kpos', propinsi_client='$prop', negara_client='$neg', telpon_client='$telp', email_client='$emil', situs='$site', modified_user='$user', modified_date='$date' WHERE id_client='$kode'";
  
    $result= mysql_query($sql) or die(mysql_error());
     
  //mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
  header("Location: ../../detail_rekanan.php?kd=$kode");  

mysql_close(); ?>
  