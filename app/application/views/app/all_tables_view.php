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
                            <?php echo $this->lang->line(LANG_All_Tables);?>
                        </div>
                    </td>
                    <td align="right" width="60%">
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
                                <a href="<?php echo base_url('/app/soccer/soccer_info?lang=2'); ?>">
                        <?php  } ?>
                        <a href="<?php echo base_url('/app/soccer/alltable') ?>">
                            <input type="image"  title="Table" src="<?php echo base_url('assets/img/app/table_en.png') ?>" style="width:40px;border-width:0px;">
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
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" id="tb_load_all">
                  <!-- <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/bing-balls.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" align="center">
                        Europa League(60)
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr>
                   <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/bing-balls.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" align="center">
                         England(17)
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/bing-balls.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" align="center">
                        Germany(5)
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/bing-balls.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" align="center">
                        Italy(3)
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/bing-balls.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" align="center">
                        Spain(6)
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/bing-balls.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" align="center">
                        France(6)
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr>

                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/bing-balls.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" align="center">
                        Japan(6)
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/bing-balls.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" align="center">
                        South Korea(6)
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                    <td width="20%" style="padding: 10px;" align="left">
                       <input title="" src="<?php echo base_url('assets/img/app/bing-balls.png'); ?>" type="image" style="height:50px;width:100%;"> 
                    </td>
                    <td width="50%" style="padding: 10px;" align="center">
                        Argentina(6)
                    </td>
                    <td width="10%" style="padding: 10px;" align="right">
                       <a href="<?php echo base_url('/app/setting/lottnotifications') ?>" style="text-decoration: none;">
                        <input name="" id="" title="Next" src="<?php echo base_url('assets/img/app/btn-next.png');?>" type="image" >
                      </a>
                    </td>
                  </tr> -->
              </table>
            </td>
          </tr>
        </table>
    </td>
  </tr>
