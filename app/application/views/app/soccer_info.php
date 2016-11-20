<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #30627b; font-size:Large;">
            <tbody>
                <tr>
                    <td  align="left" width="20%">
                      <a href="<?php echo base_url('/app/menu') ?>">
                        <input type="image" name="" id="" title="Back" src="<?php echo base_url('assets/img/app/btn-back.png') ?>"  style="width:40px;border-width:0px;">
                      </a>  
                    </td>
                    <td align="center" width="20%">
                        <div style="vertical-align: middle; color: white;">
                              <b><?php echo $this->lang->line(LANG_soccer_info);?></b>
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
                            <input type="image" name="" id="" title="Result" src="<?php echo base_url('assets/img/app/result_en.png') ?>" style="width:40px;border-width:0px;">
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
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:X-Large; border: 1px solid black;">
          <tr>
             <td colspan="2" bgcolor="#EAC117">
                    <table width="100%" border="1" cellspacing="0">
                        <tr><td width="10%" align="center" colspan="2"> <?php echo $this->lang->line(LANG_soccer_info_board); ?></td></tr>
                    </table>
             </td>
          </tr>
          <tr>
              <td colspan="2">
                <table width="100%" border="1" cellspacing="0" id="loadHorseInfo">
                   <!-- load data in table -->
                </table>
              </td>
          </tr>
        </table>
    </td>
  </tr>
</table>