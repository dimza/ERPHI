<?PHP 

  require_once(__DIR__.'/sys/db_con/auth.php'); 
  require_once(__DIR__.'/sys/db_con/db.php');
    
    $id2=$_SESSION['SESS_MEMBER_ID'];
    
    $tampil= mysql_query("select * from user where id_pegawai='$id2'");
    $data_tampil = mysql_fetch_array($tampil);
    
    $kd_role = $data_tampil['role'];
    $nopeg = $data_tampil['nopeg'];
    $peg = $data_tampil['nama_pegawai'];
    
    $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
    $data = mysql_fetch_array($tpl);
    
    $var = @$_GET['kd'];
    $alrt = @$_GET['al'];
    
  if ($kd_role == "1") {

    $tab="QTS";    

  include ("head_meta.php");

?>

<body>

  <?PHP

  include ("header.php");
  include ("sidebar.php"); 
  include ("date_format.php");  

  ?>

<!-- Start #content -->
<div id="content">
  <!-- Start .content-wrapper -->  
  <div class="content-wrapper">
    <div class="row">
      <!-- Start .row -->
      <!-- Start .page-header -->
      <div class="col-lg-12 heading">
        <br>
        <!-- Start .bredcrumb -->
        <ul id="crumb" class="breadcrumb">
        </ul>
        <!-- End .breadcrumb -->
      </div>
      <!-- End .page-header -->
    </div>
    <!-- End .row -->   
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <!-- Start .row -->
        <div class=col-lg-12>
          <div class="bs-callout bs-callout-info fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <h4>Info</h4>
            <p>Mohon maaf, untuk modul ini masih dalam proses maintenance.</p>
          </div>
        </div>
      </div>
      <!-- End .row -->       
      <div class=row>
        <div class="col-lg-6 col-md-12">
          <!-- Start col-lg-6 -->
          <div class="panel panel-primary plain toggle">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4 class=panel-title><i class=im-bars></i> Line chart with dots</h4>
            </div>
            <div class="panel-body blue-bg">
              <div id=line-chart-dots style="width: 100%; height:250px"></div>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- End col-lg-6 -->
        <div class="col-lg-6 col-md-12">
          <!-- Start col-lg-6 -->
          <div class="panel panel-default plain toggle">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class=panel-title><i class=im-bars></i> Line chart only</h4>
            </div>
            <div class="panel-body white-bg">
              <div id=line-chart style="width: 100%; height:250px"></div>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- End col-lg-6 -->
        <div class="col-lg-6 col-md-12">
          <!-- Start col-lg-6 -->
          <div class="panel panel-primary plain toggle">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class=panel-title><i class=im-bars></i> Line chart filled</h4>
            </div>
            <div class="panel-body white-bg">
              <div id=line-chart-filled style="width: 100%; height:250px"></div>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- End col-lg-6 -->
        <div class="col-lg-6 col-md-12">
          <!-- Start col-lg-6 -->
          <div class="panel panel-default toggle">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4 class=panel-title><i class=im-bars></i> Line charts style 2</h4>
            </div>
            <div class=panel-body>
              <div id=line-chart-dots2 style="width: 100%; height:250px"></div>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- End col-lg-6 -->
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
<script src=assets/js/pages/charts.js></script>
<!-- Google Analytics:  -->
<?PHP   }  else { header("Location: error_page.php"); } ?>