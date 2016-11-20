    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              
             <div class="row">                  
                  <div class="col-lg-12">
                    <form class="form-horizontal" role="form">
                      <div class="panel">
                        <div class="panel-body">
                          <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-lg-4">
                                          <div class="calendar-block ">
                                            <div class="cal1">
                                            </div>
                                          </div> 
                                            <!-- <p class="text-center">
                                                <div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                                      <input type="text" value="12-10-2015" readonly size="16" id="txtdate" class="form-control">
                                                      <span class="input-group-btn add-on">
                                                        <button class="btn btn-danger" type="button"><i class="icon-calendar" style="height: 15px;"></i></button>
                                                      </span>                                                  
                                                  </div>
                                            </p> -->
                                        </div>
                                        <div class="col-lg-4">
                                          <input type="text" id="txtdate" readonly="readonly" class="form-control" style="width:200px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="divshowdata"><!--show data-->
                									<table width="100%" border="0" cellspacing="0" cellpadding="0" >
                									  <tr>
                										<td valign="top" id="tbllistracecard">
                											   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: larger;">
                												  <tr>
                													<td>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                													  <tr>
                                                <td align="center" height="50">
                                                	<strong style="padding:5px; border:2px #F30 solid; width: 100px; text-align:center; background:#CCC;"><span id="span_txdayday"></span> Day</strong>
                                                </td>
                                            </tr>
                                            <tr width="30%">
                  														<td align="center" width="30%">
                  															<p style="background-image: url(<?php echo base_url('assets/img/app/circle_black.png') ?>); width: 100px; height: 100px;">
                                                  <span style="font-size: 15px; font-weight: bold; color: white; margin-top: 70px;">
                                                    <span id="spannumday" style="margin-top:20px;"></span>
                                                  </span>
                                                </p>  
                  														</td>
                													  </tr>
                													  <tr>
                														<td align="center">
                															<strong style="padding:5px; border:2px #F30 solid; width: 100px; text-align:center; background-color:#06F; color:#FFF"><span id="span_txdaynight"></span> Night</strong>
                														</td>
                													  </tr>
                													  <tr>
                														<td align="center">
                															<p style="background-image: url(<?php echo base_url('assets/img/app/circle_blue.png') ?>); width: 100px; height: 100px;">
                                                <span style="font-size: 15px; font-weight: bold; color: white;">
                                                  <span id="spannumnight" style="margin-top:20px;"></span>
                                                </span>
                                              </p>
                														</td>
                													  </tr>
                													</table></td>
                												  </tr>
                												</table>       
                										</td>
                									  </tr>
                									</table>
                                </div>	<!--end show data-->
                                <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <span >Note: E  =   Empty</span><br />
                                            <span style="color: red; display: none;" id="notifyerr"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                            <span style="color: blue; display: none;" id="notifysuccess"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn" id="btnclearall" style=" width:200px;margin-bottom:5px;" type="button" > <?php echo $this->lang->line(LANG_CLEAR_ALL); ?> </button> <br />
                                           <button class="btn btn" id="btnsaveall" style=" width:200px; margin-bottom:10px;margin-top:5px;" type="button">
                                                <?php echo $this->lang->line(LANG_BUTTON_SAVE); ?>
                                           </button><br /> 
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      
      <!--main content end-->