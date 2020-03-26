<?php

	require_once(__DIR__.'/../db_con/db.php');
	

	$q= intval($_GET['q']);

		$thn= date("Y");
		$bln= date("m");

	require_once(__DIR__.'/romawi.php');

		$thn2= mysql_query("select year from `quoteNum` where noCompany='$q' order by idQuoteNum desc limit 1") or die(mysql_error());
        $thn3= mysql_result($thn2, 0, 'year');

		if ($thn > $thn3) {

			$rstQts1="INSERT INTO quoteNum (idQuoteNum, quoteNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'SDHTM', '1', '$thn')";

			$rstQts11= mysql_query($rstQts1) or die(mysql_error());				
			
			$rstQts2="INSERT INTO quoteNum (idQuoteNum, quoteNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'ATHYA', '2', '$thn')";

			$rstQts22= mysql_query($rstQts2) or die(mysql_error());				
			
			$rstQts3="INSERT INTO quoteNum (idQuoteNum, quoteNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'DWRTH', '3', '$thn')";														

			$rstQts33= mysql_query($rstQts3) or die(mysql_error());				
			
			$rstQts4="INSERT INTO quoteNum (idQuoteNum, quoteNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'PGSUS', '4', '$thn')";

			$rstQts44= mysql_query($rstQts4) or die(mysql_error());				
			
			$rstQts5="INSERT INTO quoteNum (idQuoteNum, quoteNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'ATH', '5', '$thn')";

			$rstQts55= mysql_query($rstQts5) or die(mysql_error());				
			
			$rstQts6="INSERT INTO quoteNum (idQuoteNum, quoteNum, idCompany, noCompany, year) 
							VALUES (NULL, '0000', 'TEKRAJ', '6', '$thn')";

			$rstQts66= mysql_query($rstQts6) or die(mysql_error());							 

		}

		//mencari nilai quote no terakhir
		$qo= "select * from quoteNum where noCompany='$q' order by QuoteNum desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2= mysql_fetch_array($qoz);
	  	$qo3= $qo2['quoteNum']+'1';
	  	$ang= str_pad($qo3, 4, '0', STR_PAD_LEFT);

	

	if ($q == "1") {
		
		// value untuk quote_no
		$quo= $ang.'/CVSS-QTS/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-magenta btn-sm' disabled=''>$quo</button>";

	} else if ($q == "2") {
		
		// value untuk quote_no
		$quo= $ang.'/ABM-QTS/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-lime btn-sm' disabled=''>$quo</button>";

	} else if ($q == "3") {
		
		// value untuk quote_no
		$quo= $ang.'/DAKA-QTS/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-purple btn-sm' disabled=''>$quo</button>";

	} else if ($q == "4") {
		
		// value untuk quote_no
		$quo= $ang.'/PGSUS-QTS/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-warning btn-sm' disabled=''>$quo</button>";

	} else if ($q == "5") {
		
		// value untuk quote_no
		$quo= $ang.'/ATH-QTS/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-dark btn-sm' disabled=''>$quo</button>";

	} else if ($q == "6") {
		
		// value untuk quote_no
		$quo= $ang.'/TEKRAJ-QTS/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-brown btn-sm' disabled=''>$quo</button>";

	}	

mysql_close($bd);

?> 