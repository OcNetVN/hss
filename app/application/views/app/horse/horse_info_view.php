<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow: hidden;" >
          <tr align="center">
            <td  valign="top" colspan="3" style="overflow: hidden;">          
              <div id="div_Flag_MY" style="display:none;color:black;font-weight:bold; vertical-align: middle; text-align: left; float: left; width:30% ; height: 41px; padding: 0;">
                    <?php 
                        if($this->lang->line(LANG_EN) == "English")
                        { // tiếng ANh ?>
                             <!-- <a href="<?php //echo base_url('/app/horse/horse_info') ?>"> -->
                      <?php  }
                        else
                        { // Tiếng tàu ?>
                             <!-- <a href="<?php //echo base_url('/app/horse/horse_info?lang=2') ?>">  -->
                     <?php   }
                        ?>
                        <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagMalay.png') ?>" style="width:50%;">
                   <!--  </a>  -->
                    <span style="vertical-align: top;" id="time_myflag"></span>
              </div>
              <div id="div_Flag_SG" style="display:none;color:#008000;font-weight:bold; vertical-align: middle; text-align: left; float: left; width:30% ; height: 41px; padding: 0;">
                    <?php 
                        if($this->lang->line(LANG_EN) == "English")
                        { // tiếng ANh ?>
                              <!-- <a href="<?php //echo base_url('app/horse/horse_info?country=SG') ?>"> -->
                      <?php  }
                        else
                        { // Tiếng tàu ?>
                               <!-- <a href="<?php  //echo base_url('app/horse/horse_info?country=SG&lang=2') ?>"> -->
                     <?php   }
                        ?>

                        <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagSing.png') ?>" style="width:50%;">
                        </a> 
                    <span style="vertical-align: top;" id="time_sgflag"></span>
              </div>
              <div id="div_Flag_HK" style="display:none;color:#00F;font-weight:bold; vertical-align: middle; text-align: left; float: left; width:30%; height: 41px;">
                    <?php 
                        if($this->lang->line(LANG_EN) == "English")
                        { // tiếng ANh ?>
                              <!-- <a href="<?php //echo base_url('app/horse/horse_info?country=HK') ?>"> -->
                      <?php  }
                        else
                        { // Tiếng tàu ?>
                               <!-- <a href="<?php //echo base_url('app/horse/horse_info?country=HK&lang=2') ?>"> -->
                     <?php   }
                        ?>

                        <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagHK.png') ?>" style="width:50%;">
                    <!-- </a>  -->
                    <span style="vertical-align: top;" id="time_hkflag"></span>
                </div>
                <div id="div_Flag_MC" style="display:none;color:#00F;font-weight:bold; vertical-align: middle; text-align: left; float: left; width:30%; height: 41px;">
                    <?php 
                        if($this->lang->line(LANG_EN) == "English")
                        { // tiếng ANh ?>
                              <!-- <a href="<?php //echo base_url('app/horse/horse_info?country=MC') ?>"> -->
                      <?php  }
                        else
                        { // Tiếng tàu ?>
                              <!-- <a href="<?php //echo base_url('app/horse/horse_info?country=MC&lang=2') ?>"> -->
                     <?php   }
                        ?>

                        <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagMaCau.png') ?>" style="width:50%;">
                     </a>
                    <span style="vertical-align: top;" id="time_mcflag"></span>
                </div>
                <div id="div_Flag_SA" style="display:none;color:#00F;font-weight:bold; vertical-align: middle; text-align: left; float: left; width:30%; height: 41px;">
                    <?php 
                        if($this->lang->line(LANG_EN) == "English")
                        { // tiếng ANh ?>
                             <!--  <a href="<?php //echo base_url('app/horse/horse_info?country=SA') ?>">  -->
                      <?php  }
                        else
                        { // Tiếng tàu ?>
                              <!-- <a href="<?php //echo base_url('app/horse/horse_info?country=SA&lang=2') ?>"> -->
                     <?php   }
                        ?>

                        <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagSA.png') ?>" style="width:50%;">
                   <!--  </a>  -->
                    <span style="vertical-align: top;" id="time_saflag"></span>
                </div>
                <div id="div_Flag_AU" style="display:none;color:#00F;font-weight:bold; vertical-align: middle; text-align: left; float: left; width:30% ; height: 41px;">
                    <?php 
                        if($this->lang->line(LANG_EN) == "English")
                        { // tiếng ANh ?>
                              <!--  <a href="<?php //echo base_url('app/horse/horse_info?country=AU') ?>"> -->
                      <?php  }
                        else
                        { // Tiếng tàu ?>
                              <!--  <a href="<?php //echo base_url('app/horse/horse_info?country=AU&lang=2') ?>"> -->
                     <?php   }
                        ?>
                        <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagAustralia.png') ?>" style="width:50%;">
                    <!-- </a>  -->
                    <span style="vertical-align: top;" id="time_auflag"></span>
                </div>
                <div id="div_Flag_EU" style="display:none;color:#00F;font-weight:bold; vertical-align: middle; text-align: left; float: left; width:30% ; height: 41px;">
                    <?php 
                        if($this->lang->line(LANG_EN) == "English")
                        { // tiếng ANh ?>
                              <!-- <a href="<?php //echo base_url('app/horse/horse_info?country=EU') ?>">  -->
                      <?php  }
                        else
                        { // Tiếng tàu ?>
                              <!-- <a href="<?php //echo base_url('app/horse/horse_info?country=EU&lang=2') ?>"> -->
                     <?php   }
                        ?>
                        <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagEurope.png') ?>" style="width:50%;">
                    </a> 
                    <span style="vertical-align: top;" id="time_euflag"></span>
                </div>
            </td>
            
          </tr>
        </table>
    </td>
  </tr>
  <!-- <tr>
      <td id="ShowHeader" style="font-size:X-Large;color:black;"></td>
  </tr> -->
  <tr id="trshowHorseWeight" style="display:none;">
     <td id="showsideHorseWeight">
        <table width="100%" border="2" cellspacing="0" cellpadding="0" style="font-size:Large; border: 1px solid black;">
          <tr>
           <!--  <td width="10%" align="center"><?php //echo $this->lang->line(LANG_LANGUAGE_NO); ?></td> -->
            <td width="90%" colspan="6" align="center">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                       <td colspan="3" bgcolor="white" id="ShowHeader" style="font-size:X-Large;color:black;"></td>
                      <!-- <td width="25%"><?php //echo $this->lang->line(LANG_RACE_RACE); ?> <span id="spanraceno"></span></td>
                      <td width="25%" align="center"><span id="spancountry"></span></td>
                      <td width="25%" align="center"><span id="spandate"></span></td>
                      <td width="25%" align="right" style="padding-right: 5px;"><span id="spandayofweek"></span></td> -->
                    </tr>
                </table>
            </td>
          </tr>
          <tbody id="tbody_res">
            <!--load data-->
          </tbody>
        </table>
     </td>
  </tr>
  <tr id="trshowHorseBoard" >
    <td>
    	<table id="tbl_part1" border="1" cellspacing="0" cellpadding="0" width="100%" style="border: 1px solid white;border-color:Black;border-width:0px;border-style:Solid;font-size:X-Large;width:100%;border-collapse:collapse;">
        	<!--load data-->
          <tbody>
            <tr>
                <td colspan="6" style="border-left: 1px solid #FFF;border-right: 1px solid #FFF;">
                </td>
            </tr>
            <tr>
                <td colspan="6" style="border-left: 1px solid #FFF;border-right: 1px solid #FFF;">
                </td>
            </tr>
            <tr>
                <td colspan="6" style="border-left: 1px solid #FFF;border-right: 1px solid #FFF;">
                  
                </td>
            </tr>
            <tr>
                <td colspan="6" style="border-left: 1px solid #FFF;border-right: 1px solid #FFF;">
                  
                </td>
            </tr>
            <tr align="center">
                <td style="color:#F00;border: 1px solid white;" bgcolor="#00a2e8">
                  <strong><?php echo $this->lang->line(LANG_LANGUAGE_NO);?></strong>
                </td>
                <td style="color:#F00;border: 1px solid white;" bgcolor="#00a2e8">
                    <strong><span>&nbsp;</span>
                  </strong>
                </td>
                <td style="color:#F00;border: 1px solid white;" bgcolor="#00a2e8">
                    <strong><span>&nbsp;</span>
                  </strong>
                </td>
                <td style="color:#F00;border: 1px solid white;" bgcolor="#00a2e8">
                    <strong><span>&nbsp;</span>
                  </strong>
                </td>
                <td style="color:#F00;border: 1px solid white;" bgcolor="#00a2e8">
                      <strong><span>&nbsp;</span></strong>
                </td>
                <td style="color:#F00;border: 1px solid white;" bgcolor="#00a2e8">
                    <strong><span>&nbsp;</span></strong>
                </td>
            </tr>
            <tr style="color:#FFF;border: 1px solid white;" ;="" align="center">
                <td style="color:#FFF;border: 1px solid white;" bgcolor="#00a2e8"><strong>RM</strong></td>
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>&nbsp;</strong></td>
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>&nbsp;</strong></td>
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>&nbsp;</strong></td>
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>&nbsp;</strong></td>
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>&nbsp;</strong></td>
            </tr>
            <tr style="color:yellow;" align="center">
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>$</strong></td>
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>&nbsp;</strong></td>
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>&nbsp;</strong></td>
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>&nbsp;</strong></td>
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>&nbsp;</strong></td>
                <td style="border: 1px solid white;" bgcolor="#00a2e8"><strong>&nbsp;</strong></td>
            </tr>
          </tbody>

      </table>
      <table cellspacing="0" cellpadding="1" rules="all" header="" border="0" id="" style="font-size:Large;width:100%;">
        	   
      </table>
        <table cellspacing="0" cellpadding="1" rules="all" style="border-color:Black;border-width:1px;border-style:Solid;font-size:X-Large;width:100%;border-collapse:collapse;">
          <tr align="center">
            <td width="40%" style="color:#FFF; background-color:#00a2e8" colspan="2">
                <span id="" style="display:inline-block;color:#FFF;font-size:XX-Large;font-weight:bold;width:100%;">
                <?php echo $this->lang->line(LANG_LANGUAGE_MAL); ?>
                </span>
            </td>
            <td width="20%" style="border: 1px solid #FFF;">
                <span id="m_timer" style="display:inline-block;color:#F00;ont-size:XX-Large;font-weight:bold;width:100%;">00:00</span>
            </td>
            <td width="40%" style="color:#FFF; background-color:#00a2e8" colspan="2">
                <span id="" style="display:inline-block;color:yellow;font-size:XX-Large;font-weight:bold;width:100%;">
                <?php echo $this->lang->line(LANG_LANGUAGE_SIN); ?>
                </span>
            </td>
        </tr>
        <tbody id="InfoLiveTo" width="100%">
            <!--load data-->
            
        </tbody>   
      </table>  
    </td>
  </tr>
</table>