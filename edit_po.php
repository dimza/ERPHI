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
    
    $today = date("j/m/Y"); 

    $kd2 = @$_GET['kd'];

    $tampil2= mysql_query("select * from buying where po_out='$kd2'");
    $data_tampil2 = mysql_fetch_array($tampil2);

    $co= $data_tampil2['company_no'];
    $sp= $data_tampil2['supplier_no'];
    $cn= $data_tampil2['currency_no'];
    $nik= $data_tampil2['id_buy'];
    $py= $data_tampil2['payment'];   

    $co2= mysql_query("select * from company where kode_company='$co'") or die(mysql_error());
    $co3= mysql_result($co2, 0, 'nama_company');

    $cl2= mysql_query("select * from supplier where noreg_supplier='$sp'") or die(mysql_error());
    $cl3= mysql_result($cl2, 0, 'nama_supplier');

    $cn2= mysql_query("select * from currency where id_currency='$cn'") or die(mysql_error());
    $cn3= mysql_result($cn2, 0, 'matauang');
    $cn4= mysql_result($cn2, 0, 'simbol');        

if ($kd_role == "1") {

    $tab="EDIT PO ".$kd2;    
  
    include ("head_meta.php");  

?>

<body>

<?PHP include ("header.php"); ?>
<?PHP include ("sidebar.php"); ?>

<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
   <br>
    <!-- End .row -->
    <div class=outlet>
    <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <!-- Start .row -->
        <div class=col-lg-12>
          <!-- Start col-lg-12 -->
          <div class="panel panel-default">
            <!-- Start .panel -->
            <div class=panel-heading><h4>EDIT PURCHASE ORDER FORM</h4></div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/ubah_po.php method="post" enctype="multipart/form-data" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Quote No.</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control readonly value="<?PHP echo $data_tampil2['quote_no'] ?>">
                  </div>
                </div>       
                <!-- End .form-group  -->              
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">PO-Out</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control readonly value="<?PHP echo $data_tampil2['po_out'] ?>">
                  </div>
                </div>       
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">PO-In</label>
                    <div class="col-lg-10 col-md-10">
                      <input class="form-control required" value="<?PHP echo $data_tampil2['po_in'] ?>" name="referensi">
                    </div>
                </div>        
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control readonly value="<?PHP echo $co3 ?>">
                  </div>
                </div>       
                <!-- End .form-group  -->               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Supplier</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $clie= mysql_query("select * from supplier order by id_supplier asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="supplier">';
                        echo '<option value="'.$sp.'">'.$cl3.'';
                  
                          While($clie2= mysql_fetch_assoc($clie)) {

                            echo '<option value="'.$clie2['noreg_supplier'].'">';
                            echo $clie2['nama_supplier'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Currency</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $mu= mysql_query("select * from currency order by id_currency asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="matauang">';
                        echo '<option value="'.$cn.'">'.$cn3.' - '.$cn4.'';
                  
                          While($mu2= mysql_fetch_assoc($mu)) {

                            echo '<option value="'.$mu2['id_currency'].'">';
                            echo $mu2['matauang'].' - '.$mu2['simbol'];
                            echo '</option>';
                                                              }
                        echo '</select>';
                      ?>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Payment*</label>
                    <div class="col-lg-6 col-md-6">
                      <select class="form-control select2" name="payment">
                        <?PHP

                          if ($py == "0") { echo '<option value="0">CASH</option>'; }                         
                          else if ($py == "1") { echo '<option value="1">BACK TO BACK</option>'; }
                          else if ($py == "2") { echo '<option value="2">50 : 50</option>'; }
                          else if ($py == "3") { echo '<option value="3">OTHER</option>'; }

                        ?>
                        <option value="0">CASH</option>
                        <option value="1">BACk TO BACK</option>
                        <option value="2">50 : 50</option>
                        <option value="3">OTHER</option>
                      </select>                    
                    </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tax</label>
                    <div class="col-lg-10 col-md-10">
                      <input type=checkbox class="switch noStyle" name="pajak" id=switch value="10">
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Date</label>
                    <div class="col-lg-10 col-md-10">
                      <div class=row>
                        <div class="col-lg-4 col-md-4">
                          <div class=input-group>
                            <input class="form-control datetime-picker2" name="tanggal" value="<?PHP echo $data_tampil2['date'] ?>">
                            <input type="hidden" class=form-control value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="user">
                            <input type="hidden" class=form-control value="<?PHP echo $today ?>" name="tgl">
                            <input type="hidden" class=form-control value="<?PHP echo $nik ?>" name="idt">
                            <input type="hidden" class=form-control value="<?PHP echo $kd2 ?>" name="poo">                            
                            <span class=input-group-addon><i class=fa-calendar></i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End .form-group  -->       
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-10 col-md-10">
                      <textarea class=form-control rows=3 name="remark" value="<?PHP echo $data_tampil2['remark'] ?>"><?PHP echo $data_tampil2['remark'] ?></textarea>
                    </div>
                </div>
                <!-- End .form-group  -->       
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                    <div class="col-lg-10 col-md-10">
                      <button type=submit class="btn btn-primary">UPDATE</button>
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
      <!-- End .row -->         
      <!-- Page End here -->
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->
<!-- Javascripts -->
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
<?PHP   }  else { header("Location: error_page.php"); } ?>