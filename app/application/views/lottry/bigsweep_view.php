    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              
             <div class="row">                  
                  <div class="col-lg-12">
                    <form class="form-horizontal" role="form">
                      <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="col-md-4">
                                    <div class="panel">
                                      <div class="panel-body">
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
                                    </div>
                                  </div>
                                      <div class="col-md-5">
                                        <input type="text" id="txtdate" readonly="readonly" class="form-control" style="width:200px;">
                                      </div>
                              </div>
                             </div>
                            <div class="row" id="divshowdata" style="display: none;"><!--show data-->
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                      <tr>
                                        <td valign="top" id="tbllistracecard">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: larger;">
                                                  <tr>
                                                    <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td align="center" height="50">
                                                       	    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #903;">
                                                                  <tr>
                                                                    <td width="67%" height="30">Draw Date: <span id="span_date"></span></td>
                                                                    <td width="33%" align="right">DrawNo: <span id="spandrawno"></span></td>
                                                                  </tr>
                                                                </table>
                                                           </td>
                                                          </tr>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                  <td align="center" bgcolor="#CC0000">Jeckpot Number</td>
                                                                </tr>
                                                                <tr>
                                                                  <td align="center" style="border:1px solid #903;"><strong > <span id="spanjegit"></span></strong></td>
                                                                </tr>
                                                              </table></td>
                                                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                  <td align="center" bgcolor="#CC0000">Jackpot</td>
                                                                </tr>
                                                                <tr>
                                                                  <td align="center" style="border:1px solid #903;"><strong><span id="spanjp"></span></strong></td>
                                                                </tr>
                                                              </table></td>
                                                            </tr>
                                                    </table></td>
                                                 </tr>
                                                  <tr>
                                                    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td width="67%" align="right"><strong>MajorPrizes &nbsp; &nbsp;</strong></td>
                                                            <td width="33%"><strong>&nbsp; &nbsp; Jackpot prize</strong></td>
                                                          </tr>
                                                        </table></td>
                                                      </tr>
                                                      <tr>
                                                        <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                                          <tr>
                                                            <td width="33%" align="center">
                                                           	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td width="33%" align="center" bgcolor="#CC0000" style="border:1px solid #903; margin-right: 2px;"><strong><span style="color:#FFF;">1st</span></strong></td>
                                                                <td width="67%" align="center" style="border:1px solid #903; margin-right: 2px;"><strong><span id="spanno1"></span></strong></td>
                                                              </tr>
                                                            </table></td>
                                                            <td width="34%" align="center" bgcolor="#CC0000" style="border: 1px solid white; margin-bottom: 1px;"><strong><span style="color:#FFF;">RM <span id="spanrm1"></span></span></strong></td>
                                                            <td width="33%" align="center" ><p style="width:90%; border:2px solid #CC0000;">&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td align="center">
                                                            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td width="33%" align="center" bgcolor="#CC0000" style="border:1px solid #903; margin-right: 2px;"><strong><span style="color:#FFF;">2nd</span></strong></td>
                                                                <td align="center" style="border:1px solid #903; margin-right: 2px;"><strong><span id="spanno2"></span></strong></td>
                                                              </tr>
                                                            </table>
                                                            </td>
                                                            <td align="center" bgcolor="#CC0000" style="border: 1px solid white; margin-bottom: 1px;"><strong><span style="color:#FFF;"> <span id="spanrm2"></span></span></strong></td>
                                                            <td align="center"><p style="width:90%; border:2px solid #CC0000;">&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td align="center">
                                                            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td width="33%" align="center" bgcolor="#CC0000" style="border:1px solid #903; margin-right: 2px;"><strong><span style="color:#FFF;">3rd</span></strong></td>
                                                                <td align="center" style="border:1px solid #903; margin-right: 2px;"><strong><span id="spanno3"></span></strong></td>
                                                              </tr>
                                                            </table>
                                                            </td>
                                                            <td align="center" bgcolor="#CC0000" style="border: 1px solid white; margin-bottom: 1px;"><strong><span style="color:#FFF;"> <span id="spanrm3"></span></span></strong></td>
                                                            <td align="center"><p style="width:90%; border:2px solid #CC0000;">&nbsp;</td>
                                                          </tr>
                                                        </table></td>
                                                      </tr>
                                                    </table></td>
                                                 </tr>
                                                 <tr>
                                                    <td height="46" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    		&nbsp;
                                                              <td height="35" colspan="7" align="left" valign="bottom"><div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>BLISS PRIZES(RM5,000 EACH)</strong></div></td>
                                                      </tr>
                                                      <tbody id="tbodybliss">
                                                            <!--load data-->
                                                      </tbody>
                                                   </table></td></tr>
                                                 <tr>
                                                    <td valign="top">
                                               	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                              <td height="40" colspan="7" align="left">
                                                              <div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>SWEET PRIZES  (RM2,000 EACH)</strong></div></td>
                                                            </tr>
                                                            <tbody id="tbodysweep">
                                                                    <!--load data-->
                                                            </tbody>
                                                    </table>
                                                   </td>
                                                 </tr>
                                                 <tr>
                                                    <td valign="top">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                              <td height="33" colspan="7" align="left" valign="bottom"><div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>GLEE PRIZES(RM1,000 EACH)</strong></div></td>
                                                          </tr>
                                                            <tbody id="tbodyglee">
                                                                    <!--load data-->
                                                            </tbody>
                                                    </table>
                                                   </td>
                                                 </tr>
                                                 <tr>
                                                    <td valign="top">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                              <td height="33" colspan="7" align="left" valign="bottom"><div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>HAPPY PRIZES(RM100 EACH)</strong></div></td>
                                                          </tr>
                                                            <tbody id="tbodyhappy">
                                                                    <!--load data-->
                                                            </tbody>
                                                    </table>
                                                   </td>
                                                 </tr>
                                                <tr>
                                                    <td valign="top">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                              <td height="33" colspan="7" align="left" valign="bottom"><div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>LUCKY PRIZES(RM50 EACH)</strong></div></td>
                                                          </tr>
                                                  <tbody id="tbodylucky">
                                                                    <!--load data-->
                                                            </tbody>
                                                    </table>
                                                   </td>
                                                </tr>
                                                 <tr>
                                                    <td valign="top">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                              <td height="33" colspan="7" align="left" valign="bottom"><div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>BONUS PRIZES  (RM20 EACH)</strong></div></td>
                                                          </tr>
                                                  <tbody id="tbodybonus">
                                                                    <!--load data-->
                                                            </tbody>
                                                    </table>
                                                   </td>
                                                </tr>
                                          </table>       
                                        </td>
                                      </tr>
                                    </table>
                            </div> <!--end show data-->
                            <br />
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <textarea  rows="6" class="form-control" id="ContentConvert"></textarea>
                                            <span style="color: red; display: none;" id="notifycontent"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                                <span style="color: red; display: none;" id="notifyerr"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                                <span style="color: blue; display: none;" id="notifysuccess"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                        </div>
                                        <div class="col-md-2">
                                          <button class="btn btn" id="btnClear" style=" width:200px; margin-bottom:10px;margin-top:5px;" type="button" onclick="ClearTexbox();">Clear
                                            <br />
                                           <button class="btn btn" id="btnconvertall" style=" width:200px; margin-bottom:10px;margin-top:5px;" type="button">
                                            <?php echo $this->lang->line(LANG_CONVERT_ALL); ?>(Firefox)
                                           </button><br />
                                           <button class="btn btn" id="btnsaveall" style=" width:200px; margin-bottom:10px;margin-top:5px;" type="button" style="display: none;">
                                            <?php echo $this->lang->line(LANG_BUTTON_SAVE); ?>
                                           </button><br />
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