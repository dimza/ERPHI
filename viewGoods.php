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

	
	if ($kd_role == "1") {	
  
        $tab="VIEW GOODS";

?>

<?PHP include ("head_meta.php"); ?>

<body>

<?PHP include ("header.php"); ?>
<?PHP include ("sidebar.php"); ?>

      <?PHP
      
        $kode= @$_GET['kd'];
        
        $tam= mysql_query("select * from goods where id_goods='$kode'");
        $data_tam = mysql_fetch_array($tam);
      
      ?>

<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
      <br>
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->

      <div class="row">
        <!-- Start .row -->
        <div class="col-lg-7 col-md-7">
          <!-- col-lg-6 start here -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class="panel-title">Goods Details</h4>
            </div>
            <div class="panel-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="per20">
                      <td class="per40">

                        <tbody>
                  <tr>
                      <th class="per20">
                        Barcode
                        <td class="per40">
                          : <?PHP echo $data_tam['id_goods']; ?>
                            <tbody>
                  <tr>
                    <th class="per20">
                      Description
                      <td class="per40">
                        : <?PHP echo $data_tam['description_goods']; ?>
                          <tbody>
                                      <tr>
                                        <th class="per20">
                                          Price List
                                          <td class="per40">
                                            : <?PHP echo $data_tam['price_list']; ?> - <?PHP echo $data_tam['currency_goods']; ?>
                                            <tbody>
                                              <tr>
                                                <th class="per20">
                                                  Supplier 1
                                                  <td class="per40">
                                                    : <?PHP 

                          $cno=$data_tam['kode_principal'];
                          $cno2= mysql_query("select * from `supplier` where noreg_supplier='$cno'") or die(mysql_error());
                          $cno3= mysql_result($cno2, 0, 'nama_supplier');
                                                    
                                                    echo $cno3; 

                                                    ?>
                                                    <tbody>
                                                      <tr>
                                                        <th class="per20">
                                                          Supplier 2
                                                          <td class="per40">
                                                    : <?PHP 

                          $cno4=$data_tam['kode_principal2'];
                          $cno5= mysql_query("select * from `supplier` where noreg_supplier='$cno4'") or die(mysql_error());
                          $cno6= mysql_result($cno5, 0, 'nama_supplier');
                                                    
                                                    echo $cno6; 

                                                    ?>
                                                            <tbody>
                                                              <tr>
                                                                <th class="per20">
                                                                  Part Number
                                                                  <td class="per40">
                                                                    : <?PHP echo $data_tam['part_number']; ?>
                                                                    <tbody>
                                                                      <tr>
                                                                        <th class="per20">
                                                                          Brand
                                                                          <td class="per40">
                                                                            : <?PHP echo $data_tam['brand_goods']; ?>
                                                                            <tbody>
                                                                              <tr>
                                                                                <th class="per20">
                                                                                  Manufactured
                                                                                  <td class="per40">
                                                                                    : <?PHP echo $data_tam['manufactured']; ?>
                                                                                    <tbody>
                                                                                      <tr>
                                                                                        <th class="per20">
                                                                                          Type of Goods
                                                                                          <td class="per40">
                                                                                            : <?PHP echo $data_tam['type_goods']; ?>
                                                                                            <tbody>
                                                                                              <tr>
                                                                                                <th class="per20">
                                                                                                  Status
                                                                                                  <td class="per40">
                                                                                                    : <?PHP echo $data_tam['status_goods']; ?>
                                                                                                    <tbody>
                                                                                                      <tr>
                                                                                                        <th class="per20">
                                                                                                          Remark
                                                                                                          <td class="per40">
                                                                                                            : <?PHP echo $data_tam['remark_goods']; ?>
                                                                                                            <tbody>
              </table>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-6 end here -->
        <div class="col-lg-5 col-md-5">
          <!-- col-lg-6 start here -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class="panel-title">Goods Picture</h4>
            </div>
            <div class="panel-body">
              <img src="photo/barang/<?PHP echo $data_tam['foto']; ?>" alt=image width="250" height="200">
                <div class="col-lg-10 col-md-10">
                  <label class="checkbox-inline">
                    <Br>
                      <a href="list_goods.php"><button type="button" class="btn btn-primary"><li class="im-arrow-left"></li></button></a>
                      <a href="editGoods.php?kd=<?PHP echo $kode; ?>"><button type="button" class="btn btn-primary">EDIT</button></a>
                    </div>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-6 end here -->
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
<script src=assets/js/pages/gallery.js></script>
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>