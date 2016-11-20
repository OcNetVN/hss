<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080;font-weight:bold; font-size:Large;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                        <!-- <a href="<?php //echo base_url('/app/lottry/menu_main') ?>" style="text-decoration: none;"> -->
                          <div style="vertical-align: middle; color: white; width: 250px;" onclick="history.back();">
                             <img src="<?php echo base_url('assets/img/app/btn-back.png') ?>" width="45" height="45" alt="Back" />
                                <span>
                                <?php
                                    echo $this->lang->line(LANG_SIN_SWEEP);
                                ?>
                                </span> 
                          </div>
                        <!-- </a> -->
                    </td>
                  <!--   <td width="359" align="center">&nbsp;</td> -->
                    <td width="10%" align="right">
                        <a href="<?php echo base_url('/app/menu') ?>">
                            <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/btn-home.png') ?>" style="height:50px;width:50px;border-width:0px;">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
  </tr>
  <tr>
    <td valign="top" id="tbllistracecard">
    	   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: larger;">
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center">
                          <strong>
                              <?php
                                    echo $this->lang->line(LANG_PAST_RESULT);
                                ?>
                          </strong>
                        </td>
                      </tr>
                      <tr>
                        <td align="center" height="50">
                        	<strong style="padding:5px; border:2px #F30 solid; width: 100px; text-align:center; background:#CCC;">
                            <select id="seday">
                                    <!--load data results-->
                            </select>
                          </strong>
                        </td>
                      </tr>
                      <tr>
                        <td align="center" height="50">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #903;">
                              <tr>
                                <td width="67%" height="30" bgcolor="#CCCCCC">
                                <?php
                                    echo $this->lang->line(LANG_LOT_DATE);
                                ?>: <span id="span_date"></span></td>
                                <td width="33%" align="right" bgcolor="#CCCCCC"><?php
                                    echo $this->lang->line(LANG_DRAW_NO);
                                ?>: <span id="spandrawno"></span></td>
                              </tr>
                            </table>
                       </td>
                      </tr>
                     
                  </table>
                </td>
              </tr>
              <tr>
              		<td valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="35" align="center">
                          <strong>
                            <span style="background-color:#3C6; color:#FFF">
                              &nbsp;<?php
                                    echo $this->lang->line(LANG_1ST_PR);
                                ?>&nbsp;
                            </span> 
                          </strong>
                        </td>
                        <td height="35" align="center">
                          <strong>
                            <span style="border:1px solid #F00;" id="spanPrize11"></span>
                          </strong>
                        </td>
                        <td height="35" align="center">
                          <strong>
                            <span style="background-color:#3C6;width: 100px; color:#FFF;" id="spanPrize12"></span>
                          </strong>
                        </td>
                      </tr>
                      <tr>
                          <td height="35" align="center">
                            <strong>
                              <span style="background-color:#3C6; color:#FFF;">&nbsp;<?php
                                    echo $this->lang->line(LANG_2ND_PR);
                                ?>&nbsp;</span> 
                            </strong>
                          </td>
                          <td height="35" align="center">
                            <strong>
                              <span style="border:1px solid #F00;" id="spanPrize21"></span>
                            </strong>
                          </td>
                          <td height="35" align="center">
                            <strong>
                              <span style="background-color:#3C6; width: 100px; color:#FFF;" id="spanPrize22"></span>
                            </strong>
                          </td>
                      </tr>
                      <tr>
                          <td height="35" align="center">
                            <strong>
                              <span style="background-color:#3C6; color:#FFF;">&nbsp;<?php
                                    echo $this->lang->line(LANG_3RD_PR);
                                ?>&nbsp;</span> 
                              
                            </strong>
                          </td>
                          <td height="35" align="center">
                            <strong>
                              <span style="border:1px solid #F00;" id="spanPrize31"></span>
                            </strong>
                          </td>
                          <td height="35" align="center">
                            <strong>
                              <span style="background-color:#3C6; width: 100px; color:#FFF;" id="spanPrize32"></span>
                            </strong>
                          </td>
                      </tr>
                    </table>
                  </td>
              </tr>
             <tr>
                <td height="81" valign="top">
                  <table width="100%" border="1" cellspacing="0" cellpadding="0" id="tbJackpotPrize" style="font-size:15px;">
                    <tr>
                      <td height="35" colspan="5" align="center" valign="bottom">
                          <div style="width:100%; height:22px; background-color:#999999;color:#FFF; font-size:15px">
                            <span style="font-size:14px;font-weight:bold;">
                                <?php
                                    echo $this->lang->line(LANG_10_JACKPOT);
                                ?>
                            </span>
                          </div>
                      </td>
                    </tr>
                    <tr>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                    </tr>
                    <tr>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                    </tr>
                  </table>
                </td>
             </tr>
             <tr>
             	<td>
                  <table width="100%" border="1" cellspacing="0" cellpadding="0" id="tbLuckyPrizes" style="font-size:15px;">
                    <tr>
                      <td height="35" colspan="5" align="center" valign="bottom">
                        <div style="width:100%; height:22px; background-color:#999999; color:#FFF; font-size:15px">
                          <span style="font-size:14px;font-weight:bold;">
                          <?php
                               echo $this->lang->line(LANG_10_LUCKY);
                           ?>
                          </strong></div></td>
                    </tr>
                    <tr>
                      <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
                    </tr>
                    <tr>
                      <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
                    </tr>
                  </table>
                </td>
             </tr>
             <tr>
                <td valign="top">
             	    <table width="100%" border="1" cellspacing="0" cellpadding="0" id="tb30GiftPrize" style="font-size:15px;">
                      <tr>
                        <td height="40" colspan="5" align="center">
                          <div style="width:100%; height:22px; background-color:#999999; color:#FFF; font-size:15px">
                            <span style="font-size:14px;font-weight:bold;">
                            <?php
                                 echo $this->lang->line(LANG_30_GIFT);
                             ?>
                            </span>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                      </tr>
                      <tr>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                      </tr>
                      <tr>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                      </tr>
                      <tr>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                      </tr>
                      <tr>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                      </tr>
                      <tr>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                        <td height="30" align="center"><strong></strong></td>
                      </tr>
                      
                  </table>
               </td>
             </tr>
             <tr>
             	<td>
               	  <table width="100%" border="1" cellspacing="0" cellpadding="0" id="tbConsolation" style="font-size:15px;">
                	  <tr>
                	    <td height="40" colspan="5" align="center">
                        <div style="width:100%; height:22px; background-color:#999999; color:#FFF; font-size:15px">
                          <span style="font-size:14px;font-weight:bold;">
                          <?php
                                 echo $this->lang->line(LANG_30_CON);
                             ?>
                          </span>
                        </div>
                      </td>
              	    </tr>
                	  <tr>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
              	    </tr>
                	  <tr>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
              	    </tr>
                	  <tr>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
              	    </tr>
                	  <tr>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
              	    </tr>
                	  <tr>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
              	    </tr>
                	  <tr>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                	    <td height="30" align="center"><strong></strong></td>
                      <td height="30" align="center"><strong></strong></td>
              	    </tr>               	  
           	    </table>
              </td>
             </tr>
             <tr>
                <td valign="top">
                    <table width="100%" border="1" cellspacing="0" cellpadding="0" id="tbParticipation" style="font-size:15px;">
                      <tr>
                        <td height="33" colspan="5" align="center" valign="bottom">
                          <div style="width:100%; height:22px; background-color:#999999; color:#FFF; font-size:15px">
                            <span style="font-size:14px;font-weight:bold;">
                            <?php
                                 echo $this->lang->line(LANG_50_PART);
                             ?>
                            </span>
                          </div>
                        </td>
                      </tr>
                        <tr>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                      </tr>
                        <tr>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                      </tr>
                        <tr>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                      </tr>
                        <tr>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                      </tr>
                        <tr>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                      </tr>
                        <tr>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                      </tr>
                        <tr>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                      </tr>
                        <tr>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                      </tr>
                        <tr>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                      </tr>
                        <tr>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                          <td height="30" align="center"><strong></strong></td>
                      </tr>
                       
                    </table>
               </td>
             </tr>
             <tr>
             	<td valign="top">
                	<table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:15px;">
            		    <tr>
             	          <td height="30" align="center" bgcolor="#999999">
                          <div style="width:100%; height:22px; background-color:#999999; color:#FFF; font-size:15px">
                            <span style="font-size:14px;font-weight:bold;">
                            <?php
                                 echo $this->lang->line(LANG_315_2D_DELIGHT);
                             ?>
                            </span>
                          </div>
                        </td>
       	            </tr>
             	        <tr>
             	          <td height="30" align="center">
                          <table width="100%" border="1" cellspacing="1" cellpadding="0" id="tbDelight">
               	            <tr>
               	              <td height="35" align="center"><strong>03</strong></td>
               	              <td height="35" align="center"><strong>23</strong></td>
               	              <td height="35" align="center"><strong>42</strong></td>
               	              <td height="35" align="center"><strong>14</strong></td>
               	              <td height="35" align="center"><strong>50</strong></td>
               	              <td height="35" align="center"><strong>21</strong></td>
               	              <td height="35" align="center"><strong>23</strong></td>
               	              <td height="35" align="center"><strong>52</strong></td>
               	              <td height="35" align="center"><strong>45</strong></td>
             	              </tr>
           	              </table>
                      </td>
           	          </tr>
       	        </table>
                </td>
             </tr>
      </table>       
    </td>
  </tr>
</table>