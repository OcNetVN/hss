<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #2F4F4F;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                         <div style="vertical-align: middle; color: white;padding:10px;font-size:Large;">
                         <?php
                              echo $this->lang->line(LANG_4D_NUMBER_HISTORY);
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
             <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0000EE;" >
                          <tr >
                            <td width="70%" style="padding: 10px;" >
                                <input type="text" class="form-control" id="inputnumber">
                            </td>
                            <td width="20%">
                                <input type="button" value="Search" class="btn btn-primary" style="color:#FFF;font-size:20px;" onclick="SearchHistoryNumber();">
                            </td>
                          </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                     <td style="padding: 10px;">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0"  style="background-color:#FFF;border: 4px solid #333;padding: 20px;height:30px;">                     
                            <tr>
                              <td width="10%" align="center" style="padding:5px;"><input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/icon_damacai.png');?>" type="image" style="width:90%;"></td>
                              <td width="10%" align="center" style="padding:5px;"><input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/icon_magnum.png');?>" type="image" style="width:90%;"></td>
                              <td width="10%" align="center" style="padding:5px;"><input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/icon_toto_MY.png');?>" type="image" style="width:90%;"></td>
                              <td width="10%" align="center" style="padding:5px;"><input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/icon_singapool.png');?>" type="image" style="width:90%;"></td>
                              <td width="10%" align="center" style="padding:5px;" ><input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/icon_cashwep.png');?>" type="image" style="width:90%;"></td>
                              <td width="10%" align="center" style="padding:5px;" ><input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/icon_sahbah88.png');?>" type="image" style="width:90%;"></td>
                              <td width="10%" align="center" style="padding:5px;"><input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/icon_STC4.png');?>" type="image" style="width:90%;"></td>
                            </tr>
                            <tr>
                              <td width="10%" align="center" style="padding:5px;" ><input type="checkbox" id="damacai" value="damacai" style="-ms-transform:scale(1.3);-moz-transform: scale(1.3);-webkit-transform: scale(1.3);-o-transform: scale(1.3)"></td>
                              <td width="10%" align="center" style="padding:5px;"><input type="checkbox" id="magnum" value="magnum" style="-ms-transform:scale(1.3);-moz-transform: scale(1.3);-webkit-transform: scale(1.3);-o-transform: scale(1.3)"></td>
                              <td width="10%" align="center" style="padding:5px;"><input type="checkbox" id="toto" value="toto" style="-ms-transform:scale(1.3);-moz-transform: scale(1.3);-webkit-transform: scale(1.3);-o-transform: scale(1.3)"></td>
                              <td width="10%" align="center" style="padding:5px;"><input type="checkbox" id="sintoto" value="sintoto" style="-ms-transform:scale(1.3);-moz-transform: scale(1.3);-webkit-transform: scale(1.3);-o-transform: scale(1.3)"></td>
                              <td width="10%" align="center" style="padding:5px;"><input type="checkbox" id="cashsweep" value="cashsweep" style="-ms-transform:scale(1.3);-moz-transform: scale(1.3);-webkit-transform: scale(1.3);-o-transform: scale(1.3)"></td>
                              <td width="10%" align="center" style="padding:5px;"><input type="checkbox" id="sabaha88" value="sabaha88" style="-ms-transform:scale(1.3);-moz-transform: scale(1.3);-webkit-transform: scale(1.3);-o-transform: scale(1.3)"></td>
                              <td width="10%" align="center" style="padding:5px;"><input type="checkbox" id="stc4D" value="stc4D" style="-ms-transform:scale(1.3);-moz-transform: scale(1.3);-webkit-transform: scale(1.3);-o-transform: scale(1.3)"></td>
                            </tr>
                          </table>
                     </td>
                  </tr>

                  <tr>
                     <td>
                          <table width="100%" class="table table-hover table-bordered" style="background-color:#FFF;font-size:11px;font-weight:bold;" id="showNumberHistory">
                            <!--
                            <tr>
                               <td width="10%">0001</td>
                               <td width="10%">CON</td>
                               <td width="20%">285/14</td>
                               <td width="20%">18/05/14</td>
                               <td width="10%">Sun</td>
                               <td width="10%" ><input name="" id="" title="Next" src="<?php //echo base_url('assets/img/app/logo-magnum4d.png');?>" type="image" style="width:80%;"></td>
                            </tr>
                            
                            <tr>
                               <td width="10%">0001</td>
                               <td width="10%">SP</td>
                               <td width="20%">285/14</td>
                               <td width="20%">18/05/14</td>
                               <td width="10%">Wed</td>
                               <td width="10%" ><input name="" id="" title="Next" src="<?php //echo base_url('assets/img/app/logo-magnum4d.png');?>" type="image" style="width:80%;"></td>
                            </tr>
                            <tr>
                               <td width="10%">0001</td>
                               <td width="10%">1ST</td>
                               <td width="20%">285/14</td>
                               <td width="20%">18/05/14</td>
                               <td width="10%">Wed</td>
                               <td width="10%" ><input name="" id="" title="Next" src="<?php //echo base_url('assets/img/app/logo-STC-4d.png');?>" type="image" style="width:90%;"></td>
                            </tr>
                            <tr>
                               <td width="10%">0001</td>
                               <td width="10%">1ST</td>
                               <td width="20%">285/14</td>
                               <td width="20%">18/05/14</td>
                               <td width="10%">Wed</td>
                               <td width="10%" ><input name="" id="" title="Next" src="<?php //echo base_url('assets/img/app/logo-STC-4d.png');?>" type="image" style="width:90%;"></td>
                            </tr>
                             <tr>
                               <td width="10%">0001</td>
                               <td width="10%">1ST</td>
                               <td width="20%">285/14</td>
                               <td width="20%">18/05/14</td>
                               <td width="10%">Wed</td>
                               <td width="10%" ><input name="" id="" title="Next" src="<?php //echo base_url('assets/img/app/logo-STC-4d.png');?>" type="image" style="width:90%;"></td>
                            </tr>
                             <tr>
                               <td width="10%">0001</td>
                               <td width="10%">1ST</td>
                               <td width="20%" >285/14</td>
                               <td width="20%">18/05/14</td>
                               <td width="10%">Wed</td>
                               <td width="10%" >
                                <input name="" id="" title="Next" src="<?php //echo base_url('assets/img/app/logo-STC-4d.png');?>" type="image" style="width:90%;"></td>
                            </tr> -->
                          </table>
                     </td>
                  </tr>
            </table>
    </td>
  </tr>
</table>