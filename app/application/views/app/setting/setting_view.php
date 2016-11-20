<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #2F4F4F; font-size:X-Large;">
            <tbody>
                <tr>
                    <td width="70%" align="left">
                         <div style="vertical-align: middle; color: white; width: 170px;padding:10px;">
                         <?php
                              echo $this->lang->line(LANG_SETTING);
                          ?>
                         </div>
                    </td>
                    <!-- <td align="center">&nbsp;</td> -->
                    <td width="30%" align="right">
                        <!-- <a href="<?php //echo base_url('/app/menu') ?>">
                            <input type="image" name="" id="" title="Home" src="<?php //echo base_url('assets/img/app/btn-home.png') ?>" style="height:50px;width:50px;border-width:0px;">
                        </a> -->
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
  </tr>
  <tr>
    <td id="tbllistracecard">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-weight:bold;">
        <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0"  style="border-style:solid; border-color:#F60; border-width:1px;">
                <tr align="left">                         
                  <td width="100%" style="padding: 10px;">
                    <?php echo $this->lang->line(LANG_SERIAL_NUMBER);?>
                      (<?php 
                            if(isset($_SESSION['serialNumber']))
                               echo $_SESSION['serialNumber'];
                             else
                                echo " ";
                     ?>)
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                  <td width="90%" style="padding: 10px;" align="left" colspan="2">
                      <?php echo $this->lang->line(LANG_SOUND);?>
                  </td>
                  <td width="10%" style="padding: 10px;" align="right">
                     <a href="#" style="text-decoration: none;">
                      <input type="checkbox" checked="checked" id="check_sound" value="1" style="-ms-transform:scale(1.8);-moz-transform: scale(1.8);-webkit-transform: scale(1.8);-o-transform: scale(1.8)">
                    </a>
                  </td>
                </tr>
                <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                  <td width="90%" style="padding: 10px;" align="left" colspan="2">
                      <?php echo $this->lang->line(LANG_VIBRATION);?>
                  </td>
                  <td width="10%" style="padding: 10px;" align="right">
                     <input type="checkbox" checked="checked" id="check_vibration" value="1" style="-ms-transform:scale(1.8);-moz-transform: scale(1.8);-webkit-transform: scale(1.8);-o-transform: scale(1.8)">
                  </td>
                </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/horse-racing.png'); ?>" type="image" style="height:40px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" >
                        <?php echo $this->lang->line(LANG_HORSE_NOTIFICATIONS);?>
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                      <?php if($this->lang->line(LANG_EN) == "English"){?>
                       <a href="<?php echo base_url('/app/setting/hrsnotification') ?>" style="text-decoration: none;">
                      <?php }else{ ?>
                        <a href="<?php echo base_url('/app/setting/hrsnotification?lang=2') ?>" style="text-decoration: none;">
                      <?php }?>
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image">
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/bing-balls.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" >
                        <?php echo $this->lang->line(LANG_LOTTRY_NOTIFICATIONS);?>
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr>
                   <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/football_icon.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" >
                        <?php echo $this->lang->line(LANG_SOCCER_NOTIFICATIONS);?>
                    </td>

                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/soccnotification') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image">
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="90%" style="padding: 10px;" align="left" colspan="2">
                        <?php echo $this->lang->line(LANG_NOTIFICATIONS);?>
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/historynotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image">
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="90%" style="padding: 10px;" align="left" colspan="2">
                        <?php echo $this->lang->line(LANG_TELL_YOUR_FRIENDS);?>
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/tellyours') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image">
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="90%" style="padding: 10px;" align="left" colspan="2">
                        <?php echo $this->lang->line(LANG_SET_PASSCODE);?>
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <input type="button" id="btn_setpasscode" value="off" class="off" onclick="toggleState(this)" />
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="100%" style="padding: 10px;" align="left" colspan="3">
                      <a href="<?php echo base_url('/app/setting/feedback') ?>" style="text-decoration: none;">
                        <?php echo $this->lang->line(LANG_FEEDBACK);?>
                      </a>
                    </td>
                  </tr>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="100%" style="padding: 10px;" align="left" colspan="3">
                        <?php echo $this->lang->line(LANG_CHECKFORUPDATE);?>
                    </td>
                  </tr>

                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="100%" style="padding: 10px;" align="left" colspan="3">
                        <span style="padding-right:10px;font-weight:bold;" >
                          <a href="<?php echo base_url('/app/setting/aboutus') ?>" style="text-decoration: none;">
                            <?php echo $this->lang->line(LANG_ABOUT_US);?> 
                          </a>
                        </span>
                       <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/icon_net.png') ?>" style="height:40px;width:20%;border-width:0px;">                                
                  
                        
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td width="100%" style="padding: 10px;" align="left" colspan="3">
                        &nbsp;
                      </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td width="100%" style="padding: 10px;" align="center" colspan="3">
                        <?php echo $this->lang->line(LANG_VESRSION);?> 10.0.12
                      </td>
                  </tr >
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td width="100%" style="padding: 10px;" align="left" colspan="3">
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