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

  <?PHP

  include ("header.php");
  include ("sidebar.php");
      
  $kode= @$_GET['kd'];
        
  $tam= mysql_query("select * from user where id_pegawai='$kode'");
  $data_tam = mysql_fetch_array($tam);

  $em= $data_tam['nopeg'];
  $em2= mysql_query("select * from `employee` where no_pegawai='$em'") or die(mysql_error());
  $em3= mysql_result($em2, 0, 'nama_depan');
  $em4= mysql_result($em2, 0, 'nama_belakang');  
      
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
      <div class="row">
        <!-- Start .row -->
        <div class="col-lg-12">
          <!-- Start col-lg-12 -->
          <div class="panel panel-default panel-closed toggle panelRefresh panelClose showControls">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4><?PHP echo $em3.' '; echo $em4; ?>, Settings</h4> 
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/ubah_users_data.php enctype="multipart/form-data" method="post" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Employee ID</label>
                    <div class="col-lg-7 col-md-7">
                      <input class=form-control readonly value="<?PHP echo $em ?>" name="id">
                    </div>              
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Username</label>
                    <div class="col-lg-7 col-md-7">
                      <input class=form-control readonly value="<?PHP echo $data_tam['username']; ?>" name="id">
                    </div>              
                </div>                
                <!-- End .form-group  -->                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Granted</label>
                    <div class="col-lg-4 col-md-4">
                      <select class="form-control select2" name="role">
                        <option value="<?PHP echo $data_tam['role']; ?>"><?PHP echo $data_tam['role']; ?>
                        <option value="1">Administrator</option>
                        <option value="2">Manager</option>
                        <option value="3">Supervisor</option>
                        <option value="4">Officer</option>
                      </select>                    
                    </div>
                </div>
                <!-- End .form-group  --> 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Valid Date</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>
                      <div class="col-lg-6 col-md-6">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="tanggal" value="<?PHP echo $data_tam['valid_date']; ?>">
                          <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                          <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="user">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End .form-group  -->                                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-7 col-md-7">
                      <textarea class=form-control rows=3 name="rmk" placeholder="keterangan tambahan.."><?PHP echo $data_tam['remark']; ?></textarea>
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

        <div class="col-lg-12">
          <!-- Start col-lg-12 -->
          <div class="panel panel-default toggle">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4>RESET PASSWORD</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/ubah_users.php enctype="multipart/form-data" method="post" id=validate>
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Username</label>
                    <div class="col-lg-7 col-md-7">
                      <input class=form-control readonly value="<?PHP echo $data_tam['username']; ?>" name="id">
                      <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                      <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="user">
                    </div>              
                </div>                
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Reset Password</label>
                  <div class="col-lg-7 col-md-7">
                    <input id=password-metter type=password class=form-control placeholder="Enter your password" name="pword">
                    <span class="help-block mt10"><a href=# id=generate-password class="btn btn-default">Generate</a> <a href=# id=show-password class="btn btn-default">Show password</a> <span id=output-message class="badge p10 ml15">Enter some password</span></span></div>
                </div>
                <!-- End .form-group  -->                                                                      
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-10 col-md-10">
                    <button type=submit class="btn btn-primary">RESET</button>
          
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