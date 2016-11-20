<!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->

                <!-- table start -->
                <div class="row">

                    <!-- Date start -->
                    <div class="col-sm-6">

                        <div class="state-overview">
                            <section class="panel">
                                <div class="symbol red">
                                    <i class="icon-calendar"></i>
                                </div>
                                <div class="value">
                                    <h1 id="selecteddate"></h1>
                                    <p><?php echo $this->lang->line(LANG_SELECT_DATE);  ?></p>
                                </div>
                            </section>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="calendar-block ">
                                            <div class="cal1">
                                            </div>
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- date end -->

                    <div class="col-sm-6">
                        <section class="panel">
                            <header class="panel-heading">
                                <h4><?php echo $this->lang->line(LANG_AGENT_STATEMENT);  ?>
                                    <div class="pull-right">
                                    <a style="cursor: pointer;" id="prestatement"><?php echo $this->lang->line(LANG_PREVIOUS_STATEMENT);  ?></a>
                                </div>
                                </h4>                                
                            </header>
                            <div id="divlistresult">
                                <!--result-->
                            </div>
                            <div class="text-center" id="divpagination">
                            <!--show pagination-->
                            </div> 
                            
                        </section>
                    </div>
                </div>
                <!-- table end -->

                <!-- page end-->
            </section>
            
            <!--modal pay order-->
                <div class="modal fade" id="modalpayorder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line(LANG_PAY_ORDER);  ?></h4>
                      </div>
                      <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label"><?php echo $this->lang->line(LANG_MONEY); ?>: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="" id="txtmoney" />
                                    <input type="hidden" class="form-control" placeholder="" id="hiddenagentid" />
                                    <input type="hidden" class="form-control" placeholder="" id="hiddendate" /> <!--yyyy_mm_dd-->
                                    <span style="color: red; display: none;" id="notifymoney"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-2">
                                <span style="color: red; display: none;" id="notifyerradd"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                <span style="color: blue; display: none;" id="notifysuccessadd"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                            </div>
                      </div>
                      <div class="modal-footer">
                        <input type="button" class="btn btn-info" id="btnsave" value="<?php echo $this->lang->line(LANG_BUTTON_SAVE); ?>" />
                        <button id="btnclose" type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line(LANG_BUTTON_CLOSE); ?></button>
                      </div>
                    </div>
                  </div>
                </div>
            <!--end modal pay order-->
            
            <!--modal refund-->
                <div class="modal fade" id="modalrefund" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line(LANG_REFUND);  ?></h4>
                      </div>
                      <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label"><?php echo $this->lang->line(LANG_MONEY); ?>: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="" id="txtmoneyrefund" />
                                    <input type="hidden" class="form-control" placeholder="" id="hiddenagentidrefund" />
                                    <input type="hidden" class="form-control" placeholder="" id="hiddendaterefund" /> <!--yyyy_mm_dd-->
                                    <span style="color: red; display: none;" id="notifymoneyrefund"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-2">
                                <span style="color: red; display: none;" id="notifyerraddrefund"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                <span style="color: blue; display: none;" id="notifysuccessaddrefund"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                            </div>
                      </div>
                      <div class="modal-footer">
                        <input type="button" class="btn btn-info" id="btnsaverefund" value="<?php echo $this->lang->line(LANG_BUTTON_SAVE); ?>" />
                        <button id="btncloserefund" type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line(LANG_BUTTON_CLOSE); ?></button>
                      </div>
                    </div>
                  </div>
                </div>
            <!--end modal refund-->
            
            <!--modal show log-->
                <div class="modal fade" id="modalshowlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line(LANG_SHOW_LOG);  ?></h4>
                      </div>
                      <div class="modal-body">
                            <div class="form-group" id="divusertran">
                                
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button id="btnclose" type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line(LANG_BUTTON_CLOSE); ?></button>
                      </div>
                    </div>
                  </div>
                </div>
            <!--end modal show log-->
        </section>
        <!--main content end-->