<!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              
              <!-- table start -->
              <div class="row">                  
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php 
                                  if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level']==3)
                                    echo $this->lang->line(LANG_HEADING_TBL_LIST_AGENT); 
                                  else
                                    echo $this->lang->line(LANG_HEADING_TBL_LIST_ADMIN); 
                              ?>
                          </header>
                          <span id="notifyres"></span>
                          <table class="table table-hover table-bordered" id="tbllistagent">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>
                                  <?php 
                                      if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level']==3)
                                        echo $this->lang->line(LANG_TR_CUSTOMER_NAME); 
                                      else
                                        echo $this->lang->line(LANG_TR_AGENT_NAME); 
                                  ?>
                                  </th>
                                  <th><?php echo $this->lang->line(LANG_TR_USERNAME);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_SERIAL);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_VERIFY_CODE);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_CONTACT);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_STATUS);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_FEES);  ?></th>
                                  <th>
                                  <?php 
                                      if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level']==3)
                                        echo $this->lang->line(LANG_TR_DUEDATE); 
                                      else
                                        echo $this->lang->line(LANG_TR_TOTAL_CUSTOMER); 
                                  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_REMARK);  ?></th>
                              </tr>
                              </thead>
                              <tbody id="tbodylistagent">
                                    <!--results list agent-->                                    
                              </tbody>
                          </table>
                          
                          <div class="text-center" id="divpagination">
                          <!--show pagination-->
                          </div>                         
                          
                      </section>
                  </div>
              </div>
              <!-- table end -->
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->