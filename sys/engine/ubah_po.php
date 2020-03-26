<?PHP
  
  require_once(__DIR__.'/../db_con/db.php'); 

    $ref=$_POST['referensi'];
    $spl=$_POST['supplier'];
    $mu=$_POST['matauang'];
    $pay=$_POST['payment'];
    $tax2=$_POST['pajak'];
    $tgl=$_POST['tanggal'];
    $usr=$_POST['user'];
    $date=$_POST['tgl'];
    $rmk=$_POST['remark'];
    $kde=$_POST['idt'];
    $poo2=$_POST['poo'];
                
    $sql="UPDATE buying SET po_in='$ref', supplier_no='$spl', currency_no='$mu', date='$tgl', tax='$tax2', remark='$rmk', payment='$pay', modified_user='$usr', modified_date='$date' WHERE id_buy='$kde'";
  
    $result = mysql_query($sql) or die(mysql_error());

  header("Location: ../../input_item_pembelian.php?po=$poo2");  

mysql_close(); 

?>
  