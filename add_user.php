<?PHP 

  require_once(__DIR__.'/sys/db_con/auth.php'); 
  require_once(__DIR__.'/sys/db_con/db.php');
    
    $id2=$_SESSION['SESS_MEMBER_ID'];
    
    $tampil= mysql_query("select * from user where id_pegawai='$id2'");
    $data_tampil = mysql_fetch_array($tampil);
    
    $kd_role = $data_tampil['role'];
    $nopeg = $data_tampil['nopeg'];
    
    $tpl= mysql_query("select * from employee where no_pegawai='$nopeg' order by nama_depan ASC");
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

  <?PHP

  include ("header.php");
  include ("sidebar.php"); 

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
            <div class=panel-heading>
              <h4>ADD USER NEW</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/input_users.php enctype="multipart/form-data" method="post" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Employee</label>
                    <div class="col-lg-8 col-md-8">
                      <?PHP $emp= mysql_query("select * from employee where status='0' order by id_karyawan asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="emp" onchange="showEmp(this.value)">';
                        echo '<option value="">SELECT';
                  
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
                <div class=form-group id="txtHint2"></div>                
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Password</label>
                  <div class="col-lg-8 col-md-8">
                    <input id=password-metter type=password class=form-control placeholder="Enter your password" name="pword">
                    <span class="help-block mt10">
                      <a href=# id=generate-password class="btn btn-default">Generate</a> 
                      <a href=# id=show-password class="btn btn-default">Show password</a> 
                      <span id=output-message class="badge p10 ml15">Enter some password</span></span></div>
                </div>
                <!-- End .form-group  --> 
                <hr>               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Granted</label>
                    <div class="col-lg-2 col-md-4">
                      <select class="form-control select2" name="role">
                        <option value="">SELECT
                        <option value="1">Administrator</option>
                        <option value="1">Manager</option>
                        <option value="1">Supervisor</option>
                        <option value="1">Officer</option>
                      </select>                    
                    </div>
                </div>
                <!-- End .form-group  --> 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Valid Date</label>
                      <div class="col-lg-2 col-md-4">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="tanggal">
                          <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                          <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="user">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                </div>
                <!-- End .form-group  -->
                <hr>                                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-2 col-md-8">
                      <textarea class=form-control rows=3 name="rmk" placeholder="keterangan tambahan.."></textarea>
                    </div>
                </div>
                <!-- End .form-group  -->
                <hr>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">SALES</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option1>Tender</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option2 checked>Inquiries</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option3 disabled>Goods</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option4 checked disabled>Purchase Order</label>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">FINANCE</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option1>Invoice</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option2 checked>Currency</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option3 disabled>
                    disabled</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option4 checked disabled>
                    checked and disabled</label>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">LOGISTIC</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option1>Receiving</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option2 checked>Inventory</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option3 disabled>Delivery Order</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option4 checked disabled>Assets</label>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">HR</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option1>Employee</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option2 checked>Users</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option3 disabled>
                    disabled</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option4 checked disabled>
                    checked and disabled</label>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">OTHERS</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option1>Company</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option2 checked>Costumers</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option3 disabled>Suppliers</label>
                  <label class=checkbox-inline>
                    <input type=checkbox value=option4 checked disabled>Letters</label>
                </div>
                <!-- End .form-group  -->                                                                
                <hr>                                                                      
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
function showEmp(str) {
  if (str=="") {
    document.getElementById("txtHint2").innerHTML="";
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
      document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sys/engine/getusr.php?q="+str,true);
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
<?PHP   }  else { header("Location: error_page.php"); } ?>