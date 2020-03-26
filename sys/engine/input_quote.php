<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php');

					$ref=$_POST['referensi'];
					$com=$_POST['company'];
					$cln=$_POST['client'];
					$mu=$_POST['matauang'];
					$tax=$_POST['pajak'];
					$tgl=$_POST['tanggal'];
					$hr=$_POST['hari'];
					$usr=$_POST['user'];
					$date=$_POST['tgl'];
					$rmk=$_POST['remark'];
					$sal=$_POST['sales'];
		
					//status bernilai 10 = open
					$stat='10';
		
					//mengisi nilai kosong
					$null='0';
		
					$thn = date("Y");
					$bln = date("m");

	require_once(__DIR__.'/romawi.php');						

		define("UPLOAD_DIR", "../../file_upload/inquiry_doc/");

		if (!empty($_FILES["file_doc"])) 

		{

			$file_doc= $_FILES["file_doc"];

				if ($file_doc["error"] !== UPLOAD_ERR_OK) 

				{	//input quote tanpa upload doc. 

					//mencari nilai quote no terakhir
					$qo= "select * from quoteNum where noCompany='$q' order by QuoteNum desc limit 1";
      				$qoz=mysql_query($qo) or die(mysql_error());     
	  				$qo2= mysql_fetch_array($qoz);
	  				$qo3= $qo2['quoteNum']+'1';
	  				$ang= str_pad($qo3, 4, '0', STR_PAD_LEFT);

		
						if ($com == "1") {

							$cp= "SDHTM";
							$quo= $ang.'/CVSS-QTS/'.$bln2.'/'.$thn;	

						} else if ($com == "2") {

							$cp= "ATHYA";
							$quo= $ang.'/ABM-QTS/'.$bln2.'/'.$thn;
		
						} else if ($com == "3") {

							$cp= "DWRTH";
							$quo= $ang.'/DAKA-QTS/'.$bln2.'/'.$thn;

						} else if ($com == "4") {

							$cp= "PGSUS";
							$quo= $ang.'/PGSUS-QTS/'.$bln2.'/'.$thn;
						
						} else if ($com == "5") {

							$cp= "ATH";
							$quo= $ang.'/ATH-QTS/'.$bln2.'/'.$thn;
						
						} else if ($com == "6") {

							$cp= "TEKRAJ";
							$quo= $ang.'/TEKRAJ-QTS/'.$bln2.'/'.$thn;
				
						}

					$sql= "INSERT INTO quote (id_quote, client_no, company_no, kode, currency_no, quote_no, reference_no, dateQts, expired_days, create_user, create_date, tax, file_doc, status, 	remark, modified_user, modified_date) 								
							VALUES 	 (NULL, '$cln', '$cp', '$com','$mu', '$quo', '$ref', '$tgl', '$hr',	'$usr', '$date', '$tax', '$null', '$stat', '$rmk', 	'$usr', '$date')";	
				
					$result = mysql_query($sql) or die(mysql_error());
		
					$sql2 ="INSERT INTO quoteNum (idQuoteNum, quoteNum, idCompany, noCompany) VALUES (NULL, '$ang', '$cp', '$com')";		
					$result2 = mysql_query($sql2) or die(mysql_error());

					$sql3 = "INSERT INTO tlQuote (id_tlQuote, noQuote, iconQuote, dateQuote, salesQuote ) VALUES (NULL, '$quo', '101', '$tgl', '$sal')";		
					$result3 = mysql_query($sql3) or die(mysql_error());				
 
					//mengambil nilai quote no 
					header("Location: ../../quoteAddItem.php?qo=$quo");						
				}

			// ensure a safe filename
			$nama_doc=preg_replace("/[^A-Z0-9._-]/i", "_", $file_doc["name"]);

			// dont overwirte an existising file
			$i= 0;
			$parts= pathinfo($nama_doc);
			while (file_exists(UPLOAD_DIR . $nama_doc))	{
				$i++;
				$nama_doc = $parts["filename"] . "-" . $i . "." . $parts["extension"];
				
				}

			// preserve file from temporary directory
			$success= move_uploaded_file($file_doc["tmp_name"], UPLOAD_DIR . $nama_doc);

			if (!$success) {
				echo "<p>Unable to save file.</p>";
				exit;
				}

			// set proper permission on the new file
			chmod(UPLOAD_DIR . $nama_doc, 0644);
		}


		//mencari nilai quote no terakhir dan upload doc
		$qo= "select * from quoteNum where noCompany='$q' order by QuoteNum desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2= mysql_fetch_array($qoz);
	  	$qo3= $qo2['quoteNum']+'1';
	  	$ang= str_pad($qo3, 4, '0', STR_PAD_LEFT);					
		
						if ($com == "1") {

							$cp= "SDHTM";
							$quo= $ang.'/CVSS-QTS/'.$bln2.'/'.$thn;
					
						} else if ($com == "2") {

							$cp= "ATHYA";
							$quo= $ang.'/ABM-QTS/'.$bln2.'/'.$thn;
		
						} else if ($com == "3") {

							$cp= "DWRTH";
							$quo= $ang.'/DAKA-QTS/'.$bln2.'/'.$thn;

						} else if ($com == "4") {

							$cp= "PGSUS";
							$quo= $ang.'/PGSUS-QTS/'.$bln2.'/'.$thn;
				
						} else if ($com == "5") {

							$cp= "ATH";
							$quo= $ang.'/ATH-QTS/'.$bln2.'/'.$thn;
						
						} else if ($com == "6") {

							$cp= "TEKRAJ";
							$quo= $ang.'/TEKRAJ-QTS/'.$bln2.'/'.$thn;
				
						}

		$sql= "INSERT INTO quote (id_quote, client_no, company_no, kode, currency_no, quote_no, reference_no, dateQts, expired_days, create_user, create_date, 	tax,	file_doc, status, remark, modified_user, modified_date) 	
						VALUES 	 (NULL, '$cln', '$cp', 	'$com',	'$mu', '$quo', '$ref', '$tgl', '$hr', '$usr', '$date', '$tax', '$nama_doc',	'$stat', '$rmk', '$usr', '$date')";	
		$result = mysql_query($sql) or die(mysql_error());
		
		$sql2 ="INSERT INTO quoteNum (idQuoteNum, quoteNum, idCompany, noCompany) VALUES (NULL, '$ang', '$cp', '$com')";		
		$result2 = mysql_query($sql2) or die(mysql_error());

		$sql3 ="INSERT INTO tlQuote (id_tlQuote, noQuote, iconQuote, dateQuote, salesQuote ) VALUES ('$no', '$quo', '101', '$tgl', '$sal')";		
		$result3 = mysql_query($sql3) or die(mysql_error());				
 
		//mengambil nilai quote no 
		header("Location: ../../quoteAddItem.php?qo=$quo");												

mysql_close($bd);

ob_end_flush(); ?>


	