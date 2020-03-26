<?PHP ob_start();

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
	  
	  $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
	  $data = mysql_fetch_array($tpl);
	  
	  $today = date("l jS \of F Y h:i:s A");

	  $brg=($_POST['barang']);
	  $jmlh=$_POST['jml'];
	  $unit=$_POST['unt'];
	  $hrga=$_POST['hrg'];
    $mtu=$_POST['mu'];
    $dat=$_POST['tgl']; 
    $use=$_POST['usr'];    
	  $prsn='';
	  $no='';
    $sta='111';
	  
	  $qz= @$_GET['qt'];
	  $tax= @$_GET['tx'];	  
	  
	  $sp= $jmlh*$hrga;
	  
	  $dg= mysql_query("select * from goods where id_goods='$brg'") or die(mysql_error());
    $dg2= mysql_result($dg, 0, 'description_goods');
    $pn2= mysql_result($dg, 0, 'part_number');
	  
	  $ins= "INSERT INTO quote_list (id_quote_list, quote_no, description, part_number, goods_no, qty, unit, price, sub_price, matauang, tax, margin, status, date_create, user_create) 
	
			VALUES ('$no', '$qz', '$dg2', '$pn2', '$brg', '$jmlh', '$unit', '$hrga', '$sp', '$mtu', '$tax', '$prsn', '$sta', '$dat', '$use')";
				
	  $rst = mysql_query($ins) or die(mysql_error());

	if ($kd_role == "1") {	
		
    $tab="QTS-ADD";    

  include ("head_meta.php");

?>

<body>

  <?PHP

  include ("header.php");
  include ("sidebar.php"); 

  ?>
<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
  <br>
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class="row printable">
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading white-bg"></div>
            <div class=panel-body>
              <div class=invoice>
                <!-- Start .invoice -->
                <div class=invoice-header>
                  <!-- Start .invoice-header -->
                  <div class="invoice-logo col-md-12">
				  
					<div class=invoice-date>
                      <ul class=list-unstyled>
 <?PHP
	  
	  $tpl= mysql_query("select * from quote where quote_no='$qz'");	  
	  $tpl2 = mysql_fetch_array($tpl);
	  
	  $nq = $tpl2['quote_no'];
	  $co = $tpl2['company_no'];
	  $cl = $tpl2['client_no'];
	  $cn = $tpl2['currency_no'];	  

 ?>
                      
                        <li><?PHP echo "<button type='button' class='btn btn-default' disabled='disabled'>$nq</button>"; ?></li>
                      </ul>
                    </div>
				  
				  </div>
                  <?PHP 	  
				  
					$tampils= mysql_query("select * from company where kode_company='$co'");
					$data_tampils = mysql_fetch_array($tampils);
				  
				  ?>
				  <div class="invoice-from col-md-9">
                    <ul class="list-unstyled text-left">
                      <li><b><?PHP echo $data_tampils['nama_company']; ?></b></li>
                      <li><?PHP echo $data_tampils['alamat_company']; ?></li>
                      <li><?PHP echo $data_tampils['kota_company']; ?>, <?PHP echo $data_tampils['propinsi_company']; ?></li>
                      <li><?PHP echo $data_tampils['negara_company']; ?> - <?PHP echo $data_tampils['kodepos_company']; ?></li>
                      <li>Phone : <?PHP echo $data_tampils['telpon_company']; ?></li>
                      <li><?PHP echo $data_tampils['email_company']; ?></li>					  
                    </ul>
                  </div>
				  
				  <?PHP 	  
				  
					$tampilz= mysql_query("select * from client where id_client='$cl'");
					$data_tampilz = mysql_fetch_array($tampilz);
				  
				  ?>
                  <div class="invoice-to col-md-3">
                    <ul class="list-unstyled text-right">
                      <li><b><?PHP echo $data_tampilz['nama_client']; ?></b></li>
                      <li><?PHP echo $data_tampilz['alamat_client']; ?></li>
                      <li><?PHP echo $data_tampilz['kota_client']; ?>, <?PHP echo $data_tampilz['propinsi_client']; ?></li>
                      <li><?PHP echo $data_tampilz['negara_client']; ?> - <?PHP echo $data_tampilz['kodepos_client']; ?></li>
                      <li>Phone : <?PHP echo $data_tampilz['telpon_client']; ?></li>
                      <li><?PHP echo $data_tampilz['email_client']; ?></li>
                    </ul>

                  </div>
                </div>
                <!-- End .invoice-header -->
                <div class=invoice-content>
                  <!-- Start .invoice-content -->
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class=text-center>NO            
                        <th>DESCRIPTION 
                        <th>PART NUMBER
                        <th>QTY
                        <th>UNIT            
                        <th>PRICE 
                        <?PHP 
                					
                          if ($cn == "501") { echo 'IDR'; }
                					else if ($cn == "502") { echo 'USD'; }
                		    
                        ?>  
                        <th>TOTAL PRICE
						            <th>		
                    <tbody>
	
								
	<?PHP 
	
	$counter = 1; 
	
	$items= "select * from quote_list where quote_no='$nq' order by id_quote_list ASC limit 100";
	$items2=mysql_query($items) or die(mysql_error());
							
		While($items3= mysql_fetch_assoc($items2))
					
			{

			
				echo '<tr><td class="text-center"><strong>'.$counter.'</strong>';
				echo '<td> '.$items3['description'].'';
				echo '<td> '.$items3['part_number'].'';
				echo '<td class="text-center"> '.$items3['qty'].'';
				echo '<td class="text-center"> '.$items3['unit'].'';
				echo '<td>'.number_format($items3['price']);
        echo '<td>'.number_format($items3['sub_price']);
				echo '<th><a href="sys/engine/hapus_quote_list.php?kd='.$items3['id_quote_list'].'&&qs='.$nq.'" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="en-cross3"></i></a>';
				$counter++; //increment counter by 1 on every pass 							

			};

	?>						
	
                  </table>
                  <div class="well bn">
                    <div class=row>
                      <div class=col-md-9>
<!--             <button type=button class="btn btn-primary"></button>          
            <button type=submit class="btn btn-primary"></button>
            <button type=submit class="btn btn-primary"></button>
            <button type=submit class="btn btn-primary"></button> -->
                      </div>
                      <div class=col-md-3>
        
	<?php
		$sum = mysql_query("SELECT sum(sub_price) FROM quote_list WHERE quote_no='$nq'") or die(mysql_error());
		while ($rows = mysql_fetch_array($sum)) {
		
			$th= $rows['sum(sub_price)'];
			$tax2= $tax/100;
			$thg= $th*$tax2;
			$thg2= $th+$thg; 
	?>
        
                        <div class="well bn dark-bg mb0"><b>SUB TOTAL</b> = <?php echo number_format("$thg2",0); ?> 
                        
                        <?PHP 
                					if ($cn == "501") { echo 'IDR'; }	
                					else if ($cn == "502") { echo 'USD'; }
                		    ?> 
                        
                         (Tax <?PHP echo $tax ?>%)</div>     
    <?PHP } ?>                    
                                                                                 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End .invoice-content -->
              </div>
              <!-- End .invoice -->
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->
      </div>
      <!-- Page End here -->
    </div>
    <!-- End .outlet -->

  <?PHP  include ("goods_add_items.php"); ?>

  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->
<!-- Javascripts -->
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sys/engine/getharga.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete this part?")) {
    document.location = delUrl;
  }
}
</script>
<!-- Load pace first -->
<script src=assets/plugins/core/pace/pace.min.js></script>
<!-- Important javascript libs(put in all pages) -->
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')</script>
<script src=http://code.jquery.com/ui/1.10.4/jquery-ui.js></script>
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')</script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="assets/js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="assets/js/libs/respond.min.js"></script>
<![endif]-->
<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->
	
<?PHP	}  else { header("Location: error_page.php"); } ob_end_flush(); ?>