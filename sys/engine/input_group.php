<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php'); 

		$akta=$_POST['ak'];
		$npwp2=$_POST['np'];
		$tob2=$_POST['tob'];
		$sc2=$_POST['sc'];
		$kd=$_POST['kg'];
		$nama=$_POST['nm'];
		$kota2=$_POST['kta2'];
		$date2=$_POST['dat'];
		$dir=$_POST['dr'];
		$coms1=$_POST['coms1'];
		$coms2=$_POST['coms2'];
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
		
		//default null
		$no='';
		
		//mengisi nilai kosong
		$null='0';
						
		$sql= "INSERT INTO company (
	
				id_company, 	akta_notaris,		npwp,		type_industry,	skala_usaha,	kode_company, 	nama_company, 	kota_lahir,		tanggal_lahir,		direktur, 	coms_1,		coms_2,		alamat_company, 	kota_company, 	kodepos_company, 		propinsi_company, 		negara_company, 	telpon_company, 	email_company,		situs,		create_user, 	create_date, 		modified_user, 		modified_date) 
	
			VALUES (
			
				'$no', 			'$akta',			'$npwp2',	'$tob2',		'$sc2',			$kd', 			'$nama', 		'$kota2',		'$date2',			'$dir', 	'$coms1',	'$coms2',	$alamat',			'$kota', 		'$kpos', 				'$prop',				'$neg', 			'$telp', 			'$emil', 			'$site',	'$user', 		'$date', 			'$null', 			'$null')";
	
		$result = mysql_query($sql) or die(mysql_error());
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../daftar_group.php");	

mysql_close();

ob_end_flush(); ?>
	