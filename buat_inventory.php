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

  
  if ($kd_role == "1") {  

    $tab="RCV-FORM/WITH PO-IN";    

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
              <h4>RECEIVING PROCESS WITH PO-IN FORM</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/input_inv.php enctype="multipart/form-data" method="post" id=validate>
                	  <?PHP
                	  $id_inv= mysql_query("select * from inventory order by id_inv desc limit 1");
	  				        $id_inv2 = mysql_fetch_array($id_inv);
	  				        $id_inv3 = $id_inv2['noreg_inv']+'1';
	  				        ?>
	  			      <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Registration No.</label>
                  <div class="col-lg-6 col-md-6">
                    <input class=form-control readonly value="<?PHP echo $id_inv3 ?>" name="kr">
                  </div>
                </div>	
                <!-- End .form-group  -->  
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tracking No.</label>
                    <div class="col-lg-6 col-md-6">
                      <input class="form-control tip" placeholder="No. AN / No. PO Masuk / Reference No." name="trek">
                    </div>
                </div>        
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">PO-Out</label>
                <div class="col-lg-6 col-md-6">
              <?PHP 

                  $comp= mysql_query("select * from buying where status='20' order by id_buy");
            
                echo '<select class="form-control select2" name="pot" onchange="showItm(this.value)">';
                echo '<option value="">---------- PILIH ----------';
                  
                  While($comp2= mysql_fetch_assoc($comp))
                {
                  echo '<option value="'.$comp2['po_out'].'">';
                  $qts= $comp2['po_out'];
                  echo $qts;
                  echo '</option>';
                }
                
                echo '</select>';
              ?>
                    </div>
                    <div class="col-lg-4 col-md-4"></div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Goods</label>
                    <div class="col-lg-6 col-md-6">
                      <select class="form-control select2" name="idbl" id="txtHint2" onchange="showQty(this.value)">
                      <option value="">PILIH NO PO-OUT TERLEBIH DAHULU</option>
                      </select>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Quantity</label>
                    <div class="col-lg-2 col-md-2">
                      <input class="form-control tip" placeholder="1-100" name="jml">
                    </div>
                    <div class="col-lg-2 col-md-2">
                      <input class="form-control tip" placeholder="UNIT" name="unt">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Date</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>
                      <div class="col-lg-6 col-md-6">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="tanggal">                          
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End .form-group  -->                                                                               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-6 col-md-6">
                      <textarea class=form-control rows=4 placeholder="" name="rmk"></textarea>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Photo</label>
                  <div class="col-lg-6 col-md-6">
                    <input type=file name="nama_file">
                    <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
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
      <!-- End .row -->   
      
      
      <!-- Page End here -->
    
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->
<!-- Javascripts -->
<script>
function showItm(str) {
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
  xmlhttp.open("GET","sys/engine/getitm.php?q="+str,true);
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