<?PHP
	
	require_once(__DIR__.'/../db_con/db.php'); 

		$nama=$_POST['id'];
		$alamat=$_POST['pword'];

		
		$kode= @$_GET['kd'];
								
		$sql="UPDATE client SET nama_client='$nama', alamat_client='$alamat', kota_client='$kota', kodepos_client='$kpos', propinsi_client='$prop', negara_client='$neg', telpon_client='$telp', email_client='$emil', situs='$site', modified_user='$user', modified_date='$date' WHERE id_client='$kode'";
	
		$result= mysql_query($sql) or die(mysql_error());
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../detail_rekanan.php?kd=$kode");	

mysql_close(); ?>
	