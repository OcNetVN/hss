<!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->              
              
              <!-- table start -->
              <div class="panel-body">
                  <form class="form-inline" role="form">
                  <?php 
                    /*if(isset($_SESSION['AccUserSuper']) && ($_SESSION['AccUserSuper']['level']==1 || $_SESSION['AccUserSuper']['level']==2))
                    {
                        echo '<a class="btn btn-success" href="'.base_url("super_admin/add_agent").'">'.$this->lang->line(LANG_ADD_AGENT).'</a>&nbsp';
                        echo '<a class="btn btn-success" href="'.base_url("super_admin/add_user").'">'.$this->lang->line(LANG_ADD_USER).'</a>';
                    }*/
                  ?>
                      <div class="pull-right">
                        <button type="button" class="btn btn-success" id="btnclearhistory"><?php echo $this->lang->line(LANG_BUTTON_CLEAR_HISTORY); ?></button>
                      </div>
                  </form>
              </div>
              <div class="row">                  
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php 
                                  if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level']==3)
                                    echo $this->lang->line(LANG_HEADING_CUSTOMER_TRANS_HISTORY); 
                                  else
                                    echo $this->lang->line(LANG_HEADING_AGENT_TRANS_HISTORY); 
                              ?>
                          </header>
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label"><?php echo $this->lang->line(LANG_DATEFROM); ?></label>
                                      <div class="col-lg-9">
                                            <p class="text-center">
                                                <div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                                      <input type="text" value="18-10-2014" readonly size="16" id="txtdatefrom" class="form-control">
                                                      <span class="input-group-btn add-on">
                                                        <button class="btn btn-danger" type="button" style="height: 35px;"><i class="icon-calendar"></i></button>
                                                      </span>
                                                  </div>
                                            </p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label"><?php echo $this->lang->line(LANG_DATETO); ?></label>
                                      <div class="col-lg-9">
                                            <p class="text-center">
                                                <div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                                      <input type="text" value="18-10-2115" readonly size="16" id="txtdateto" class="form-control">
                                                      <span class="input-group-btn add-on">
                                                        <button class="btn btn-danger" type="button"  style="height: 35px;"><i class="icon-calendar"></i></button>
                                                      </span>
                                                  </div>
                                            </p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info" id="btnsearch"><?php echo $this->lang->line(LANG_BUTTON_SEARCH); ?></button>
                                    </div>
                                </div>
                            </div>
                            <span id="notifyres"></span>
                          <table class="table table-hover table-bordered" id="tbllisttrans">
                              <thead>
                              <tr>
                                  <!--<th>#</th>-->
                                  <th><?php echo $this->lang->line(LANG_TR_CUSTOMERCODE);  ?></th>
                                  <th>
                                  <?php 
                                      if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level']==3)
                                        echo $this->lang->line(LANG_TR_CUSTOMER_NAME); 
                                      else
                                        echo $this->lang->line(LANG_TR_AGENT_NAME); 
                                  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_USERNAME);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_OLD_STATUS);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_OLD_REMARK);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_OLD_OFFDATE);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_NEW_STATUS);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_NEW_REMARK);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_NEW_OFFDATE);  ?></th>
                                  <th><?php echo $this->lang->line(LANG_TR_UPDATEON);  ?></th>
                                  
                              </tr>
                              </thead>
                              <tbody id="tbodylisttrans">
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