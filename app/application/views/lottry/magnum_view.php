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
                            <div class="row" id="divshowdata" style="display: none;"><!--show data-->
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                      <tr>
                                        <td valign="top" id="tbllistracecard">
                                        	   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: larger;">
                                                <tr>
                                                    <td>
                                                        <table id="tbl_midle" width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:large;">
                                                        	  <tr>
                                                        	    <td bgcolor="#CCCC33">Magnum 4D</td>
                                                          </tr>
                                                        	  <tr>
                                                        	    <td bgcolor="#CCCC33">
                                                                	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="color: white;">
                                                        	      			<tr>
                                                                              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                    <tbody><tr>
                                                                                      <td width="40%" height="63" valign="middle" bgcolor="#666666">Date:<br>
                                                                                        <span id="span_date"></span></td>
                                                                                      <td width="20%" align="center" valign="middle" bgcolor="#666666">
                                                                                      		<input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/horse_home.gif') ?>" style="height:50px;width:50px;border-width:0px;">
                                                                                      </td>
                                                                                      <td width="40%" align="right" valign="middle" bgcolor="#666666">Draw No:<br>
                                                                                        <span id="spandrawno"></span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                      <td height="28" align="center" valign="middle" bgcolor="#333333">1ST</td>
                                                                                      <td align="center" valign="middle" bgcolor="#333333">2ND</td>
                                                                                      <td align="center" valign="middle" bgcolor="#333333">3RD</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                      <td height="35" align="center" valign="middle" bgcolor="#666666"><span id="span_1st"></span></td>
                                                                                      <td align="center" valign="middle" bgcolor="#666666"><span id="span_2nd"></span></td>
                                                                                      <td align="center" valign="middle" bgcolor="#666666"><span id="span_3rd"></span></td>
                                                                                    </tr>
                                                                                  </tbody></table>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                    <tbody><tr>
                                                                                      <td height="33" colspan="5" align="center" valign="middle" bgcolor="#333333">Special</td>
                                                                                      </tr>
                                                                                      <tbody id="tbody_special">
                                                                                                <!--load data-->
                                                                                      </tbody>
                                                                                  </tbody></table>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                    <tbody><tr>
                                                                                      <td height="27" colspan="5" align="center" valign="middle" bgcolor="#333333">Consolation</td>
                                                                                      </tr>
                                                                                      <tbody id="tbody_consolation">
                                                                                                <!--load data-->
                                                                                      </tbody>
                                                                                  </tbody></table></td>
                                                                                </tr>
                                                                </table></td>
                                                          </tr>
                                                        	  <tr>
                                                        	    <td bgcolor="#CCCC33"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        	      <tr>
                                                        	        <td height="26" style="color:#FFF; background-color:#000;"><strong>4D Jackpot 1</strong></td>
                                                                  </tr>
                                                        	      <tr>
                                                        	        <td height="34">
                                                                   	  <div style="border:2px solid #000; width:100%">
                                                                    	<span style="background-color:#666;font-weight:bold;color:#FFF;">JACKPOT 1 PRIZE</span> RM<span id="span_jp1prize"></span></div>
                                                                    </td>
                                                                  </tr>
                                                        	      <tr>
                                                        	        <td align="center" valign="top"  id="td_jp1">
                                                                    	<!--load data-->
                                                                    </td>
                                                                  </tr>
                                                                </table></td>
                                                          </tr>
                                                        	  <tr>
                                                        	    <td height="170" bgcolor="#CCCC33"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        	      <tr>
                                                        	        <td height="26" colspan="3" style="color:#FFF; background-color:#000;"><strong>4D Jackpot 2</strong></td>
                                                                  </tr>
                                                        	      <tr>
                                                        	        <td colspan="3">
                                                                    	<div style="border:2px solid #000; width:100%">
                                                                    	<span style="background-color:#666;font-weight:bold; color:#FFF;">JACKPOT 2 PRIZE</span> RM<span id="span_jp2prize"></span></div>
                                                                    </td>
                                                                  </tr>
                                                                  <tbody id="tbody_jp2">
                                                                        <!--load data-->
                                                                  </tbody>
                                                                </table></td>
                                                          </tr>
                                                        	  <tr>
                                                        	    <td bgcolor="#CCCC33"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        	      <tr>
                                                        	        <td height="29" colspan="2" style="color:#FFF; background-color:#000;">
                                                                    	<strong>4D Jackpot Gold</strong>
                                                                    </td>
                                                                  </tr>
                                                        	      <tr>
                                                        	        <td width="18%" height="35" align="center">
                                                                    	<div style="border:1px solid #000;">Jackpot 1</div>
                                                                    </td>
                                                        	        <td width="82%" id="td_jp1_gold">
                                                                        <!--load data-->
                                                                    </td>
                                                                  </tr>
                                                        	      <tr>
                                                        	        <td width="18%" height="35" align="center">
                                                                    	<div style="border:1px solid #000;">Jackpot 2</div>
                                                                    </td>
                                                        	        <td width="82%" id="td_jp2_gold">
                                                                        <!--load data-->
                                                                    </td>
                                                                  </tr>
                                                                  <tr>
                                                        	        <td width="18%" height="35" align="center">
                                                                    	<div style="border:1px solid #000;">Jackpot 3</div>
                                                                    </td>
                                                        	        <td width="82%" id="td_jp3_gold">
                                                                        <!--load data-->
                                                                    </td>
                                                                  </tr>
                                                        	      <tr>
                                                        	        <td width="18%" height="35" align="center">
                                                                    	<div style="border:1px solid #000;">Jackpot 4</div>
                                                                    </td>
                                                        	        <td width="82%" id="td_jp4_gold">
                                                                        <!--load data-->
                                                                    </td>
                                                                  </tr>
                                                                  <tr>
                                                        	        <td width="18%" height="35" align="center">
                                                                    	<div style="border:1px solid #000;">Jackpot 5</div>
                                                                    </td>
                                                        	        <td width="82%" id="td_jp5_gold">
                                                                        <!--load data-->
                                                                    </td>
                                                                  </tr>
                                                        	      <tr>
                                                        	        <td width="18%" height="35" align="center">
                                                                    	<div style="border:1px solid #000;">Jackpot 6</div>
                                                                    </td>
                                                        	        <td width="82%" id="td_jp6_gold">
                                                                        <!--load data-->
                                                                    </td>
                                                                  </tr>
                                                                  <tr>
                                                        	        <td width="18%" height="35" align="center">
                                                                    	<div style="border:1px solid #000;">Jackpot 7</div>
                                                                    </td>
                                                        	        <td width="82%" id="td_jp7_1_gold">
                                                                        <!--load data-->
                                                                    </td>
                                                                  </tr>
                                                        	      <tr>
                                                        	        <td width="18%" height="35" align="center">
                                                                    	<div style="border:1px solid #000;">Jackpot 7</div>
                                                                    </td>
                                                        	        <td width="82%" id="td_jp7_2_gold">
                                                                        <!--load data-->
                                                                    </td>
                                                                  </tr>
                                                        	      <tr>
                                                        	        <td height="68" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #000 solid;">
                                                        	          <tr>
                                                        	            <td width="25%" height="30" bgcolor="#333333" style="color:#FFF;font-weight:bold;">JACKPOT 1 PRIZE</td>
                                                        	            <td width="75%">RM<span id="span_jp1_prize"></span></td>
                                                                      </tr>
                                                        	          <tr>
                                                        	            <td height="31" bgcolor="#333333" style="color:#FFF;font-weight:bold;">JACKPOT 2 PRIZE</td>
                                                        	            <td>RM<span id="span_jp2_prize"></span></td>
                                                                      </tr>
                                                                    </table></td>
                                                                  </tr>
                                                                </table></td>
                                                        </tr>
                                                        	  <tr>
                                                        	    <td bgcolor="#CCCC33">&nbsp;</td>
                                                          </tr>
                                                        </table>
                                                    </td>
                                                  </tr>
                                                </table>       
                                        </td>
                                      </tr>
                                    </table>
                          </div><!--end show data--><br />
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <textarea  rows="10" class="form-control" id="ContentConvert"></textarea>
                                            <span style="color: red; display: none;" id="notifycontent"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                            <span style="color: red; display: none;" id="notifyerr"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                            <span style="color: blue; display: none;" id="notifysuccess"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn" id="btnclearall" style=" width:200px;margin-bottom:5px;" type="button" > <?php echo $this->lang->line(LANG_CLEAR_ALL); ?> </button> <br />
                                            <button class="btn btn" id="btndrawdate" style=" width:200px; margin-bottom:10px;" type="button"><?php echo $this->lang->line(LANG_DRAW_DATE_CONVERT); ?></button>
                                           <button class="btn btn" id="btnfourdgame" style=" width:200px; margin-bottom:10px;" type="button"><?php echo $this->lang->line(LANG_4D_GAME_CONVERT); ?></button><br />
                                           <button class="btn btn" id="btnfourdjp" style=" width:200px; margin-bottom:10px;margin-top:5px;" type="button"><?php echo $this->lang->line(LANG_4D_JACKPOT_CONVERT); ?></button><br />
                                           <button class="btn btn" id="btnfourjpgold" style=" width:200px;margin-bottom:5px;" type="button" ><?php echo $this->lang->line(LANG_4D_JACKPOT_GOLD_CONVERT); ?></button>
                                           <button class="btn btn" id="btnsaveall" style=" width:200px; margin-bottom:10px;margin-top:5px;" type="button" >
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