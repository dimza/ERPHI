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
      <div class=row>
        <!-- Start .row -->

        <div class="col-lg-6 col-md-6">
          <!-- Start col-lg-6 -->

          <div class="panel panel-default toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4 class=panel-title><i class=fa-list></i> ToDo</h4>
            </div>
            <div class=panel-body>
              <div class=todo-widget>
                <div class=todo-header>
                  <div class=todo-search>
                    <form>
                      <input class=form-control name=search placeholder="Search for todo ...">
                    </form>
                  </div>
                  <div class=todo-add><a href=# class="btn btn-primary tip" title="Add new todo"><i class=im-plus></i></a></div>
                </div>
                <h4 class=todo-period>Today</h4>
                <ul class=todo-list id=today>
                  <li class=todo-task-item>
                    <label class=checkbox>
                      <input type=checkbox>
                    </label>
                    <div class="todo-priority normal tip" title="Normal priority"><i class=im-radio-checked></i></div>
                    <span class="todo-category label label-primary">javascript</span>
                    <div class=todo-task-text>Add scroll function to template</div>
                    <button type=button class="close todo-close">&times;</button>
                  </li>
                  <li class=todo-task-item>
                    <label class=checkbox>
                      <input type=checkbox>
                    </label>
                    <div class="todo-priority high tip" title="High priority"><i class=im-radio-checked></i></div>
                    <span class="todo-category label label-brown">less</span>
                    <div class=todo-task-text>Fix main less file</div>
                    <button type=button class="close todo-close">&times;</button>
                  </li>
                  <li class="todo-task-item task-done">
                    <label class=checkbox>
                      <input type=checkbox checked>
                    </label>
                    <div class="todo-priority high tip" title="High priority"><i class=im-radio-checked></i></div>
                    <span class="todo-category label label-info">html</span>
                    <div class=todo-task-text>Change navigation structure</div>
                    <button type=button class="close todo-close">&times;</button>
                  </li>
                </ul>
                <h4 class=todo-period>Tomorrow</h4>
                <ul class=todo-list id=tomorrow>
                  <li class=todo-task-item>
                    <label class=checkbox>
                      <input type=checkbox>
                    </label>
                    <div class="todo-priority tip" title="Low priority"><i class=im-radio-checked></i></div>
                    <span class="todo-category label label-dark">css</span>
                    <div class=todo-task-text>Create slide panel widget</div>
                    <button type=button class="close todo-close">&times;</button>
                  </li>
                  <li class=todo-task-item>
                    <label class=checkbox>
                      <input type=checkbox>
                    </label>
                    <div class="todo-priority medium tip" title="Medium priority"><i class=im-radio-checked></i></div>
                    <span class="todo-category label label-danger">php</span>
                    <div class=todo-task-text>Edit the main controller</div>
                    <button type=button class="close todo-close">&times;</button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End .panel -->
          
        </div>
        <!-- End col-lg-6 -->

        <div class="col-lg-6 col-md-6">
          <!-- Start col-lg-6 -->

          <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading white-bg"></div>
            <div class="panel-body p0">
              <div id=calendar></div>
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
<script src=assets/js/pages/calendar.js></script>
<script src=assets/js/pages/dashboard.js></script>
<!-- Google Analytics:  -->
<?PHP   }  else { header("Location: error_page.php"); } ?>
