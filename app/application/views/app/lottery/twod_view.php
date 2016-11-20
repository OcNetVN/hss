<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080; font-size:X-Large;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                       <!--  <a href="<?php //echo base_url('/app/lottry/menu_main') ?>" style="text-decoration: none;"> -->
                       <div style="vertical-align: middle; color: white; cursor: pointer;" onclick="history.back();">
                        <img src="<?php echo base_url('assets/img/app/btn-back.png') ?>" width="45" height="45" alt="Back" />
                        <span style="color:white;">
                        <?php
                             echo $this->lang->line(LANG_2D);
                         ?>
                        </span>
                      </div>
                    </td>
                   <!--  <td align="center">&nbsp;</td> -->
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
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                            <td align="center" height="50px">
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
                    <td align="center" height="50" >
                    	<strong style="padding:5px; border:2px #F30 solid; width: 100px; text-align:center; background-color:#000; color:#FFF">
                        <span id="span_txdayday" style="width:100%;"></span> 
                        <?php
                             echo $this->lang->line(LANG_DAY);
                         ?>
                      </strong>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" style="padding:10px;" >
                    	<p style="background-image: url(<?php echo base_url('assets/img/app/circle_black.png') ?>); width: 100px; height: 100px;">
                        <span style="font-size: 58px; font-weight: bold; color: white; margin-top: 65px;">
                          <span id="spannumday" style="margin-top:10px;"></span>
                        </span>
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                    	<strong style="padding:5px; border:2px #F30 solid; width: 100px; text-align:center; background-color:#06F; color:#FFF">
                        <span id="span_txdaynight" style="width:100%;"></span> 
                        <?php
                             echo $this->lang->line(LANG_NIGHT);
                         ?>
                        </strong>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" style="padding:15px;">
                    	<p style="background-image: url(<?php echo base_url('assets/img/app/circle_blue.png') ?>); width: 100px; height: 100px;">
                        <span style="font-size: 58px; font-weight: bold; color: white;margin-top: 65px;">
                          <span id="spannumnight" style="margin-top:10px;"></span></span>
                      </p> 
                    </td>
                  </tr>
                </table></td>
              </tr>
            </table>       
    </td>
  </tr>
</table>