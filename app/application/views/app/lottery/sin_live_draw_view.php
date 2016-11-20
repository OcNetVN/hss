<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080; font-size:Large;">
            <tbody>
                <tr>
                    <td width="80%" align="left">
                       <!--  <a href="<?php //echo base_url('/app/lottry/menu_main') ?>" style="text-decoration: none;"> -->
                          <div style="vertical-align: middle; color: white; " onclick="history.back();">
                            <img src="<?php echo base_url('assets/img/app/btn-back.png') ?>" width="45" height="45" alt="Back" />
                            <span>
                            <?php
                                      echo $this->lang->line(LANG_SIN_LIVE_DRAW);
                                  ?>
                            </span> 
                          </div>
                        </a>
                    </td>
                 
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
             <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:18px;">
                  <tr>
                    <td>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td colspan="3"><span id="spandate"></span></td>
                        </tr>
                        <tr>
                          <td width="30%"></td>
                          <td align="center" width="40%" valign="top" height="65" > 
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr align="center" style="display:none;">
                                      <td width="40px;">
                                          <p style="background-image: url(<?php echo base_url('assets/img/app/circle.png') ?>); width: 40px; height: 40px;">
                                            <span style="font-size: 30px; font-weight: bold; color: white;" id="spantopnumber1"></span>
                                      </td>
                                      <td width="40px;">
                                          <p style="background-image: url(<?php echo base_url('assets/img/app/circle.png') ?>); width: 40px; height: 40px;">
                                            <span style="font-size: 30px; font-weight: bold; color: white;" id="spantopnumber2"></span>
                                      </td>
                                      <td width="40px;">
                                          <p style="background-image: url(<?php echo base_url('assets/img/app/circle.png') ?>); width: 40px; height: 40px;">
                                            <span style="font-size: 30px; font-weight: bold; color: white;" id="spantopnumber3"></span>
                                      </td>
                                      <td width="40px;">
                                          <p style="background-image: url(<?php echo base_url('assets/img/app/circle.png') ?>); width: 40px; height: 40px;">
                                            <span style="font-size: 30px; font-weight: bold; color: white;" id="spantopnumber4"></span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td align="center" colspan="4" style="font-size: 35px; font-weight: bold;display:none;" >
                                          <div class="odometer">0000</div>
                                          <div class="clear" style="clear:both;"></div> 
                                      </td>
                                  </tr>

                                  <tr align="center"  >
                                    <td colspan="4" style="font-size: 35px; font-weight: bold;" >                           
                                        <div id="SrollingNumber" class="counter1" style="font-family: Tahoma;color: white; background: black; width: 150px;height:50px; border-radius:5px;margin: 5px;"></div>                                        
                                    </td>
                                  </tr>

                                  <tr align="center" style="display:none;">
                                    <td colspan="4" style="font-size:35px;font-weight:bold">
                                      <div id="Srolling4D" class="counter1" style="font-family: Tahoma; padding: 4px;color: white; background: black; width: 135px; border-radius:5px;margin: 5px;letter-spacing: 5px;"></div>
                                      <div id="SrollingToTo" class="counter1" style="font-family: Tahoma; padding: 4px;color: white; background: black; width: 70px; border-radius:5px;margin: 5px;letter-spacing: 5px;display:none;"></div>
                                    </td>
                                  </tr>

                              </table>
                          </td>
                          <td width="20%"></td>
                        </tr>
                        <tr>
                          <td width="30%" align="left"></td>
                          <td align="center" valign="top"  height="45" width="60%">
                                <strong style="padding-left:10px; border:2px #F30 solid; width: 200px; text-align:center;padding-right:5px">
                                  <span style="margin:5px;font-size:15px;" id="spanleftnumber"></span>/<span style="margin:5px;font-size:15px;" id="spanrightnumber"></span>
                                </strong>
                                <br>
                          </td>
                          <td width="10%" align="right"></td>
                        </tr>
                    </table>
                  </td>
                  </tr>
                  <tr>
                    <td valign="top">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #006;">
                              <tr>
                                <td width="50%" align="center" bgcolor="#003366" style="color:#FFF;"><strong>
                                <?php
                                     echo $this->lang->line(LANG_1ST_PR);
                                 ?>
                                </strong></td>
                                <td width="50%" align="center" style="border:1px solid #006;"><strong><span id="span1"></span></strong></td>
                              </tr>
                              <tr>
                                <td align="center" bgcolor="#003366" style="color:#FFF;"><strong><?php
                                     echo $this->lang->line(LANG_2ND_PR);
                                 ?></strong></td>
                                <td align="center" style="border:1px solid #006;"><strong><span id="span2"></span></strong></td>
                              </tr>
                              <tr>
                                <td align="center" bgcolor="#003366"  style="color:#FFF;"><strong>
                                <?php
                                     echo $this->lang->line(LANG_3RD_PR);
                                 ?>
                                </strong></td>
                                <td align="center" style="border:1px solid #006;"><strong><span id="span3"></span></strong></td>
                              </tr>
                            </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="50%">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td colspan="2" align="center" bgcolor="#003366" style="color:#FFF">
                                          <strong style="font-size:15px;">
                                             <?php
                                                echo $this->lang->line(LANG_STA_PR);
                                             ?>
                                        </strong>
                                        </td>
                                      </tr>
                                      <tbody id="tbodyspecial">
                                            <!--load data-->
                                      </tbody>
                                    </table>
                            </td>
                            <td valign="top" width="50%">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td colspan="2" align="center" bgcolor="#003366" style="color:#FFF;">
                                          <strong style="font-size:15px;">
                                              <?php
                                                echo $this->lang->line(LANG_CON_PR);
                                              ?>
                                          </strong>
                                        </td>
                                      </tr>
                                      <tbody id="tbodyconsolation">
                                            <!--load data-->
                                      </tbody>
                                </table>
                            </td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="20" valign="top">&nbsp;
                          <table width="100%" border="0" cellspacing="2" cellpadding="5">
                              <tr>
                                <td width="86%" bgcolor="#990000" style="color:#FFF;"> 
                                <?php
                                     echo $this->lang->line(LANG_SINGAPORE);
                                     echo " ";
                                     echo $this->lang->line(LANG_TOTO);
                                 ?>
                                 <br />
                                <span id="spandatetoto"></span></td>
                                <td width="14%" align="center" bgcolor="#990000" style="color:#FFF;">
                                    <div style="border:5px #FFF solid;">
                                      <strong><?php echo $this->lang->line(LANG_TOTO); ?></strong>
                                    </div>
                                </td>
                              </tr>
                            </table>
                           </td>
                      </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="center">
                            <p style="background-image: url(<?php echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                              <span id="spansintoto1" style="font-size: 30px; font-weight: bold; color: white;"></span></p>
                          </td>
                          <td align="center">
                            <p style="background-image: url(<?php echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                              <span id="spansintoto2" style="font-size: 30px; font-weight: bold; color: white;"></span></p>
                          </td>
                          <td align="center">
                            <p style="background-image: url(<?php echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                              <span id="spansintoto3" style="font-size: 30px; font-weight: bold; color: white;"></span></p>
                          </td>
                          <td align="center">
                            <p style="background-image: url(<?php echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                              <span id="spansintoto4" style="font-size: 30px; font-weight: bold; color: white;"></span></p>
                          </td>
                          <td align="center">
                            <p style="background-image: url(<?php echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                              <span id="spansintoto5" style="font-size: 30px; font-weight: bold; color: white;"></span></p>
                          </td>
                          <td align="center">
                            <p style="background-image: url(<?php echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                              <span id="spansintoto6" style="font-size: 30px; font-weight: bold; color: white;"></span></p>
                          </td>
                         <!--  <td align="center">
                            <p style="background-image: url(<?php //echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                              <span id="spansintoto7" style="font-size: 30px; font-weight: bold; color: white;"></span></p>
                          </td> -->
                        </tr>
                        <tr>
                          <td align="center">
                            <p style="background-image: url(<?php echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                              <span style="font-size: 30px; font-weight: bold; color: white;">+</span></p>
                          </td>
                          <td align="center">
                            <p style="background-image: url(<?php echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                              <span id="spansintoto8" style="font-size: 30px; font-weight: bold; color: white;"></span></p>
                          </td>
                          <td align="center">
                            &nbsp;
                          </td>
                          <td align="center">
                            &nbsp;
                          </td>
                          <td align="center">
                            &nbsp;
                          </td>
                          <td align="center">
                            &nbsp;
                          </td>
                          <td align="center">
                            &nbsp;
                          </td>
                        </tr>
                    </table>
                    </td>
                 </tr>
      </table>
    </td>
  </tr>
</table>