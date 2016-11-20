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
                                    <div class="col-md-12">
                                        <?php echo $this->lang->line(LANG_SELL_PHONE); ?>
                                    </div>
                                </div>
                            </header>
                            <div class="panel-body">
                                <div id="divadd"><!--div edit sell phone-->
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label">
                                                <?php  echo $this->lang->line(LANG_TR_AGENT); ?>: <span style="color: red;">(*)</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control" list="list_username_agent" id="agenname" value="<?php echo $sellphone->Agent; ?>" />
                                                <datalist id="list_username_agent">
                                                    <!--load data-->
                                                  </datalist>
                                                <span style="color: red; display: none;" id="notifyagentname"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_PHONE_MODEL); ?>:</label>
                                            <div class="col-lg-10">
                                                <input type="text" id="phonemodel" class="form-control" placeholder="" value="<?php echo $sellphone->PhoneModel; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_PRICE); ?>:</label>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-1">
                                                    <?php
                                                        if($sellphone->currency == 1)
                                                        {
                                                    ?>
                                                            <input name="raprice" id="radio-02" value="1" type="radio" checked="checked" /> RM
                                                            <br />
                                                            <input name="raprice" id="radio-03" value="0" type="radio" /> $
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                            <input name="raprice" id="radio-02" value="1" type="radio" /> RM
                                                            <br />
                                                            <input name="raprice" id="radio-03" value="0" type="radio" checked="checked"/> $
                                                    <?php
                                                        }
                                                    ?>        
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" id="txtprice" class="form-control" placeholder="" value="<?php echo substr($sellphone->Price,0,(strlen($sellphone->Price)-3)); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_IMEI); ?>:</label>
                                            <div class="col-lg-10">
                                                <input type="text" id="txtemei" maxlength="30" class="form-control" placeholder="" value="<?php echo $sellphone->ImieNo; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-lg-2 col-sm-2 control-label">
                                          <?php echo $this->lang->line(LANG_TR_DATE_TAKEN); ?>
                                          </label>
                                          <div class="col-lg-2">
                                            <?php 
                                                $DateTaken          =   $sellphone->DateTaken; //yyyy-mm-dd hh:mm:ss
                                                $strDateTaken       =   substr($DateTaken,8,2)."-".substr($DateTaken,5,2)."-".substr($DateTaken,0,4); 
                                            ?>
                                            <div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                                  <input type="text" value="<?php echo $strDateTaken; ?>" readonly="readonly" size="16" class="form-control" id="txtdatetaken" />
                                                  <span class="input-group-btn add-on">
                                                    <button class="btn btn-danger" type="button" style="height: 35px;"><i class="icon-calendar"></i></button>
                                                  </span>
                                              </div>
                                          </div>        
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_STATUS); ?>:</label>
                                            <div class="col-lg-10">
                                            <?php
                                                if($sellphone->Status == 1)
                                                {
                                            ?>
                                                    <input name="rastatus" value="1" type="radio" checked="checked" /> <?php echo $this->lang->line(LANG_ACTIVE); ?>
                                                    <br />
                                                    <input name="rastatus" value="0" type="radio" /> <?php echo $this->lang->line(LANG_INACTIVE); ?>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                    <input name="rastatus" value="1" type="radio" /> <?php echo $this->lang->line(LANG_ACTIVE); ?>
                                                <br />
                                                <input name="rastatus" value="0" type="radio" checked="checked"/> <?php echo $this->lang->line(LANG_INACTIVE); ?>
                                            <?php        
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_REMARK); ?>:</label>
                                            <div class="col-lg-10">
                                                <input type="text" id="txt_remark" class="form-control" placeholder="" value="<?php echo $sellphone->Remark; ?>" />
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
                                                <input type="button" class="btn btn-danger" id="btndel" onclick="delsellphone('<?php echo $sellphone->id; ?>');" value="<?php echo $this->lang->line(LANG_BUTTON_DELETE_AGENT); ?>" />
                                            </div>
                                        </div>
                                    </form>
                                </div><!--end div edit sell phone-->
                            </div>
                        </section>
                    </div>
                </div>
                <!-- form edit new sell phone end -->
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->