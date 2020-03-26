<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
    $peg = $data_tampil['nama_pegawai'];
    $spc= $data_tampil['spc'];
	  
	  $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
	  $data = mysql_fetch_array($tpl);

    $var = @$_GET['kd'];
    $alrt = @$_GET['al'];

    $today = date("j/m/Y");    
	
	if ($kd_role == "1") {

    $tab="DO";    

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
    <div class=row>
      <!-- Start .row -->
      <!-- Start .page-header -->
      <div class="col-lg-12 heading">
        <br>
        <!-- Start .bredcrumb -->
        <ul id=crumb class=breadcrumb>
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
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->

            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a DO No. <a href="sys/engine/hapus_do.php?clt=<?PHP echo $var ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
            </div>            
            <?PHP break; case "0": ?> 
            
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Well done!</strong> You successfully restore data with this <strong><?PHP echo $var ?></strong> as a DO No.
            </div>             
            
            <?PHP break; default: }?>          

          <div class="panel panel-default plain panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4>DELIVERY ORDER LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id=datatable>
                <thead>
                  <tr>
                    <th>DO No.
                    <!-- <th>Company -->
                    <th>Quote No.
                    <th>Client 
                    <th>Created
                    <!-- <th>Modified -->
                    <!-- <th>Modified Date -->				
                    <th><i class="im-cog"></i>			
                <tbody>
                <?PHP 

                  $qt= mysql_query("select * from delivery_order where vis='0' order by id_do asc limit 0, 10001");
    
                    While($qt2= mysql_fetch_assoc($qt))
                      
                      {

                          $clnt=$qt2['client_no'];
                          $clnt2= mysql_query("select * from `client` where id_client='$clnt'") or die(mysql_error());
                          $clnt3= mysql_result($clnt2, 0, 'nama_client');

                        echo '<tr class="odd gradeX">';
                        echo '<td><a href="input_item_do.php?po='.$qt2["do_no"].'" target="_Blank">'.$qt2["do_no"].'</a>';

                          $cm=$qt2['company_no'];
                          $cm2= mysql_query("select * from `company` where id_company='$cm'") or die(mysql_error());
                          $cm3= mysql_result($cm2, 0, 'nama_company');

                        //echo '<td>'.$cm3;
                        echo '<td><a href="detail_penawaran.php?qo='.$qt2["quote_no"].'" target="_Blank">'.$qt2['quote_no'].'</a>';                                              
                        echo '<td>'.$clnt3;
                        echo '<td>'.$qt2['date']; 
                        //echo '<td>'.$qt2['modified_user'];
                        //echo '<td>'.$qt2['modified_date'];
                        echo '<td><a href="edit_do.php?kd='.$qt2["id_do"].'" target="_Blank"><i class="fa-edit"></i></a> | ';                              
                        echo '<a href="sys/engine/hapus_do.php?kd='.$qt2["id_do"].'&&dt='.$today.'&&pg='.$peg.'&&clt='.$qt2["do_no"].'&&swch=1" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="fa-trash"></i></a>';                 
              }
          ?> 					 					
                <tfoot>
                  <tr>
                    <th><a href="add_do.php" target="_Blank"><button type=button class="btn btn-sm btn-primary">MAKE DO</button></a>
<!--                <th>
                    <th>
                    <th>
                    <th>
                    <th style="text-align: right;">              
                      <div class=btn-group>
                        <button type=button class="btn btn-sm btn-primary">EXPORT</button>
                        <button type=button class="btn btn-sm btn-primary dropdown-toggle" data-toggle=dropdown><span class=caret></span> <span class=sr-only>Toggle Dropdown</span></button>
                        <ul class=dropdown-menu role=menu>
                          <li style="text-align: left;"><a href=#>PDF</a></li>
                          <li style="text-align: left;"><a href=#>Excel</a></li>
                        </ul>
                      </div> -->				
              </table>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->
      </div>
      
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
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete this part?")) {
    document.location = delUrl;
  }
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
<script src=assets/js/pages/data-tables.js></script>
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>