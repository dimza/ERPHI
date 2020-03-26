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

    $tahun = date("Y");

if ($kd_role == "1") {

    $tab="QTS-ADD QTS";    

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
            <div class=panel-heading><h4>MAKE INVOICE</h4></div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/input_invoice.php method="post" enctype="multipart/form-data" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Reference No.</label>
                    <div class="col-lg-6 col-md-6">
                      <input class="form-control required" placeholder="No. Tender / No. Inquiry" name="referensi">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">DO</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $clie= mysql_query("select * from delivery_order where status='0' order by id_do");
            
                        echo '<select class="form-control select2" name="do">';
                        echo '<option value="">SELECT';
                  
                          While($clie2= mysql_fetch_assoc($clie)) {

                            echo '<option value="'.$clie2['do_no'].'">';
                            echo $clie2['do_no'];
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
                      <?PHP $comp= mysql_query("select * from company order by id_company asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="company" onchange="showQts(this.value)">';
                        echo '<option value="">SELECT';
                  
                          While($comp2= mysql_fetch_assoc($comp)) {

                            echo '<option value="'.$comp2['id_company'].'">';
                            echo $comp2['nama_company'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    <div class="col-lg-4 col-md-4" id="txtHint"></div>                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Client</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $clie= mysql_query("select * from client order by id_client asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="client">';
                        echo '<option value="">SELECT';
                  
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
                      <?PHP $mu= mysql_query("select * from currency order by id_currency asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="matauang">';
                        echo '<option value="">SELECT';
                  
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tax</label>
                    <div class="col-lg-10 col-md-10">
                      <input type=checkbox class="switch noStyle" name="pajak" id=switch value="10">
                    </div>
                </div>
                <!-- End .form-group  -->                        
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Date</label>
                    <div class="col-lg-8 col-md-8">
                      <div class=row>
                        <div class="col-lg-6 col-md-6">
                          <div class=input-group>
                            <input class="form-control datetime-picker2" name="tanggal" value="<?PHP echo $today ?>">
                            <span class=input-group-addon><i class=fa-calendar></i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Days Expired</label>
                    <div class="col-lg-6 col-md-6">
                      <input class=form-control id=number placeholder="Jumhlah masa berlaku Penawaran" name="hari">
                      <input type="hidden" class=form-control value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="user">
                      <input type="hidden" class=form-control value="<?PHP echo $today ?>" name="tgl">
                    </div>
                </div>        
                <!-- End .form-group  -->                                               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-6 col-md-6">
                      <textarea class=form-control rows=4 name="remark" placeholder="keterangan tambahan.."></textarea>
                    </div>
                </div>
                <!-- End .form-group  -->       
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                    <div class="col-lg-10 col-md-10">
                      <button type=submit class="btn btn-primary">NEXT</button>
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
  </div>  
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->
<!-- Javascripts -->
<script>
function showQts(str) {
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
  xmlhttp.open("GET","sys/engine/getinv.php?q="+str,true);
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