<!--main content start-->
  <section id="main-content">
      <section class="wrapper site-min-height" id="SecRaceInfo">
          <!-- page start-->
          <!-- table start -->
          <div class="row">                  
              <div class="col-lg-12">
                <form class="form-horizontal" role="form">
                  <div class="panel">
                    <div class="panel-body">
                      <div class="form-group">
                      <div class="panel">
                       <div class="col-md-12">
                          <div class="col-md-5">
                              <label>Choose country:</label>
                              <select name="cmbRace" id="cmbRace">
                                  <option selected="selected" value="MY" >MY</option>
                                  <option value="SG">SG</option>
                                  <option value="HK">HK</option>
                                  <option value="MC">MC</option>
                                  <option value="SA">SA</option>
                                  <option value="AU">AU</option>
                                  <option value="EU">EU</option>
                              </select>
                              <input name="txtCountry" type="text" value="MALAYSIA" id="txtCountry"  />
                          </div>
                
                            <div class="col-md-6">
                                <label>Race Card ID:(CN-YY-MM-DD-RC)</label>
                                <select name="cmbRaceCardID" id="cmbRaceCardID">
                                </select>
                               <input type="button" name="btnLink" value="Goto RaceCard" id="btnLink" onclick="GotoRaceCard();">
                            </div>
                            <div class="col-md-1"> 
                                ADD <input type="button" value="+" onclick="ClickAdd();">
                            </div>
                            
                         <br />   
                       </div>
                      </div>
                       <div class="col-md-12">
                          <div class="col-md-6">
                                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tbody>
                                        <tr>
                                            <td>Header1</td>
                                            <td><input name="txtHeader1" type="text"  id="txtHeader1" style="background-color:#FFFF99;width:100%;" >
                                            </td>
                                            <td><input type="checkbox" name="c_header1" id="c_header1" /></td>
                                        </tr>
                                        <tr>
                                            <td>Header2</td>
                                            <td><input name="txtHeader2" type="text" id="txtHeader2" style="background-color:#99FF66;width:100%;">
                                            </td>
                                            <td><input type="checkbox" name="c_header2" id="c_header2" /></td>
                                        </tr>
                                        <tr>
                                            <td>Header3</td>
                                            <td><input name="txtHeader3" type="text"  id="txtHeader3" style="background-color:#FF99FF;width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Header4</td>
                                            <td><input name="txtHeader4" type="text" id="txtHeader4" style="background-color:#99CCFF;width:100%;" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Chinese1</td>
                                            <td><input name="txtHeader1Man" type="text"  id="txtHeader1Man" style="background-color:#FFFF99;width:100%;"></td>
                                        </tr>
                                        <tr>
                                            <td>Chinese2</td>
                                            <td><input name="txtHeader2Man" type="text"  id="txtHeader2Man" style="background-color:#99FF66;width:100%;" ></td>
                                        </tr>
                                        <tr>
                                            <td>Chinese3</td>
                                            <td><input name="txtHeader3Man" type="text"   id="txtHeader3Man" style="background-color:#FF99FF;width:100%;"></td>
                                        </tr>
                                        <tr>
                                            <td>Chinese4</td>
                                            <td><input name="txtHeader4Man" type="text"  id="txtHeader4Man" style="background-color:#99CCFF;width:100%;"></td>
                                        </tr>
                                        <tr>
                                           <td colspan="2" align="right">
                                            <button type="button" class="btn" id="btnClear_Hearder">Clear</button>
                                          </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                    <!-- <p>
                                        <span style="margin-left:320px;margin-top:120px;">
                                          <button type="button" class="btn" id="btnClear_Hearder">Clear</button>
                                        </span>        
                                    </p> -->
                                <br />
                               <!-- <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                  <tbody>
                                    <tr>
                                      <td colspan="4">Internet Ticket Price:</td>
                                    </tr>
                                    <tr>
                                      <td>Header1:</td>
                                      <td colspan="3"><input type="checkbox" name="ch_header1" id="ch_header1" /></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">Header2:
                                        <input name="txtIT" type="text"  maxlength="20" id="txtIT" style="width:100px;" /></td>
                                      <td>EarlyTic</td>
                                      <td><input name="txtET" type="text"  maxlength="20" id="txtET" style="width:100px;" /></td>
                                    </tr>
                                    <tr>
                                      <td>Header3:
                                        <input name="txtIT1" type="text"  maxlength="2" id="txtIT1" style="width:35px;" />
                                      </td>
                                      <td align="left">
                                        <input name="txtITP1" type="text"  maxlength="10" id="txtITP1" style="width:60px;" />
                                      </td>
                                      <td align="right">
                                        <input name="txtIT2" type="text"  maxlength="2" id="txtIT2" style="width:35px;" />
                                      </td>
                                      <td align="left">
                                        <input name="txtITP2" type="text"  maxlength="10" id="txtITP2" style="width:60px;" />
                                      </td>
                                      <td align="right">
                                        <input name="txtIT2" type="text"  maxlength="2" id="txtIT3N" style="width:35px;" />
                                      </td>
                                      <td align="left">
                                        <input name="txtITP2" type="text"  maxlength="10" id="txtITP3N" style="width:60px;" />
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Header4:
                                        <input name="txtIT3" type="text"  maxlength="2" id="txtIT3" style="width:35px;" /></td>
                                      <td align="left">
                                        <input name="txtITP3" type="text"  maxlength="10" id="txtITP3" style="width:60px;" />
                                      </td>
                                      <td align="right">
                                        <input name="txtIT4" type="text"  maxlength="2" id="txtIT4" style="width:35px;" />
                                      </td>
                                      <td align="left">
                                        <input name="txtITP4" type="text"  maxlength="10" id="txtITP4" style="width:60px;" />
                                      </td>
                                      <td align="right">
                                        <input name="txtIT4" type="text"  maxlength="2" id="txtIT5" style="width:35px;" />
                                      </td>
                                      <td align="left">
                                        <input name="txtITP4" type="text"  maxlength="10" id="txtITP5" style="width:60px;" />
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td><input type="button" name="clear_ticket" value="Clear" onclick="ClearInternet();"></td>
                                      <td>
                                        <input type="button" name="btnUpdateHeader4" value="Update" id="btnUpdateHeader4" style="width:74px;" onclick="UpdateInTicket();" />
                                      </td>
                                      <td>
                                          <button type="button" onclick="Refresh();" >Refresh
                                            <!-- <input type="image"  title="refresh" src="<?php //echo base_url('assets/img/icon_refresh.jpg') ?>" style="height:50px;width:50px;border-width:0px;"> -->
                                          </button>
                                      </td>
                                    </tr>
                                  </tbody>
                               <!-- </table> --> 
                               <table width="100%" border="1" cellspacing="1" cellpadding="1" style="font-size: 14px;font-weight:bold;">
                                <tr >
                                    <td bgcolor="#FFCC33"><button type="button" id="btnAllset" onclick="InputAllSet();">ALL SET</button></td>
                                    <td bgcolor="#FFCC33"><button type="button" id="btnRacing" onclick="InputRacing();">Racing</button></td>
                                    <td bgcolor="#FFCC33"><button type="button" id="btnNoPhoto" onclick="InputNoPhoto();">Photo</button></td>
                                    <td bgcolor="#FFCC33"><button type="button" id="btnNoPhoto" onclick="InputDislodge();">Dislodge Jockey</button></td>
                                    <td bgcolor="#FFCC33"><button type="button" id="btnStartUp" onclick="InputStartUp();">Start Up</button></td>
                                </tr>
                                 <tr style="color: white;">
                                    <td bgcolor="#339933"><button type="button" id="btn2400" onclick="Input2400();">2400</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn2200" onclick="Input2200();">2200</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn2000" onclick="Input2000();">2000</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn1800" onclick="Input1800();">1800</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn1600" onclick="Input1600();">1600</button></td>
                                 </tr>
                                 <tr style="color: white;">
                                    <td bgcolor="#339933"><button type="button" id="btn1400" onclick="Input1400();" >1400</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn1200" onclick="Input1200();">1200</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn1000" onclick="Input1000();">1000</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn800" onclick="Input800();">800</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn600" onclick="Input600();">600</button></td>
                                 </tr>
                                 <tr style="color: white;">
                                    <td bgcolor="#339933"><button type="button" id="btn400" onclick="Input400();">400</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn200" onclick="Input200();" >200</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn100" onclick="Input100();">100</button></td>
                                    <td bgcolor="#339933"><button type="button" id="btn50" onclick="Input50();">50</button></td>
                                    <td bgcolor="#339933">&nbsp;</td>
                                 </tr>
                            </table> 
                                <br/>
                                <table width="100%" border="2" cellspacing="1" cellpadding="1" style="font-size:12px;">
                                    <tr>
                                    <?php 
                                      for($i=1;$i<=5;$i++)
                                      {                        
                                         //echo '<td align="center" bgcolor="#663366"><a style="background-color:#663366;font-size:9;color:#FFF;height:100%;width:40px; cursor:pointer;"  href="javascript:void(0)" onclick="InputWinNo'.$i.'();">Winner No:'.$i.'</a></td>';
                                         echo '<td align="center" bgcolor="#330033"><a style="font-size:12;font-weight:bold;color:#009933;height:100%;width:40px; cursor:pointer;"  href="javascript:void(0)" onclick="InputWinNo'.$i.'();">WIN</a></td>';
                                      }
                                    ?>   
                                    </tr>
                                    <tr>
                                        <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin1" onclick="Input1();">1</a></span></td>
                                        <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin2" onclick="Input2();">2</a></span></td>
                                        <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin3" onclick="Input3();">3</a></span></td>
                                        <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin4" onclick="Input4();">4</a></span></td>
                                        <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin5" onclick="Input5();">5</a></span></td>
                                      </tr>
                                    <tr>
                                    <?php 
                                      for($i=6;$i<=10;$i++)
                                      {
                                        //echo '<td align="center" bgcolor="#663366"><a style="background-color:#663366;font-size:9;color:#FFF;height:100%;width:40px; cursor:pointer;" href="javascript:void(0)" onclick="InputWinNo'.$i.'();">Winner No:'.$i.'</a></td>';
                                        echo '<td align="center" bgcolor="#330033"><a style="font-size:12;font-weight:bold;color:#009933;height:100%;width:40px; cursor:pointer;" href="javascript:void(0)" onclick="InputWinNo'.$i.'();">WIN</a></td>';
                                      }
                                    ?>
                                            </tr>
                                            <tr>
                                              <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin6" onclick="Input6();">6</a></span></td>
                                              <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin7" onclick="Input7();">7</a></span></td>
                                              <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin8" onclick="Input8();">8</a></span></td>
                                              <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin9" onclick="Input9();">9</a></span></td>
                                              <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin10" onclick="Input10();">10</a></span></td>
                                            </tr>
                                            <tr>
                                    <?php 
                                  for($i=11;$i<=15;$i++)
                                  {
                                    //echo '<td align="center" bgcolor="#663366"><a style="background-color:#663366;font-size:9;color:#FFF;height:100%;width:40px; cursor:pointer;" href="javascript:void(0)" onclick="InputWinNo'.$i.'();">Winner No:'.$i.'</a></td>';
                                    echo '<td align="center" bgcolor="#330033"><a style="font-size:12;font-weight:bold;color:#009933;height:100%;width:40px; cursor:pointer;" href="javascript:void(0)" onclick="InputWinNo'.$i.'();">WIN</a></td>';
                                  }
                                    ?>
                                    </tr>
                                    <tr>
                                      <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin11" onclick="Input11();">11</a></span></td>
                                      <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin12" onclick="Input12();">12</a></span></td>
                                      <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin13" onclick="Input13();">13</a></span></td>
                                      <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin14" onclick="Input14();">14</a></span></td>
                                      <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin15" onclick="Input15();">15</a></span></td>
                                    </tr>
                                    <tr>
                                    <?php 
                                      for($i=16;$i<=20;$i++)
                                      {
                                        //echo '<td align="center" bgcolor="#663366"><a style="background-color:#663366;font-size:9;color:#FFF;height:100%;width:40px; cursor:pointer;" href="javascript:void(0)" onclick="InputWinNo'.$i.'();">Winner No:'.$i.'</a></td>';
                                        echo '<td align="center" bgcolor="#330033"><a style="font-size:12;font-weight:bold;color:#009933;height:100%;width:40px; cursor:pointer;" href="javascript:void(0)" onclick="InputWinNo'.$i.'();">WIN</a></td>';
                                      }
                                    ?>
                                    </tr>
                                    <tr>
                                  <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin16" onclick="Input16();">16</a></span></td>
                                  <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin17" onclick="Input17();">17</a></span></td>
                                  <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin18" onclick="Input18();">18</a></span></td>
                                  <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin19" onclick="Input19();">19</a></span></td>
                                  <td align="center" bgcolor="#222222"><span style="color: black;"><a href="javascript:void(0)" class="button" style="color:#FFF;font-weight:bold;" id="btnwin20" onclick="Input20();">20</a></span></td>
                                </tr>
                            </table>
                            <p><span style="margin-left:80px;margin-top:20px;"><button type="button" class="btn btn-danger" id="btnaddnew" onclick="SaveDetail1234();">Save</button></span></p>
                                <!-- <table width="100%" border="1" cellspacing="1" cellpadding="1">    
                                      <tbody>
                                        <tr>
                                          <td>Min To Race</td>
                                          <td>
                                              <input name="txtMin" type="text" value="30" id="txtMin" style="width:100px"/>
                                              <span style="color:#F00;font-size:Large;font-weight:bold;width:100%;" id="m_timer">00:00</span>
                                          </td>
                                          
                                        </tr>
                                        <tr>
                                          <td>Start Time</td>
                                          <td><span id="lblStartTime">1/28/2015 7:11:36 PM</span></td>
                                        
                                        </tr>
                                        <tr>
                                          <td align="left"><input type="button" name="cmdStart" value="Start" id="cmdStart" style="width:74px;" onclick="StartTime();"/></td>
                                          <td align="right"><input type="button" name="cmdStop" value="Stop" id="cmdStop" style="width:74px;" onclick="StopTime();"/></td>
                                        
                                        </tr>
                                      </tbody>
                               </table> -->
                            <br>
                             <table width="100%" border="2" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                        <input type="button" class="btn"  name="cmdRacingSave" value="Save" id="cmdRacingSave" style="width:23%;" onclick="RacingSave();">
                                        <input type="button" class="btn" name="cmdRacingClear" value="Clear" id="cmdRacingClear" style="width:26%;" onclick="ClearRacing();">
                                        <input type="button" class="btn" name="cmdCOnfirmResult" onclick="ConfirmResult();"   value="Confirm Result" id="cmdCOnfirmResult" style="width:45%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1st</td>
                                        <td align="center">
                                            <input name="txtWinNo" type="text" maxlength="2" id="txtWinNo" style="width:80px;" >                
                                        </td>
                                        <td align="center">
                                            <input name="txtWinBy1" type="text" maxlength="3" id="txtWinBy1" style="width:80px; " >                
                                        </td>
                                        <td align="center">
                                            <select name="cmbUnit1" id="cmbUnit1" style="width:140px;">
                                                <option selected="selected" value=""></option>
                                                <option value="1/4马位">1/4 LEN</option>
                                                <option value="1/2马位">1/2 LEN</option>
                                                <option value="3/4马位">3/4 LEN</option>
                                                <option value="马位">LEN</option>
                                                <option value="马鼻">NOSE</option>
                                                <option value="马颈">NECK</option>
                                                <option value="短马头">S HEAD</option>
                                                <option value="马头">HEAD</option>
                                                <option value="庞大距离">DISTANCE</option>
                                                <option value="确定赢">CONFIRM</option>
                                                <option value="拍照">PHOTO</option>
                                                <option value="双冠军">1st D HEAT</option>
                                                <option value="双亚军">2nd D HEAT</option>
                                                <option value="双季军">3rd D HEAT</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2nd</td>
                                        <td align="center">
                                            <input name="txtWinNo2" type="text" maxlength="2" id="txtWinNo2" style="width:80px;" >                
                                        </td>
                                        <td align="center">
                                            <input name="txtWinBy2" type="text" maxlength="3" id="txtWinBy2" style="width:80px;" >                
                                        </td>
                                        <td align="center">
                                            <select name="cmbUnit2" id="cmbUnit2" style="width:140px;">
                                                <option selected="selected" value=""></option>
                                                <option value="1/4马位">1/4 LEN</option>
                                                <option value="1/2马位">1/2 LEN</option>
                                                <option value="3/4马位">3/4 LEN</option>
                                                <option value="马位">LEN</option>
                                                <option value="马鼻">NOSE</option>
                                                <option value="马颈">NECK</option>
                                                <option value="短马头">S HEAD</option>
                                                <option value="马头">HEAD</option>
                                                <option value="庞大距离">DISTANCE</option>
                                                <option value="确定赢">CONFIRM</option>
                                                <option value="拍照">PHOTO</option>
                                                <option value="双冠军">1st D HEAT</option>
                                                <option value="双亚军">2nd D HEAT</option>
                                                <option value="双季军">3rd D HEAT</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3rd</td>
                                        <td align="center">
                                            <input name="txtWinNo3" type="text" maxlength="2" id="txtWinNo3" style="width:80px;" >                
                                        </td>
                                        <td align="center">
                                            <input name="txtWinBy3" type="text" maxlength="3" id="txtWinBy3" style="width:80px;">                
                                        </td>
                                        <td align="center">
                                            <select name="cmbUnit3" id="cmbUnit3" style="width:140px;">
                                              <option selected="selected" value=""></option>
                                              <option value="1/4马位">1/4 LEN</option>
                                              <option value="1/2马位">1/2 LEN</option>
                                              <option value="3/4马位">3/4 LEN</option>
                                              <option value="马位">LEN</option>
                                              <option value="马鼻">NOSE</option>
                                              <option value="马颈">NECK</option>
                                              <option value="短马头">S HEAD</option>
                                              <option value="马头">HEAD</option>
                                              <option value="庞大距离">DISTANCE</option>
                                              <option value="确定赢">CONFIRM</option>
                                              <option value="拍照">PHOTO</option>
                                              <option value="双冠军">1st D HEAT</option>
                                              <option value="双亚军">2nd D HEAT</option>
                                              <option value="双季军">3rd D HEAT</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4th</td>
                                        <td align="center">
                                            <input name="txtWinNo4" type="text" maxlength="2" id="txtWinNo4" style="width:80px;" >                
                                        </td>
                                        <td align="center">
                                            <input name="txtWinBy4" type="text" maxlength="3" id="txtWinBy4" style="width:80px;">                
                                        </td>
                                        <td align="center">
                                            <select name="cmbUnit4" id="cmbUnit4" style="width:140px;">
                                                <option selected="selected" value=""></option>
                                                <option value="1/4马位">1/4 LEN</option>
                                                <option value="1/2马位">1/2 LEN</option>
                                                <option value="3/4马位">3/4 LEN</option>
                                                <option value="马位">LEN</option>
                                                <option value="马鼻">NOSE</option>
                                                <option value="马颈">NECK</option>
                                                <option value="短马头">S HEAD</option>
                                                <option value="马头">HEAD</option>
                                                <option value="庞大距离">DISTANCE</option>
                                                <option value="确定赢">CONFIRM</option>
                                                <option value="拍照">PHOTO</option>
                                                <option value="双冠军">1st D HEAT</option>
                                                <option value="双亚军">2nd D HEAT</option>
                                                <option value="双季军">3rd D HEAT</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>      
                          </div>
                         
                          <div class="col-md-3">
                            <table cellpadding="2" cellspacing="2" border="0">
                              <tbody>
                                  <tr>
                                      <td>
                                        <select name="cmbCat1" class="form-control" id="cmbCat1" style="background-color:#FFFF99;width:220px; ">
                                        </select>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                      <select size="4" class="form-control" name="ItemName" style="background-color:#FFFF99;height:300px;" id="lstItem"  onchange="LoadItem();">   
                                      </select>
                                      </td>
                                  </tr>
                              </tbody>
                            </table>
                            <br>
                            <br>
                            <table cellpadding="2" cellspacing="2" border="0">
                              <tbody>
                                  <tr>
                                      <td>
                                          <select name="cmbCat3" class="form-control" id="cmbCat3" style="background-color:#FF99FF;"> 
                                          </select>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <select size="4" class="form-control" name="ItemName3" id="lstItem3" style="background-color:#FF99FF;height:300px;" onclick="LoadItem3();" >
                                          </select>
                                      </td>
                                  </tr>
                              </tbody>
                            </table> 
                          </div>
                          <div class="col-md-3">
                            <table cellpadding="2" cellspacing="2" border="0">
                                <tbody>
                                  <tr>
                                    <td>
                                        <select name="cmbCat2" class="form-control" id="cmbCat2" style="background-color:#99FF66;" >
                                        </select>
                                    </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <select size="4" class="form-control" name="ItemName2" id="lstItem2" style="background-color:#99FF66;height:300px;" onclick="LoadItem2();">
                                          </select>
                                      </td>
                                  </tr>
                                </tbody>
                              </table>
                              <br>
                              <br>          
                             <table cellpadding="2" cellspacing="2" border="0">
                                <tbody>
                                  <tr>
                                    <td>
                                      <select name="cmbCat4" class="form-control" id="cmbCat4" style="background-color:#99CCFF;"> 
                                      </select>
                                    </td>
                                  </tr>
                                    <tr>
                                      <td>
                                          <select size="4" class="form-control" name="ItemName4" id="lstItem4" style="background-color:#99CCFF;height:300px;" onclick="LoadItem4();" > 
                                          </select>
                                      </td>
                                    </tr>
                                </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td width="23%" valign="top">&nbsp;</td>
                          <td width="19%" valign="top">&nbsp;</td>
                          <td>
                              
                          </td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>  
                </div>  
             </div>
                       
            </div>
          </div>  
          </div>
  </form>
      </div>
</div>
<!-- table end -->

<!-- page end-->
</section>
      
      
      <!-- confirm result -->
      <section class="panel" id="sectionres" style="display:none">
                          <form class="form-horizontal" role="form">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th colspan="6" class="text-center"><span id="RaceCariD">16/02/2015</span></th>
                              </tr>
                              <tr>
                                  <th style="font-size: small; color: #FFFFFF; background-color: #666666">No</th>
                                  <th style="font-size: small; color: #FFFFFF; background-color: #666666">Length</th>
                                  <th style="font-size: small; color: #FFFFFF; background-color: #666666">Win</th>
                                  <th style="font-size: small; color: #FFFFFF; background-color: #666666">Place</th>
                                  <th  style="font-size: small;text-align: right; background-color: #B5E61D;">Win</th>
                                  <th  style="font-size: small;text-align: right; background-color: #B5E61D;">Place</th>
                              </tr>
                              </thead>
                              <tbody>                              
                              <tr>
                                  <td><input type="text" class="form-control" placeholder="" id="txtNo1"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtLengh1"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtWin1"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtPlace1"></td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" id="txtWin1_s">
                                  </td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" id="txtPlace1_s">
                                  </td>
                              </tr>
                              <tr>
                                  <td><input type="text" class="form-control" placeholder="" id="txtNo2"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtLengh2"></td>
                                  <td style="background-color: #666666">&nbsp;</td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtPlace2"></td>
                                  <td  style="background-color: #5CB900;">
                                    <!--<input type="text" class="form-control" placeholder="" id="txtWin2_s">-->
                                  </td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtPlace2_s">
                                  </td>
                              </tr>
                              <tr>
                                  <td><input type="text" class="form-control" placeholder="" id="txtNo3"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtLengh3"></td>
                                  <td style="background-color: #666666">&nbsp;</td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtPlace3"></td>
                                  <td  style="background-color: #5CB900;">
                                    <!--<input type="text" class="form-control" placeholder="" id="txtWin3_s">-->
                                  </td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtPlace3_s">
                                  </td>
                              </tr>
                              <tr>
                                  <td><input type="text" class="form-control" placeholder="" id="txtNo4"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtLength4"></td>
                                  <td style="background-color: #666666">&nbsp;</td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtPlace4"></td>
                                  <td  style="background-color: #5CB900;">
                                    <!--<input type="text" class="form-control" placeholder="" id="txtWin4_s">-->
                                  </td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtPlace4_s">
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                          <table class="table table-bordered">
                              <thead>
                              </thead>
                              <tbody>                              
                              <tr>
                                  <th>Timing</th>
                                  <td colspan="4">
                                    <input type="text" class="form-control" placeholder="" id="txtTiming">
                                  </td>
                              </tr>
                              <tr>
                                  <th style="font-size: small; background-color: #EEEEEE;">Forecast</th>
                                  <td style="font-size: small; background-color: #EEEEEE;">
                                    <input type="text" class="form-control" placeholder="" id="txtForeCase">
                                  </td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtForeCase1"></td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtForeCase2">
                                  </td>
                                  <!--<td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="">
                                  </td>-->
                              </tr>
                              <tr>
                                  <td rowspan="3">QPS /Place Forecast</td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtQPS"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtQPS1"></td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtQPS2"></td>
                                  <!--<td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="">
                                  </td>-->
                              </tr>
                              <tr>
                                 
                                  <td style="font-size: small; background-color: #EEEEEE;">
                                    <input type="text" class="form-control" placeholder="" id="txtQPS3">
                                  </td>
                                  <td ><input type="text" class="form-control" placeholder="" id="txtQPS4"></td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtQPS5"></td>
                                  <!--<td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="">
                                  </td>-->
                              </tr>
                              <tr>
                                  
                                  <td><input type="text" class="form-control" placeholder="" id="txtQPS6"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtQPS7"></td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtQPS8">
                                  </td>
                                  <!--<td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="">
                                  </td>-->
                              </tr>
                              <tr>
                                  <th>Tierce</th>
                                  <td><input type="text" class="form-control" placeholder="" id="txtTiere"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtTiere1"></td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtTiere2"></td>
                                 <!-- <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="">
                                  </td>-->
                              </tr>
                              <tr>
                                  <th style="font-size: small; background-color: #EEEEEE;">Trio</th>
                                  <td style="font-size: small; background-color: #EEEEEE;">
                                    <input type="text" class="form-control" placeholder="" id="txtTrio"></td>
                                  <td ><input type="text" class="form-control" placeholder="" id="txtTrio1"></td>
                                  <td style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtTrio2">
                                  </td>
                                  <!--<td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder=""></td>-->
                              </tr>
                              <tr>
                                  <th style="font-size: small; background-color: #EEEEEE;">Quartet</th>
                                  <td style="font-size: small; background-color: #EEEEEE;">
                                    <input type="text" class="form-control" placeholder="" id="txtQuartet"></td>
                                  <td ><input type="text" class="form-control" placeholder="" id="txtQuartet1"></td>
                                  <td style="font-size: small;text-align: right; background-color: #B5E61D;"> 
                                    <input type="text" class="form-control" placeholder="" id="txtQuartet2">
                                  </td>
                                  <!--<td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="">
                                  </td>-->
                              </tr>
                              <tr>
                                  <th>Quadro</th>
                                  <td><input type="text" class="form-control" placeholder="" id="txtQuadro"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtQuadro1"></td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtQuadro2"></td>
                                  <!--<td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="">
                                  </td>-->
                              </tr>
                              </tbody>
                          </table>
                          <div class="col-lg-12" style="padding:10px">
                           <p>
                                <button type="button" style="width: 100px" href="" class="btn btn-danger" onclick="SaveRaceResultDetail();">Save</button>
                                <button type="button" style="margin-left: 10px; width: 100px" href="" class="btn btn-default" id="btnClearRR">Clear</button>
                                <button type="reset" style="margin-left: 10px; width: 100px" href="" class="btn btn-default" id="btnCancel">Cancel</button></p>
                          </div>
        </form>
      </section>
      <!-- end confirm result -->

      <!-- goto race card -->
        <section class="wrapper site-min-height" id="section2" style="display:none;">
          <div class="row">     
            <div class="panel">
              <div class="panel-body">
                <div class="col-md-5">
                  <form class="form-horizontal" role="form">
                                     <span id="RaceCard_ID" style="display:none"></span>
                    <div class="form-group">
                      <label class="col-lg-12 control-label">Race date: <span id="RaceDate">/02/2015</span></label>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 col-sm-2 control-label">Title: </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" placeholder="" id="txt_RaceTitle">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 col-sm-2 control-label">Details: </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" placeholder="" id="txt_RaceDetail">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 col-sm-2 control-label"><strong>Horse: </strong></label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" style="width:80px;" id="txt_Horse">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-5">
              
                  <form class="form-horizontal" role="form">
                    <div class="form-group">
                      <label class="col-lg-12 control-label">Race no: 
                        <!-- <span id="spanRaceNo"></span> -->
                        <select id="chooseRaceNo"></select>
                      </label>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 col-sm-2 control-label">Chinese: </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" placeholder="" id="txt_RaceCN">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 col-sm-2 control-label">Chinese: </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" placeholder="" id="txt_RaceCN1">
                      </div>
                    </div>
                    <div class="form-group">
                      <p class="text-center">
                                            <button type="button" class="btn btn-primary" onclick="UpdateRaceDetail();">Save</button>
                        <!--<a class="btn btn-primary" href="javascript:void(0)"  onclick="UpdateRaceDetail();">Save</a>-->
                        <a class="btn btn-warning" href="javascript:void(0)" id="btnclearrace" onclick="ClearCardDetail();">Clear</a>
                        <a class="btn btn-danger" href="" id="btncancelrace" >Cancel</a>
                      </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="panel">
                        <div class="panel-body">
                <div class="col-md-12">
                  <table class="table table-hover table-bordered" id="tblracedetail"  style="width: 811px !important;">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Horse No</th>
                      <th>Color</th> 
                      <th>Last 6 Runs</th>
                     <!--  <th>Age</th> -->
                    
                     <!--  <th>Past 4/5</th> -->
                      <th>HorseName</th>
                      <th>Jockey</th>
                      <th>Br</th>  
                      <th>Rtg</th>
                      <th>Wt</th>
                      <th>Hcp</th>
                      <th>Trainer</th>
                      <!-- <th>Priority</th>
                      <th>Gear</th>
                      <th>Sire-Dam</th>
                      <th>Owner</th> -->
                      <th>马名</th>
                      <th>骑师</th>
                      <th>练马师</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody class="text-center" id="">
                                        <?php 
                                            for($i=1;$i<=20;$i++){
                                                echo '<tr>';
                                                echo '<td >'.$i.'</td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="HorseNo'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="color'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="past'.$i.'"></span></td>';
                                                //echo '<td ><span class="SCR'.$i.'"></span><span id="Age'.$i.'"></span></td>';
                                                
                                                //echo '<td ><span class="SCR'.$i.'"></span><span id="past'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="horsename'.$i.'"></span></td>';         
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="jock'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="br'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="Rtg'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="wt'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="hcp'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="train'.$i.'"></span></td>';
                                                //echo '<td ><span class="SCR'.$i.'"></span><span id="priority'.$i.'"></span></td>';
                                                //echo '<td ><span class="SCR'.$i.'"></span><span id="gear'.$i.'"></span></td>';
                                                //echo '<td ><span class="SCR'.$i.'"></span><span id="sire'.$i.'"></span></td>';
                                                //echo '<td ><span class="SCR'.$i.'"></span><span id="owner'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="horsecn1'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="horsecn2'.$i.'"></span></td>';
                                                echo '<td ><span class="SCR'.$i.'"></span><span id="spItemcn'.$i.'"></span></td>';
                                                echo '<td><a class="btn btn-primary" style="margin-left:-8px; margin-right:-8px;" href="javascript:void(0)" id="EditHorse'.$i.'">Edit</a></td> ';
                                                //echo '<td><a class="btn btn-primary" style="margin-left:-8px; margin-right:-8px;" href="javascript:void(0)" type="button" id="Scratch'.$i.'" onclick="Scratch('.$i.')">Scratch</a></td>';
                                                //echo '<td><a class="btn btn-primary" style="margin-left:-8px; margin-right:-8px;" href="javascript:void(0)" type="button" onclick="AddJockyColor('.$i.')" >Jocky Color</a></td>';
                                                echo '<td><a class="btn btn-primary" style="margin-left:-8px; margin-right:-8px;" href="javascript:void(0)" type="button" id="Scratch'.$i.'" >Scratch</a></td>';
                                                echo '<td><a class="btn btn-primary" style="margin-left:-8px; margin-right:-8px;" href="javascript:void(0)" type="button" id="jockColor'.$i.'"  >Jocky Color</a></td>';
                                            }
                                        ?>
                      
                    </tbody>
                  </table>

                </div>
              </div>
              <div class="row">
                <p class="text-center">
                  <a class="btn btn-primary" href="javascript:void(0)" onclick="SaveExample();">Save</a>
                  <a class="btn btn-warning" href="javascript:void(0)" onclick="ClearAllHorseInfo();" type="button">Clear All</a>
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <form class="form-horizontal" role="form">
              <div class="panel">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      
                      <span id="txtID" style="display:none"></span>

                      <div class="form-group">
                      <label class="col-lg-3 col-sm-3 control-label">HorseNo: </label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="" id="txt_HorseNoDetail">
                      </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label">HorseName: </label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" placeholder="" id="txt_HorseName">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">马名</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_Item">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Past 4/5: </label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_past_45">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Rtg: </label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_rtg">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Jockey: </label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_jockey">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">骑师: </label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_Item1">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Hcp: </label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_Hcp">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Br: </label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_br">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Trainer: </label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_trainer">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">练马师: </label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_Item3">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Weight: </label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_Weight">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Handicap: </label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" placeholder="" id="txt_Handicap_H">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <p class="text-center">
                      <a class="btn btn-primary" href="javascript:void(0)" onclick="SaveHorseInfo();" type="button">Save</a>
                      <a class="btn btn-warning" href="javascript:void(0)" onclick="ClearHorseInfo();">Clear</a>
                    </p>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="row">
            <form class="form-horizontal" role="form">
              <div class="panel">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-10">
                      <textarea class="form-control" rows="8" id="ContentConvert"></textarea>
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-danger" style="margin-bottom: 5px; width:150px"  onclick="ConvertExecl();">Execl convert</button><br />
                      <button type="button" class="btn btn-primary" style="margin-bottom: 5px; width:150px" onclick="ConvertSin();">Sin turn convert</button><br />
                      <button type="button" class="btn btn-default" style="margin-bottom: 5px; width:150px" onclick="ConvertMalSin();">Sin Mal convert</button><br />
                      <button type="button" class="btn  " style="margin-bottom: 5px; width:150px" onclick="ConvertSinSin();">Sin Sin convert</button><br />
                      <button type="button" class="btn btn-success" style="margin-bottom: 5px; width:150px" onclick="ConvertWin();">winner21 convert</button><br />
                      <button type="button" class="btn btn-info" style="margin-bottom: 5px; width:150px"    onclick="ConvertHK();">HK turf convert</button><br />
                      <button type="button" class="btn btn-warning" style="margin-bottom: 5px; width:150px" onclick="ConvertMC();">Macau turf convert</button><br />
                      <button type="button" class="btn btn-danger" style="margin-bottom: 5px; width:150px"  onclick="ConvertCN();">Chinese convert</button><br />
                    </div>
                    <div class="col-md-12">
                      <div class="col-md-4"></div>
                      <div class="col-md-5"><button type="button" class="btn" onclick="ClearConvert();" >Clear Convert</button></div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </section>

      <!-- end goto race card -->

      <div id="popupjocky" style="width:600px;display:none;background: none repeat scroll 0% 0% #FFF !important;">
         <div >
            <div id=""></div>
              <span id="idHorseNo" style="display:none;"></span>
              <textarea  rows="6" class="form-control" id="imageColor"></textarea>
            <div>
                <input type="text" class="form-control" name="myfile" id="myfile">
                <input type="button" value="Add"  onclick  = "AddColor();"/> 
            </div>
         </div>
      </div>
</section>
<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/racecard.js"); ?>"></script>
  <!--main content end