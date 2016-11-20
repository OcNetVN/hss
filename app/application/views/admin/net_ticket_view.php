<!--main content start-->
  <section id="main-content">
      <section class="wrapper site-min-height" id="SecRaceInfo">
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
                              <br>
                              <br>
                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                <tbody>
                                    <tr>
                                        <td>Header1</td>
                                        <td><input name="txtHeader1" type="text"  id="txtHeader1" style="background-color:#FFFF99;width:100%;" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Header2</td>
                                        <td><input name="txtHeader2" type="text" id="txtHeader2" style="background-color:#99FF66;width:100%;">
                                        </td>
                                       
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
                                        <button type="button" class="btn btn-danger" id="btnaddnew" onclick="SaveDetail1234();">Save</button>
                                        <button type="button" class="btn" id="btnClear_Hearder">Clear</button>
                                      </td>
                                    </tr>   
                                </tbody>
                              </table>
                                
                          </div>
                          <div class="col-md-7">
                              <label>Race Card ID:(CN-YY-MM-DD-RC)</label>
                              <select name="cmbRaceCardID" id="cmbRaceCardID">
                              </select>
                              <br>
                              <br />
                               <table width="100%" border="0" cellspacing="1" cellpadding="1">
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
                                        <input name="txtIT" type="text"  maxlength="20" id="txtIT" style="width:50%" /></td>
                                      <td colspan="2">EarlyTic
                                        <input name="txtET" type="text"  maxlength="20" id="txtET" style="width:50%" /></td>
                                    </tr>
                                    <tr>
                                      <td>Header3:
                                        <input name="txtIT1" type="text"  maxlength="2" id="txtIT1" style="width:35%" />
                                      </td>
                                      <td align="left">
                                        <input name="txtITP1" type="text"  maxlength="10" id="txtITP1" style="width:90%" />
                                      </td>
                                      <td align="right">
                                        <input name="txtIT2" type="text"  maxlength="2" id="txtIT2" style="width:35%" />
                                      </td>
                                      <td align="left">
                                        <input name="txtITP2" type="text"  maxlength="10" id="txtITP2" style="width:90%" />
                                      </td>
                                      <td align="right">
                                        <input name="txtIT2" type="text"  maxlength="2" id="txtIT3N" style="width:50%" />
                                      </td>
                                      <td align="left">
                                        <input name="txtITP2" type="text"  maxlength="10" id="txtITP3N" style="width:100%" />
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Header4:
                                        <input name="txtIT3" type="text"  maxlength="2" id="txtIT3" style="width:35%" /></td>
                                      <td align="left">
                                        <input name="txtITP3" type="text"  maxlength="10" id="txtITP3" style="width:90%" />
                                      </td>
                                      <td align="right">
                                        <input name="txtIT4" type="text"  maxlength="2" id="txtIT4" style="width:35%" />
                                      </td>
                                      <td align="left">
                                        <input name="txtITP4" type="text"  maxlength="10" id="txtITP4" style="width:90%" />
                                      </td>
                                      <td align="right">
                                        <input name="txtIT4" type="text"  maxlength="2" id="txtIT5" style="width:50%" />
                                      </td>
                                      <td align="left">
                                        <input name="txtITP4" type="text"  maxlength="10" id="txtITP5" style="width:100%" />
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
                                          </button>
                                      </td>
                                    </tr>
                                  </tbody>
                               </table>
                                <br/>
                                <table width="100%" border="1" cellspacing="1" cellpadding="1">    
                                      <tbody>
                                        <tr>
                                          <td>Min To Race</td>
                                          <td>
                                              <input name="txtMin" type="text" value="30" id="txtMin" style="width:100px"/>
                                              <span style="color:black;font-size:Large;font-weight:bold;width:100%;" id="time_myflag">00:00</span>
                                              <span style="color:green;font-size:Large;font-weight:bold;width:100%;display:none;" id="time_sgflag">00:00</span>
                                              <span style="color:blue;font-size:Large;font-weight:bold;width:100%;display:none;" id="time_hkflag">00:00</span>
                                              <span style="color:blue;font-size:Large;font-weight:bold;width:100%;display:none;" id="time_mcflag">00:00</span>
                                              <span style="color:blue;font-size:Large;font-weight:bold;width:100%;display:none;" id="time_saflag">00:00</span>
                                              <span style="color:blue;font-size:Large;font-weight:bold;width:100%;display:none;" id="time_auflag">00:00</span>
                                              <span style="color:blue;font-size:Large;font-weight:bold;width:100%;display:none;" id="time_euflag">00:00</span>
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
                               </table>  
                          </div> 
                       </div>
                    </div>
                  </div>
                </div>  
                </div>
            </form>
          </div>
        </div>
      </section>
</section>
  <!--main content end