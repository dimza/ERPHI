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
                      
                      $qs= @$_GET['invoice'];    
	  
	                    $tpl= mysql_query("select * from invoice where no_invoice='$qs'");	  
	                    $tpl2 = mysql_fetch_array($tpl);
	  
	                    $nq = $tpl2['no_do'];
	                    $co = $tpl2['kode_company'];
	                    $cl = $tpl2['no_client'];
	                    $cn = $tpl2['no_currency'];
	                    $pjk = $tpl2['tax'];                     
                      
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
                					if ($cn == "501") { echo '(IDR)'; }
                					
                					else if ($cn == "502") { echo '(USD)'; }
                		    ?>  
                        <th>TOTAL PRICE
						            <th>		
                    <tbody>
	
								
	<?PHP 
	
	$items= "select * from quote_list where quote_no='$nq' order by id_quote_list ASC limit 100";
	$items2=mysql_query($items) or die(mysql_error());
							
		While($items3= mysql_fetch_assoc($items2))
					
			{

			
				echo '<tr><td class="text-center"><strong>#</strong>';
				echo '<td> '.$items3['description'].'';
				echo '<td> '.$items3['part_number'].'';
				echo '<td> '.$items3['qty'].'';
				echo '<td> '.$items3['unit'].'';
				echo '<td> '.$items3['price'].'';
				echo '<td> '.$items3['sub_price'].'';
				echo '<th><a href=""><i class="fa-remove-sign"></i></a>';							

			};

	?>						
	
                  </table>
                  <div class="well bn">
                    <div class=row>
                      <div class=col-md-9>
            <button type=button class="btn btn-primary">FINISH</button>          
            <button type=submit class="btn btn-primary"><i class="im-file-pdf"></i></button>
            <button type=submit class="btn btn-primary"><i class="im-file-excel"></i></button>
            <button type=submit class="btn btn-primary"><i class="fa-envelope"></i></button>
                      </div>
                      <div class=col-md-3>
	<?php
		$sum = mysql_query("SELECT sum(sub_price) FROM quote_list WHERE quote_no='$nq'") or die(mysql_error());
		while ($rows = mysql_fetch_array($sum)) {
	?>
        
                        <div class="well bn dark-bg mb0"><b>SUB TOTAL</b> = <?php echo $rows['sum(sub_price)']; ?> 
                        
                        <?PHP 
                          if ($cn == "501") { echo 'IDR'; } 
                          else if ($cn == "502") { echo 'USD'; }
                        ?> 
                        
                         (Tax <?PHP echo $pjk ?>%)</div>     
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
	<div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <!-- Start .row -->
        <div class=col-lg-12>
          <!-- Start col-lg-12 -->
          <div class="panel panel-default toggle">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4>ADD GOODS</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=input_item_penawaran2.php?qt=<?PHP echo $nq ?>&&tx=<?PHP echo $pjk ?> method="post">
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description</label>
					<div class="col-lg-6 col-md-6">
						<?PHP 
						
							$tampil_barang= mysql_query("select * from goods order by id_goods asc limit 0, 10001");
						
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
                <!--<div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Margin Profit</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control id=mask-percent name="persen">
                    <span class=help-block>Mazksimal 99%</span></div>
                </div>-->
                <!-- End .form-group  -->	
                <div class=form-group id="txtHint"></div>
                <!-- End .form-group  -->                		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-10 col-md-10">
                    <button type=submit class="btn btn-primary">ADD</button>
					
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