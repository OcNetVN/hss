<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #30627b; font-size:X-Large;position:fixed; top:0;">
            <tbody>
                <tr>
                    <td  align="left" width="20%">
                      <a href="<?php echo base_url('/app/menu') ?>">
                        <input type="image" name="" id="" title="Back" src="<?php echo base_url('assets/img/app/btn-back.png') ?>"  style="width:50px;border-width:0px;">
                      </a>  
                    </td>
                    <td align="center" width="20%">
                        <div style="vertical-align: middle; color: white;">
                              <b><?php echo $this->lang->line(LANG_TODAY);?></b>
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
                       <!--  <a href="<?php //echo base_url('/app/soccer/result') ?>"> -->
                            <input type="image" name="" id="" title="Result" src="<?php echo base_url('assets/img/app/result_en.png') ?>" style="width:50px;border-width:0px;">
                             <?php 
                              if($this->lang->line(LANG_EN) == "English")
                              { // tiếng ANh ?>
                                   <span style="font-size: 10px;margin-left: 5px;"><?="Result" ?></span>  
                                   <?php  }
                              else
                              { // Tiếng tàu ?>
                                 <span style="font-size: 10px;margin-left: 5px;"><?="成绩"?></span>
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
                            <input type="image" name="" id="" title="Logout" src="<?php echo base_url('assets/img/app/scc_info.png') ?>" style="width:50px;border-width:0px;">
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
                            <input type="image" name="" id="" title="Table" src="<?php echo base_url('assets/img/app/table_en.png') ?>" style="width:50px;border-width:0px;">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
  </tr>
  <tr>
    <td id="tbllistracecard">
      <table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-weight:bold;">
        <tr>
            <td style="padding-bottom:40px;padding-top:60px;" id="showInfoEarly">
                 <?php echo $HTMLInfo;?>
            </td>
        </tr>
      </table>
    </td>
  </tr> 

  <!-- add footer view list menu soccer ngày 10/07/2015-->
  