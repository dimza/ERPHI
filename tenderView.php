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

    $tahun = date("Y");
  
  if ($kd_role == "1") {

    $tab="VIEW-Tender";    

  include ("head_meta.php");

?>

<body>

<?PHP

  include ("header.php");
  include ("sidebar.php");
  include ("date_format.php"); 

?>

<?PHP
      
        $kode= @$_GET['kd'];
        
        $tdr= mysql_query("select * from `tender` where tenderId='$kode'");
        $dataTdr = mysql_fetch_array($tdr);

        $clnt=$dataTdr['clientId'];
        $clnt2= mysql_query("select * from `client` where id_client='$clnt'") or die(mysql_error());
        $clnt3= mysql_result($clnt2, 0, 'nama_client');

        $sal3= $dataTdr['salesCall'];
        $sal4= mysql_query("select * from `employee` where no_pegawai='$sal3'") or die(mysql_error());
        $sal5= mysql_result($sal4, 0, 'nama_depan');
        $sal6= mysql_result($sal4, 0, 'nama_belakang');        

        $cur= $dataTdr['currencyId'];
        $cur2= mysql_query("select * from `currency` where idCurrency='$cur'") or die(mysql_error());
        $cur3= mysql_result($cur2, 0, 'symbol');

                $kode= @$_GET['kd'];
        
                $tender= mysql_query("select * from tender where tenderId='$kode'");
                $dataTender = mysql_fetch_array($tender);

                $cp=$dataTender['companyId'];

                $cp2= mysql_query("select * from company where kode_company='$cp'");
                $cp3= mysql_fetch_array($cp2);
                $cp4= $cp3['nama_company'];

                $ct= $dataTender['clientId'];     

                $ct2= mysql_query("select * from client where id_client='$ct'") or die(mysql_error());
                $ct3= mysql_result($ct2, 0, 'nama_client');                                

?>

<!-- Start #content -->
<div id="content">
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
  <br>
    <!-- End .row -->
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <!-- Start .row -->
        <div class="col-lg-6 col-md-12">
          <!-- col-lg-6 start here -->
          <div class=page-header>
            <h4>Tender Details - <?PHP echo $dataTender['referenceNo']; ?></h4>
          </div>
          <div class="panel-group accordion" id=accordion>
            <div class="panel panel-default">
              <div class=panel-heading>
                <h5 class=panel-title><a class=accordion-toggle data-toggle=collapse href=#collapseOne>Description Tender - <?PHP echo $dataTender['tittleTender']; ?></a></h5>
              </div>
              <div id=collapseOne class="panel-collapse collapse">
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/ubah_tender.php method="post" enctype="multipart/form-data" id="validate">    
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Ref. Number</label>                 
                  <div class="col-lg-2 col-md-8">
                    <input class=form-control required name="rn" value="<?PHP echo $dataTender['referenceNo']; ?>"> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tittle Tender</label>                 
                  <div class="col-lg-2 col-md-8">
                    <input class=form-control name="tt" value="<?PHP echo $dataTender['tittleTender']; ?>"> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <hr>                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Client</label>
                    <div class="col-lg-4 col-md-6">
                      <?PHP

                      $clie= mysql_query("select * from client order by id_client asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="cln">';

                        echo '<option value="'.$ct.'">'.$ct3.'';
                  
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                    <div class="col-lg-4 col-md-6">
                      <?PHP                          

                        $comp= mysql_query("select * from company order by id_company asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="com">';
                        echo '<option value="'.$cp.'">'.$cp4;
                  
                          While($comp2= mysql_fetch_assoc($comp))
                        {
                          echo '<option value="'.$comp2['kode_company'].'">';
                          echo $comp2['nama_company'];
                          echo '</option>';
                        }
                
                        echo '</select>';
                      ?>
                    </div>                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Sales Call</label>
                    <div class="col-lg-4 col-md-6">
                      <?PHP 

                          $emp= mysql_query("select * from employee order by id_karyawan asc limit 0, 100");

                                  $sc2= $dataTender['salesCall'];
                                  $sc3= mysql_query("select * from employee where no_pegawai='$sc2'") or die(mysql_error());
                                  $sc4= mysql_result($sc3, 0, 'nama_depan');   
                                  $sc6= mysql_result($sc3, 0, 'nama_belakang');                               
            
                        echo '<select class="form-control select2" name="sc">';
                        echo '<option value="'.$sc2.'">'.$sc4.' '.$sc6.'';
                  
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
                 <!--<div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Currency</label>
                    <div class="col-lg-4 col-md-6">
                      <?PHP $mu= mysql_query("select * from currency order by symbol asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="mu">';
                        echo '<option value="">SELECT';
                  
                          While($mu2= mysql_fetch_assoc($mu)) {

                            echo '<option value="'.$mu2['idCurrency'].'">';
                            echo $mu2['symbol'].' - '.$mu2['nation'];
                            echo '</option>';
                                                              }
                        echo '</select>';
                      ?>
                    </div>                    
                </div> -->
                <!-- End .form-group  -->                
                <hr>                
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Open Date</label> 
                  <?PHP $today = date("Y-m-d"); ?>                
                  <div class="col-lg-2 col-md-4">
                    <div class=input-group>
                      <input class="form-control datetime-picker2" name="od" value="<?PHP echo $dataTender['createDate']; ?>">
                      <span class=input-group-addon><i class=fa-calendar></i></span>
                    </div> 
                  </div>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Close Date</label>                 
                  <div class="col-lg-2 col-md-4">
                    <div class=input-group>
                      <input class="form-control datetime-picker2" name="cd" value="<?PHP echo $dataTender['closeDate']; ?>">
                      <span class=input-group-addon><i class=fa-calendar></i></span>
                    </div>
                  </div>                                    
                </div>
                <!-- End .form-group  -->               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                  <div class="col-lg-2 col-md-10">
                    <textarea class=form-control rows=3 name="rmk"><?PHP echo $dataTender['remark']; ?></textarea> 
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Document</label>
                  <div class="col-lg-4 col-md-10">
                    <input type=file name="nama_file">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="dt">
                    <input type=hidden class=form-control readonly value="<?PHP echo $nopeg ?>" name="usr">
                    <input type=hidden class=form-control readonly value="<?PHP echo $kode ?>" name="id">
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>                 
                  <div class="col-lg-2 col-md-8">
                    <a href="photo/doc/<?PHP echo $dataTender['doc']; ?>" target="_Blank"><?PHP echo $dataTender['doc']; ?></a> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->                                                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div style="margin-left:40%; margin-top:2%; margin-bottom:2%;">
                    <button type=submit class="btn btn-sm btn-primary">UPDATE TENDER</button>

                  </div>
                </div>
                <!-- End .form-group  -->
              </form>
            </div>                  

              </div>
            </div>
            <div class="panel panel-default">
              <div class=panel-heading>
                <h5 class=panel-title><a class=accordion-toggle data-toggle=collapse href=#collapseTwo>Items Tender - <?php echo $cp4; ?></a></h5>
              </div>
              <div id=collapseTwo class="panel-collapse collapse in">
                
            <div class=panel-body>
              <table class=table>
                <thead>
                  <tr>
                    <th class=per10>SupplierId
                    <th class=per35>Description 
                    <th class=per15>Part Number 
                    <th class=per10>QTY 
                    <th class=per15>Price <?php echo $cur3; ?>
                    <th class=per15>Total <?php echo $cur3; ?>
                    <th class=per5>
                    <th class=per5> 
                <tbody>
                <?PHP

                  $tdrItms=mysql_query

                    ("select * from tenderITems where tenderNo='$kode'");
    
                  While($tdrItms2= mysql_fetch_assoc($tdrItms))
              
                    {

                      echo '<tr>';
                      //echo '<td><label class=radio-inline><img src=assets/img/ico/done2.png ></label>';
                      echo '<td><a href="detail_supplier.php?kd='.$tdrItms2["idSupplier"].'" target="_Blank">'.$tdrItms2['idSupplier'];
                      echo '<td>'.$tdrItms2['description'];
                      //echo '<td>'.$tdrItms2['partNumber'];

                      echo '<td><button type=button class="btn btn-xs btn-primary mr15 mb15" data-container=body data-toggle=popover data-placement=top data-content="'.$tdrItms2['remark'].'" title="Remark">'; 

                      echo $tdrItms2['partNumber'].'</button>';

                      echo '<td>'.$tdrItms2['qtyItems'].' '.$tdrItms2['unitItems'];
                      echo '<td>'.$tdrItms2['priceList'];

                        $jml=$tdrItms2['qtyItems']*$tdrItms2['priceList'];

                      echo '<td>'.number_format("$jml",0);
                      echo '<td><a href="photo/doc/'.$tdrItms2["doc"].'" style="padding-right: 20%;" target="_Blank"><i class="en-docs"></i></a>';
                      echo '<td><a style="padding-right: 10%;" href="sys/engine/delTdrItm.php?kd='.$tdrItms2['tenderItemsId'].'&&no='.$kode.'" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="fa-trash"></i></a>';

                    }

                ?>

              </table>
            </div>

              </div>
            </div>
            <div class="panel panel-default">
              <div class=panel-heading>
                <h5 class=panel-title>
                <a class=accordion-toggle data-toggle=collapse href=#collapseThree>Add GOODS</a>
                </h5>
              </div>
              <div id=collapseThree class="panel-collapse collapse">

<?PHP 

  $kode= @$_GET['kd'];
        
  $tender= mysql_query("select * from tender where tenderId='$kode'");
  $dataTender = mysql_fetch_array($tender);
      
?>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/inputItemsTender.php method="post" enctype="multipart/form-data" id="validate">                    
                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description</label>
                    <div class="col-lg-4 col-md-10">
                      <?PHP 

                        $tampil_barang= mysql_query("select * from goods order by description_goods");
            
                              echo '<select class="form-control select2" name="idg">';
                              echo '<option value="">SELECT';
                  
                                While($tampil_barang2= mysql_fetch_assoc($tampil_barang))
                                  
                                  {

                                    echo '<option value="'.$tampil_barang2['id_goods'].'">';
                                    echo $tampil_barang2['description_goods'].' - P/N : '.$tampil_barang2['part_number'];
                                    echo '</option>';
                                  }
                
                                    echo '</select>';
                      ?>
                    </div>                    
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Price List</label>                 
                  <div class="col-lg-2 col-md-2">
                    <input class=form-control required name="pl" placeholder="<?php echo $cur3; ?>"> 
                  </div>
                  <?PHP $today = date("Y-m-d"); ?>                
                  <div class="col-lg-2 col-md-2">
                    <div class=input-group>
                      <input class=form-control required name="qty" placeholder="QTY" >
                    </div> 
                  </div>                 
                  <div class="col-lg-2 col-md-2">
                    <div class=input-group>
                      <input class=form-control required name="unt" placeholder="UNIT">
                    </div>
                  </div>                                                     
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Supplier</label>
                    <div class="col-lg-2 col-md-6">
                      <?PHP $sup= mysql_query("select * from supplier where vis='0' order by nama_supplier asc ");
            
                        echo '<select class="form-control select2" name="sup">';
                        echo '<option value="">SELECT';
                  
                          While($sup2= mysql_fetch_assoc($sup))
                        {
                        echo '<option value="'.$sup2['noreg_supplier'].'">';
                        echo $sup2['nama_supplier'];
                        echo '</option>';
                        }
                
                        echo '</select>';
                      ?>
                </div>
                </div>
                <!-- End .form-group  -->                                                
                <hr>                
               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                  <div class="col-lg-2 col-md-10">
                    <textarea class=form-control rows=3 name="rmk"></textarea>
                    <input type=hidden class=form-control value="<?PHP echo $today ?>" name="tgl">
                    <input type=hidden class=form-control value="<?PHP echo $nopeg ?>" name="usr">
                    <input type=hidden class=form-control value="<?PHP echo $kode ?>" name="nt"> 
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Document</label>
                  <div class="col-lg-4 col-md-10">
                    <input type=file name="nama_file">
                  </div>
                </div>
                <!-- End .form-group  -->                                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div style="margin-left:40%; margin-top:2%; margin-bottom:2%;">
                    <button type=submit class="btn btn-sm btn-primary">ADD GOODS</button>

                  </div>
                </div>
                <!-- End .form-group  -->
              </form>
            </div>

              </div>
            </div>
          </div>
          
        </div>
        <!-- col-lg-6 end here -->
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
<script src=assets/js/pages/widgets.js></script>
<script src=assets/js/pages/forms.js></script>
<script src=assets/js/pages/elements.js></script>
<!-- Google Analytics:  -->
<?PHP   }  else { header("Location: error_page.php"); } ?>