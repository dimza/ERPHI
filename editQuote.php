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

	  $tahun = date("Y");        

if ($kd_role == "1") {

    $tab="QTS-EDIT";

    $kd2 = @$_GET['kd'];

    $tampil2= mysql_query("select * from quote where quote_no='$kd2'");
    $data_tampil2 = mysql_fetch_array($tampil2);

    $co= $data_tampil2['company_no'];
    $cl= $data_tampil2['client_no'];
    $cn= $data_tampil2['currency_no'];
    $nik= $data_tampil2['id_quote'];
    $sta= $data_tampil2['status'];        

    $co2= mysql_query("select * from company where kode_company='$co'") or die(mysql_error());
    $co3= mysql_result($co2, 0, 'nama_company');

    $cl2= mysql_query("select * from client where id_client='$cl'") or die(mysql_error());
    $cl3= mysql_result($cl2, 0, 'nama_client');

    $cn2= mysql_query("select * from currency where idCurrency='$cn'") or die(mysql_error());
    $cn3= mysql_result($cn2, 0, 'description');
    $cn4= mysql_result($cn2, 0, 'symbol');

    include ("head_meta.php");    	

    $tab="EDIT-QTS";    
  
  include ("head_meta.php");

?>

<body>

  <?PHP

  include ("header.php");
  include ("sidebar.php");
  include ("date_format.php"); 

  ?>


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
            <div class=panel-heading><h4>EDIT QUOTE</h4></div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/ubah_quote.php method="post" enctype="multipart/form-data" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Quote No</label>
                  <div class="col-lg-6 col-md-6">
                    <input class=form-control readonly value="<?PHP echo $kd2 ?>">
                  </div>
                </div>       
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Sales Call</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP 

                          $emp= mysql_query("select * from employee order by id_karyawan asc limit 0, 100");

                                  $sc= mysql_query("select * from tlquote where noQuote='$kd2'") or die(mysql_error());
                                  $sc2= mysql_result($sc, 0, 'salesQuote');

                                  $sc3= mysql_query("select * from employee where no_pegawai='$sc2'") or die(mysql_error());
                                  $sc4= mysql_result($sc3, 0, 'nama_depan');   
                                  $sc5= mysql_result($sc3, 0, 'nama_tengah');
                                  $sc6= mysql_result($sc3, 0, 'nama_belakang');                               
            
                        echo '<select class="form-control select2" name="sales">';
                        echo '<option value="'.$sc2.'">'.$sc4.' '.$sc5.' '.$sc6.'';
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['no_pegawai'].'">';
                            echo $emp2['nama_depan'].' '.$emp2['nama_tengah'].' '.$emp2['nama_belakang'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>              
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                  <div class="col-lg-6 col-md-6">
                    <input class=form-control readonly value="<?PHP echo $co3 ?>">
                  </div>
                </div>       
                <!-- End .form-group  -->				        
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Reference No</label>
                    <div class="col-lg-6 col-md-6">
                      <input class="form-control required" value="<?PHP echo $data_tampil2['reference_no'] ?>" name="referensi">
                    </div>
                </div>				
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Change Status*</label>
                    <div class="col-lg-6 col-md-6">
                        <select class="form-control select2" name="sts">
                          <option value="<? echo $sta ?>">
                            <?PHP
                              if ($sta == "10") { echo 'OPEN'; }
                              else if ($sta == "11") { echo 'ON PROGRESS'; }                        
                              else if ($sta == "12") { echo 'EXPIRED'; }                            
                              else if ($sta == "13") { echo 'CLOSE'; }                        
                              else if ($sta == "14") { echo 'INVOICE'; }
                              else if ($sta == "15") { echo 'DO DELIVERY'; }
                            ?>
                          <option value="10">OPEN</option>
                          <option value="11">ON PROGRESS</option>
                          <option value="15">DO DELIVERY</option>
                          <option value="14">INVOICE</option>
                          <option value="13">CLOSE</option>
                          <option value="12">EXPIRED</option>                                                    
                        </select>
                    </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Client</label>
					          <div class="col-lg-6 col-md-6">
						          <?PHP $clie= mysql_query("select * from client order by id_client asc limit 0, 100");
						
								        echo '<select class="form-control select2" name="client">';
								        echo '<option value="'.$cl.'">'.$cl3.'';
									
									        While($clie2= mysql_fetch_assoc($clie)) {

									          echo '<option value="'.$clie2['id_client'].'">';
									          echo $clie2['nama_client'];
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
						          <?PHP $mu= mysql_query("select * from currency order by idCurrency asc limit 0, 10");
						
								        echo '<select class="form-control select2" name="matauang">';
								        echo '<option value="'.$cn.'">'.$cn3.' - '.$cn4.'';
									
									        While($mu2= mysql_fetch_assoc($mu)) {

									          echo '<option value="'.$mu2['idCurrency'].'">';
									          echo $mu2['description'].' - '.$mu2['symbol'];
									          echo '</option>';
								                                              }
								        echo '</select>';
						          ?>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Expired Days</label>
                    <div class="col-lg-6 col-md-6">
                      <input class=form-control id=number placeholder="Jumhlah masa berlaku Penawaran" name="hari" value="<?PHP echo $data_tampil2['expired_days'] ?>">
                      <input type="hidden" class=form-control value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="user">
                      <input type="hidden" class=form-control value="<?PHP echo $today ?>" name="tgl">
                      <input type="hidden" class=form-control value="<?PHP echo $nik ?>" name="idt">
                      <input type="hidden" class=form-control value="<?PHP echo $kd2 ?>" name="qoz">
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
                            <span class=input-group-addon><i class=fa-calendar></i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End .form-group  -->                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tax</label>
                    <div class="col-lg-8 col-md-8">
                      <input type=checkbox class="switch noStyle" name="pajak" id=switch value="10">
                    </div>
                </div>
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-6 col-md-6">
                      <textarea class=form-control rows=4 name="remark" value="<?PHP echo $data_tampil2['remark'] ?>"><?PHP echo $data_tampil2['remark'] ?></textarea>
                    </div>
                </div>
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                    <div class="col-lg-8 col-md-8">
                      <button type=submit class="btn btn-primary">UPDATED</button>
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
<?PHP 	}  else { header("Location: error_page.php"); } ?>