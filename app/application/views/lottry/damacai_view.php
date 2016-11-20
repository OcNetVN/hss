    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <div class="row">
                    <div class="col-lg-12">
                          <section class="panel">
                              <header class="panel-heading">
                                  <?php 
                                    echo $this->lang->line(LANG_DAMACAI); 
                                  ?>
                              </header>
                              <div class="panel-body">
                                  <form class="form-inline" role="form">
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
                                        <div class="row" id="divshowdata" style="display: none;"> <!--show data-->
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                                  <tr>
                                                    <td valign="top" id="tbllistracecard">
                                                    	   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                  <tr>
                                                                    <td>
                                                                    <span id="spannotfound" style="color: red; display: none;"><?php echo $this->lang->line(LANG_NOT_FOUND); ?></span>
                                                                    <table id="tbl_midle" width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#FFF; font-weight:bold;">
                                                                        <tr>
                                                                          <td bgcolor="#006666" style="color:#FFF;" height="32"> <strong>Damicai 1-3D</strong></td>
                                                                        </tr>
                                                                        <tr>
                                                                          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                              <td width="40%" height="63" valign="middle" bgcolor="#666666">Date:<br />
                                                                                <span id="span_date"></span></td>
                                                                              <td width="20%" align="center" valign="middle" bgcolor="#666666">
                                                                              		<input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/horse_home.gif') ?>" style="height:50px;width:50px;border-width:0px;">
                                                                              </td>
                                                                              <td width="40%" align="right" valign="middle" bgcolor="#666666">Draw No:<br />
                                                                                <span id="spandrawno"></span></td>
                                                                            </tr>
                                                                            <tr>
                                                                              <td height="28" align="center" valign="middle" bgcolor="#333333">1ST</td>
                                                                              <td align="center" valign="middle" bgcolor="#333333">2ND</td>
                                                                              <td align="center" valign="middle" bgcolor="#333333">3RD</td>
                                                                            </tr>
                                                                            <tr>
                                                                              <td height="35" align="center" valign="middle" bgcolor="#666666"><span id="span_1st_1_3d"></span></td>
                                                                              <td align="center" valign="middle" bgcolor="#666666"><span id="span_2nd_1_3d"></span></td>
                                                                              <td align="center" valign="middle" bgcolor="#666666"><span id="span_3rd_1_3d"></span></td>
                                                                            </tr>
                                                                          </table>
                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                              <td height="33" colspan="5" align="center" valign="middle" bgcolor="#333333">Special</td>
                                                                              </tr>
                                                                              <tbody id="tbody_special">
                                                                                    <!--load data-->
                                                                              </tbody>
                                                                          </table>
                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                              <td height="27" colspan="5" align="center" valign="middle" bgcolor="#333333">Consolation</td>
                                                                              </tr>
                                                                                    <tbody id="tbody_consolation">
                                                                                            <!--load data-->
                                                                                    </tbody>
                                                                          </table>
                                                                          <span style="color: black;">3D</span><p></p>
                                                                          <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: -25px;">
                                                                            <tr>
                                                                              <td align="left" valign="top">
                                                                                        <p style="border:1px solid #000; width: 98%; background:#000;color:#FFF;  text-align: center;">
                                                                                            <span><strong>1st Prize</strong></span>
                                                                                        </p>
                                                                                        <p style="border:1px solid #000; width: 98%; margin-top:-10px;color: black; text-align: center;">
                                                                                            <strong><span id="span_1st_3d"></span></strong><span></span>
                                                                                        </p>
                                                                              </td>
                                                                              <td align="center" valign="top">
                                                                              		<center>
                                                                                        <p style="border:1px solid #000; width: 98%; background:#000;color:#FFF;  text-align: center;">
                                                                                            <span><strong>2nd Prize</strong></span>
                                                                                        </p>
                                                                                        <p style="border:1px solid #000; width: 98%; margin-top:-10px; color: black; text-align: center;">
                                                                                            <strong><span id="span_2nd_3d"></span></strong><span></span>
                                                                                        </p>
                                                                                    </center>
                                                                              </td>
                                                                              
                                                                              <td align="right" valign="top">
                                                                                    <p style="border:1px solid #000; width: 98%; background:#000;color:#FFF; text-align: center;">
                                                                                            <span><strong>3rd Prize</strong></span>
                                                                                      </p>
                                                                                      <p style="border:1px solid #000; width: 98%; margin-top:-10px;color: black; text-align: center;">
                                                                                      <strong><span id="span_3rd_3d"></span></strong><span></span></p>
                                                                      		    </td>
                                                                            </tr>
                                                                          </table></td>
                                                                        </tr>
                                                                    </table></td>
                                                                  </tr>
                                                                </table> 
                                                                 
                                                                <table id="tbl_bottom" width="100%" border="0" cellspacing="0" cellpadding="0" style="font-weight:bold; font-size: large;">
                                                                  <tr>
                                                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                      <tr>
                                                                        <td height="29" colspan="2" bgcolor="#CCCCCC"><span style="color:#F00;">1+3D</span> <span style="color:#003;">Jeckpot 1</span></td>
                                                                        </tr>
                                                                      <tr>
                                                                        <td height="29" colspan="2" align="center" bgcolor="#006699" style="color:#FFF;">RM <span id="span_rm_13djp1"></span></td>
                                                                        </tr>
                                                                        <tbody id="tbody_jackpotonethreed">
                                                                                <!--load data-->
                                                                        </tbody>
                                                                    </table></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                      <tr>
                                                                        <td height="28" colspan="2" bgcolor="#CCCCCC"><span style="color:#F00;">1+3D</span> <span style="color:#003;">Jeckpot 2</span></td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td width="97%" colspan="2" height="30" align="center" valign="middle" bgcolor="#006699" style="color:#FFF;">RM <span id="span_rm_13djp2"></span></td>
                                                                      </tr>
                                                                      <tbody id="tbody_jackpottwoonethreed">
                                                                            <!--load data-->
                                                                      </tbody>
                                                                    </table></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td height="111"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                      <tr>
                                                                        <td height="30" colspan="3" bgcolor="#CCCCCC"><span style="color:#F00;">3D</span> <span style="color:#003;">Jeckpot</span></td>
                                                                        </tr>
                                                                      <tr>
                                                                        <td height="28" colspan="3" align="center" bgcolor="#006699" style="color:#FFF;">RM <span id="span_rm_3djp"></span></td>
                                                                        </tr>
                                                                        <tbody id="tbody_jackpotthreed">
                                                                                <!--load data-->
                                                                        </tbody>
                                                                    </table></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                      <tr>
                                                                        <td height="27" bgcolor="#CCCCCC"><span style="color:#F00;">DMC</span> <span style="color:#003;">Jeckpot 1</span></td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td height="32" align="center" bgcolor="#006699" style="color:#FFF;">RM <span id="span_rm_dmcjp1"></span></td>
                                                                      </tr>
                                                                      <tr>
                                                                        <tbody id="tbody_dmcjpone">
                                                                                <!--load data-->
                                                                        </tbody>
                                                                      </tr>
                                                                    </table></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                      <tr>
                                                                        <td height="31" bgcolor="#CCCCCC"><span style="color:#F00;">DMC</span> <span style="color:#003;">Jeckpot 2</span></td>
                                                                        </tr>
                                                                      <tr>
                                                                        <td height="30" align="center" bgcolor="#006699" style="color:#FFF;">RM <span id="span_rm_dmcjp2"></span></td>
                                                                        </tr>
                                                                        <tbody id="tbody_dmcjptwo">
                                                                                <!--load data-->
                                                                        </tbody>
                                                                    </table></td>
                                                                  </tr>
                                                                </table> 
                                                    </td>
                                                  </tr>
                                                </table><br />
                                        </div> <!--end show data-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <textarea  rows="10" class="form-control" id="ContentConvert"></textarea>
                                                <span style="color: red; display: none;" id="notifycontent"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                                <span style="color: red; display: none;" id="notifyerr"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                                <span style="color: blue; display: none;" id="notifysuccess"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn btn" id="btnclearall" style=" width:200px;margin-bottom:5px;" type="button" > <?php echo $this->lang->line(LANG_CLEAR_ALL); ?> </button> <br />
                                               <button class="btn btn" id="btndrawdate" style=" width:200px; margin-bottom:10px;" type="button"><?php echo $this->lang->line(LANG_DRAW_DATE_CONVERT); ?> </button>
                                               <button class="btn btn" id="btnonethreed" style=" width:200px; margin-bottom:10px;" type="button"><?php echo $this->lang->line(LANG_1_3D_CONVERT); ?> </button>
                                               <button class="btn btn" id="btnthreed" style=" width:200px; margin-bottom:10px;margin-top:5px;" type="button"><?php echo $this->lang->line(LANG_3D_CONVERT); ?> </button><br />
                                               
                                               <button class="btn btn" id="btnrm" style=" width:200px;margin-bottom:5px;" type="button" ><?php echo $this->lang->line(LANG_RM_CONVERT); ?> </button>
                                                
                                                
                                            </div>
                                            <div class="col-md-3">
                                               <button class="btn btn" id="btnonethreedjp1" style=" width:200px;margin-bottom:5px;" type="button" > <?php echo $this->lang->line(LANG_1_3D_JP1_CONVERT); ?> </button> <br />
                                               <button class="btn btn" id="btnonethreeedjp2" style=" width:200px;margin-bottom:5px;" type="button" ><?php echo $this->lang->line(LANG_1_3D_JP2_CONVERT); ?> </button><br /> 
                                               <button class="btn btn" id="btn3djp" style=" width:200px;margin-bottom:5px;" type="button" ><?php echo $this->lang->line(LANG_3D_JP_CONVERT); ?> </button> <br />
                                               <button class="btn btn" id="btndmcjp1" style=" width:200px;margin-bottom:5px;" type="button" > <?php echo $this->lang->line(LANG_DMC_JP1_CONVERT); ?> </button> <br />
                                               <button class="btn btn" id="btndmcjp2" style=" width:200px;margin-bottom:5px;" type="button" ><?php echo $this->lang->line(LANG_DMC_JP2_CONVERT); ?> </button>
                                               <button class="btn btn" id="btnsaveall" style=" width:200px; margin-bottom:10px;margin-top:5px;" type="button">
                                                <?php echo $this->lang->line(LANG_BUTTON_SAVE); ?></button>
                                                <br /> 
                                            </div>
                                        </div>
                                  </form>
                                  
                              </div>
                          </section>
    
                      </div>
                </div>
              <!-- page end-->
          </section>
      </section>
      
      <!--main content end-->