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
      <?PHP
      
        $kode= @$_GET['kd'];
        
        $tam= mysql_query("select * from billExpenses where id_oe='$kode'");
        $data_tam = mysql_fetch_array($tam);
      
      ?>            
              <form class="form-horizontal" role=form action=sys/engine/ubah_expenses.php enctype="multipart/form-data" method="post" id=validate>
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>                  
                    <div class="col-lg-8 col-md-8">
                      <input class="form-control tip" value="<?PHP echo $data_tam['description'] ?>" name="desc">
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
                      <?PHP

                        $ep=$data_tam['name_user'];

                        $em= mysql_query("select * from employee where no_pegawai='$ep'");
                        $em2 = mysql_fetch_array($em);
                        $em3 = $em2['nama_depan'];
                        $em4 = $em2['nama_tengah'];
                        $em5 = $em2['nama_belakang'];                       

                        $emp= mysql_query("select * from employee order by id_karyawan asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="emp">';
                        echo '<option value="'.$ep.'">'.$em3.' '.$em4.' '.$em5;
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['no_pegawai'].'">';
                            echo $emp2['nama_depan'].' '.$emp2['nama_belakang'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <?PHP 

                        $cc=$data_tam['cost_code'];

                        $cc2= mysql_query("select * from cost_code where noreg_cost='$cc'");
                        $cc3 = mysql_fetch_array($cc2);
                        $cc4 = $cc3['description'];

                        $emp= mysql_query("select * from cost_code order by id_costcode asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="cc">';
                        echo '<option value="'.$cc.'">'.$cc4.' - '.$cc;
                  
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
                      <input class="form-control tip" value="<?PHP echo $data_tam['value'] ?>" name="val">
                    </div>                    
                    <div class="col-lg-4 col-md-4">
                      <input class="form-control tip" readonly value="IDR (ONLY)">
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
                      <?PHP $dt= $data_tam['payment'];
                
                        if ($dt == "0") { echo '<option value="'.$dt.'">CASH'; }
                        else if ($dt == "1") { echo '<option value="'.$dt.'">CHEQUE'; }
                        else if ($dt == "2") { echo '<option value="'.$dt.'">REIMBURSEMENT'; }
                        else if ($dt == "3") { echo '<option value="'.$dt.'">BANK TRANSFER'; }
                        else if ($dt == "4") { echo '<option value="'.$dt.'">OTHER'; }

                      ?>
                        <option value="0">CASH</option>
                        <option value="1">CHEQUE</option>
                        <option value="2">REIMBURSEMENT</option>
                        <option value="3">BANK TRANSFER</option>
                        <option value="4">OTHER</option>
                      </select>                    
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <?PHP

                        $sf=$data_tam['source_funds'];

                        $sf2= mysql_query("select * from accountBank where id_aBank='$sf'");
                        $sf3 = mysql_fetch_array($sf2);
                        $sf4 = $sf3['name_bank'];
                        $sf5 = $sf3['account_no'];                       

                        $bank= mysql_query("select * from accountBank order by id_aBank");
            
                        echo '<select class="form-control select2" name="bank">';
                        echo '<option value="'.$sf.'">'.$sf4.' - '.$sf5;
                  
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
                      <?PHP $dt2= $data_tam['type'];
                
                        if ($dt2 == "11") { echo '<option value="'.$dt2.'">Office Operating'; }
                        else if ($dt2 == "12") { echo '<option value="'.$dt2.'">Development'; }
                        else if ($dt2 == "13") { echo '<option value="'.$dt2.'">Salary'; }
                        else if ($dt2 == "14") { echo '<option value="'.$dt2.'">Entertaiment'; }
                        else if ($dt2 == "15") { echo '<option value="'.$dt2.'">Transport'; }
                        else if ($dt2 == "16") { echo '<option value="'.$dt2.'">Miscellaneous'; }

                      ?>
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
                          <input class="form-control datetime-picker2" name="tanggal" value="<?PHP echo $data_tam['date_input'] ?>">
                          <input type=hidden class=form-control readonly value="<?PHP echo $oe3 ?>" name="rn">
                          <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                          <input type=hidden class=form-control readonly value="<?PHP echo $data_tam['picture'] ?>" name="foto">
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
                      <textarea class=form-control rows=3 name="rmk" ><?PHP echo $data_tam['remark'] ?></textarea>
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
                    <button type=submit class="btn btn-primary">SUBMIT</button>
          
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
<script>
function showPo2(str) {
  if (str=="") {
    document.getElementById("txtHint3").innerHTML="";
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
      document.getElementById("txtHint3").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sys/engine/getpo2.php?q="+str,true);
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
<?PHP 	}  else { header("Location: error_page.php"); } ?>