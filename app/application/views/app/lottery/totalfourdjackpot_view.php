<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080; font-size:Large;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                        <div style="vertical-align: middle; color: white; cursor: pointer;" onclick="history.back();">
                        <img src="<?php echo base_url('assets/img/app/btn-back.png') ?>" width="45" height="45" alt="Back" />
                        <span>
                        <?php
                             echo $this->lang->line(LANG_TOTO4D_JACKPOT);
                         ?>
                        </span>
                        </div>
                    </td>
                    <!-- <td align="center">&nbsp;</td> -->
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
                    </table>
                </td>
              </tr>
              <tr>
                <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:large;">
                    	<tr>
                    	    <td bgcolor="#FF0000" style="color:#FFF;font-weight:bold;">
                            <?php
                                 echo $this->lang->line(LANG_TOTO4D_JACKPOT);
                             ?>
                            </td>
                      </tr>
                    	<tr>
                    	    <td height="30" bgcolor="#CCCC33">
                            	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#FFF;">
                    	      			<tr>
                                      <td valign="top">
                                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                  <td width="40%" height="63" valign="middle" bgcolor="#666666">
                                                  <?php
                                                     echo $this->lang->line(LANG_LOT_DATE);
                                                 ?>
                                                  :<br>
                                                    <span id="span_date"></span></td>
                                                  <td width="20%" align="center" valign="middle" bgcolor="#666666">
                                                  		<input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/logo-totoMY.png') ?>" style="height:80px;border-width:0px;">
                                                  </td>
                                                  <td width="40%" align="right" valign="middle" bgcolor="#666666">
                                                  <?php
                                                     echo $this->lang->line(LANG_DRAW_NO);
                                                 ?>
                                                  :<br>
                                                    <span id="spandrawno"></span></td>
                                                </tr>
                                                <tr>
                                                  <td height="30" align="center" valign="middle" bgcolor="#333333">
                                                   <?php
                                                     echo $this->lang->line(LANG_1ST);
                                                 ?>
                                                  </td>
                                                  <td height="30" align="center" valign="middle" bgcolor="#333333">
                                                  <?php
                                                     echo $this->lang->line(LANG_2ND);
                                                 ?></td>
                                                  <td height="30" align="center" valign="middle" bgcolor="#333333">
                                                  <?php
                                                     echo $this->lang->line(LANG_3RD);
                                                 ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td height="30" align="center" valign="middle" bgcolor="#666666"><span id="span_1st"></span></td>
                                                  <td height="30" align="center" valign="middle" bgcolor="#666666"><span id="span_2nd"></span></td>
                                                  <td height="30" align="center" valign="middle" bgcolor="#666666"><span id="span_3rd"></span></td>
                                                </tr>
                                              </tbody>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                              <tr>
                                                  <td height="30" colspan="5" align="center" valign="middle" bgcolor="#333333">
                                                  <?php
                                                     echo $this->lang->line(LANG_SPECIAL);
                                                 ?>
                                                  </td>
                                              </tr>
                                              <tbody id="tbody_special">
                                                            <!--load data-->
                                              </tbody>
                                            </tbody>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                             <tbody>
                                                <tr>
                                                  <td height="30" colspan="5" align="center" valign="middle" bgcolor="#333333">
                                                  <?php
                                                     echo $this->lang->line(LANG_CONSOLATION);
                                                 ?>
                                                  </td>
                                                  </tr>
                                                  <tbody id="tbody_consolation">
                                                            <!--load data-->
                                                  </tbody>
                                              </tbody>
                                          </table>
                                        </td>
                                  </tr>
                            </table></td>
                      	 </tr>
                    	 <tr>
                    	    <td height="30" >&nbsp;</td>
                    	</tr>
                    </table>
                </td>
              </tr>
              <tr>
              	<td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
              	  <tr>
              	    <td height="30" colspan="3" align="center" bgcolor="#333333" style="color:#FFF;">
                      <strong>
                        <?php
                             echo $this->lang->line(LANG_TOTO4D_JACKPOT);
                         ?>
                      </strong>
                    </td>
           	      </tr>
              	  <tr>
              	    <td width="30%" height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                      <?php
                           echo $this->lang->line(LANG_JACKPOT_1);
                       ?>
                    </td>
              	    <td colspan="2" width="70%" height="30" align="center" style="color:#F00;border:1px solid #903;">
                      <strong>RM <span id="spanrmjp1"></span></strong>
                    </td>
           	      </tr>
                  <tr >
                      <td width="30%" align="center" style="border:1px solid #903;"><strong id="Jack_4D_1_1"></strong></td>
                      <td width="30%" align="center" style="border:1px solid #903;"><strong id="Jack_4D_1_2"></strong></td>
                      <td width="30%" align="center" style="border:1px solid #903;"><strong id="Jack_4D_1_3"></strong></td>
                  </tr>
                  <tr >
                    <td width="30%" align="center" style="border:1px solid #903;"><strong id="Jack_4D_2_1"></strong></td>
                    <td width="30%" align="center" style="border:1px solid #903;"><strong id="Jack_4D_2_2"></strong></td>
                    <td width="30%" align="center" style="border:1px solid #903;"><strong id="Jack_4D_2_3"></strong></td>
                  </tr>
              	  <tr>
              	    <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                    <?php
                         echo $this->lang->line(LANG_JACKPOT_2);
                     ?>
                    </td>
              	    <td colspan="2" height="30" align="center" style="color:#F00;border:1px solid #903;"><strong>RM <span id="spanrmjp2"></span></strong></td>
           	      </tr>
           	    </table></td>
              </tr>
              <tr>
              	<td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
              	  <tr>
              	    <td height="30" colspan="4" align="center" bgcolor="#333333" style="color:#FFF;"><strong>
                    <?php
                         echo $this->lang->line(LANG_TOTO5D);
                     ?>
                    </strong></td>
           	      </tr>
              	  <tr>
              	    <td width="15%" height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                    <?php
                         echo $this->lang->line(LANG_1ST_PR);
                     ?></td>
              	    <td width="35%" height="30" align="center" style="border:1px solid #903;"><span id="span5d1"></span></td>
              	    <td width="15%" height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                    <?php
                         echo $this->lang->line(LANG_4TH_PR);
                     ?>
                    </td>
              	    <td width="35%" height="30" align="center" style="border:1px solid #903;"><span id="span5d4"></span></td>
           	      </tr>
              	  <tr>
              	    <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                    <?php
                         echo $this->lang->line(LANG_2ND_PR);
                     ?>
                    </td>
              	    <td height="30" align="center" style="border:1px solid #903;"><span id="span5d2"></span></td>
              	    <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                    <?php
                         echo $this->lang->line(LANG_5TH_PR);
                     ?>
                    </td>
              	    <td height="30" align="center" style="border:1px solid #903;"><span id="span5d5"></span></td>
           	      </tr>
              	  <tr>
              	    <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                    <?php
                         echo $this->lang->line(LANG_3RD_PR);
                     ?>
                    </td>
              	    <td height="30" align="center" style="border:1px solid #903;"><span id="span5d3"></span></td>
              	    <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                    <?php
                         echo $this->lang->line(LANG_7TH_PR);
                     ?>
                    </td>
              	    <td height="30" align="center" style="border:1px solid #903;"><span id="span5d6"></span></td>
           	      </tr>
           	    </table></td>
              </tr>
              <tr>
              	<td>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30" colspan="4" align="center" bgcolor="#333333" style="color:#FFF;"><strong>
                        <?php
                             echo $this->lang->line(LANG_TOTO6D);
                         ?>
                        </strong></td>
                      </tr>
                      <tr>
                        <td width="15%" height="30" align="center" bgcolor="#999999" style="border:1px solid #903;"> <?php
                             echo $this->lang->line(LANG_1ST_PR);
                         ?></td>
                        <td height="30" colspan="3" align="center" style="border:1px solid #903;"><span id="span6d1"></span></td>
                      </tr>
                      <tr>
                        <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;"> <?php
                             echo $this->lang->line(LANG_2ND_PR);
                         ?></td>
                        <td width="35%" height="30" align="center" style="border:1px solid #903;"><span id="span6d2"></span></td>
                        <td width="15%" height="30" align="center" bgcolor="#999999" style="border:1px solid #903;"> <?php
                             echo $this->lang->line(LANG_OR);
                         ?></td>
                        <td width="35%" height="30" align="center" style="border:1px solid #903;"><span id="span6d22"></span></td>
                      </tr>
                      <tr>
                        <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;"> <?php
                             echo $this->lang->line(LANG_3RD_PR);
                         ?></td>
                        <td height="30" align="center" style="border:1px solid #903;"><span id="span6d3"></span></td>
                        <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;"> <?php
                             echo $this->lang->line(LANG_OR);
                         ?></td>
                        <td height="30" align="center" style="border:1px solid #903;"><span id="span6d33"></span></td>
                      </tr>
                      <tr>
                        <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;"> <?php
                             echo $this->lang->line(LANG_4TH_PR);
                         ?></td>
                        <td height="30" align="center" style="border:1px solid #903;"><span id="span6d4"></span></td>
                        <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;"> <?php
                             echo $this->lang->line(LANG_OR);
                         ?></td>
                        <td height="30" align="center" style="border:1px solid #903;"><span id="span6d44"></span></td>
                      </tr>
                      <tr>
                        <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;"> <?php
                             echo $this->lang->line(LANG_5TH_PR);
                         ?></td>
                        <td height="30" align="center" style="border:1px solid #903;"><span id="span6d5"></span></td>
                        <td height="30" align="center" bgcolor="#999999" style="border:1px solid #903;"> <?php
                             echo $this->lang->line(LANG_OR);
                         ?></td>
                        <td height="30" align="center" style="border:1px solid #903;"><span id="span6d55"></span></td>
                      </tr>
                    </table>
                </td>
              </tr>
              <tr>
              	<td>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30" colspan="2" align="center" bgcolor="#333333" style="color:#FFF;"><strong>
                        <?php
                            echo $this->lang->line(LANG_GRAND_TOTO_663);
                        ?>
                        </strong></td>
                      </tr>
                      <tr>
                        <td height="30" colspan="2" align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="15%" align="center" style="border:1px solid #903;"><span id="spangrand1"></span></td>
                                <td width="18%" height="30" align="center" style="border:1px solid #903;"><span id="spangrand2"></span></td>
                                <td width="17%" align="center" style="border:1px solid #903;"><span id="spangrand3"></span></td>
                                <td width="16%" align="center" style="border:1px solid #903;"><span id="spangrand4"></span></td>
                                <td width="17%" align="center" style="border:1px solid #903;"><span id="spangrand5"></span></td>
                                <td width="17%" align="center" style="border:1px solid #903;"><span id="spangrand6"></span></td>
                              </tr>
                            </table>
                        </td>
                      </tr>
                      <tr>
                        <td width="30%" height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                        <?php
                            echo $this->lang->line(LANG_JACKPOT);
                        ?>
                        </td>
                        <td width="70%" height="30" align="center" style="color:#F00;border:1px solid #903;"><strong>RM <span id="spangrandrm"></span></strong></td>
                      </tr>
                    </table>
              	</td>
              </tr>
              <tr>
              	<td>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30" colspan="2" align="center" bgcolor="#333333" style="color:#FFF;"><strong>
                        <?php
                            echo $this->lang->line(LANG_POWER_TOTO_655);
                        ?>
                        </strong></td>
                      </tr>
                      <tr>
                        <td height="30" colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="15%" align="center" style="border:1px solid #903;"><span id="spanpower1"></span></td>
                            <td width="18%" height="30" align="center" style="border:1px solid #903;"><span id="spanpower2"></span></td>
                            <td width="17%" align="center" style="border:1px solid #903;"><span id="spanpower3"></span></td>
                            <td width="16%" align="center" style="border:1px solid #903;"><span id="spanpower4"></span></td>
                            <td width="17%" align="center" style="border:1px solid #903;"><span id="spanpower5"></span></td>
                            <td width="17%" align="center" style="border:1px solid #903;"><span id="spanpower6"></span></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td width="30%" height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                        <?php
                            echo $this->lang->line(LANG_JACKPOT);
                        ?>
                        </td>
                        <td width="70%" height="30" align="center" style="color:#F00;border:1px solid #903;"><strong>RM <span id="spanpowerrm"></span></strong></td>
                      </tr>
                    </table>
              	</td>
              </tr>
              <tr>
              	<td>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30" colspan="2" align="center" bgcolor="#333333" style="color:#FFF;"><strong>
                        <?php
                            echo $this->lang->line(LANG_SURPREM_TOTO_658);
                        ?>
                        </strong></td>
                      </tr>
                      <tr>
                        <td height="30" colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="15%" align="center" style="border:1px solid #903;"><span id="spansupreme1" ></span></td>
                            <td width="18%" height="30" align="center" style="border:1px solid #903;"><span id="spansupreme2"></span></td>
                            <td width="17%" align="center" style="border:1px solid #903;"><span id="spansupreme3"></span></td>
                            <td width="16%" align="center" style="border:1px solid #903;"><span id="spansupreme4"></span></td>
                            <td width="17%" align="center" style="border:1px solid #903;"><span id="spansupreme5"></span></td>
                            <td width="17%" align="center" style="border:1px solid #903;"><span id="spansupreme6"></span></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td width="30%" height="30" align="center" bgcolor="#999999" style="border:1px solid #903;">
                        <?php
                            echo $this->lang->line(LANG_JACKPOT);
                        ?>
                        </td>
                        <td width="70%" height="30" align="center" style="color:#F00;border:1px solid #903;"><strong>RM <span id="spansupremerm"></span></strong></td>
                      </tr>
                    </table>
              	</td>
              </tr>
            </table>       
    </td>
  </tr>
</table>