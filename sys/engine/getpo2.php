<?php

  $q = $_GET['q'];

  require_once(__DIR__.'/../db_con/db.php');

    $thn = date("Y");
    $bln = date("m");

  require_once(__DIR__.'/romawi.php');


  if ($q == "1") {

    //mencari nilai quote no terakhir
      $qo= "select * from po_ss_out order by id_po_ss_out desc limit 1";
      $qoz=mysql_query($qo) or die(mysql_error());     
      $qo2 = mysql_fetch_array($qoz);
      $qo3 = $qo2['no_po_ss_out']+'1';
      $ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
    
    // value untuk quote_no
    $quo= $ang.'/CVSS-PO/'.$bln2.'/'.$thn;

    echo "<button type='button' class='btn btn-magenta btn-sm' disabled=''>$quo</button>";

  } else if ($q == "2") {
    
    //mencari nilai quote no terakhir
      $qo= "select * from po_abm_out order by id_po_abm_out desc limit 1";
      $qoz=mysql_query($qo) or die(mysql_error());     
      $qo2 = mysql_fetch_array($qoz);
      $qo3 = $qo2['no_po_abm_out']+'1';
      $ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
    
    // value untuk quote_no
    $quo= $ang.'/ABM-PO/'.$bln2.'/'.$thn;

    echo "<button type='button' class='btn btn-lime btn-sm' disabled=''>$quo</button>";

  } else if ($q == "3") {
    
    //mencari nilai quote no terakhir
    $qo= "select * from po_dk_out order by id_po_dk_out desc limit 1";
      $qoz=mysql_query($qo) or die(mysql_error());     
      $qo2 = mysql_fetch_array($qoz);
      $qo3 = $qo2['no_po_dk_out']+'1';
      $ang = str_pad($qo3, 4, '0', STR_PAD_LEFT);
    
    // value untuk quote_no
    $quo= $ang.'/DAKA-PO/'.$bln2.'/'.$thn;

    echo "<button type='button' class='btn btn-purple btn-sm' disabled=''>$quo</button>";

  } 

mysql_close();
?> 