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
	  
	  $today = date("j F Y"); 

	  $tahun = date("Y");

    $oe= mysql_query("select * from oe order by id_oe desc limit 1");
    $oe2 = mysql_fetch_array($oe);
    $oe3 = $oe2['id_oe']+'1';    
	
	if ($kd_role == "1") {

    $tab="PO-FORM";    
  
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
            <div class=panel-heading>
              <h4>ADD EXPENSES REPORT</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/input_expenses.php enctype="multipart/form-data" method="post" id=validate>                
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>                  
                    <div class="col-lg-8 col-md-8">
                      <input class="form-control tip" placeholder="Perangko 6000" name="desc">
                    </div>
                    </div>
                  </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">User Employee</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>                  
                    <div class="col-lg-4 col-md-4">
                      <?PHP $emp= mysql_query("select * from employee order by id_karyawan asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="emp">';
                        echo '<option value="">SELECT';
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['no_pegawai'].'">';
                            echo $emp2['nama_depan'].' '.$emp2['nama_tengah'].' '.$emp2['nama_belakang'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <?PHP $emp= mysql_query("select * from cost_code order by id_costcode asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="cc">';
                        echo '<option value="">COST CODE';
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['noreg_cost'].'">';
                            echo $emp2['description'].' - '.$emp2['noreg_cost'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    </div>
                  </div>                                                      
                </div>
                <!-- End .form-group  -->                
                <!--<div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Acknowledge</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $emp= mysql_query("select * from employee order by id_karyawan asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="ack">';
                        echo '<option value="">SELECT';
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['no_pegawai'].'">';
                            echo $emp2['nama_depan'].' '.$emp2['nama_belakang'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>              
                </div>-->
                <!-- End .form-group  -->                                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Total Spent</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>                  
                    <div class="col-lg-4 col-md-4">
                      <input class="form-control tip" placeholder="6500" name="val">
                    </div>                    
                    <div class="col-lg-4 col-md-4">
                      <select class="form-control select2" name="kurs">
                        <option value="">SELECT
                        <option value="501">IDR - Rupiah</option>
                        <option value="502">USD - US Dollar</option>
                      </select>
                    </div>
                    </div>
                  </div>                                        
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Payment*</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>                   
                    <div class="col-lg-4 col-md-4">
                      <select class="form-control select2" name="payment">
                        <option value="">SELECT
                        <option value="0">CASH</option>
                        <option value="1">CHEQUE</option>
                        <option value="2">REIMBURSEMENT</option>
                        <option value="3">BANK TRANSFER</option>
                        <option value="4">OTHER</option>
                      </select>                    
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <?PHP $bank= mysql_query("select * from accountBank order by id_aBank");
            
                        echo '<select class="form-control select2" name="bank">';
                        echo '<option value="">SOURCE FUNDS';
                  
                          While($bank2= mysql_fetch_assoc($bank))
                        {
                          echo '<option value="'.$bank2['id_aBank'].'">';
                          echo $bank2['name_bank'].' - '.$bank2['account_no'];
                          echo '</option>';
                        }
                
                          echo '</select>';
                      ?>                    
                    </div>
                    </div>
                  </div>                                        
                </div>
                <!-- End .form-group  -->               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Catagory</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>
                    <div class="col-lg-4 col-md-4">
                      <select class="form-control select2" name="type">
                        <option value="">SELECT
                        <option value="11">Office Operating</option>
                        <option value="12">Development</option>
                        <option value="13">Salary</option>
                        <option value="14">Entertaiment</option>
                        <option value="15">Transport</option>
                        <option value="16">Miscellaneous</option>
                      </select>                    
                    </div>                    
                      <div class="col-lg-4 col-md-4">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="tanggal">
                          <input type=hidden class=form-control readonly value="<?PHP echo $oe3 ?>" name="rn">
                          <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                          <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="user">
                          <input type=hidden class=form-control readonly value="501" name="matauang">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End .form-group  -->                                                 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Details of Bills</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>                  
                    <div class="col-lg-8 col-md-8">
                      <textarea class=form-control rows=3 name="rmk" placeholder="keterangan tambahan.."></textarea>
                    </div>
                    </div>
                  </div>                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Upload Bills Scan</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row> 
                  <div class="col-lg-10 col-md-10">
                    <input type=file name="nama_file">
                  </div>
                    </div>
                  </div>                   
                </div>
                <!-- End .form-group  -->                                                       
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>                  
                  <div class="col-lg-10 col-md-10">
                    <button type=submit class="btn btn-primary">SUBMIT</button>
                    </div>
                  </div>          
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