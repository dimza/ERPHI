<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
	  $peg = $data_tampil['nama_pegawai'];
    $spc= $data_tampil['spc'];
	  
	  $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
	  $data = mysql_fetch_array($tpl);
	  
    $var = @$_GET['kd'];
    $alrt = @$_GET['al']; 	  
	
	if ($kd_role == "1") {	

    $tab="PO";    
  
    include ("head_meta.php");
    include ("date_format.php");

?>

<body>

<?PHP include ("header.php"); ?>
<?PHP include ("sidebar.php"); ?>

<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
    <div class=row>
      <!-- Start .row -->
      <!-- Start .page-header -->
      <div class="col-lg-12 heading">
        <br>
        <!-- Start .bredcrumb -->
        <ul id=crumb class=breadcrumb>
        </ul>
        <!-- End .breadcrumb -->
      </div>
      <!-- End .page-header -->
    </div>
    <!-- End .row -->	
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->

  <?PHP //include ("info.php"); ?>        

      <div class=row>
        <!-- Start .row -->      
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          
            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a PO Out No. <a href="sys/engine/hapus_pembelian.php?clt=<?PHP echo $var ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
            </div>            
            <?PHP break; case "0": ?> 
            
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Well done!</strong> You successfully restore data with this <strong><?PHP echo $var ?></strong> as a PO Out No.
            </div>             
            
            <?PHP break; default: }?>           
          
          <div class="panel panel-default plain panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4>BUYING LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id=datatable>
                <thead>
                  <tr>
                    <th>No. PO-Out
                    <!--<th>Supplier -->
                    <th>Value
                    <th class="text-center">Tax                                                             
                    <!-- <th>No. PO-In -->
                    <!-- <th>Quote No. -->
                    <th>Payment                     
                    <th>Created				
                    <!-- <th>By. -->
                    <th><i class="im-cog"></i>			
                <tbody>
                <?PHP 

                  $qt= mysql_query("select * from buying where vis='0' order by id_buy asc limit 0, 10001");
    
                    While($qt2= mysql_fetch_assoc($qt))
                      
                      {

                        echo '<tr class="odd gradeX">';               
                        echo '<td><a href="input_item_pembelian.php?po='.$qt2["po_out"].'" target="_Blank">'.$qt2['po_out'];

                          $cno=$qt2['supplier_no'];
                          $cno2= mysql_query("select * from `supplier` where noreg_supplier='$cno'") or die(mysql_error());
                          $cno3= mysql_result($cno2, 0, 'nama_supplier');

                        //echo '<td>'.$cno3;
                          
                          $poi=$qt2['po_out'];
                          $pjk=$qt2['tax']; 
                          $sum = mysql_query("SELECT sum(sub_price) FROM buying_list WHERE po_out='$poi'") or die(mysql_error());
                              
                            while ($rows = mysql_fetch_array($sum)) {

                            $th= $rows['sum(sub_price)'];
                            $tax2= $pjk/100;
                            $thg= $th*$tax2;
                            $thg2= $th+$thg;

                            }

                          $kurs=$qt2['currency_no'];
                          $kurs2= mysql_query("select * from `currency` where idCurrency='$kurs'") or die(mysql_error());
                          $kurs3= mysql_result($kurs2, 0, 'symbol');
                          
                        echo '<td>'.$kurs3.' - '.number_format("$thg2",0);                        
                        echo '<td class="text-center">'.$qt2['tax'].' %';                                                
                        //echo '<td>'.$qt2['po_in'];
                        echo '</a>';
                        //echo '<td>'.$qt2['quote_no'];

                          include __DIR__ . '/sys/engine/buy_stat.php';

                        echo '<td>'.$qt2['date'];                               
                        // echo '<td>'.$qt2['modified_user'];
                        echo '<td><a href="edit_po.php?kd='.$qt2["po_out"].'" target="_Blank"><i class="fa-edit"></i></a> | ';
                        echo '<a href="sys/engine/hapus_pembelian.php?kd='.$qt2["id_buy"].'&&dt='.$today.'&&pg='.$peg.'&&clt='.$qt2["po_out"].'&&swch=1" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="fa-trash"></i></a>';                 
                      }
                ?>  					 					
                <tfoot>
                  <tr>
                    <th>
                      <!-- <a href="buat_pembelian2.php" target="_Blank"> -->
                        <a href=#myModal role=button data-toggle=modal>
                        <button type=button class="btn btn-sm btn-primary">CREATE ORDERS</button></a>
<!--                       <a href="buat_pembelian.php" target="_Blank">
                        <button type=button class="btn btn-sm btn-primary">ADD PO Int</button></a> -->	
<!--                <th>
                    <th>
                    <th>
                    <th>
                    <th style="text-align: right;">              
                      <div class=btn-group>
                        <button type=button class="btn btn-sm btn-primary">EXPORT</button>
                        <button type=button class="btn btn-sm btn-primary dropdown-toggle" data-toggle=dropdown><span class=caret></span> <span class=sr-only>Toggle Dropdown</span></button>
                        <ul class=dropdown-menu role=menu>
                          <li style="text-align: left;"><a href=#>PDF</a></li>
                          <li style="text-align: left;"><a href=#>Excel</a></li>
                        </ul>
                      </div> -->			
              </table>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->
      </div>

        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          <!-- Button to trigger twitter bootstrap modal -->
          <!-- <a href=#myModal role=button class="btn btn-alt btn-danger mb25" data-toggle=modal>Launch TinyMCE in bootstrap modal</a> -->
          <!-- Modal itself -->
          <div class="modal fade" id="myModal" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Order Details</h4>
                </div>
                <div class=modal-body>
                  <!-- content in modal, tinyMCE 4 texarea -->
                <br>
                
              <form class="form-horizontal" role=form action=sys/engine/inputOrders.php enctype="multipart/form-data" method="post" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Purchase No</label>
                    <div class="col-lg-2 col-md-10">
                      <input class="form-control tip" placeholder="No. PO Masuk / Reference No." name="ref">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <hr>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                    <div class="col-lg-2 col-md-6">
                      <?PHP 

                        $comp= mysql_query("select * from company order by nama_company asc");
            
                        echo '<select class="form-control select2" name="comp">';
                        echo '<option value="">SELECT';
                  
                          While($comp2= mysql_fetch_assoc($comp)) {

                            echo '<option value="'.$comp2['id_company'].'">';
                            echo $comp2['nama_company'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>                    
                </div>
                <!-- End .form-group  -->                                
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Type of PO</label>
                    <div class="col-lg-2 col-md-6">
                      <select class="form-control select2" name="sp" onchange="sps(this.value)">
                      <option value="">SELECT</option>
                      <option value="1">Reference by. Tender</option>
                      <option value="2">Reference by. Inquiry</option>
                      <option value="3">Reference by. Internal</option>
                      </select>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group id="txtsps"></div>                                
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Supplier</label>
          <div class="col-lg-2 col-md-10">
            <?PHP $clie= mysql_query("select * from supplier order by nama_supplier asc ");
            
                echo '<select class="form-control select2" name="sup">';
                echo '<option value="">SELECT';
                  
                  While($clie2= mysql_fetch_assoc($clie))
                {
                  echo '<option value="'.$clie2['noreg_supplier'].'">';
                  echo $clie2['nama_supplier'];
                  echo '</option>';
                }
                
                echo '</select>';
            ?>
                </div>
                </div>
                <!-- End .form-group  -->                                                                              

                <hr>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">TAX</label>
                    <div class="col-lg-2 col-md-2">
                      <input type=checkbox class="switch noStyle" name="pajak" id=switch value="10">
                    </div>                                    
                    <div class="col-lg-2 col-md-4">
                      <?PHP $mu= mysql_query("select * from currency order by symbol asc");
            
                        echo '<select class="form-control select2" name="mu">';
                        echo '<option value="">CURRENCY';
                  
                          While($mu2= mysql_fetch_assoc($mu)) {

                            echo '<option value="'.$mu2['idCurrency'].'">';
                            echo $mu2['symbol'].' - '.$mu2['nation'];
                            echo '</option>';
                                                              }
                        echo '</select>';
                      ?>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <select class="form-control select2" name="spa">
                      <option value="">PAYMENT</option>
                      <option value="0">Cash</option>
                      <option value="1">B2B</option>
                      <option value="2">50:50</option>
                      <option value="3">Others</option>
                      </select>
                    </div>                                        
                </div>
                <!-- End .form-group  --> 

                <hr>               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-2 col-md-10">
                      <textarea class=form-control rows=2 name="rmk" placeholder="keterangan tambahan.."></textarea>
                    </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Upload Doc.</label>
                  <div class="col-lg-8 col-md-8">
                    <input type=file name="file_doc">
                    <input type="hidden" class=form-control value="<?PHP echo $nopeg ?>" name="usr">
                    <input type="hidden" class=form-control value="<?PHP echo $today ?>" name="tgl">
                  </div>
                </div>
                <!-- End .form-group  -->

                <br>
                <div class=modal-footer>
                  <button type=button class="btn btn-default" data-dismiss=modal>Close</button>
                  <button type=submit class="btn btn-primary">ADD</button>
                </form>
                </div>
                </div>
<!--                 <div class=modal-footer>
                  <button type=button class="btn btn-default" data-dismiss=modal>Close</button>
                  <button type=button class="btn btn-primary">ADD</button>
                  </form>
                </div> -->
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <!-- col-lg-12 end here -->
      
      <!-- Page End here -->
    </div>
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->
<!-- Javascripts -->
<script>
function sps(str) {
  if (str=="") {
    document.getElementById("txtsps").innerHTML="";
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
      document.getElementById("txtsps").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sys/engine/getsps.php?q="+str,true);
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
<script src=assets/js/pages/data-tables.js></script>
<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>