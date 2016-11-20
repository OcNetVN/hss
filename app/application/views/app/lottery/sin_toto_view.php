<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080; font-size:Large;">
            <tbody>
                <tr>
                    <td width="80%" align="left">
                        <div style="vertical-align: middle; color: white; cursor: pointer;" onclick="history.back();">
                        <img src="<?php echo base_url('assets/img/app/btn-back.png') ?>" width="45" height="45" alt="Back" />
                          <span>
                          <?php
                               echo $this->lang->line(LANG_SIN_TOTO);
                           ?>
                          </span>
                        </div>
                    </td>
                    <!-- <td width="20%" align="center">&nbsp;</td> -->
                    <td width="20%" align="right">
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
                        <td height="35" align="center" valign="bottom"><strong>
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
                      <tr>
                        <td height="50" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="86%" height="35" bgcolor="#993300">
                                  <strong style="color:#FFF;">
                                  <?php
                                     echo $this->lang->line(LANG_SIN_TOTO);
                                 ?>
                                  </strong>
                                </td>
                                <td width="14%" height="35" rowspan="2" align="right" bgcolor="#993300">
                                	<input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/logo-toto-Sing.png') ?>" style="height:80px;border-width:0px;padding: 10px;">
                                </td>
                              </tr>
                              <tr>
                                <td height="35" bgcolor="#993300">
                                  <span style="color:#FFF;font-size:X-Large;font-weight:bold;" id="span_date"></span>&nbsp;&nbsp;
                                  <strong style="color:#FFF;font-weight:bold;">
                                  <?php
                                      echo $this->lang->line(LANG_DRAW_NO);
                                  ?>
                                  </strong>&nbsp;<span id="spandrawno" style="color:#FFF;font-weight:bold;"></span>
                                </td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td>

                              <table width='100%' style="border:2px; border-collapse: collapse;border: 1px solid #A90034;" id="tbWinNo" >
                                <tbody>
                                  <tr>
                                    <td align="center"  colspan="6" bgcolor="#A90034" style="color:white;">
                                      <?php
                                        echo $this->lang->line(LANG_WINNING_NUMBERS);                     
                                      ?>
                                   </td>
                                 </tr>
                                  <tr>
                                    <td style="vertical-align:top; width:16%;"><strong></strong></td>
                                    <td style="vertical-align:top; width:16%;"><strong></strong></td>
                                    <td style="vertical-align:top; width:16%;"><strong></strong></td>
                                    <td style="vertical-align:top; width:16%;"><strong></strong></td>
                                    <td style="vertical-align:top; width:16%;"><strong></strong></td>
                                    <td style="vertical-align:top; width:16%;"><strong></strong></td>
                                  </tr>
                                </tbody>
                              </table>
                              <br>
                              <table width='100%' style="border: 1px solid #A90034; border-collapse:collapse;">
                                <tbody>
                                  <tr>
                                    <td align="center"  bgcolor="#A90034" style="color:white">
                                    <?php
                                        echo $this->lang->line(LANG_ADDITIONAL_NUMBERS);                     
                                      ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="vertical-align:top;" >
                                       <strong id="s_addNumber"></strong>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <br>
                              <table width='100%' style="border: 1px solid #A90034; border-collapse:collapse;">
                                <tbody>
                                  <tr>
                                    <td align="center"  bgcolor="#A90034" style="color:white">
                                    <?php
                                        echo $this->lang->line(LANG_JACKPOT_PR);                     
                                      ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="vertical-align:top;" >
                                       <strong id="s_Amount"></strong>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <br>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <table border="1" width='100%' style="border-color:#CC3300;border-width:1px;border-style:solid;border-collapse:collapse;border: 1px solid #A90034;" id="tbGroup">
                                <tbody>
                                    <tr>
                                      <td colspan="3" align="center" style="font-weight:bold;height:20px;">
                                          <?php
                                            echo $this->lang->line(LANG_WINNING_SHARES);                     
                                          ?>
                                          
                                      </td>
                                    </tr>
                                    <tr>
                                      <td align="center"><strong>
                                      <?php
                                            echo $this->lang->line(LANG_PRIZE_GRP);                     
                                      ?>
                                      </strong></td>
                                      <td align="center"><strong>
                                      <?php
                                            echo $this->lang->line(LANG_SHARE_AMT);                     
                                      ?>
                                      </strong></td>
                                      <td align="center" ><strong>
                                      <?php
                                            echo $this->lang->line(LANG_NO_OF_WIN_SHARE);                     
                                      ?>
                                      </strong></td>
                                    </tr>
                                    <tr>
                                        <td  align="center"><strong>
                                        <?php
                                            echo $this->lang->line(LANG_GRP_1);                     
                                        ?>
                                        </strong></td>
                                        <td  align="center"><strong id="tdGroup1"></strong></td>
                                        <td  align="center"><strong id="tdWinner1"></strong></td>
                                    </tr>
                                     <tr >
                                        <td  align="center"><strong><?php
                                            echo $this->lang->line(LANG_GRP_2);                     
                                        ?></strong></td>
                                        <td  align="center"><strong id="tdGroup2"></strong></td>
                                        <td  align="center"><strong id="tdWinner2"></strong></td>
                                      </tr>
                                      <tr >
                                        <td  align="center"><strong>
                                        <?php
                                            echo $this->lang->line(LANG_GRP_3);                     
                                        ?>
                                        </strong></td>
                                        <td  align="center"><strong id="tdGroup3"></strong></td>
                                        <td  align="center"><strong id="tdWinner3"></strong></td>
                                      </tr>
                                      <tr >
                                        <td  align="center"><strong>
                                        <?php
                                            echo $this->lang->line(LANG_GRP_4);                     
                                        ?>
                                        </strong></td>
                                        <td  align="center"><strong id="tdGroup4"></strong></td>
                                        <td  align="center"><strong id="tdWinner4"></strong></td>
                                      </tr>
                                      <tr >
                                        <td  align="center"><strong>
                                        <?php
                                            echo $this->lang->line(LANG_GRP_5);                     
                                        ?>
                                        </strong></td>
                                        <td  align="center"><strong id="tdGroup5"></strong></td>
                                        <td  align="center"><strong id="tdWinner5"></strong></td>
                                      </tr>
                                      <tr >
                                        <td  align="center"><strong>
                                        <?php
                                            echo $this->lang->line(LANG_GRP_6);                     
                                        ?>
                                        </strong></td>
                                        <td  align="center"><strong id="tdGroup6"></strong></td>
                                        <td  align="center"><strong id="tdWinner6"></strong></td>
                                      </tr>
                                      <tr >
                                        <td  align="center"><strong>
                                        <?php
                                            echo $this->lang->line(LANG_GRP_7);                     
                                        ?>
                                        </strong></td>
                                        <td  align="center"><strong id="tdGroup7"></strong></td>
                                        <td  align="center"><strong id="tdWinner7"></strong></td>
                                      </tr>
                                  </tbody>  
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
    </td>
  </tr>
</table>