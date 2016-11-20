    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <!-- table start -->
              <div class="row">                  
                  <div class="col-lg-12">
                    <form class="form-horizontal" role="form">
                      <div class="panel">
                        <div class="panel-body">
                          <div class="form-group">
                            <div class="col-lg-4">
                                <div class="col-md-2">
                                 <label id="choose_country">Choose country</label>
                                </div>
                                <div class="col-md-5">
                                  <select class=" m-bot15" id="ChooseCountry">
                                      <option value="MY" <?= ($raceCountry == "MY") ? "selected" : "" ;?>>Mal Board</option>
                                      <option value="SG" <?= ($raceCountry == "SG") ? "selected" : "" ;?>>Sin Board</option>
                                      <option value="HK" <?= ($raceCountry == "HK") ? "selected" : "" ;?>>HK Board</option>
                                      <option value="MC" <?= ($raceCountry == "MC") ? "selected" : "" ;?>>Macau Board</option>
                                      <option value="SA" <?= ($raceCountry == "SA") ? "selected" : "" ;?>>S Afica Board</option>
                                      <option value="AU" <?= ($raceCountry == "AU") ? "selected" : "" ;?>>Australia Board</option>
                                      <option value="EU" <?= ($raceCountry == "EU") ? "selected" : "" ;?>>Europe Board</option>
                                  </select>
                                </div>
                                <div class="col-md-1" id="settimeHour" style="height: 1.5em; font-size: 1.5em; color: red;">00:</div>
                                <div class="col-md-1" id="settimeMinute" style="height: 1.5em; font-size: 1.5em; color: red;">00:</div>
                                <div class="col-md-1" id="settimeSecond" style="height: 1.5em; font-size: 1.5em; color: red;">00</div>
                            </div>
                            <div class="col-lg-8">
                              <div id="div_Flag_MY" style="color:#F00; vertical-align: middle; text-align: left; float: left; width:110px ; height: 41px; padding: 0;<?= ($raceCountry == "MY") ? "" : "display:none;" ;?>">
                                  <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagMalay.png') ?>">
                                  <input type="checkbox"  id="check_Flag_MY" value="MY">
                              </div>
                              <div id="div_Flag_SG" style="color:#F00; vertical-align: middle; text-align: left; float: left; width:110px ; height: 41px; padding: 0;<?= ($raceCountry == "SG") ? "" : "display:none;" ;?>">  
                                  <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagSing.png') ?>">
                                  <input type="checkbox" id="check_Flag_SG" value="SG">
                              </div>
                              <div id="div_Flag_HK" style="color:#00F; vertical-align: middle; text-align: left; float: left; width:110px ; height: 41px;<?= ($raceCountry == "HK") ? "" : "display:none;" ;?>">
                                  <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagHK.png') ?>">
                                  <input type="checkbox"  id="check_Flag_HK" value="HK">
                              </div>
                              <div id="div_Flag_MC" style="color:#00F; vertical-align: middle; text-align: left; float: left; width:110px ; height: 41px;<?= ($raceCountry == "MC") ? "" : "display:none;" ;?>">
                                  <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagMaCau.png') ?>">
                                  <input type="checkbox" id="check_Flag_MC" value="MC">
                              </div>
                              <div id="div_Flag_SA" style="color:#00F; vertical-align: middle; text-align: left; float: left; width:110px ; height: 41px;<?= ($raceCountry == "SA") ? "" : "display:none;" ;?>">
                                  <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagSA.png') ?>">
                                  <input type="checkbox"  id="check_Flag_SA" value="SA">
                              </div>
                              <div id="div_Flag_AU" style="color:#00F; vertical-align: middle; text-align: left; float: left; width:110px ; height: 41px;<?= ($raceCountry == "AU") ? "" : "display:none;" ;?>">
                                  <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagAustralia.png') ?>">
                                  <input type="checkbox"  id="check_Flag_AU" value="AU">
                                  
                              </div>
                              <div id="div_Flag_EU" style="color:#00F; vertical-align: middle; text-align: left; float: left; width:110px ; height: 41px;<?= ($raceCountry == "EU") ? "" : "display:none;" ;?>">
                                  <input type="image" title="" src="<?php echo base_url('assets/img/app/flag/FlagEurope.png') ?>">
                                  <input type="checkbox"  id="check_Flag_EU" value="EU">
                              </div>
                            </div>
                          </div>
                        </div>  
                        
                      <table width="100%" border="1" cellpadding="0" cellspacing="0" id="tbGetToteMala">
                        <thead>
                          <tr style="background: #006600; color:#fff">
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>Malaysia</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
            								<?php 
            								for($i=1;$i<=20;$i++)
            								{
            									echo '<td><input type="text" style="width:50px;margin-right:-22px; height:30px;"  id="inputmal_1_'.$i.'" tabindex="'.$i.'"></td>';
            								}
            								?>
                            
                            <td><span style="text-align: center;padding-left:25px">Win</span></td>
                          </tr>
                          <tr>
                            <?php 
            								for($i=1;$i<=20;$i++)
            								{
            									echo '<td><input type="text" style="width:50px;margin-right:-22px; height:30px;"  id="inputmal_2_'.$i.'" tabindex="'.$i.'"></td>';
            								}
            								?>
                            <td><span style="text-align: center;padding-left:25px">Place</span></td>
                          </tr>
                        </tbody>
                      </table>

                        <div class="panel">
                          <div class="panel-body">
                            <div class="form-group">
                              <div class="col-lg-12">
                                <button class="btn btn-danger" type="button" onclick="SaveToteMala();" id="btn_Ma">Save</button>
                                <input type="button" class="btn btn-info" id="btncleargreen"  onclick="ClearMala();" value="Clear"></input>
                                <input type="button" class="btn btn-info" id="btn999green" onclick="InsertMala999();" value="999"></input>
                              </div>
                            </div>
                            </div>
                          </div>
                         
                         <table width="100%" border="1" cellpadding="0" cellspacing="0" id="tbGetToteSIN">
                          <thead>
                            <tr style="background: #009ACD; color:#fff;">
                              <th>1</th>
                              <th>2</th>
                              <th>3</th>
                              <th>4</th>
                              <th>5</th>
                              <th>6</th>
                              <th>7</th>
                              <th>8</th>
                              <th>9</th>
                              <th>10</th>
                              <th>11</th>
                              <th>12</th>
                              <th>13</th>
                              <th>14</th>
                              <th>15</th>
                              <th>16</th>
                              <th>17</th>
                              <th>18</th>
                              <th>19</th>
                              <th>20</th>
                              <th>Singapore</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id = "trWinSi">
                              <?php 
								for($i=21;$i<=40;$i++)
								{
									echo '<td><input type="text" style="width:50px;margin-right:-22px; height:30px;"  id="inputsin_1_'.$i.'" tabindex="'.$i.'"></td>';
								}
								?>
                             
                              <td><span style="text-align: center;padding-left:25px">Win</span></td>
                            </tr>
                            <tr id="trPlacSi">
                              <?php 
								for($i=21;$i<=40;$i++)
								{
									echo '<td><input type="text" style="width:50px;margin-right:-22px; height:30px;"  id="inputsin_2_'.$i.'" tabindex="'.$i.'"></td>';
								}
								?>
                             
                              <td><span style="text-align: center;padding-left:25px">Place</span></td>
                            </tr>
                          </tbody>
                        </table> 
                        
                        <div class="panel">
                          <div class="panel-body">
                            <div class="form-group">
                              <div class="col-lg-12">
                                <button class="btn btn-danger" onclick="SaveToteSin();" type="button" id="btn_Sin">Save</button>
                                <input type="button" class="btn btn-info" id="btnclearblue" onclick="ClearSin();"value="Clear"></input>
                                <input type="button" class="btn btn-info" id="btn999blue" onclick="InsertSin999();" value="999"></input>
                              </div>
                            </div>
                            </div>
                          </div>
                          
                          <div class="panel">
                            <div class="panel-body">
                                <div class="form-group">
                                   <div class="col-md-12">
                                        <div class="col-md-8">
                                            <textarea  rows="6" class="form-control" id="ContentConvert"></textarea>
                                        </div>
                                        <div class="col-md-2">
                                           <button class="btn btn" style="display: none;background:#006600; width:200px; margin-bottom:10px;" type="button" onclick="ConvertMal();" >Convert Mal(oas.turfclub)</button><br />
                                           <button class="btn btn" style="background:#006600; width:200px; margin-bottom:10px;margin-top:5px;" type="button" onclick="ConvertMal_tele();" >Convert Mal(telelink)</button><br />
                                           <button class="btn btn" style="background: #009ACD; width:200px;margin-bottom:5px;" type="button" onclick="ConvertSin();" >Convert  Sin(oas.turfclub)</button> 
                                           <button class="btn btn" style="background: yellow; width:200px;margin-bottom:5px;" type="button" onclick="ConvertHK();" >Convert  HK(OOOS)</button>
                                           <button class="btn btn" style="display: none;background: #009ACD; width:200px;" type="button" onclick="ConvertSin_tele();" >Convert  Sin(telelink)</button>
                                        </div>
                                   </div>
                                </div>
                            </div>
                          </div>
                          
                        </div>
                    </form>
                    </div>
              </div>
<input id="submit" value="Submit" type="button" style="display:none;"/>
<span style="display:none;">oas.turfclub.com.sg</span>         
<table width="100%" border="1" cellpadding="0" cellspacing="0" style="display:none;">
        <tr>
            <th>Horse No</th>
            <th>Horse Name</th>
            <th>Win Dividend</th>
            <th>Place Dividend</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Fortunggls</td>
            <td>$95.00</td>
            <td>$22.00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>OCEAN POWER</td>
            <td>$72.00</td>
            <td>$19.00</td>
        </tr>
        <tr>
            <td>3</td>
            <td>OCEAN POWER</td>
            <td>$72.00</td>
            <td>$19.00</td>
        </tr>
        <tr>
            <td>4</td>
            <td>OCEAN POWER</td>
            <td>$72.00</td>
            <td>$19.00</td>
        </tr>
        <tr>
            <td>5</td>
            <td>LOVING STAR</td>
            <td>$329.00</td>
            <td>$58.00</td>
        </tr>
        <tr>
            <td>6</td>
            <td>MONEY CAF</td>
            <td>$14.00</td>
            <td>$7.00</td>
        </tr>
        <tr>
            <td>7</td>
            <td>BONANZA</td>
            <td>SCR</td>
            <td>SCR</td>
        </tr>
</table>
      </br>
<span style="display:none;">telelink.com.my</span>
<table width="100%" border="1" cellpadding="0" cellspacing="0" style="display:none;">
    <tr>
        <th>WIN</th>
        <th>Runner</th>
        <th>PLACE</th>
    </tr>
    <tr>
        <th>17</th>
        <th>01</th>
        <th>5</th>
    </tr>
    <tr>
        <th>72</th>
        <th>02</th>
        <th>19</th>
    </tr>
    <tr>
        <th>1049</th>
        <th>03</th>
        <th>113</th>
    </tr>
    <tr>
        <th>699</th>
        <th>04</th>
        <th>339</th>
    </tr>
    <tr>
        <th>1049</th>
        <th>05</th>
        <th>169</th>
    </tr>
</table>

<!-- table end -->
            
              <!-- page end-->
          </section>
      </section>
      
      <!--main content end-->