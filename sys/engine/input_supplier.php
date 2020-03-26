<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php'); 

		$kd=$_POST['kg'];
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
		
		//default null
		$no='';
		
		//mengisi nilai kosong
		$null='0';
						
		$sql= "INSERT INTO supplier (
	
				id_supplier, 	noreg_supplier, 	nama_supplier, 	alamat_supplier, 	kota_supplier, 	kodepos_supplier, 		propinsi_supplier, 		negara_supplier, 	telpon_supplier, 	fax_supplier,	email_supplier,		situs,		productBrand,	tags,		create_user, 	create_date, 		modified_user, 		modified_date) 
	
			VALUES (
			
				'$no', 			'$kd', 				'$nama', 		'$alamat',			'$kota', 		'$kpos', 				'$prop',				'$neg', 			'$telp', 			'$fax',		'$emil', 			'$site',	'$pb',			'$tags',	'$user', 		'$date', 			'$user', 			'$date')";
	
		$result = mysql_query($sql) or die(mysql_error());
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../list_supplier.php");	

mysql_close();

ob_end_flush(); ?>
	