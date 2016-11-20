<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #30627b; font-size:X-Large;position:fixed; top:0;">
            <tbody>
                <tr>
                    <td  align="left">
                        <div style="vertical-align: middle; color: white; cursor: pointer;" onclick="history.back();">
                            <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/btn-back.png') ?>" style="width:50px;border-width:0px;">
                        </div>
                    </td>
                    <td align="center">
                        <div style="vertical-align: middle; color: white;">
                            <?php echo $this->lang->line(LANG_RESULT);?>
                         </div>
                    </td>
                    <td  align="right" >
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
                            <input type="image"  title="Result" src="<?php echo base_url('assets/img/app/result_en.png') ?>" style="width:50px;border-width:0px;">
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
    <td align="center" height="50" >
      <strong style="padding:3px; border:2px #F30 solid; width: 150px; text-align:center; background:#CCC;position:fixed;">
            <select id="seday">
                <!--load data-->
            </select>
        </strong>
    </td>
  </tr>
  <tr>
    <td id="tbllistracecard">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-weight:bold;">
        <tr>
          <td style="padding-bottom:40px;padding-top:10px;">
              <table width="100%" cellspacing="0" cellpadding="1"  style="border: 1px solid #fff;border-collapse: collapse; text-align: center;overflow-y: scroll;">
                <thead>
                  <tr style="background-color:#4c69b8;color: #fff;">
                    <th style="border: 1px solid #fff;"><?php echo $this->lang->line(LANG_DATE_TIME);?></th>
                    <th  style="border: 1px solid #fff;"><?php echo $this->lang->line(LANG_EVENT);?></th>
                    <th  style="border: 1px solid #fff;"><?php echo $this->lang->line(LANG_FIRST_HALF);?></th>
                    <th  style="border: 1px solid #fff;"><?php echo $this->lang->line(LANG_FULL_TIME);?></th>
                  </tr>
                </thead>
                <tbody id="ShowListResult">

                </tbody>
          </td>
        </tr>
      </table>
    </td>
  </tr>
 
</table>