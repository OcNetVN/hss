<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080; font-size:X-Large;">
            <tbody>
                <tr>
                    <td width="70%" align="left">
                        <a href="<?php echo base_url('/app/menu') ?>" style="text-decoration: none;"><div style="vertical-align: middle; color: white; width: 170px;">
                         <img src="<?php echo base_url('assets/img/app/btn-back.png') ?>" width="45" height="45" alt="Back" />
                         <?php
                              echo $this->lang->line(LANG_LOTTRY);
                          ?>
                         </div></a>
                    </td>
                    <!-- <td align="center">&nbsp;</td> -->
                    <td width="30%" align="right">
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
    	       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                        <tr align="center">                         
                          <td width="100%" style="padding: 10px;">
                            <a href="<?php echo base_url('/app/lottry/mal_live_draw') ?>">
                          	 <input class="ImageButton2" type="image" name="" id="" title="Mal Live Draw" src="<?php echo base_url($this->lang->line(LANG_MAL_LIVE_IMG)); ?>" style="height:80px;border-width:0px;" />
                            </a>
                            <a href="<?php echo base_url('/app/lottry/sin_live_draw') ?>">
                          	 <input class="ImageButton2" type="image" name="" id="" title="Sin Live Draw" src="<?php echo base_url($this->lang->line(LANG_SIN_LIVE_IMG)); ?>" style="height:80px;border-width:0px;" />
                            </a>
                            <a href="<?php echo base_url('/app/lottry/twod') ?>">
                          	 <input class="ImageButton2" type="image" name="" id="" title="2D" src="<?php echo base_url($this->lang->line(LANG_LIVE_2D_IMG)); ?>" style="height:80px;border-width:0px;" />
                            </a>
                          </td>
                         
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                  		<td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-style:solid; border-color:#F60; border-width:2px;">
                              <tr>
                                <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="100%" colspan="4" align="center" style="padding: 5px;">
                                      <strong style="margin:3px 0px;font-size: 18px;">
                                      <?php
                                           echo $this->lang->line(LANG_WEST_MALAYSIA);
                                       ?>
                                      </strong>
                                    </td>
                                  </tr>
                                  <tr width="100%" align="center">
                                    <td width="25%" style="padding:3px;" >
                                      <a href="<?php echo base_url('/app/lottry/damacaionetree') ?>">
                                        <input class="ImageButton" type="image" name="" id="" title="Damacai" src="<?php echo base_url('assets/img/app/logo-damacai.png') ?>" style="height:65px;border-width:0px;width:80%;" />
                                      </a>
                                    </td>
                                    <td width="25%" style="padding:3px;">
                                      <a href="<?php echo base_url('/app/lottry/magnumfourdjackpot') ?>">
                                        <input class="ImageButton" type="image" name="" id="" title="Magnum 4D" src="<?php echo base_url('assets/img/app/logo-magnum4d.png') ?>" style="height:65px;border-width:0px;width:80%;" />
                                      </a>
                                    </td>
                                    <td width="25%" style="padding:3px;">
                                      <a href="<?php echo base_url('/app/lottry/totofourd') ?>">
                                        <input class="ImageButton" type="image" name="" id="" title="Sport Toto" src="<?php echo base_url('assets/img/app/logo-totoMY.png') ?>" style="height:65px;border-width:0px;width:80%;" />
                                      </a>
                                    </td>
                                    <td width="25%" style="padding:3px;">
                                      <a href="<?php echo base_url('/app/lottry/bigsweep') ?>">
                                        <input class="ImageButton" type="image" name="" id="" title="Big Weep" src="<?php echo base_url('assets/img/app/logo-bigWeepMy.png') ?>" style="height:65px;border-width:0px;width:80%;" />
                                      </a>
                                    </td>
                                  </tr>
                                </table>
                                </td>
                              </tr>
                            </table>
               	    </td>
                  </tr>
                  <tr>
                  		<td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px;">
                    		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-style:solid; border-color:#F60; border-width:2px">
                                  <tr>
                                    <td>
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="100%" colspan="3" align="center" style="padding: 5px;">
                                          <strong style="margin:3px 0px;font-size: 18px;">
                                          <?php
                                               echo $this->lang->line(LANG_LOSIN);
                                           ?>
                                          </strong>
                                        </td>
                                      </tr>
                                      <tr   align="center">
                                        <td width="30%" style="padding:3px;">
                                          <a href="<?php echo base_url('/app/lottry/sintoto') ?>">
                                            <input class="ImageButton" type="image" name="" id="" title="Toto" src="<?php echo base_url('assets/img/app/logo-toto-Sing.png') ?>" style="height:55px;border-width:0px;width:80%;" />
                                          </a>
                                        </td>
                                        <td width="30%" style="padding:3px;">
                                          <a href="<?php echo base_url('/app/lottry/singaporefourd') ?>">
                                            <input class="ImageButton" type="image" name="" id="" title="Sing Pools" src="<?php echo base_url('assets/img/app/Logo-Singapore-pool.png') ?>" style="height:65px;border-width:0px;width:80%;" />
                                          </a>
                                        </td>
                                        <td width="30%" style="padding:3px;">
                                          <a href="<?php echo base_url('/app/lottry/sinsweep') ?>">
                                            <input class="ImageButton" type="image" name="" id="" title="Sweep" src="<?php echo base_url('assets/img/app/logo-sweep-sing.png') ?>" style="height:55px;border-width:0px;width:80%;" />
                                          </a>
                                        </td> 
                                      </tr>
                                    </table>
                                  </td>
                                  </tr>
                              </table>
                     </td>
                  </tr>
                  <tr>
                  		<td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px;">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-style:solid; border-color:#F60; border-width:2px">
                        <tr>
                          <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="100%" colspan="3" align="center" style="padding: 5px;">
                                <strong style="margin:3px 0px;font-size: 18px;">
                                 <?php
                                     echo $this->lang->line(LANG_EAST_MALAYSIA);
                                 ?>
                                </strong></td>
                              </tr>
                              <tr align="center">
                                <td width="35%" style="padding:3px;">
                                  <a href="<?php echo base_url('/app/lottry/sabah') ?>">
                                    <input class="ImageButton" type="image" name="" id="" title="Sabah 88" src="<?php echo base_url('assets/img/app/Logo-Sabah-88.png') ?>" style="height:65px;border-width:0px;width:80%;" />
                                  </a>
                                </td>
                                <td width="35%" style="padding:3px;">
                                  <a href="<?php echo base_url('/app/lottry/sandakanford') ?>">
                                    <input class="ImageButton" type="image" name="" id="" title="STC 4D" src="<?php echo base_url('assets/img/app/logo-STC-4d.png') ?>" style="height:65px;border-width:0px;width:80%;" />
                                  </a>  
                                </td>
                                <td width="35%" style="padding:3px;">
                                  <a href="<?php echo base_url('/app/lottry/cashsweeponethreed') ?>">
                                    <input class="ImageButton" type="image" name="" id="" title="Cash Sweep" src="<?php echo base_url('assets/img/app/logo-cashWeep.png') ?>" style="height:65px;border-width:0px;width:80%;" />
                                  </a>
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