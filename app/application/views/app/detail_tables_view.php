<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #30627b; font-size:X-Large;">
            <tbody>
                <tr>
                    <td align="left">
                        <div style="vertical-align: middle; color: white; cursor: pointer;" onclick="history.back();">
                            <input type="image" name="" id="" title="Home" src="<?php echo base_url('assets/img/app/btn-back.png') ?>" style="width:50px;border-width:0px;">
                        </div>
                    </td>
                    <td align="center">
                        <div style="vertical-align: middle; color: white;">
                            <?php echo $this->lang->line(LANG_Table);?>
                         </div>
                    </td>
                    <td  align="right">
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
                            <input type="image" name="" id="" title="Result" src="<?php echo base_url('assets/img/app/result_en.png') ?>" style="width:50px;border-width:0px;">
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
    <td>
      <table border="0" cellspacing="0" width="100%" id="load_event">
       <!--  <tr bgcolor="#f9bd1a">
            <td>English Championship</td>
            <td>23/04/2015</td>
        </tr> -->
      </table>
    </td>
  </tr>
  <tr>
    <td id="tbllistracecard">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-weight:bold;">
        
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" id="tb_detail">
                 <!--  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td>Team</td>
                      <td>P</td>
                      <td>W</td>
                      <td>D</td>
                      <td>Pos</td>
                      <td>L</td>
                      <td>F</td>
                      <td>A</td>
                      <td>GD</td>
                      <td>Pts</td>
                  </tr>
                   <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td>Blackburn</td>
                      <td>7</td>
                      <td>86</td>
                      <td>45</td>
                      <td>55</td>
                      <td>23</td>
                      <td>53</td>
                      <td>33</td>
                      <td>54</td>
                      <td>-21</td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td>Blackburn</td>
                      <td>7</td>
                      <td>86</td>
                      <td>45</td>
                      <td>55</td>
                      <td>23</td>
                      <td>53</td>
                      <td>33</td>
                      <td>54</td>
                      <td>-21</td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td>Blackburn</td>
                      <td>7</td>
                      <td>86</td>
                      <td>45</td>
                      <td>55</td>
                      <td>23</td>
                      <td>53</td>
                      <td>33</td>
                      <td>54</td>
                      <td>-21</td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td>Blackburn</td>
                      <td>7</td>
                      <td>86</td>
                      <td>45</td>
                      <td>55</td>
                      <td>23</td>
                      <td>53</td>
                      <td>33</td>
                      <td>54</td>
                      <td>-21</td>
                  </tr>
                 <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td>Blackburn</td>
                      <td>7</td>
                      <td>86</td>
                      <td>45</td>
                      <td>55</td>
                      <td>23</td>
                      <td>53</td>
                      <td>33</td>
                      <td>54</td>
                      <td>-21</td>
                  </tr> -->

                 <!--  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td>Blackburn</td>
                      <td>7</td>
                      <td>86</td>
                      <td>45</td>
                      <td>55</td>
                      <td>23</td>
                      <td>53</td>
                      <td>33</td>
                      <td>54</td>
                      <td>-21</td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td>Blackburn</td>
                      <td>7</td>
                      <td>86</td>
                      <td>45</td>
                      <td>55</td>
                      <td>23</td>
                      <td>53</td>
                      <td>33</td>
                      <td>54</td>
                      <td>-21</td>
                  </tr>
                  <tr style="border-style:solid; border-color:#F60; border-width:1px;">
                      <td>Blackburn</td>
                      <td>7</td>
                      <td>86</td>
                      <td>45</td>
                      <td>55</td>
                      <td>23</td>
                      <td>53</td>
                      <td>33</td>
                      <td>54</td>
                      <td>-21</td>
                  </tr> -->
              </table>
            </td>
          </tr>
        </table>
    </td>
  </tr>
