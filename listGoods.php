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
	
	if ($kd_role == "1") {

    $tab="GOODS LIST";    

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
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          
            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a Part Number of goods. <a href="sys/engine/delGoods.php?clt=<?PHP echo $var ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
            </div>            
            <?PHP break; case "0": ?> 
            
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Well done!</strong> You successfully restore data with this <strong><?PHP echo $var ?></strong> as a Part Number of goods.
            </div>             
            
            <?PHP break; default: }?>          

          <div class="panel panel-default plain panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4>GOODS LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable">
                <thead>
                  <tr>
                    <th>Part Number
                    <th>Brand                    
                    <!-- <th>Price List  -->                   
                    <th>Supplier
                    <th><i class="im-cog"></i>		
                <tbody>					
					<?PHP $brg= mysql_query("select * from `goods` where vis='0' order by id_goods asc limit 0, 10001");
		
						While($brg2= mysql_fetch_assoc($brg))
							{
								echo '<tr class="odd gradeX">';
                echo '<td><a href="viewGoods.php?kd='.$brg2["id_goods"].'">'.$brg2['part_number'];
                echo '<td>'.$brg2['brand_goods'];                								
								

                          $kurs=$brg2['currency_goods'];
                          $kurs2= mysql_query("select * from `currency` where idCurrency='$kurs'") or die(mysql_error());
                          $kurs3= mysql_result($kurs2, 0, 'symbol');

                          $prc=$brg2['price_list'];

                //echo '<td>'.$kurs3.' - '.number_format("$prc",0);

                          $cno=$brg2['kode_principal'];
                          $cno2= mysql_query("select * from `supplier` where noreg_supplier='$cno'") or die(mysql_error());
                          $cno3= mysql_result($cno2, 0, 'nama_supplier');

                echo '<td><a href="detail_supplier.php?kd='.$brg2["kode_principal"].'">'.$cno3;                
                echo '<td><a href="editGoods.php?kd='.$brg2["id_goods"].'" target="_Blank"><i class="fa-edit"></i></a> | ';
								echo '<a href="sys/engine/delGoods.php?kd='.$brg2["id_goods"].'&&dt='.$today.'&&pg='.$peg.'&&clt='.$brg2["part_number"].'&&swch=1" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="fa-trash"></i></a>';									
							}
					?> 					
                <tfoot>
                  <tr>
                    <th><a href="addGoods.php" target="_Blank"><button type=button class="btn btn-sm btn-primary">ADD GOODS</button></a>	
<!--                <th>
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