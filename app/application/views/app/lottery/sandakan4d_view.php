<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080; font-size:XX-Large;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                        <div style="vertical-align: middle; color: white; cursor: pointer;" onclick="history.back();">
                        <img src="<?php echo base_url('assets/img/app/btn-back.png') ?>" width="45" height="45" alt="Back" />
                        <span>
                        <?php
                            echo $this->lang->line(LANG_STC_4D);
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
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:large; color:#FFF; font-weight:bold;">
                    	  <tr>
                    	    <td height="35" bgcolor="#FF6600">
                            <?php
                                echo $this->lang->line(LANG_STC_4D);
                            ?>
                            </td>
                      </tr>
                    	  <tr>
                    	    <td bgcolor="#CCCC33">
                            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    	      			<tr>
                                          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                  <td width="40%" height="63" valign="middle" bgcolor="#666666">
                                                  <?php
                                                        echo $this->lang->line(LANG_LOT_DATE);
                                                  ?>
                                                  :<br>
                                                    <span id="span_date"></span></td>
                                                  <td width="20%" align="center" valign="middle" bgcolor="#666666">
                                                  		<input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/logo-STC-4d.png'); ?>" style="height:80px;border-width:0px;padding: 5px;">
                                                  </td>
                                                  <td width="40%" align="right" valign="middle" bgcolor="#666666">
                                                  <?php
                                                        echo $this->lang->line(LANG_DRAW_NO);
                                                  ?>
                                                  :<br>
                                                    <span id="spandrawno"></span></td>
                                                </tr>
                                                <tr>
                                                  <td height="35" align="center" valign="middle" bgcolor="#333333">
                                                  <?php
                                                        echo $this->lang->line(LANG_1ST);
                                                  ?>
                                                  </td>
                                                  <td height="35" align="center" valign="middle" bgcolor="#333333">
                                                  <?php
                                                        echo $this->lang->line(LANG_2ND);
                                                  ?>
                                                  </td>
                                                  <td height="35" align="center" valign="middle" bgcolor="#333333">
                                                  <?php
                                                        echo $this->lang->line(LANG_3RD);
                                                  ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td height="35" align="center" valign="middle" bgcolor="#666666"><span id="span_1st"></span></td>
                                                  <td height="35" align="center" valign="middle" bgcolor="#666666"><span id="span_2nd"></span></td>
                                                  <td height="35" align="center" valign="middle" bgcolor="#666666"><span id="span_3rd"></span></td>
                                                </tr>
                                              </tbody></table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                  <td height="33" colspan="5" align="center" valign="middle" bgcolor="#333333">
                                                  <?php
                                                        echo $this->lang->line(LANG_SPECIAL);
                                                  ?>
                                                  </td>
                                                  </tr>
                                                  <tbody id="tbody_special">
                                                        <!--load data-->
                                                  </tbody>
                                              </tbody></table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                  <td height="35" colspan="5" align="center" valign="middle" bgcolor="#333333">
                                                  <?php
                                                        echo $this->lang->line(LANG_CONSOLATION);
                                                  ?>
                                                  </td>
                                                  </tr>
                                                <tbody id="tbody_consolation">
                                                        <!--load data-->
                                                  </tbody>  
                                              </tbody></table></td>
                                  </tr>
                            </table></td>
                    </table>
                </td>
              </tr>
            </table>       
    </td>
  </tr>
</table>