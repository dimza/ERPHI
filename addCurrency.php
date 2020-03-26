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
    
    $cur= mysql_query("select * from currency order by idCurrency desc limit 1");
    $cur2 = mysql_fetch_array($cur);
    $cur3 = $cur2['idCurrency']+'1';
  
  if ($kd_role == "1") {

    $tab="ADD-CURRENCY";    

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
              <h4>ADD CURRENCY FORM</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/input_currency.php method="post" id=validate>
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Currency Name</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required placeholder="Rupiah" name="cn"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <input class=form-control readonly value="<?PHP echo $cur3 ?>" name="cc">
                  </div>                  
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Symbol</label>
                  <div class="col-lg-2 col-md-2">
                    <input class="form-control tip" placeholder="IDR" name="sym">
                    <input type="hidden" class=form-control value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type="hidden" class=form-control value="<?PHP echo $today ?>" name="dat">
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <select class="form-control select2" name="ngr">
                      <option value="">SELECT COUNTRY 
                        <?PHP include ("negara.php"); ?>
                    </select>
                  </div>                  
                </div>        
                <!-- End .form-group  -->                                                                           
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-8 col-md-8">
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