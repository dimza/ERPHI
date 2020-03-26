<?php

	$q = intval($_GET['q']);

	require_once(__DIR__.'/../db_con/db.php');

		$thn = date("Y");
		$bln = date("m");

	require_once(__DIR__.'/romawi.php');	

	if ($q == "1") {

		//mencari nilai quote no terakhir
		$qo= "select * from do_ss order by id_do_ss desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['no_do_ss']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$quo= $ang.'/CVSS-DO/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-magenta btn-sm' disabled=''>$quo</button>";

	} else if ($q == "2") {
		
		//mencari nilai quote no terakhir
		$qo= "select * from do_abm order by id_do_abm desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['no_do_abm']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$quo= $ang.'/ABM-DO/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-lime btn-sm' disabled=''>$quo</button>";

	} else if ($q == "3") {
		
		//mencari nilai quote no terakhir
		$qo= "select * from do_dk order by id_do_dk desc limit 1";
      	$qoz=mysql_query($qo) or die(mysql_error());     
	  	$qo2 = mysql_fetch_array($qoz);
	  	$qo3 = $qo2['no_do_dk']+'1';
	  	$ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
		
		// value untuk quote_no
		$quo= $ang.'/DAKA-DO/'.$bln2.'/'.$thn;

		echo "<button type='button' class='btn btn-purple btn-sm' disabled=''>$quo</button>";

	}	

mysql_close();
?> 