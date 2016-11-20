    <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->

                <!-- form add new agent start -->
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php echo $this->lang->line(LANG_ADD_AGENT); ?>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" id="formaddagent">
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_AGENT_NAME); ?>: <span style="color: red;">(*)</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="txtfullname" placeholder="">
                                        <span style="color: red; display: none;" id="notifyfullname"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_USERNAME); ?>: <span style="color: red;">(*)</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="txtusername" placeholder="">
                                        <span style="color: red; display: none;" id="notifyusername"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                        <span style="color: red; display: none;" id="notifyusername2"><?php echo $this->lang->line(LANG_AlREADY_EXISTS); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_PASS); ?>: <span style="color: red;">(*)</span></label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" id="txtpass" placeholder="">
                                        <span style="color: red; display: none;" id="notifypass"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_CONFIRM_PASSWORD); ?>: <span style="color: red;">(*)</span></label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" id="txtrepass" placeholder="">
                                        <span style="color: red; display: none;" id="notifyrepass"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                        <span style="color: red; display: none;" id="notifyrepass2"><?php echo $this->lang->line(LANG_NOT_CORRECT); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_CONTACT); ?>:</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="txtphone" placeholder="">
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
                <!-- form add new agent end -->

                <!-- page end-->
            </section>
        </section>
        <!--main content end-->