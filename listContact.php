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
    
    $today = date("j F Y");    

  if ($kd_role == "1") {  

    $tab="EMPLY";    

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

          <div class="panel panel-default plain panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4>CONTACT LIST</h4>
            </div>
            <div class=panel-body>

      <div class=row>
        <!-- Start .row -->

        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25">
            <a href=#myModal role=button data-toggle=modal>
              <div class=tile-stats-icon><i class="en-user-add color-blue"></i></div>
                <div class=tile-stats-content>
                  <div class=tile-stats-number>ADD CONTACT</div>
                    <div class=tile-stats-text>Connecting people</div>
                </div>
              <div class=clearfix></div>
            </a>
            </div>
        </div>


        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          <!-- Button to trigger twitter bootstrap modal -->
          <!-- <a href=#myModal role=button class="btn btn-alt btn-danger mb25" data-toggle=modal>Launch TinyMCE in bootstrap modal</a> -->
          <!-- Modal itself -->
          <div class="modal fade" id="myModal" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add New Contact</h4>
                </div>
                <div class=modal-body>
                  <!-- content in modal, tinyMCE 4 texarea -->
                <br>
                
                <form class="form-horizontal" role=form action=sys/engine/#.php method="post" id=validate>
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Full Name</label>                 
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control required placeholder="first" name="nd"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <input class=form-control placeholder="middle" name="nt"> 
                  </div>
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control required placeholder="last" name="nb"> 
                  </div>                                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                    <div class="col-lg-4 col-md-6">
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
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control required placeholder="Job Tittle" name="nb"> 
                  </div>                    
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Email</label>                 
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control required placeholder="name@domain.com" name="nd"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Other</label>
                  </div>                  
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control required placeholder="name@domain.com" name="nb"> 
                  </div>                                    
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Work</label>                 
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control placeholder="0542-7515885" name="nd"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Ext</label>
                  </div>                  
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control placeholder="5007" name="nb"> 
                  </div>                                    
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Mobile</label>                 
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control placeholder="0811223344" name="nd"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Other</label> 
                  </div>                  
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control placeholder="081234567" name="nb"> 
                  </div>                                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Address</label>
                  <div class="col-lg-8 col-md-10">
                    <textarea class=form-control rows=4 placeholder="Jalan Kura - Kura Ninja" name="alm"></textarea> 
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Country</label>
                      <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="ngr">
                          <option value="">SELECT               
                          <?PHP include ("negara.php"); ?>             
                        </select>
                    </div>
                  <div class="col-lg-2 col-md-2">
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Region</label> 
                  </div>                    
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" placeholder="ex. Kalimantan Timur" name="prpns">
                  </div>                    
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">City</label>                 
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control placeholder="0811223344" name="nd"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Postal</label> 
                  </div>                  
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control placeholder="081234567" name="nb"> 
                  </div>                                    
                </div>
                <!-- End .form-group  -->

                <br>
                <div class=modal-footer>
                  <button type=button class="btn btn-default" data-dismiss=modal>Close</button>
                  <button type=button class="btn btn-primary">ADD</button>
                  </form>
                </div>
                </div>
<!--                 <div class=modal-footer>
                  <button type=button class="btn btn-default" data-dismiss=modal>Close</button>
                  <button type=button class="btn btn-primary">ADD</button>
                  </form>
                </div> -->
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <!-- col-lg-12 end here -->


      </div>
      <!-- End .row -->
              <!-- Page End here -->
              </div>
            </div>
          </div>
          <!-- End .panel -->
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
<script src=assets/js/pages/wysiwyg.js></script>
<!-- Google Analytics:  -->
<?PHP   }  else { header("Location: error_page.php"); } ?>