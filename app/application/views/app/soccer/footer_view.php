<tr>
  <td style="padding-top:30px;">
    <table width="100%" border="0"  height="60" cellspacing="0" cellpadding="0" style="background-color:#000000;font-size:16px;color:white;position:fixed; bottom:0;height:50px;" >
      <tr style="padding:3;">
        <td width="15%" style="padding:0;">
          <?php 
                  if($this->lang->line(LANG_EN) == "English")
                  { // tiếng ANh ?>
                       <a href="<?php echo base_url('/app/soccer/live'); ?>"> 
          <?php  }
                  else
                  { // Tiếng tàu ?>
                     <a href="<?php echo base_url('/app/soccer/live?lang=2'); ?>">
          <?php   } ?>
          <!-- <a href="<?php //echo base_url('/app/soccer/live') ?>"> -->
            <input type="image" src="<?php echo base_url('assets/img/app/live.png') ?>" style="width:80%;">
             <?php 
                  if($this->lang->line(LANG_EN) == "English")
                  { // tiếng ANh ?>
                       <span style="font-size: 10px;color: white;margin-left: 15px;"><?="Jln" ?></span>  
             <?php  }
                  else
                  { // Tiếng tàu ?>
                     <span style="font-size: 10px;color: white;margin-left: 15px;"><?="滚球" ?></span>
          <?php   } ?> 
          </a>
        </td>
        <td width="15%" style="padding:0;">
          <?php 
                  if($this->lang->line(LANG_EN) == "English")
                  { // tiếng ANh ?>
                       <a href="<?php echo base_url('/app/soccer/main'); ?>"> 
          <?php  }
                  else
                  { // Tiếng tàu ?>
                     <a href="<?php echo base_url('/app/soccer/main?lang=2'); ?>">
          <?php   } ?>
          <!-- <a href="<?php //echo base_url('/app/soccer/main') ?>"> -->
            <input type="image" src="<?php echo base_url('assets/img/app/today.png') ?>" style="width:80%;">
             <?php 
                  if($this->lang->line(LANG_EN) == "English")
                  { // tiếng ANh ?>
                       <span style="font-size: 10px;color: white;margin-left: 10px;"><?="Odds" ?></span>  
             <?php  }
                  else
                  { // Tiếng tàu ?>
                     <span style="font-size: 10px;color: white;margin-left: 10px;"><?="球盤" ?></span>
          <?php   } ?> 
          </a>
        </td>
        <td width="15%" style="padding:0;">
          <?php 
                  if($this->lang->line(LANG_EN) == "English")
                  { // tiếng ANh ?>
                       <a href="<?php echo base_url('/app/soccer/earlymarket'); ?>"> 
          <?php  }
                  else
                  { // Tiếng tàu ?>
                     <a href="<?php echo base_url('/app/soccer/earlymarket?lang=2'); ?>">
          <?php   } ?>
          <!-- <a href="<?php //echo base_url('/app/soccer/earlymarket') ?>"> -->
            <input type="image" src="<?php echo base_url('assets/img/app/early.png') ?>" style="width:80%;">
             <?php 
                  if($this->lang->line(LANG_EN) == "English")
                  { // tiếng ANh ?>
                       <span style="font-size: 9px;color: white;"><?="Early Odds" ?></span>  
             <?php  }
                  else
                  { // Tiếng tàu ?>
                     <span style="font-size: 10px;color: white;"><?="早盤" ?></span>
          <?php   } ?> 
          </a>
        </td>
        <td width="15%" style="padding:0;">
          <?php 
                  if($this->lang->line(LANG_EN) == "English")
                  { // tiếng ANh ?>
                       <a href="<?php echo base_url('/app/soccer/live_score'); ?>"> 
          <?php  }
                  else
                  { // Tiếng tàu ?>
                     <a href="<?php echo base_url('/app/soccer/live_score?lang=2'); ?>">
          <?php   } ?>
          <!--  <a href="<?php //echo base_url('/app/soccer/live_score') ?>"> -->
            <input type="image" src="<?php echo base_url('assets/img/app/live_goal.png') ?>" style="width:80%;">
              <?php 
                  if($this->lang->line(LANG_EN) == "English")
                  { // tiếng ANh ?>
                       <span style="font-size: 10px;margin-left: 10px;color: white;"><?="Score" ?></span>  
             <?php  }
                  else
                  { // Tiếng tàu ?>
                     <span style="font-size: 10px;margin-left: 10px;color: white;"><?="比分" ?></span>
          <?php   } ?> 
          </a>
        </td>
        <td width="15%" style="padding:0;">
          <?php 
                  if($this->lang->line(LANG_EN) == "English")
                  { // tiếng ANh ?>
                       <a href="<?php echo base_url('/app/soccer/ladbrokes_score'); ?>"> 
          <?php  }
                  else
                  { // Tiếng tàu ?>
                     <a href="<?php echo base_url('/app/soccer/ladbrokes_score?lang=2'); ?>">
          <?php   } ?>
            <input type="image" src="<?php echo base_url('assets/img/app/ladbrokes.png') ?>" style="width:80%;">
              <?php 
                  if($this->lang->line(LANG_EN) == "English")
                  { // tiếng ANh ?>
                       <span style="font-size: 7px;margin-left: 5px;color: white;"><?="Ladbrokes" ?></span>  
             <?php  }
                  else
                  { // Tiếng tàu ?>
                     <span style="font-size: 10px;margin-left: 5px;color: white;"><?="立博" ?></span>
          <?php   } ?> 
           </a>
        </td>
      </tr>        
    </table>
  </td>
</tr>
</table>


