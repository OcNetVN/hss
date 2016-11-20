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
                    <td align="left" >
                        <div style="vertical-align: middle; color: white;">
                              <?php echo $this->lang->line(LANG_All_Tables);?>
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
    <td id="tbllistracecard">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-weight:bold;">
        <tr>
            <td>
              <table width="100%" border="0" id="td_loadToday" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;background-color:white;">
                  <tr>
                      <td>
                        <!-- show table td_1X2 -->
                        <table width="100%" border="0" id="td_1X2">
                            <tr>
                                <th colspan="3">1X2</th>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>X</td>
                              <td>2</td>
                            </tr>
                            <tr>
                              <td>1.26</td>
                              <td>5.00</td>
                              <td>7.80</td>
                            </tr>
                        </table>
                        <!-- end show table td 1X2 -->
                      </td>
                      <td></td>
                      <td>
                        <table width="100%" border="0" id="td_FH12" style="background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;">
                            <tr>
                                <th colspan="3">FH 1X2</th>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>X</td>
                              <td>2</td>
                            </tr>
                            <tr>
                              <td>1.80</td>
                              <td>2.54</td>
                              <td>5.80</td>
                            </tr>
                        </table>
                      </td>
                  </tr>

                  <tr>
                    <td>
                      <table width="100%" border="0" id="td_OE" style="background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;">
                          <tr>
                              <th colspan="2">OE</th>
                          </tr>
                          <tr>
                            <td>Odd</td>
                            <td>Even</td>
                          </tr>
                          <tr>
                            <td>1.26</td>
                            <td>5.00</td>
                          </tr>
                        </table>
                      </td>
                      <td>
                        <table width="100%" border="0" id="td_TotalGoal" style="background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;">
                            <tr>
                               <th colspan="4">Total Goal</th>
                            </tr>
                            <tr>
                              <td>0~1</td>
                              <td>2~3</td>
                              <td>4~6</td>
                              <td>7~Over</td>
                            </tr>
                            <tr>
                              <td>1.26</td>
                              <td>5.00</td>
                              <td>9.00</td>
                              <td>25.0</td>
                            </tr>
                        </table>
                      </td>
                      <td>
                        <table width="100%" border="0" id="td_DoubleChance" style="background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;">
                            <tr>
                                <th colspan="3">Double Chance</th>
                            </tr>
                            <tr>
                              <td>1X</td>
                              <td>12</td>
                              <td>X2</td>
                            </tr>
                            <tr>
                              <td>1.26</td>
                              <td>5.00</td>
                              <td>7.80</td>
                            </tr>
                        </table>
                      </td>
                  </tr>
                  
                  <tr>
                    <td colspan="3">
                        <table width="100%" border="0" id="td_CorrectScore" style="background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;">
                            <tr>
                                <th colspan="3">Correct Score</th>
                            </tr>
                            <tr>
                              <td>0:0</td>
                              <td>0:1</td>
                              <td>0:2</td>
                              <td>0:3</td>
                              <td>0:4</td>
                              <td>1:0</td>
                              <td>1:1</td>
                              <td>1:2</td>
                              <td>1:3</td>
                              <td>1:4</td>
                              <td>2:0</td>
                              <td>2:1</td>
                              <td>2:2</td>

                            </tr>
                            <tr>
                              <td>8.75</td>
                              <td>8.25</td>
                              <td>16</td>
                              <td>46</td>
                              <td>170</td>
                              <td>7.2</td>
                              <td>5.2</td>
                              <td>10</td>
                              <td>29</td>
                              <td>105</td>
                              <td>12</td>
                              <td>8.5</td>
                              <td>13</td>
                            </tr>
                            <tr>
                              <td>2:3</td>
                              <td>2:4</td>
                              <td>3:0</td>
                              <td>3:1</td>
                              <td>3:2</td>
                              <td>3:3</td>
                              <td>3:4</td>
                              <td>4:0</td>
                              <td>4:1</td>
                              <td>4:2</td>
                              <td>4:3</td>
                              <td>4:4</td>
                              <td>AOS</td>
                            </tr>
                            <tr>
                              <td>8.75</td>
                              <td>8.25</td>
                              <td>16</td>
                              <td>46</td>
                              <td>170</td>
                              <td>7.2</td>
                              <td>5.2</td>
                              <td>10</td>
                              <td>29</td>
                              <td>105</td>
                              <td>12</td>
                              <td>8.5</td>
                              <td>13</td>
                            </tr>
                        </table>
                    </td>
                  </tr>
                   
                   <tr>
                      <td colspan="3">
                        <table width="100%" border="0" id="td_FHCorrectScore" style="background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;">
                            <tr>
                                <th colspan="3">FH Correct Score</th>
                            </tr>
                            <tr>
                              <td>0:0</td>
                              <td>0:1</td>
                              <td>0:2</td>
                              <td>0:3</td>
                              <td>1:0</td>
                              <td>1:1</td>
                              <td>1:2</td>
                              <td>1:3</td>
                              <td>2:0</td>
                            </tr>
                            <tr>
                              <td>8.75</td>
                              <td>8.25</td>
                              <td>16</td>
                              <td>46</td>
                              <td>170</td>
                              <td>7.2</td>
                              <td>5.2</td>
                              <td>10</td>
                              <td>29</td>   
                            </tr>
                            <tr>
                              <td>2:1</td>
                              <td>2:2</td>
                              <td>2:3</td>
                              <td>3:0</td>
                              <td>3:1</td>
                              <td>3:2</td>
                              <td>3:3</td>
                              <td>AOS</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>8.75</td>
                              <td>8.25</td>
                              <td>16</td>
                              <td>46</td>
                              <td>170</td>
                              <td>7.2</td>
                              <td>5.2</td>
                              <td>10</td>
                              <td>29</td>
                              
                            </tr>
                        </table>
                      </td>
                   </tr> 

                   <tr>
                      <td colspan="3">
                        <table width="100%" border="0" id="td_HT_FT" style="background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;">
                            <tr>
                                <th colspan="3">HT / FT</th>
                            </tr>
                            <tr>
                              <td>HH</td>
                              <td>HD</td>
                              <td>HA</td>
                              <td>DH</td>
                              <td>DD</td>
                              <td>DA</td>
                              <td>AH</td>
                              <td>AD</td>
                              <td>AA</td>
                            </tr>
                            <tr>
                              <td>8.75</td>
                              <td>8.25</td>
                              <td>16</td>
                              <td>46</td>
                              <td>170</td>
                              <td>7.2</td>
                              <td>5.2</td>
                              <td>10</td>
                              <td>29</td>   
                            </tr>
                           
                        </table>
                      </td>
                   </tr>

                   <tr>
                      <td>
                        <table width="100%" border="0" id="td_FG_LG" style="background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;">
                            <tr>
                                <th colspan="3">FG / LG</th>
                            </tr>
                            <tr>
                              <td>HF</td>
                              <td>HL</td>
                              <td>AF</td>
                              <td>AL</td>
                              <td>No Goal</td>
                            </tr>
                            <tr>
                              <td>1.26</td>
                              <td>5.00</td>
                              <td>7.80</td>
                              <td>5.00</td>
                              <td>7.80</td>
                            </tr>
                        </table>
                      </td>
                      <td></td>
                      <td>
                        <table width="100%" border="0" id="td_Home_Team" style="background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;">
                            <tr>
                                <th colspan="3">Home Team Total Goals</th>
                            </tr>
                            <tr>
                              <td>Event</td>
                              <td colspan="2">OU</td>
                              <td colspan="2">FH.OU</td>
                            </tr>
                            <tr>
                              <td>KAA Gent - Over</td>
                              <td>2.54</td>
                              <td>2.54</td>
                              <td>5.80</td>
                              <td>2.54</td>
                            </tr>
                        </table>
                      </td>
                  </tr>

                  <tr>
                    <td >
                        <table width="100%" border="0" id="td_Away_Team" style="background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;">
                            <tr>
                                <th colspan="3">Away Team Total Goals</th>
                            </tr>
                            <tr>
                              <td>Event</td>
                              <td colspan="2">OU</td>
                              <td colspan="2">FH.OU</td>
                            </tr>
                            <tr>
                              <td>KAA Gent - Over</td>
                              <td>2.54</td>
                              <td>2.54</td>
                              <td>5.80</td>
                              <td>2.54</td>
                            </tr>
                        </table>
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
              </table>
            </td>
          </tr>
          
          
        </table>
    </td>
  </tr> 

  <!-- add footer view list menu soccer ngày 10/07/2015-->
  