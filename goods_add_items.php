  <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <!-- Start .row -->
        <div class=col-lg-12>
          <!-- Start col-lg-12 -->
          <div class="panel panel-default panel-closed toggle panelRefresh panelClose showControls">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4>ADD ITEMS</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=input_item_penawaran2.php?qt=<?PHP echo $nq ?>&&tx=<?PHP echo $pjk ?> method="post">
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description</label>
                    <div class="col-lg-2 col-md-10">
                      <?PHP $tampil_barang= mysql_query("select * from goods order by id_goods asc limit 0, 10001");
            
                              echo '<select class="form-control select2" name="barang" onchange="showUser(this.value)">';
                              echo '<option value="">SELECT';
                  
                                While($tampil_barang2= mysql_fetch_assoc($tampil_barang))
                                  
                                  {

                                    echo '<option value="'.$tampil_barang2['id_goods'].'">';
                                    echo $tampil_barang2['description_goods'];
                                    echo '</option>';
                                  }
                
                                    echo '</select>';
                      ?>
                    </div>
                  </div>
                <!-- End .form-group  -->                                 
                <div class=form-group>               
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Quantity</label>
                    <div class="col-lg-4 col-md-4">
                      <input class=form-control placeholder=QTY name="jml">
                    </div>
                    <div class="col-lg-2 col-md-2">
                      <input class=form-control placeholder=UNIT name="unt">
                    </div>
                </div>
                <!-- End .form-group  -->
                <!--<div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Margin Profit</label>
                  <div class="col-lg-2 col-md-2">
                    <input class=form-control id=mask-percent name="persen">
                    <span class=help-block>Maksimal 99%</span>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control placeholder=UNIT name="unt">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                    <input type=hidden class=form-control readonly value="<?PHP echo $nemp ?>" name="usr">                    
                  </div>
                </div>-->
                <!-- End .form-group  -->
                <div class=form-group id="txtHint"></div>
                <!-- End .form-group  -->                                       
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-10 col-md-10">
                    <button type=submit class="btn btn-primary">ADD</button>
          
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
  </div>
  <!-- End .content-wrapper -->