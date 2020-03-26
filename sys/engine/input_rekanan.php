<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php'); 

		$nrg2=$_POST['nrg'];
		$np2=$_POST['np'];
		$alm2=$_POST['alm'];
		$kta2=$_POST['kta'];
		$prpns2=$_POST['prpns'];
		$ngr2=$_POST['ngr'];
		$kp2=$_POST['kp'];
		$tlp2=$_POST['tlp'];
		$eml2=$_POST['eml'];
		$sts2=$_POST['sts'];
		$usr2=$_POST['usr'];
		$tgl2=$_POST['tgl'];
		
		//mengisi nilai kosong
		$null='';
						
		$sql= "INSERT INTO client (
	
				id_client, 		nama_client, 		alamat_client, 	kota_client, 	kodepos_client, 	propinsi_client, 		negara_client, 			telpon_client, 	email_client,		situs,		create_user, 	create_date, 		modified_user, 		modified_date) 
	
			VALUES (
			
				'$nrg2', 		'$np2', 			'$alm2', 		'$kta2',		'$kp2', 			'$prpns2', 				'$ngr2',				'$tlp2', 		'$eml2', 			'$sts2', 	'$usr2',		'$tgl2', 			'$usr2', 			'$tgl2')";
	
		$result = mysql_query($sql) or die(mysql_error());
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../daftar_rekanan.php");	

mysql_close();

ob_end_flush(); ?>
	