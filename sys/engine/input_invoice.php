<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php'); 

		$ref=$_POST['referensi'];
		$dor=$_POST['do'];
		$com=$_POST['company'];
		$cln=$_POST['client'];
		$mu=$_POST['matauang'];
		$tax=$_POST['pajak'];
		$tgl=$_POST['tanggal'];
		$usr=$_POST['user'];
		$date=$_POST['tgl'];
		$rmk=$_POST['remark'];
		$hr=$_POST['hari'];		

		
		//default null
		$no='';
		
		//status bernilai 10 = on progress
		$stat='10';
		
		//mengisi nilai kosong
		$null='0';
		
		$thn = date("Y");
		$bln = date("m");

	require_once(__DIR__.'/romawi.php');
		
	if ($com == "1") {

		$cp= "SDHTM";
				
		//mencari nilai quote no terakhir
		$qo= "select * from invo_ss order by id_invo_ss desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['no_invo_ss']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$quo= $ang.'/CVSS-INV/'.$bln2.'/'.$thn;
				
		$sql= "insert INTO invoice 	(id_invoice, 	no_invoice, 	no_reference,	no_do, 		kode_company,	no_client,	no_currency, 	date_invoice, 		days_expired, 	tax,		status, 	remark, 		vis,		create_user,	create_date,	modified_user, 		modified_date) 	
						VALUES 	 	('$no', 		'$quo', 		'$ref', 		'$dor',		'$cp', 		'$cln',		'$mu',			'$tgl', 			'$hr', 			'$tax',		'$stat', 	'$rmk', 		'$null', 	'$usr', 		'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		$sql2 ="insert INTO invo_ss (id_invo_ss, kode_company, no_invo_ss) VALUES ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());		
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../input_item_invoice.php?invoice=$quo");	

	} else if ($com == "2"){


		$cp= "ATHYA";
	
		//mencari nilai quote no terakhir
		$qo= "select * from invo_abm order by id_invo_abm desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['no_invo_abm']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$quo= $ang.'/ABM-INV/'.$bln2.'/'.$thn;
				
		$sql= "insert INTO invoice 	(id_invoice, 	no_invoice, 	no_reference,	no_do, 		kode_company,	no_client,	no_currency, 	date_invoice, 		days_expired, 	tax,		status, 	remark, 		vis,		create_user,	create_date,	modified_user, 		modified_date) 	
						VALUES 	 	('$no', 		'$quo', 		'$ref', 		'$dor',		'$cp', 		'$cln',		'$mu',			'$tgl', 			'$hr', 			'$tax',		'$stat', 	'$rmk', 		'$null', 	'$usr', 		'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		$sql2 ="insert INTO invo_abm (id_invo_abm, kode_company, no_invo_abm) VALUES ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());			
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../input_item_penawaran.php?invoice=$quo");
		
	} else if ($com == "3"){

		$cp= "DWRTH";
	
		//mencari nilai quote no terakhir
		$qo= "select * from invo_dk order by id_invo_dk desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['no_invo_dk']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$quo= $ang.'/DAKA-INV/'.$bln2.'/'.$thn;
				
		$sql= "insert INTO invoice 	(id_invoice, 	no_invoice, 	no_reference,	no_do, 		kode_company,	no_client,	no_currency, 	date_invoice, 		days_expired, 	tax,		status, 	remark, 		vis,		create_user,	create_date,	modified_user, 		modified_date) 	
						VALUES 	 	('$no', 		'$quo', 		'$ref', 		'$dor',		'$cp', 		'$cln',		'$mu',			'$tgl', 			'$hr', 			'$tax',		'$stat', 	'$rmk', 		'$null', 	'$usr', 		'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		$sql2 ="insert INTO invo_dk (id_invo_dk, kode_company, no_quote_dk) VALUES ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());			
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../input_item_penawaran.php?invoice=$quo");
	}

mysql_close();

ob_end_flush(); ?>
	