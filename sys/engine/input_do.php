<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php'); 

		$qts=$_POST['quote'];
		$cmp=$_POST['company'];
		$clt=$_POST['client'];
		$tgl=$_POST['tanggal'];
		$remk=$_POST['rmk'];		
		$usr=$_POST['user'];
		$date=$_POST['tgl'];
		
		//default null
		$no='';
		
		//mengisi nilai kosong
		$null='0';
		
		$thn = date("Y");
		$bln = date("m");

	require_once(__DIR__.'/romawi.php');
	  	
      $qts2= mysql_query("select * from `quote` where quote_no='$qts'") or die(mysql_error());
      $com= mysql_result($qts2, 0, 'kode');	  		  			
		
	if ($com == "1") {

		$cp= "SDHTM";
				
		//mencari nilai po no terakhir
		$po= "select * from `do_ss` order by id_do_ss desc limit 1";
      	$poz=mysql_query($po) or die(mysql_error());     
	  	$po2 = mysql_fetch_array($poz);
	  	$po3 = $po2['id_do_ss']+'1'-'1';
	  	$ang = str_pad($po3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$pot= $ang.'/CVSS-DO/'.$bln2.'/'.$thn;

		// store data pembelian					
		$sql= "insert INTO `delivery_order` (id_do,		do_no,		quote_no,	company_no,		client_no,		date,		remark,		vis,		create_user, 	create_date, 	modified_user, 		modified_date) 	
						VALUES 	  			('$no', 	'$pot', 	'$qts', 	'$cmp',			'$clt',			'$tgl',		'$remk', 	'$null', 	'$usr', 		'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		// store data nomer pembelian		
		$sql2 ="insert INTO `do_ss` (id_do_ss, kode_company, no_do_ss) VALUES ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());		

 		// update status quote
		$sql3="UPDATE `quote` SET status='15' WHERE quote_no='$qts'";	
		$result3= mysql_query($sql3) or die(mysql_error());
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../input_item_do.php?po=$pot");	

	} else if ($com == "2"){


		$cp= "ATHYA";
	
		//mencari nilai po no terakhir
		$po= "select * from `do_abm` order by id_do_abm desc limit 1";
      	$poz=mysql_query($po) or die(mysql_error());     
	  	$po2 = mysql_fetch_array($poz);
	  	$po3 = $po2['id_do_abm']+'1'-'1';
	  	$ang = str_pad($po3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$pot= $ang.'/ABM-DO/'.$bln2.'/'.$thn;

		// store data pembelian					
		$sql= "insert INTO `delivery_order` (id_do,		do_no,		quote_no,	company_no,		client_no,		date,		remark,		vis,		create_user, 	create_date, 	modified_user, 		modified_date) 	
						VALUES 	  			('$no', 	'$pot', 	'$qts', 	'$cmp',			'$clt',			'$tgl',		'$remk', 	'$null', 	'$usr', 		'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		// store data nomer pembelian		
		$sql2 ="insert INTO `do_abm` (id_do_abm, kode_company, no_do_abm) VALUES ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());		

 		// update status quote
		$sql3="UPDATE `quote` SET status='15' WHERE quote_no='$qts'";	
		$result3= mysql_query($sql3) or die(mysql_error());
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../input_item_do.php?po=$pot");
		
	} else if ($com == "3"){

		$cp= "DWRTH";
	
		//mencari nilai po no terakhir
		$po= "select * from `do_dk` order by id_do_dk desc limit 1";
      	$poz=mysql_query($po) or die(mysql_error());     
	  	$po2 = mysql_fetch_array($poz);
	  	$po3 = $po2['id_do_dk']+'1'-'1';
	  	$ang = str_pad($po3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$pot= $ang.'/DAKA-DO/'.$bln2.'/'.$thn;

		// store data pembelian					
		$sql= "insert INTO `delivery_order` (id_do,		do_no,		quote_no,	company_no,		client_no,		date,		remark,		vis,		create_user, 	create_date, 	modified_user, 		modified_date) 	
						VALUES 	  			('$no', 	'$pot', 	'$qts', 	'$cmp',			'$clt',			'$tgl',		'$remk', 	'$null', 	'$usr', 		'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		// store data nomer pembelian		
		$sql2 ="insert INTO `do_dk` (id_do_dk, kode_company, no_do_dk) VALUES ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());		

 		// update status quote
		$sql3="UPDATE `quote` SET status='15' WHERE quote_no='$qts'";	
		$result3= mysql_query($sql3) or die(mysql_error());
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../input_item_do.php?po=$pot");
	}

mysql_close();

ob_end_flush(); ?>
	