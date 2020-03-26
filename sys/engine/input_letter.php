<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php'); 

		$des=$_POST['desc'];
		$com=$_POST['company'];
		$int=$_POST['ins'];
		$tgl=$_POST['tanggal'];
		$usr=$_POST['user'];
		$date=$_POST['tgl'];
		$rmk=$_POST['remark'];

		
		//default null
		$no='';
		$na='0';
		
		$thn = date("Y");
		$bln = date("m");

	require_once(__DIR__.'/romawi.php');
		
	if ($com == "1") {

		$cp= "SDHTM";
				
		//mencari nilai quote no terakhir
		$qo= "select * from letterNumber where idCompany='$cp' order by idLetterNumber DESC limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['letterNum']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk letter_no
		$quo= $ang.'/CVSS-SP/'.$bln2.'/'.$thn;
				
		$sql= "insert INTO letter (id_letter, 	letter_no, 	description,	kode_company,	instansi, 	tanggal, 		remark,		vis, 	create_user, 	create_date, 	modified_user, 		modified_date) 	
						VALUES 	  ('$no', 		'$quo', 	'$des',			'$cp', 			'$int',			$tgl',			'$rmk', 	'$na',	'$usr',			'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		$sql2 ="insert INTO letterNumber (idLetterNumber, letterNum, idCompany) VALUES ('$no', '$ang', '$cp')";		
		$result2 = mysql_query($sql2) or die(mysql_error());		
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../surat.php");	

	} else if ($com == "2"){


		$cp= "ATHYA";
	
		//mencari nilai quote no terakhir
		$qo= "select * from letter_abm order by id_letter_abm desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['no_letter_abm']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$quo= $ang.'/ABM-SP/'.$bln2.'/'.$thn;
				
		$sql= "insert INTO letter (id_letter, 	letter_no, 	description,	kode_company,	instansi, 	tanggal, 		remark,		vis, 	create_user, 	create_date, 	modified_user, 		modified_date) 	
						VALUES 	  ('$no', 		'$quo', 	'$des',			'$cp', 			'$int',			$tgl',			'$rmk', 	'$na',	'$usr',			'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		$sql2 ="insert INTO letter_abm (id_letter_abm, kode_company, no_letter_abm) Values ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());			
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../surat.php");
		
	} else if ($com == "3"){

		$cp= "DWRTH";
	
		//mencari nilai quote no terakhir
		$qo= "select * from letter_dk order by id_letter_dk desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['no_letter_dk']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk letter_no
		$quo= $ang.'/DAKA-SP/'.$bln2.'/'.$thn;
				
		$sql= "insert INTO letter (id_letter, 	letter_no, 	description,	kode_company,	instansi, 	tanggal, 		remark,		vis, 	create_user, 	create_date, 	modified_user, 		modified_date) 	
						VALUES 	  ('$no', 		'$quo', 	'$des',			'$cp', 			'$int',			$tgl',			'$rmk', 	'$na',	'$usr',			'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		$sql2 ="insert INTO letter_dk (id_letter_dk, kode_company, no_letter_dk) VALUES ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());			
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../surat.php");
	}

mysql_close();

ob_end_flush(); ?>
	