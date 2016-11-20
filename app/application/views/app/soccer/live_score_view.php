<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #30627b;height: 60px; font-size:Large;position:fixed;z-index: 1;">
            <tbody>
                <tr>
                    <td align="left" width="20%">
                        <div style="vertical-align: middle; color: white; cursor: pointer;" onclick="history.back();">
                            <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/btn-back.png') ?>" style="width:40px;border-width:0px;">
                        </div>
                    </td>
                    <td align="center" width="20%">
                        <div style="vertical-align: middle; color: white;">
                            <?php echo $this->lang->line(LANG_LIVE_SCORE);?>
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
                            <input type="image"  title="Result" src="<?php echo base_url('assets/img/app/result_en.png') ?>" style="width:40px;border-width:0px;">
                            <?php 
                              if($this->lang->line(LANG_EN) == "English")
                              { // tiếng ANh ?>
                                   <span style="font-size: 10px; margin-left: -41px; position: fixed; margin-top: 38px; color: white;"><?="Result" ?></span>  
                                   <?php  }
                              else
                              { // Tiếng tàu ?>
                                 <span style="font-size: 10px; margin-left: -41px; position: fixed; margin-top: 38px;color: white;"><?="成绩"?></span>
                              <?php   } ?> 
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
                            <input type="image" name="" id="" title="Logout" src="<?php echo base_url('assets/img/app/scc_info.png') ?>" style="width:40px;border-width:0px;">
                             <?php 
                              if($this->lang->line(LANG_EN) == "English")
                              { // tiếng ANh ?>
                                   <span style="font-size: 10px; margin-left: -41px; position: fixed; margin-top: 38px;color: white;"><?="Info" ?></span>  
                                   <?php  }
                              else
                              { // Tiếng tàu ?>
                                 <span style="font-size: 10px ;margin-left: -41px; position: fixed; margin-top: 38px;color: white;"><?="信息"?></span>
                              <?php   } ?> 
                        </a>
                         <?php 
                              if($this->lang->line(LANG_EN) == "English")
                              { ?>

                               <a href="<?php echo base_url('/app/soccer/alltable') ?>"> 
                        <?php      
                              }else
                              { ?>
                                <a href="<?php echo base_url('/app/soccer/alltable?lang=2'); ?>">
                        <?php  } ?>
                            <input type="image" name="" id="" title="Table" src="<?php echo base_url('assets/img/app/table_en.png') ?>" style="width:40px;border-width:0px;">
                             <?php 
                              if($this->lang->line(LANG_EN) == "English")
                              { // tiếng ANh ?>
                                   <span style="font-size: 10px; margin-left: -41px; position: fixed; margin-top: 38px;color: white;"><?="Next" ?></span>  
                                   <?php  }
                              else
                              { // Tiếng tàu ?>
                                 <span style="font-size: 10px; margin-left: -41px; position: fixed; margin-top: 38px;color: white;"><?="下页"?></span>
                              <?php   } ?>  
                        </a>
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
            <td style="padding-bottom:40px;padding-top:60px;" id="showInfoEarly">
                 <?php echo $HTMLInfo;?>
            </td>
        </tr>
      </table>
    </td>
  </tr>
</table>