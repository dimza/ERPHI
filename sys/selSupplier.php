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