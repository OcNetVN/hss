 <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->

                <!-- form add new username start -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                <div class="row">
                                    <div class="col-md-9">
                                        <?php echo $this->lang->line(LANG_SELL_PHONE); ?>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <button type="button" class="btn btn-primary" id="btnlistsellphone"><?php  echo $this->lang->line(LANG_LIST_SELL_PHONE); ?></button>
                                        <button type="button" class="btn btn-primary" id="btnaddsellphone" style="display: none;"><?php  echo $this->lang->line(LANG_ADD_SELL_PHONE); ?></button>
                                    </div>
                                </div>
                            </header>
                            <div class="panel-body">
                                <div id="divadd"><!--div add sell phone-->
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label">
                                                <?php  echo $this->lang->line(LANG_TR_AGENT); ?>: <span style="color: red;">(*)</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control" list="list_username_agent" id="agenname">
                                                <datalist id="list_username_agent">
                                                    <!--load data-->
                                                  </datalist>
                                                <span style="color: red; display: none;" id="notifyagentname"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_PHONE_MODEL); ?>:</label>
                                            <div class="col-lg-10">
                                                <input type="text" id="phonemodel" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_PRICE); ?>:</label>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-1">
                                                        <input name="raprice" id="radio-02" value="1" type="radio" checked="checked" /> RM
                                                        <br />
                                                        <input name="raprice" id="radio-03" value="0" type="radio" /> $
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" id="txtprice" class="form-control" placeholder="" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_IMEI); ?>:</label>
                                            <div class="col-lg-10">
                                                <input type="text" id="txtemei" maxlength="30" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-lg-2 col-sm-2 control-label">
                                          <?php echo $this->lang->line(LANG_TR_DATE_TAKEN); ?>
                                          </label>
                                          <div class="col-lg-2">
                                            <div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                                <?php 
                                                    $now        =   date("d-m-Y");
                                                  ?>
                                                  <input type="text" value="<?php echo $now; ?>" readonly="readonly" size="16" class="form-control" id="txtdatetaken" />
                                                  <span class="input-group-btn add-on">
                                                    <button class="btn btn-danger" type="button" style="height: 35px;"><i class="icon-calendar"></i></button>
                                                  </span>
                                              </div>
                                          </div>        
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_STATUS); ?>:</label>
                                            <div class="col-lg-10">
                                                <input name="rastatus" value="1" type="radio" checked="checked" /> <?php echo $this->lang->line(LANG_ACTIVE); ?>
                                                <br />
                                                <input name="rastatus" value="0" type="radio" /> <?php echo $this->lang->line(LANG_INACTIVE); ?>
        
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_REMARK); ?>:</label>
                                            <div class="col-lg-10">
                                                <input type="text" id="txt_remark" class="form-control" placeholder="" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <span style="color: red; display: none;" id="notifyerr"><?php echo $this->lang->line(LANG_ERROR); ?></span>
                                                    <span style="color: blue; display: none;" id="notifysuccess"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <input type="button" class="btn btn-danger" id="btnsave" value="<?php echo $this->lang->line(LANG_BUTTON_SAVE); ?>" />
                                            </div>
                                        </div>
                                    </form>
                                </div><!--end div add sell phone-->
                                <div id="divlist" style="display: none;"><!--div list sell phone-->
                                      <span id="notifyres"></span>
                                      <table class="table table-hover table-bordered" id="tbllistsellphone">
                                          <thead>
                                          <tr>
                                              <th>#</th>
                                              <th> <?php echo $this->lang->line(LANG_TR_AGENT); ?> </th>
                                              <th><?php echo $this->lang->line(LANG_TR_PHONE_MODEL);  ?></th>
                                              <th><?php echo $this->lang->line(LANG_TR_PRICE);  ?></th>
                                              <th><?php echo $this->lang->line(LANG_TR_IMEI);  ?></th>
                                              <th><?php echo $this->lang->line(LANG_TR_DATE_TAKEN);  ?></th>
                                              <th><?php echo $this->lang->line(LANG_TR_STATUS);  ?></th>
                                              <th><?php echo $this->lang->line(LANG_TR_REMARK);  ?></th>
                                          </tr>
                                          </thead>
                                          <tbody id="tbodylistsellphone">
                                                <!--results list agent-->                                    
                                          </tbody>
                                      </table>
                                      
                                      <div class="text-center" id="divpagination">
                                              
                                     </div>
                                </div><!--end div list sell phone-->
                            </div>
                        </section>
                    </div>
                </div>
                <!-- form add new username end -->
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->