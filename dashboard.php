<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
    $spc= $data_tampil['spc'];
	  
	  $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
	  $data = mysql_fetch_array($tpl);
	
	if ($kd_role == "1") {

    $tab="ERP";    
  
    include ("head_meta.php");

?>

<body>

<?PHP 

include ("header.php"); 
include ("sidebar.php"); 

?>

<!-- Start #content -->
<div id="content">
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
    <!-- Start .page-header -->
    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
<!--           <div class="col-lg-12 col-md-12">
            <form class="form-inline search-page-form">
              <div class="well bn">
                <div class=input-group>
                  <input class=form-control placeholder="GLOBAL SEARCH">
                  <span class=input-group-btn>
                  <button type=submit class="btn btn-primary"><i class="ec-search s16"></i></button>
                  </span></div>
              </div>
            </form>
          </div> -->      
          <div class=page-header>
            <h4><i class="fa-table s20"></i> FOUNTAIN OF TABLE</h4>
          </div>      
      <div class=row>
        <!-- Start .row -->

        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain panelMove panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class=panel-title>QUOTATION TOP 5 TENDER LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Reference No 
                    <th>Tittle 
                    <th>Company
                    <th class="text-center">Status        
                <tbody>
          <?PHP 

              $tdr= mysql_query("select * from tender order by tenderId limit 0, 5");
    
            While($tdr2= mysql_fetch_assoc($tdr))
              {
                echo '<tr>';                
                echo '<td><a href="tenderView.php?kd='.$tdr2["tenderId"].'" target="_Blank">'.$tdr2['referenceNo'];
                echo '</a><td>'.$tdr2["tittleTender"];

                          $cmpy=$tdr2['companyId'];
                          $cmpy2= mysql_query("select * from `company` where kode_company='$cmpy'") or die(mysql_error());
                          $cmpy3= mysql_result($cmpy2, 0, 'nama_company');

                echo '<td>'.$cmpy3;
                
                          $todays_date = date("y-m-d");
                          $close_date = $tdr2['closeDate'];

                          $today = strtotime($todays_date); 
                          $expiration_date = strtotime($close_date); 
                            
                            if ($expiration_date > $today) { 

                              echo '<td>'.'<span class="label label-success">OPEN</span>';

                            } else { 

                              echo '<td>'.'<span class="label label-danger">CLOSE</span>';

                            }                  
              }
          ?> 
              </table>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->

        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain panelMove panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class=panel-title>RECEVING TOP 5 GOODS LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>AWB Number 
                    <th>Goods Id
                    <th>Company
                    <th>Received Date         
                <tbody>
          <?PHP 

              $inv= mysql_query("select * from inventory order by id_inv limit 0, 5");
    
            While($inv2= mysql_fetch_assoc($inv))
              {
                echo '<tr>';
                echo '<td>'.$inv2['reference_no'];                
                echo '<td><a href="detail_barang.php?kd='.$inv2["goods_no"].'" target="_Blank">'.$inv2['goods_no'];
                echo '</a>';

                          $cmpy=$inv2['company_no'];
                          $cmpy2= mysql_query("select * from `company` where kode_company='$cmpy'") or die(mysql_error());
                          $cmpy3= mysql_result($cmpy2, 0, 'nama_company');

                echo '<td>'.$cmpy3;
                echo '<td>'.$inv2["create_date"];
                                 
              }
          ?> 
              </table>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->

        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain panelMove panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class=panel-title>QUOTATION TOP 5 RANDOM LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Quotation No. 
                    <th>Costumer 
                    <th>Date Created.
                    <th class="text-center">Status
                    <th class=per15>Sales Call        
                <tbody>
          <?PHP $qt= mysql_query("select * from quote order by rand() limit 0, 5");
    
            While($qt2= mysql_fetch_assoc($qt))
              {
                echo '<tr>';                
                echo '<td><a href="detail_penawaran.php?qo='.$qt2["quote_no"].'" target="_Blank">'.$qt2['quote_no'];

                          $clnt=$qt2['client_no'];
                          $clnt2= mysql_query("select * from `client` where id_client='$clnt'") or die(mysql_error());
                          $clnt3= mysql_result($clnt2, 0, 'nama_client');

                echo '</a><td>'.$clnt3;
                echo '<td>'.$qt2['date'];
                echo '<td class="text-center">';
                 
                          $dt= $qt2['status'];
                
                          if ($dt == "10") { echo '<span class="label label-success">OPEN</span>'; }
                          
                          else if ($dt == "11") { echo '<span class="label label-lime">ON PROGRESS</span>'; }                           
                          else if ($dt == "12") { echo '<span class="label label-danger">EXPIRED</span>'; }                           
                          else if ($dt == "13") { echo '<span class="label label-yellow">CLOSE</span>'; }                           
                          else if ($dt == "14") { echo '<a href="detail_quote.php"><span class="label label-purple">INVOICE</span></a>'; }                              

                          $sal=$qt2['quote_no'];
                          $sal2= mysql_query("select * from `tlquote` where noQuote='$sal'") or die(mysql_error());
                          $sal3= mysql_result($sal2, 0, 'salesQuote');

                          $sal4= mysql_query("select * from `employee` where no_pegawai='$sal3'") or die(mysql_error());
                          $sal5= mysql_result($sal4, 0, 'nama_depan');

                echo '<td>'.$sal5;                  
              }
          ?> 
              </table>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->

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

<?PHP 	}  else { header("Location: error_page.php"); } ?>