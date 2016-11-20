<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080; font-size:Large;">
            <tbody>
                <tr>
                    <td width="80%" align="left">
                      <?php 
                        // if($this->lang->line(LANG_EN) == "English")
                           //{ // tiếng ANh ?>
                              <!-- <a href="<?php //echo base_url('/app/horse/horse_info') ?>" style="text-decoration: none;"> -->
                        <?php  //}
                        // else
                        // { // Tiếng tàu ?>
                             <!--  <a href="<?php //echo base_url('/app/horse/horse_info?lang=2') ?>" style="text-decoration: none;"> -->
                        <?php //}
                        ?>    
                              <div style="vertical-align: middle; color: white; cursor: pointer;" >
                                <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/btn-back.png') ?>" onclick="history.back(); return false;" style="height:50px;width:50px;border-width:0px;">
                                <span style="vertical-align: middle;padding-bottom:25px;font-weight:bold;">
                                <?php echo $this->lang->line(LANG_HORSE_INFO_BOARD); ?>
                                </span>
                              </div>
                             <!--  </a> -->
                    </td>
                    <!-- <td align="center">&nbsp;</td> -->
                    <td width="10%" align="right">
                        <?php 
                        if($this->lang->line(LANG_EN) == "English")
                        { // tiếng ANh ?>
                              <a href="<?php echo base_url('/app/horse/horse_info') ?>">
                      <?php  }
                        else
                        { // Tiếng tàu ?>
                              <a href="<?php echo base_url('/app/horse/horse_info?lang=2') ?>">
                     <?php   }
                        ?>
                            <input type="image" name="" id="" title="Main" src="<?php echo base_url('assets/img/app/btnhorse.png') ?>" style="height:50px;width:50px;border-width:0px;">
                        </a>
                    </td>
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
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:X-Large; border: 1px solid black;">
          <tr>
             <td colspan="2" bgcolor="#EAC117">
                    <table width="100%" border="1" cellspacing="0">
                        <tr><td width="10%" align="center" colspan="2"> <?php echo $this->lang->line(LANG_HORSE_INFO_BOARD); ?></td></tr>
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