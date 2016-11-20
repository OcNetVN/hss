<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #2F4F4F; font-size:X-Large;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                         <div style="vertical-align: middle; color: white;padding:10px;">
                         <?php
                              echo $this->lang->line(LANG_SOCCER_NOTIFICATIONS);
                          ?>
                         </div>
                    </td>
                    <td width="10%" align="right">
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
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                          <!-- <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                            <td width="90%" style="padding: 10px;" align="left" colspan="2">
                                <?php //echo $this->lang->line(LANG_SOUND);?>
                            </td>
                            <td width="10%" style="padding: 10px;" align="right">
                               <a href="#" style="text-decoration: none;">
                                <input type="checkbox" checked="checked">
                              </a>
                            </td>
                          </tr>
                          <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                            <td width="90%" style="padding: 10px;" align="left" colspan="2">
                                <?php //echo $this->lang->line(LANG_VIBRATION);?>
                            </td>
                            <td width="10%" style="padding: 10px;" align="right">
                               <input type="checkbox" checked="checked">
                            </td>
                          </tr> -->
                          <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                            <td width="90%" style="padding: 10px;" align="left" colspan="2">
                                <?php echo $this->lang->line(LANG_GOAL);?>
                            </td>
                            <td width="10%" style="padding: 10px;" align="right">
                               <input type="checkbox" checked="checked" id="check_goal" style="-ms-transform:scale(1.8);-moz-transform: scale(1.8);-webkit-transform: scale(1.8);-o-transform: scale(1.8)">
                            </td>
                          </tr>
                          <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                            <td width="90%" style="padding: 10px;" align="left" colspan="2">
                                <?php echo $this->lang->line(LANG_TIPS);?>
                            </td>
                            <td width="10%" style="padding: 10px;" align="right">
                               <input type="checkbox" checked="checked" id="check_soccer_tips" style="-ms-transform:scale(1.8);-moz-transform: scale(1.8);-webkit-transform: scale(1.8);-o-transform: scale(1.8)">
                            </td>
                          </tr>
                      </table>
                    </td>
                  </tr>
            </table>
    </td>
  </tr>
</table>