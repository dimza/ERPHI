<?PHP
  
  require_once(__DIR__.'/../db_con/db.php'); 

        $com=$_POST['com'];
        $ab=$_POST['ab'];       
        $mu=$_POST['mu'];
        $tgl2=$_POST['tgl'];
        $usr2=$_POST['usr'];
        $dat2=$_POST['dat'];
        $nb=$_POST['nb'];
        $an=$_POST['an'];
        $rmk=$_POST['rmk'];

        $no='';
        $null='0';
    
    $kode= @$_GET['kd'];
                
    $sql="UPDATE aaountBank SET nama_client='$nama', alamat_client='$alamat', kota_client='$kota', kodepos_client='$kpos', propinsi_client='$prop', negara_client='$neg', telpon_client='$telp', email_client='$emil', situs='$site', modified_user='$user', modified_date='$date' WHERE id_client='$kode'";
  
    $result= mysql_query($sql) or die(mysql_error());
     
  //mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
  header("Location: ../../detail_rekanan.php?kd=$kode");  

mysql_close(); ?>
  