<?PHP
	
	require_once(__DIR__.'/../db_con/db.php'); 

		$akta=$_POST['ak'];
		$npwp2=$_POST['np'];
		$tob2=$_POST['tob'];
		$sc2=$_POST['sc'];		
		$kd2=$_POST['kg'];
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
		
		$kode= @$_GET['kd'];
								
		$sql="UPDATE company SET akta_notaris='$akta', npwp='$npwp2', type_industry='$tob2', skala_usaha='$sc2', kode_company='$kd2', nama_company='$nama', kota_lahir='$kota2', tanggal_lahir='$date2', direktur='$dir', coms_1='$coms1', coms_2='$coms2', alamat_company='$alamat', kota_company='$kota', kodepos_company='$kpos', propinsi_company='$prop', negara_company='$neg', telpon_company='$telp', email_company='$emil', situs='$site', modified_user='$user', modified_date='$date' WHERE id_company='$kode' ";
	
		$result = mysql_query($sql) or die(mysql_error());
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../detail_company.php?kd=$kode");	

mysql_close(); ?>
	