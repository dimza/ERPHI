<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php'); 

		$rfr=$_POST['ref'];
		$cln=$_POST['clnt'];
		$com=$_POST['comp'];
		$spl=$_POST['sup'];
		$mu=$_POST['matauang'];
		$tax2=$_POST['pajak'];
		$tgl=$_POST['tanggal'];
		$remk=$_POST['rmk'];		
		$usr=$_POST['user'];
		$date=$_POST['tgl'];
		
		//default null
		$no='';
		
		//status po
		$stat='20';
		
		//mengisi nilai kosong
		$null='n/a';
		
		$thn = date("Y");
		$bln = date("m");

	require_once(__DIR__.'/romawi.php');
	  		
	if ($com == "1") {

		$cp= "SDHTM";
				
		//mencari nilai po no terakhir
		$po= "select * from `po_ss_out` order by id_po_ss_out desc limit 1";
      	$poz=mysql_query($po) or die(mysql_error());     
	  	$po2 = mysql_fetch_array($poz);
	  	$po3 = $po2['id_po_ss_out']+'1'-'1';
	  	$ang = str_pad($po3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$pot= $ang.'/CVSS-PO/'.$bln2.'/'.$thn;

		// store data pembelian					
		$sql= "insert INTO `buying` (id_buy, 		quote_no, 		po_in,		po_out,			supplier_no,	company_no,	currency_no, 	date, 		tax,		remark, 	status,		vis,		create_user, 	create_date, 	modified_user, 		modified_date) 	
						VALUES 	  ('$no', 		'$null', 		'$rfr', 	'$pot',			'$spl',			'$cp',		'$mu', 			'$tgl', 	'$tax2',	'$remk', 	'$stat',	'$null',	'$usr', 		'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		// store data nomer pembelian		
		$sql2 ="insert INTO `po_ss_out` (id_po_ss_out, kode_company, no_po_ss_out) VALUES ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());		
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../input_item_pembelian.php?po=$pot");	

	} else if ($com == "2"){


		$cp= "ATHYA";
	
		//mencari nilai po no terakhir
		$po= "select * from `po_abm_out` order by id_po_abm_out desc limit 1";
      	$poz=mysql_query($po) or die(mysql_error());     
	  	$po2 = mysql_fetch_array($poz);
	  	$po3 = $po2['id_po_abm_out']+'1'-'1';
	  	$ang = str_pad($po3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$pot= $ang.'/ABM-PO/'.$bln2.'/'.$thn;

		// store data pembelian					
		$sql= "insert INTO `buying` (id_buy, 		quote_no, 		po_in,		po_out,			supplier_no,	company_no,		currency_no, 	date, 		tax,		remark, 	status,		vis,		create_user, 	create_date, 	modified_user, 		modified_date) 	
						VALUES 	  ('$no', 		'$null', 		'$rfr', 	'$pot',			'$spl',			'$cp',			'$mu', 			'$tgl', 	'$tax2',	'$remk', 	'$stat',	'$null',	'$usr', 		'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		// store data nomer pembelian		
		$sql2 ="insert INTO `po_abm_out` (id_po_abm_out, kode_company, no_po_abm_out) VALUES ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());		
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../input_item_pembelian.php?po=$pot");
		
	} else if ($com == "3"){

		$cp= "DWRTH";
	
		//mencari nilai po no terakhir
		$po= "select * from `po_dk_out` order by id_po_dk_out desc limit 1";
      	$poz=mysql_query($po) or die(mysql_error());     
	  	$po2 = mysql_fetch_array($poz);
	  	$po3 = $po2['id_po_dk_out']+'1'-'1';
	  	$ang = str_pad($po3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$pot= $ang.'/DAKA-PO/'.$bln2.'/'.$thn;

		// store data pembelian					
		$sql= "insert INTO `buying` (id_buy, 		quote_no, 		po_in,		po_out,			supplier_no,	company_no,		currency_no, 	date, 		tax,		remark, 	status,		vis,		create_user, 	create_date, 	modified_user, 		modified_date) 	
						VALUES 	  ('$no', 		'$null', 		'$rfr', 	'$pot',			'$spl',			'$cp',			'$mu', 			'$tgl', 	'$tax2',	'$remk', 	'$stat',	'$null',	'$usr', 		'$date', 		'$usr', 			'$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		// store data nomer pembelian		
		$sql2 ="insert INTO `po_dk_out` (id_po_dk_out, kode_company, no_po_dk_out) VALUES ('$no', '$cp', '$ang')";		
		$result2 = mysql_query($sql2) or die(mysql_error());		
 
		//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
		header("Location: ../../input_item_pembelian.php?po=$pot");
	}

mysql_close();

ob_end_flush(); ?>
	