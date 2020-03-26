<?PHP

        require_once(__DIR__.'/../db_con/db.php');

    $brg=($_POST['barang']);
    $jmlh=$_POST['jml'];
    $unit=$_POST['unt'];
    $hrga=$_POST['hrg'];
    $mtu=$_POST['mu'];    
    $sts='20';
    $no='';
    
    $qz= @$_GET['po'];
    $tax= @$_GET['tx'];   
    
    $sp= $jmlh*$hrga;
    
    $dg= mysql_query("select * from goods where id_goods='$brg'") or die(mysql_error());
    $dg2= mysql_result($dg, 0, 'description_goods');
    $pn2= mysql_result($dg, 0, 'part_number');
    
    $ins= "insert INTO buying_list (id_buying_list, po_out, description, part_number, goods_no, qty, unit, price, sub_price, matauang, tax, status) 
  
                  VALUES ('$no', '$qz', '$dg2', '$pn2', '$brg', '$jmlh', '$unit', '$hrga', '$sp', '$mtu', '$tax', '$sts')";
        
    $rst = mysql_query($ins) or die(mysql_error());
    
    header("Location: ../../input_item_pembelian.php?po=$qz");

?>