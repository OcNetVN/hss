<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #30627b; font-size:Large;">
            <tbody>
                <tr>
                    <td align="left" width="20%">
                        <div style="vertical-align: middle; color: white; cursor: pointer;" onclick="history.back();">
                            <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/btn-back.png') ?>" style="width:40px;border-width:0px;">
                        </div>
                    </td>
                    <td align="center" width="20%">
                        <div style="vertical-align: middle; color: white;">
                            LEAGUE TABLES
                         </div>
                    </td>
                    <td  align="right" width="60%">
                      <?php 
                          if($this->lang->line(LANG_EN) == "English")
                          { // tiếng ANh ?>
                       <a href="<?php echo base_url('/app/soccer/result'); ?>"> 
                      <?php  }
                              else
                              { // Tiếng tàu ?>
                                 <a href="<?php echo base_url('/app/soccer/result?lang=2'); ?>">
                      <?php   } ?>
                        <!-- <a href="<?php //echo base_url('/app/soccer/result') ?>"> -->
                            <input type="image" name="" id="" title="Result" src="<?php echo base_url('assets/img/app/soccer_league.png') ?>" style="width:40px;border-width:0px;">
                        </a>
                        <?php 
                              if($this->lang->line(LANG_EN) == "English")
                              { ?>
                               <a href="<?php echo base_url('/app/soccer/soccer_info') ?>"> 
                        <?php      
                              }else
                              { ?>
                                <a href="<?php echo base_url('/app/soccer/soccer_info?lang=2'); ?>">
                        <?php  } ?>
                            <input type="image" name="" id="" title="Logout" src="<?php echo base_url('assets/img/app/table_en.png') ?>" style="width:40px;border-width:0px;">
                        </a>
                         <?php 
                              if($this->lang->line(LANG_EN) == "English")
                              { ?>

                               <a href="<?php echo base_url('/app/soccer/live_score') ?>"> 
                        <?php      
                              }else
                              { ?>
                                <a href="<?php echo base_url('/app/soccer/live_score?lang=2'); ?>">
                        <?php  } ?>
                            <input type="image" name="" id="" title="Table" src="<?php echo base_url('assets/img/app/livesoce.png') ?>" style="width:40px;border-width:0px;">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
  </tr>
  <tr>
    <td id="tbllistracecard">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-weight:bold;" id="tb_load_league">
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" id="tb_load_league">
                  <!-- <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="70%" style="padding: 10px;" align="left">
                       ENGLAND PREMIER LEG
                    </td>
                    <!-- <td width="50%" style="padding: 10px;" align="center"></td> -->
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  <!-- </tr>
                   <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="50%" style="padding: 10px;" align="left">
                       ENGLAND CHAMPIONSHIP
                    </td>
                    <!-- <td width="50%" style="padding: 10px;" align="center">
                        
                    </td> -->
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  <!-- </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="70%" style="padding: 10px;" align="left">
                       ENGLAND LEAGUE ONE
                    </td>
                    <!-- <td width="50%" style="padding: 10px;" align="center"></td> -->
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  <!-- </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="70%" style="padding: 10px;" align="left">
                       ENGLAND LEAGUE TWO
                    </td>
                    <!-- <td width="50%" style="padding: 10px;" align="center"></td> -->
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                 <!--  </tr> 
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="70%" style="padding: 10px;" align="left">
                       ENGLAND CONFERENCE NTL 
                    </td>
                    <!-- <td width="50%" style="padding: 10px;" align="center"></td> -->
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  <!-- </tr> 
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="70%" style="padding: 10px;" align="left">
                       ENGLAND CONFERENCE NTL S
                    </td>
                    <!-- <td width="50%" style="padding: 10px;" align="center"></td> -->
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  <!-- </tr> -->

                 <!--  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="70%" style="padding: 10px;" align="left">
                       ENGLAND CONFERENCE NTL N
                    </td> -->
                    <!-- <td width="50%" style="padding: 10px;" align="center"></td> -->
                    <!-- <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php //echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php //echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="70%" style="padding: 10px;" align="left">
                       ENGLAND NON LEG PREMIER
                    </td>
                    <!-- <td width="50%" style="padding: 10px;" align="center"></td> -->
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  <!-- </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="70%" style="padding: 10px;" align="left">
                       ENGLAND NON LEG DIV ONE
                    </td>
                    <!-- <td width="50%" style="padding: 10px;" align="center"></td> -->
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  <!-- </tr>  -->
              </table>
            </td>
          </tr>
            </table>
    </td>
  </tr>
