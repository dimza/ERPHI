<?php

$q = $_GET['q'];

  require_once(__DIR__.'/../db_con/db.php');


  $mu= mysql_query("select * from buying_list where po_out='$q' and status='20' order by id_buying_list asc limit 0, 1000");

  While($mu2= mysql_fetch_assoc($mu)) {

    echo '<option value="'.$mu2['id_buying_list'].'">';
    echo $mu2['description'];
    echo ' = ';
    echo $mu2['qty'];
    echo ' ';    
    echo $mu2['unit'];
    echo '</option>';
    
    }

mysql_close();

?> 
