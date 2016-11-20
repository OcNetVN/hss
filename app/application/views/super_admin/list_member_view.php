<!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              
              <!-- form search start -->
              <div class="row">
                <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php 
                                echo $this->lang->line(LANG_HEADING_LIST_AGENT); 
                              ?>
                          </header>
                          <div class="panel-body">
                              <form class="form-inline" role="form">
                                  <div class="form-group">
                                      <!--<label class="sr-only">Username</label>-->
                                      <input type="text" class="form-control" placeholder="<?php echo $this->lang->line(LANG_PLACEHOLDER_LIST_AGENT); ?>" id="txtsearch">
                                  </div>
                                  <button type="button" class="btn btn-success" id="btnsearch"><?php echo $this->lang->line(LANG_BUTTON_SEARCH); ?></button>
                              </form>
                              
                          </div>
                      </section>

                  </div>
              </div>
              <!-- form search end -->
              
              
              <!-- table start -->
              <div class="row">                  
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php 
                                    echo $this->lang->line(LANG_HEADING_TBL_LIST_AGENT); 
                              ?>
                          </header>
                          <span id="notifyres"></span>
                          <table class="table table-hover table-bordered" id="tbllistagent">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th><?php  echo $this->lang->line(LANG_TR_CUSTOMER_NAME); ?></th>
                                  <th><?php  echo $this->lang->line(LANG_TR_IMEI); ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_VERIFYCODE);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_CONTACT);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_STATUS);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_FEES);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_DUEDATE); ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_REMARK);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_AGENT); ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_LASTLOGIN); ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_ACTION);  ?></th>
                              </tr>
                              </thead>
                              <tbody id="tbodylistagent">
                                    <!--results list agent-->                                    
                              </tbody>
                          </table>
                          
                          <div class="text-center" id="divpagination">
                                  
                         </div>
                          
                      </section>
                  </div>
              </div>
              <!-- table end -->
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      
      <!-- Modal -->
        <div class="modal fade" id="ModalAddAgent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                    <input id="id_addagent" type="hidden"/>
                    <input id="cur_page" type="hidden"/>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_AGENT); ?>:</label>
                        <div class="col-lg-10">
                            <input class="form-control" list="list_username_agent" id="txtusernameagent">
                            <datalist id="list_username_agent">
                                
                            </datalist>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="btnclosemodal"><?php echo $this->lang->line(LANG_CLOSE); ?></button>
                <button type="button" class="btn btn-primary" id="btn_save_addagent"><?php echo $this->lang->line(LANG_BUTTON_SAVE); ?></button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal -->