<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #FF0080; font-size:Large;">
            <tbody>
                <tr>
                    <td width="80%" align="left">
                        <?php 
                        // if($this->lang->line(LANG_EN) == "English")
                        // { // tiếng ANh ?>
                              <!-- <a href="<?php //echo base_url('/app/horse/horse_info') ?>" style="text-decoration: none;"> -->
                        <?php  //}
                        // else
                        // { // Tiếng tàu ?>
                              <!-- <a href="<?php //echo base_url('/app/horse/horse_info?lang=2') ?>" style="text-decoration: none;"> -->
                        <?php //}
                        ?>    
                       <!--  <a href="<?php //echo base_url('/app/horse/horse_info') ?>" style="text-decoration: none;"> -->
                            <div style="vertical-align: middle; color: white; width: 250px;">
                                <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/btn-back.png') ?>" onclick="history.back(); return false;" style="height:50px;width:50px;border-width:0px;">
                                <span style="vertical-align: middle;padding-bottom:25px;font-weight:bold;">
                                <?php
                                    echo $this->lang->line(LANG_SCR_ET);
                                ?>
                                </span> 
                            </div>
                       <!--  </a> -->
                    </td>
                    <!-- <td align="center">&nbsp;</td> -->
                    <td width="20%" align="right">
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
    <td id="tbllistscrat_et">
    	<!--load data-->
    </td>
  </tr>
</table>