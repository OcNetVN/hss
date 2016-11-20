<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080; font-size:Large;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                        <div style="vertical-align: middle; color: white;" onclick="history.back();">
                          <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/btn-back.png') ?>" style="height:50px;width:50px;border-width:0px;">
                          <span>
                          <?php
                              echo $this->lang->line(LANG_MAL_BIG_SWEEP);
                          ?>
                          </span>
                        </div>
                      <!-- </a> -->
                    </td>
                    
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
                        <td align="center"><strong>
                        <?php
                              echo $this->lang->line(LANG_PAST_RESULT);
                          ?>
                        </strong></td>
                      </tr>
                      <tr>
                        <td align="center" height="50">
                        	<strong style="padding:5px; border:2px #F30 solid; width: 100px; text-align:center; background:#CCC;">
                                <select id="seday">
                                    <!--load data-->
                                </select>
                            </strong>
                        </td>
                      </tr>
                      <!--load data-->
                        <tr>
                        <td valign="top" id="tbllistracecard">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 16px;">
                                  <tr>
                                    <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td align="center" height="50">
                                       	    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #903;">
                                                  <tr>
                                                    <td width="67%" height="30">
                                                    <?php
                                                          echo $this->lang->line(LANG_LOT_DATE);
                                                      ?>
                                                    : <span id="span_date"></span></td>
                                                    <td width="33%" align="right">
                                                    <?php
                                                          echo $this->lang->line(LANG_DRAW_NO);
                                                      ?>
                                                    : <span id="spandrawno"></span></td>
                                                  </tr>
                                                </table>
                                           </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td valign="top">
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                          <tr>
                                            <td width="70%" height="35" align="left">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td  bgcolor="#CC0000" style="color:#FFF;font-size:bold;">
                                                    <b>
                                                      <?php
                                                          echo $this->lang->line(LANG_1_2_3_J);
                                                      ?>
                                                    </b>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td align="center" style="border:1px solid #903;"><strong > <span id="spanjegit"></span>&nbsp;</strong></td>
                                                </tr>
                                              </table>
                                            </td>
                                            <td width="30%" height="35">
                                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td align="center" bgcolor="#CC0000" style="color:#FFF;font-size:bold;">
                                                    <b>
                                                      <?php
                                                          echo $this->lang->line(LANG_JACKPOT);
                                                      ?>
                                                    </b>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td align="center" style="border:1px solid #903;"><strong>Rm <span id="spanjp"></span></strong></td>
                                                </tr>
                                              </table></td>
                                            </tr>
                                    </table>
                                  </td>
                                 </tr>
                                  <tr>
                                    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr style="font-size:16px;">
                                            <td width="50%" align="center"><strong>
                                            <?php
                                                echo $this->lang->line(LANG_MAJOR_PR);
                                            ?>
                                             </strong></td>
                                            <td width="50%" align="center"><strong> 
                                            <?php
                                                echo $this->lang->line(LANG_JACKPOT_PR);
                                            ?>
                                            </strong></td>
                                          </tr>
                                          </table>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                          <tr>
                                            <td width="33%" align="center">
                                           	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="33%" align="center" bgcolor="#CC0000" style="border:1px solid #903; margin-right: 2px;"><strong><span style="color:#FFF;">
                                                <?php
                                                    echo $this->lang->line(LANG_1ST);
                                                ?>
                                                </span></strong></td>
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
                                                <td width="33%" align="center" bgcolor="#CC0000" style="border:1px solid #903; margin-right: 2px;"><strong><span style="color:#FFF;">
                                                <?php
                                                    echo $this->lang->line(LANG_2ND);
                                                ?>
                                                </span></strong></td>
                                                <td align="center" style="border:1px solid #903; margin-right: 2px;"><strong><span id="spanno2"></span></strong></td>
                                              </tr>
                                            </table>
                                            </td>
                                            <td align="center" bgcolor="#CC0000" style="border: 1px solid white; margin-bottom: 1px;"><strong><span style="color:#FFF;">RM <span id="spanrm2"></span></span></strong></td>
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
                                            <td align="center" bgcolor="#CC0000" style="border: 1px solid white; margin-bottom: 1px;"><strong><span style="color:#FFF;">RM <span id="spanrm3"></span></span></strong></td>
                                            <td align="center"><p style="width:90%; border:2px solid #CC0000;">&nbsp;</td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                 </tr>
                                 <tr>
                                    <td height="46" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    		&nbsp;
                                              <td height="35" colspan="4" align="left" valign="bottom"><div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>
                                              <?php
                                                    echo $this->lang->line(LANG_BLISS_PR);
                                                ?>
                                              </strong></div></td>
                                      </tr>
                                      <tbody id="tbodybliss">
                                            <!--load data-->
                                      </tbody>
                                   </table></td>
                                 </tr>
                                 <tr>
                                    <td valign="top">
                               	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="40" colspan="4" align="left">
                                              <div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>
                                              <?php
                                                    echo $this->lang->line(LANG_SWEET_PR);
                                                ?>
                                              </strong></div></td>
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
                                              <td height="33" colspan="4" align="left" valign="bottom"><div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>
                                              <?php
                                                    echo $this->lang->line(LANG_GLEE_PR);
                                                ?>
                                              </strong></div></td>
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
                                              <td height="33" colspan="4" align="left" valign="bottom"><div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>
                                              <?php
                                                    echo $this->lang->line(LANG_HAPPY_PR);
                                                ?>
                                              </strong></div></td>
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
                                              <td height="33" colspan="4" align="left" valign="bottom"><div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>
                                              <?php
                                                    echo $this->lang->line(LANG_LUCKY_PR);
                                                ?>
                                              </strong></div></td>
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
                                              <td height="33" colspan="4" align="left" valign="bottom"><div style="width:100%; height:22px; background-color:#CC9900; color:#930; font-size:15px">&nbsp;<strong>
                                              <?php
                                                    echo $this->lang->line(LANG_BONUS_PR);
                                                ?>
                                              </strong></div></td>
                                          </tr>
                                  <tbody id="tbodybonus">
                                                    <!--load data-->
                                            </tbody>
                                    </table>
                                   </td>
                                </tr>
                      <!--end load data-->
                </table>
              </td>
            </tr>
      </table>       
    </td>
  </tr>
</table>