<?PHP 

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

	  $tahun = date("Y");
	  
	
	if ($kd_role == "1") {
	
    $tab="PO-VIEW";    

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
                      
                      <?PHP $poi= @$_GET['po'];    
	  
	                      $tpl= mysql_query("select * from buying where po_out='$poi'");	  
	                      $tpl2 = mysql_fetch_array($tpl);
	  
	                       $qo = $tpl2['quote_no'];
	                       $pjk = $tpl2['tax'];
	                       $cn = $tpl2['currency_no'];
                         $sp = $tpl2['supplier_no'];
                         $com = $tpl2['company_no'];
                         $rmk = $tpl2['remark'];                           
                      
                      ?>
                      
                        <li><?PHP echo "<button type='button' class='btn btn-default' disabled='disabled'>$poi</button>"; ?></li>
                      </ul>
                    </div>
				  
				  </div>
          <?PHP

          $tampils= mysql_query("select * from company where kode_company='$com'");
          $data_tampils = mysql_fetch_array($tampils);
				  
				  ?>
				  <div class="invoice-from col-md-6">
                    <ul class="list-unstyled text-left">
                      <li><b><?PHP echo $data_tampils['nama_company']; ?></b></li>
                      <li><?PHP echo $data_tampils['alamat_company']; ?></li>
                      <li><?PHP echo $data_tampils['kota_company']; ?>, <?PHP echo $data_tampils['propinsi_company']; ?></li>
                      <li><?PHP echo $data_tampils['negara_company']; ?> - <?PHP echo $data_tampils['kodepos_company']; ?></li>
                      <li>Phone : <?PHP echo $data_tampils['telpon_company']; ?></li>
                      <li><?PHP echo $data_tampils['email_company']; ?></li><br>					  
                    </ul>
                  </div>
				  
				  <?PHP 	  
				  
					$tampilz= mysql_query("select * from supplier where noreg_supplier='$sp'");
					$data_tampilz = mysql_fetch_array($tampilz);
				  
				  ?>
                  <div class="invoice-to col-md-6">
                    <ul class="list-unstyled text-right">
                      <li><b><?PHP echo $data_tampilz['nama_supplier']; ?></b></li>
                      <li><?PHP echo $data_tampilz['alamat_supplier']; ?></li>
                      <li><?PHP echo $data_tampilz['kota_supplier']; ?>, <?PHP echo $data_tampilz['propinsi_supplier']; ?></li>
                      <li><?PHP echo $data_tampilz['negara_supplier']; ?> - <?PHP echo $data_tampilz['kodepos_supplier']; ?></li>
                      <li>Phone : <?PHP echo $data_tampilz['telpon_supplier']; ?></li>
                      <li><?PHP echo $data_tampilz['email_supplier']; ?></li><br>
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
                        <th>Part Number
                        <!-- <th>Manufactured -->
                        <th class="text-center">QTY
                        <th class="text-center">UNIT						
                        <th>PRICE
                        <?PHP

                          $cn2= mysql_query("select * from currency where idCurrency='$cn'") or die(mysql_error());
                          $smb= mysql_result($cn2, 0, 'symbol');

                						echo '('.$smb.')';
                        ?>  
                        <th>TOTAL PRICE <?PHP echo '('.$smb.')'; ?>
						            <th class="text-center"><i class="im-cog"></i>		
                    <tbody>
                    <?PHP 

                          $counter = 1;
	
	                        $items= "select * from buying_list where po_out='$poi' order by id_buying_list ASC limit 100";
	                        $items2=mysql_query($items) or die(mysql_error());
							
		                        While($items3= mysql_fetch_assoc($items2))
					
			                       {
			
                                echo '<tr><td class="text-center"><strong>'.$counter.'</strong>';
				                        echo '<td> '.$items3['description'].'';
				                        echo '<td> '.$items3['part_number'].'';

                                  $gs=$items3['goods_no'];
                                  $gs2= mysql_query("select * from `goods` where id_goods='$gs'") or die(mysql_error());
                                  $gs3= mysql_result($gs2, 0, 'manufactured');

                                //echo '<td>'.$gs3;                                
                                echo '<td class="text-center"> '.$items3['qty'].'';
                                echo '<td class="text-center"> '.$items3['unit'].'';
                                echo '<td>'.number_format($items3['price']);
                                echo '<td>'.number_format($items3['sub_price']);
                                
                                	$sign=$items3['status'];
                                    
				                        if ($sign == "21") {
				                        
				                        echo '<th class="text-center"><a><i class="st-checkmark"></i></a>';
				                        
				                        					}
				                        else if ($sign == "20") {
				                        
				                        echo '<th class="text-center"><a href="sys/engine/hapus_buying_list.php?kd='.$items3['id_buying_list'].'&&qs='.$poi.'" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="im-close"></i></a> | <i class="im-checkmark2"></i>';
				                        
				                        					}
                                $counter++; //increment counter by 1 on every pass 							

			                        };
                    ?>						
	
                  </table>
                    <div class="well bn">
                      <div class=row>
                        <div class=col-md-9>
            <!-- <button type=button class="btn btn-primary">FINISH</button>          
            <button type=submit class="btn btn-primary"><i class="im-file-pdf"></i></button>
            <button type=submit class="btn btn-primary"><i class="im-file-excel"></i></button>
            <button type=submit class="btn btn-primary"><i class="fa-envelope"></i></button> -->
                        </div>
                      <div class=col-md-3>
	                      <?php

		                        $sum = mysql_query("SELECT sum(sub_price) FROM buying_list WHERE po_out='$poi'") or die(mysql_error());
		                          
                              while ($rows = mysql_fetch_array($sum)) {

                            $th= $rows['sum(sub_price)'];
                            $tax2= $pjk/100;
                            $thg= $th*$tax2;
                            $thg2= $th+$thg;                              
	                      ?>
                        <div class="well bn dark-bg mb0"><b>SUBTOTAL</b> = <?php echo number_format("$thg2",0); ?> 
                        
                        <?PHP echo $smb; ?> (Tax <?PHP echo $pjk ?>%)</div> <?PHP } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End .invoice-content -->
              </div>
              <!-- End .invoice -->
                <div class=form-group>
                    <div class="col-lg-10 col-md-12">
                      <p><strong>Note :</strong> <?PHP echo $rmk ?></p>
                    </div>
                </div>
                <!-- End .form-group  -->
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->
      </div>
      <!-- Page End here -->
    </div>
    <!-- End .outlet -->
	<div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <!-- Start .row -->
        <div class=col-lg-12>
          <!-- Start col-lg-12 -->
          <div class="panel panel-default panel-closed toggle panelClose">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4>ADD GOODS</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/input_pembelian_items.php?po=<?PHP echo $poi ?>&&tx=<?PHP echo $pjk ?> method="post">
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description</label>
					          <div class="col-lg-6 col-md-6">
						          <?PHP 
						
							            $tampil_barang= mysql_query("select * from goods where kode_principal='$sp' or kode_principal2='$sp' order by id_goods asc limit 0, 10001");
						
								            echo '<select class="form-control select2" name="barang" onchange="showUser(this.value)">';
								            echo '<option value="">----- PILIH -----';
									
									        While($tampil_barang2= mysql_fetch_assoc($tampil_barang))
								            
                            {
									            echo '<option value="'.$tampil_barang2['id_goods'].'">';
									            echo $tampil_barang2['description_goods'];
									            echo '</option>';
								            }								
								              echo '</select>';
						          ?>
                    </div>
                </div>
                <!-- End .form-group  -->                 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Quantity</label>
                    <div class="col-lg-4 col-md-4">
                      <input class=form-control placeholder=QTY name="jml">
                    </div>
                    <div class="col-lg-2 col-md-2">
                      <input class=form-control placeholder=UNIT name="unt">
                    </div>
                </div>
                <!-- End .form-group  -->	
                <div class=form-group id="txtHint"></div>
                <!-- End .form-group  -->                		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-10 col-md-10">
                    <button type=submit class="btn btn-primary">INPUT</button>
					
                  </div>
                </div>
                <!-- End .form-group  -->
              </form>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- End col-lg-12 -->
      </div>
  </div>
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
	
<?PHP		}  else { header("Location: error_page.php"); } ?>