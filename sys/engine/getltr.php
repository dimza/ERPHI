<?php

	$q = intval($_GET['l']);

	require_once(__DIR__.'/../db_con/db.php');

		$thn = date("Y");
		$bln = date("m");

	require_once(__DIR__.'/romawi.php');	

	if ($q == "1") {

		//mencari nilai quote no terakhir
		$qo= "select * from letterNumber where idCompany='SDHTM' order by idLetterNumber DESC limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['letterNum']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$quo= $ang.'/CVSS-SP/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-magenta btn-sm' disabled=''>$quo</button>";

	} else if ($q == "2") {
		
		//mencari nilai quote no terakhir
		$qo= "select * from letterNumber where idCompany='ATHYA' order by idLetterNumber DESC limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['letterNum']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$quo= $ang.'/ABM-SP/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-lime btn-sm' disabled=''>$quo</button>";

	} else if ($q == "3") {
		
		//mencari nilai quote no terakhir
		$qo= "select * from letterNumber where idCompany='DWRTH' order by idLetterNumber DESC limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['letterNum']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$quo= $ang.'/DAKA-SP/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-purple btn-sm' disabled=''>$quo</button>";

	}	

mysql_close();
?> 