<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080; font-size:X-Large;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                        <!-- <a href="<?php //echo base_url('/app/lottry/menu_main') ?>" style="text-decoration: none;"> -->
                            <div style="vertical-align: middle; color: white;" onclick="history.back();">
                                <img src="<?php echo base_url('assets/img/app/btn-back.png') ?>" width="45" height="45" alt="Back" />
                                <span>
                                <?php
                                      echo $this->lang->line(LANG_MAL_LIVE_DRAW);
                                  ?>
                                </span>
                                <span style="display: none;" id="spanLang"><?php
                                      echo $this->lang->line(LANG_EN);
                                  ?></span>
                            </div>
                        <!-- </a> -->
                    </td>
                  <!--   <td align="center">&nbsp;</td> -->
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
    <td id="tbllistracecard">
    	       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:18px;">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="3"><span id="spandate"></span></td>
                      </tr>
                      <tr>
                        <td wdith="48%">&nbsp;</td>
                        <td align="center" wdith="48%">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr align="center" style="display:none;">
                                    <td width="40px;">
                                        <p style="background-image: url(<?php echo base_url('assets/img/app/circle.png') ?>); width: 40px; height: 40px;">
                                            <span style="font-size: 35px; font-weight: bold; color: white;" id="spantopnumber1"></span>
                                    </td>
                                    <td width="40px;">
                                        <p style="background-image: url(<?php echo base_url('assets/img/app/circle.png') ?>); width: 40px; height: 40px;">
                                            <span style="font-size: 35px; font-weight: bold; color: white;" id="spantopnumber2"></span>
                                    </td>
                                    <td width="40px;">
                                        <p style="background-image: url(<?php echo base_url('assets/img/app/circle.png') ?>); width: 40px; height: 40px;">
                                            <span style="font-size: 35px; font-weight: bold; color: white;" id="spantopnumber3"></span>
                                    </td>
                                    <td width="40px;">
                                        <p style="background-image: url(<?php echo base_url('assets/img/app/circle.png') ?>); width: 40px; height: 40px;">
                                            <span style="font-size: 35px; font-weight: bold; color: white;" id="spantopnumber4"></span>
                                    </td>
                                </tr>
                                <tr align="center"  style="display:none;">
                                    <td colspan="4" style="font-size: 35px; font-weight: bold;" >                           
                                        <div id="odometer" class="digits">0000</div>
                                        <div class="clear" style="clear:both;"></div>                                        
                                    </td>
                                </tr>
                                <tr align="center" >
                                    <td colspan="4" style="font-size: 35px; font-weight: bold;" >                           
                                        <div id="SrollingNumber" class="counter1" style="font-family: Tahoma;color: white; background: black; width: 150px;height:50px; border-radius:5px;margin: 5px;"></div>                                       
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="bottom" colspan="3" height="30px">
                        	<strong style="padding-left:5px; border:2px #F30 solid; width: 100px; text-align:center;padding-right:5px">
                                <span style="margin:5px;" id="spanleftnumber"></span>/<span style="margin:5px;" id="spanrightnumber"></span>
                            </strong>
                        <br>
                        </td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
                              <tr>
                                <td valign="top" height="55px">
                                    <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/logo-magnum4d.png') ?>" style="height:50px;width:50px;border-width:0px;" />
                                </td>
                                <td align="center" valign="top">
                                    <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/logo-damacai.png') ?>" style="height:50px;width:50px;border-width:0px;" />
                                </td>
                                <td align="right" valign="top">
                                    <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/logo-totoMY.png') ?>" style="height:50px;width:50px;border-width:0px;" />
                                </td>
                              </tr>
                              <tr>
                                <td valign="top">
                                    <table>
                                        <tr>
                                            <td id="str_magnum1">
                                            </td>
                                            <td><p id="magnum1" style="color:#FFF;width: 52px; background-color:#000; font-size:22px;"></p></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" id="str_magnum2">
            
                                            </td>
                                            <td ><p id="magnum2" style="color:#FFF;width: 52px; background-color:#000; font-size:22px;"></p></td>
                                        </tr>
                                        <tr>
                                            <td  id= "str_magnum3">
                                                <!-- <p id= "str_magnum3"style="color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 54px;font-size:15px;"> -->
                                                <?php 
                                                    //echo $this->lang->line(LANG_3RD);
                                                ?>
                                              <!--   </p> -->
                                            </td>
                                            <td><p id="magnum3" style="color:#FFF;width: 52px; background-color:#000; font-size:22px;"></p></td>
                                        </tr>
                                        <tbody id="tbodymagnum">
                                            <!--load data-->
                                        </tbody>
                                        
                                    </table>
                                 
                                </td>
                                
                                <td align="center" valign="top">
                                    <table>
                                        <tr>
                                            <td id="str_dmc1">
                                               <!--  <p id="str_dmc1" style="color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 54px;font-size:15px;"> -->
                                                <?php 
                                                    //echo $this->lang->line(LANG_1ST);
                                                ?><!-- </p> -->
                                            </td>
                                            <td><p id="dmc1" style="color:#FFF;width: 52px; background-color:#000; font-size:22px;"></p></td>
                                        </tr>
                                        <tr>
                                            <td id="str_dmc2">
                                                <!-- <p id="str_dmc2" style="color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 54px;font-size:15px;"><?php 
                                                    //echo $this->lang->line(LANG_2ND);
                                                ?></p> -->
                                            </td>
                                            <td><p id="dmc2" style="color:#FFF;width: 52px; background-color:#000; font-size:22px;"></p></td>
                                        </tr>
                                        <tr>
                                            <td  id="str_dmc3" >
                                                <!-- p id="str_dmc3" style="color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 54px;font-size:15px;"><?php 
                                                    //echo $this->lang->line(LANG_3RD);
                                                ?></p> -->
                                            </td>
                                            <td><p id="dmc3" style="color:#FFF;width: 52px; background-color:#000; font-size:22px;"></p></td>
                                        </tr>
                                        <tbody id="tbodydamacai">
                                            <!--load data-->
                                        </tbody>
                                    </table>
                                </td>
                                
                                <td align="right" valign="top">
                                    <table>
                                        <tr>
                                            <td id="str_toto1">
                                                <!-- <p id="str_toto1" style="color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 54px;font-size:15px;"><?php 
                                                    //echo $this->lang->line(LANG_1ST);
                                                ?></p> -->
                                            </td>
                                            <td><p id="toto1" style="color:#FFF;width: 52px; background-color:#000; font-size:22px;"></p></td>
                                        </tr>
                                        <tr>
                                            <td id="str_toto2">
                                                <!-- <p id="str_toto2" style="color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 54px;font-size:15px;"><?php 
                                                    //echo $this->lang->line(LANG_2ND);
                                                ?></p> -->
                                            </td>
                                            <td><p id="toto2" style="color:#FFF;width: 52px; background-color:#000; font-size:22px;"></p></td>
                                        </tr>
                                        <tr>
                                            <td id="str_toto3">
                                                <!-- <p id="str_toto3" style="color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 54px;font-size:15px;"><?php 
                                                    //echo $this->lang->line(LANG_3RD);
                                                ?></p> -->
                                            </td>
                                            <td><p id="toto3" style="color:#FFF;width: 52px; background-color:#000; font-size:22px;"></p></td>
                                        </tr>
                                         <tbody id="tbodytoto">
                                            <!--load data-->
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