<?php

	require_once(__DIR__.'/../db_con/db.php');
	require_once(__DIR__.'/romawi.php');

		
		$tdr=$_POST['tdr']; //idTender
		$pi=$_POST['pi']; //idPurchaseInt
		$quote=$_POST['quote']; //quote_no
		$ref=$_POST['ref']; //po-in
		$sup=$_POST['sup']; //supplier_no
		$comp=$_POST['comp']; //company_no
		$mu=$_POST['mu']; //currency_no
		$tgl=$_POST['tgl']; //date & cd & md
		$pajak=$_POST['pajak']; //tax
		$rmk=$_POST['rmk']; //remark
		$spa=$_POST['spa']; //payment

		$usr=$_POST['usr']; //cu & mu

		$stat='20';
		$vis='0';
		

		$q= intval($comp);

		$thn= date("Y");
		$bln= date("m");

		$thn2= mysql_query("select year from `buyingnum` where noCompany='$q' order by idBuyNum desc limit 1") or die(mysql_error());
        $thn3= mysql_result($thn2, 0, 'year');

		if ($thn > $thn3) {

			$rstBuy1="INSERT INTO buyingnum (idBuyNum, buyNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'SDHTM', '1', '$thn')";

			$rstBuy11= mysql_query($rstBuy1) or die(mysql_error());				
			
			$rstBuy2="INSERT INTO buyingnum (idBuyNum, buyNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'ATHYA', '2', '$thn')";

			$rstBuy22= mysql_query($rstBuy2) or die(mysql_error());				
			
			$rstBuy3="INSERT INTO buyingnum (idBuyNum, buyNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'DWRTH', '3', '$thn')";														

			$rstBuy33= mysql_query($rstBuy3) or die(mysql_error());				
			
			$rstBuy4="INSERT INTO buyingnum (idBuyNum, buyNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'PGSUS', '4', '$thn')";

			$rstBuy44= mysql_query($rstBuy4) or die(mysql_error());				
			
			$rstBuy5="INSERT INTO buyingnum (idBuyNum, buyNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'ATH', '5', '$thn')";

			$rstBuy55= mysql_query($rstBuy5) or die(mysql_error());				
			
			$rstBuy6="INSERT INTO buyingnum (idBuyNum, buyNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'TEKRAJ', '6', '$thn')";

			$rstBuy66= mysql_query($rstBuy6) or die(mysql_error());							 

		}

	

		define("UPLOAD_DIR", "../../file_upload/purchase_order/");

		if (!empty($_FILES["file_doc"])) 

		{

			$file_doc= $_FILES["file_doc"];

				if ($file_doc["error"] !== UPLOAD_ERR_OK) 

				{	//input quote tanpa upload doc. 

					//mencari nilai buy no terakhir
					$qo= "select * from buyingnum where noCompany='$q' order by buyNum desc limit 1";
      				$qoz=mysql_query($qo) or die(mysql_error());     
	  				$qo2= mysql_fetch_array($qoz);
	  				$qo3= $qo2['buyNum']+'1';
	  				$ang= str_pad($qo3, 4, '0', STR_PAD_LEFT);

	
						if ($q == "1") {
		
							// value untuk quote_no
							$quo= $ang.'/CVSS-PO'.$bln2.'/'.$thn;
							$cp= "SDHTM";

						} else if ($q == "2") {
		
							// value untuk quote_no
							$quo= $ang.'/ABM-PO'.$bln2.'/'.$thn;
							$cp= "ATHYA";

						} else if ($q == "3") {
		
							// value untuk quote_no
							$quo= $ang.'/DAKA-PO'.$bln2.'/'.$thn;
							$cp= "DWRTH";

						} else if ($q == "4") {
		
							// value untuk quote_no
							$quo= $ang.'/PGSUS-PO'.$bln2.'/'.$thn;
							$cp= "PGSUS";

						} else if ($q == "5") {
		
							// value untuk quote_no
							$quo= $ang.'/ATH-PO'.$bln2.'/'.$thn;
							$cp= "ATH";

						} else if ($q == "6") {
		
							// value untuk quote_no
							$quo= $ang.'/TEKRAJ-PO'.$bln2.'/'.$thn;
							$cp= "TEKRAJ";

						}

					$sql= "INSERT INTO buying (id_buy, idTender, idPurchaseInt, quote_no, po_in, po_out, supplier_no, company_no, currency_no, date, tax, remark, status, payment, vis, create_user, create_date, modified_user, modified_date) 								
							VALUES 	 (NULL, '$tdr', '$pi', '$quote','$ref', '$quo', '$sup', '$cp', '$mu', '$tgl', '$pajak', '$rmk', '$stat', '$spa', '$vis', '$usr', '$tgl', '$usr', '$tgl')";	
				
					$result = mysql_query($sql) or die(mysql_error());
		
					$sql2 ="INSERT INTO buyingnum (idBuyNum, buyNum, idCompany, noCompany, year) VALUES (NULL, '$ang', '$cp', '$comp', '$thn')";		
					$result2 = mysql_query($sql2) or die(mysql_error());

					// $sql3 = "INSERT INTO tlQuote (id_tlQuote, noQuote, iconQuote, dateQuote, salesQuote ) VALUES (NULL, '$quo', '101', '$tgl', '$sal')";		
					// $result3 = mysql_query($sql3) or die(mysql_error());				
 
					//mengambil nilai quote no 
					header("Location: ../../input_item_pembelian.php?qo=$quo");						
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


		//mencari nilai buy no terakhir
		$qo= "select * from buyingnum where noCompany='$q' order by buyNum desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2= mysql_fetch_array($qoz);
	  	$qo3= $qo2['buyNum']+'1';
	  	$ang= str_pad($qo3, 4, '0', STR_PAD_LEFT);

	

	if ($q == "1") {
		
		// value untuk quote_no
		$quo= $ang.'/CVSS-PO/'.$bln2.'/'.$thn;
		$cp= "SDHTM";

	} else if ($q == "2") {
		
		// value untuk quote_no
		$quo= $ang.'/ABM-PO/'.$bln2.'/'.$thn;
		$cp= "ATHYA";

	} else if ($q == "3") {
		
		// value untuk quote_no
		$quo= $ang.'/DAKA-PO/'.$bln2.'/'.$thn;
		$cp= "DWRTH";

	} else if ($q == "4") {
		
		// value untuk quote_no
		$quo= $ang.'/PGSUS-PO/'.$bln2.'/'.$thn;
		$cp= "PGSUS";

	} else if ($q == "5") {
		
		// value untuk quote_no
		$quo= $ang.'/ATH-PO/'.$bln2.'/'.$thn;
		$cp= "ATH";

	} else if ($q == "6") {
		
		// value untuk quote_no
		$quo= $ang.'/TEKRAJ-PO/'.$bln2.'/'.$thn;
		$cp= "TEKRAJ";

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

?> 