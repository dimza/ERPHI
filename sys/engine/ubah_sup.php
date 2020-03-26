<?PHP
	
	require_once(__DIR__.'/../db_con/db.php'); 

		$nama=$_POST['nm'];
		$alamat=$_POST['almt'];
		$kota=$_POST['kta'];
		$prop=$_POST['prpns'];
		$neg=$_POST['ngr'];
		$kpos=$_POST['kp'];
		$telp=$_POST['tlp'];
		$emil=$_POST['eml'];
		$site=$_POST['sts'];
		$user=$_POST['usr'];
		$date=$_POST['tgl'];
		$pb=$_POST['pb'];
		$tags=$_POST['tags'];
		$fax=$_POST['fax'];		
		
		$kode= @$_GET['kd'];
								
		$sql="UPDATE supplier SET nama_supplier='$nama', alamat_supplier='$alamat', kota_supplier='$kota', kodepos_supplier='$kpos', propinsi_supplier='$prop', negara_supplier='$neg', telpon_supplier='$telp', fax_supplier='$fax', email_supplier='$emil', situs='$site', productBrand='$pb', tags='$tags', modified_user='$user', modified_date='$date' WHERE 	noreg_supplier='$kode'";
	
		$result= mysql_query($sql) or die(mysql_error());
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../detail_supplier.php?kd=$kode");	

mysql_close(); ?>
	