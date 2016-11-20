 <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->

                <!-- form add new username start -->
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php echo $this->lang->line(LANG_ADD_USER); ?>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_CUSTOMER_NAME); ?>: </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="" id="txtfullname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_USERNAME); ?>: </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="txtusername" placeholder="">
                                        <span style="color: red; display: none;" id="notifyusername"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                        <span style="color: red; display: none;" id="notifyusername2"><?php echo $this->lang->line(LANG_AlREADY_EXISTS); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_PASS); ?>: </label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" id="txtpass" placeholder="">
                                        <span style="color: red; display: none;" id="notifypass"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                    </div>
                                </div>
                                <!--<div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_CONFIRM_PASSWORD); ?>: </label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" id="txtrepass" placeholder="">
                                        <span style="color: red; display: none;" id="notifyrepass"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                        <span style="color: red; display: none;" id="notifyrepass2"><?php echo $this->lang->line(LANG_NOT_CORRECT); ?></span>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_CONTACT); ?>:</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="txtphone" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_AGENT); ?>:</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" list="list_username_agent" id="txtusernameagent">
                                        <datalist id="list_username_agent">
                                            
                                          </datalist>
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
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_FEES); ?>:</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <input name="rafees" value="1" type="radio" checked="checked" /> RM
                                                <br />
                                                <input name="rafees" value="0" type="radio" /> $
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="txtfees" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_IMEI); ?>: <span style="color: red;">(*)</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="txtemei" class="form-control" placeholder="">
                                        <span style="color: red; display: none;" id="notifyimei"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_VERIFYCODE); ?>:</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="txtverifycode" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_DUEDATE); ?></label>
                                  <div class="col-lg-3">
                                        <p class="text-center">
                                            <div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                                  <input type="text" value="12-10-2015" readonly size="16" id="txtduedate" class="form-control">
                                                  <span class="input-group-btn add-on">
                                                        <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                                      </span>                                                  
                                              </div>
                                        </p>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_REMARK); ?>:</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="txtremark" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <span style="color: red; display: none;" id="notifyerr"><?php echo $this->lang->line(LANG_ADD_FAILED); ?></span>
                                            <span style="color: blue; display: none;" id="notifysuccess"><?php echo $this->lang->line(LANG_ADD_SUCCESS); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="button" class="btn btn-info" id="btnsave" value="<?php echo $this->lang->line(LANG_BUTTON_SAVE); ?>" />
                                        <input type="reset" class="btn btn-danger" id="btnsave" value="<?php echo $this->lang->line(LANG_BUTTON_RESET); ?>" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>

                </div>
                <!-- form add new username end -->

                <!-- page end-->
            </section>
        </section>
        <!--main content end-->