<?php

$q = $_GET['q'];

  require_once(__DIR__.'/../db_con/db.php');


  $mu= mysql_query("select * from quote_list where quote_no='$q' and status='10' order by id_quote_list");

  While($mu2= mysql_fetch_assoc($mu)) {

    echo '<option value="'.$mu2['id_quote_list'].'">';
    echo $mu2['description'];
    echo ' = ';
    echo $mu2['qty'];
    echo ' ';    
    echo $mu2['unit'];
    echo '</option>';
    
    }

mysql_close();

?> 
