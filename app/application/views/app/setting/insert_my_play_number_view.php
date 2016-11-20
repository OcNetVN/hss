<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #2F4F4F; font-size:X-Large;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                         <div style="vertical-align: middle; color: white;padding:10px;">
                         <?php
                              echo $this->lang->line(LANG_MY_PLAY_NUMBER);
                          ?>
                         </div>
                    </td>
                    <td width="10%" align="right">
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
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                          <tr >
                            <td width="100%" style="padding: 10px;" align="center" >
                                <?php echo $this->lang->line(LANG_LOTTRY);?>
                            </td>
                          </tr>
                          <tr >
                            <td width="100%" style="padding: 10px;" align="center">
                                <select class="form-control" name="sechoose" id="sechoose">
                                    <option value="damacai">Damacai</option>
                                    <option value="magnum">Magnum</option>
                                    <option value="toto">TOTO</option>
                                    <option value="sinfourd">SIN 4D</option>
                                    <option value="sintoto">SIN TOTO</option>
                                    <option value="cashsweep">Cash sweep</option>
                                    <option value="stc4d">STC 4D</option>
                                    <option value="sabah88">Sabah 88</option>
                                </select>
                            </td>
                          </tr>
                          <tr>
                            <td width="100%" style="padding: 10px;" align="center">
                                <div class="calendar-block ">
                                    <div class="cal1">
                                    </div>
                                </div>  
                            </td>
                            
                          </tr>
                          <tr>
                              <td style="padding:10px;background-color:white;" align="center">
                                  <span style="color:red;">Date Choose</span><input type="text" id="txtdate" readonly class="form-control">
                              </td>
                          </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                     <td>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                            <tr>
                               <td colspan="2"> No</td>
                            </tr>
                            <tr>
                              <td width="10%">1</td>
                              <td width="90%">
                                <input type="text" class="form-control" id="txtNo1">
                              </td>
                            </tr>
                            <tr>
                              <td width="10%">2</td>
                              <td width="90%">
                                <input type="text" class="form-control" id="txtNo2">
                              </td>
                            </tr>
                            <tr>
                              <td width="10%">3</td>
                              <td width="90%">
                                <input type="text" class="form-control" id="txtNo3">
                              </td>
                            </tr>
                            <tr>
                              <td width="10%">4</td>
                              <td width="90%">
                                <input type="text" class="form-control" id="txtNo4"></td>
                            </tr>
                            <tr>
                              <td width="10%">5</td>
                              <td width="90%">
                                <input type="text" class="form-control" id="txtNo5">
                              </td>
                            </tr>
                          </table>
                     </td>
                  </tr>

                  <tr>
                     <td>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                            <tr>
                               <td colspan="7" align="center">Insert Your Play Toto Number</td>
                               
                            </tr>
                            <tr>
                              <td>1</td>
                              <td><input type="text" class="form-control" id="txtNo1_1"></td>
                              <td><input type="text" class="form-control" id="txtNo1_2"></td>
                              <td><input type="text" class="form-control" id="txtNo1_3"></td>
                              <td><input type="text" class="form-control" id="txtNo1_4"></td>
                              <td><input type="text" class="form-control" id="txtNo1_5"></td>
                              <td><input type="text" class="form-control" id="txtNo1_6"></td>
                              <!-- <td><input type="text" class="form-control" id="txtNo1_7"></td> -->
                            </tr>
                            <tr>
                              <td>2</td>
                              <td><input type="text" class="form-control" id="txtNo2_1"></td>
                              <td><input type="text" class="form-control" id="txtNo2_2" ></td>
                              <td><input type="text" class="form-control" id="txtNo2_3"></td>
                              <td><input type="text" class="form-control" id="txtNo2_4" ></td>
                              <td><input type="text" class="form-control" id="txtNo2_5" ></td>
                              <td><input type="text" class="form-control" id="txtNo2_6" ></td>
                             <!--  <td><input type="text" class="form-control" id="txtNo2_7"></td> -->
                            </tr>
                            <tr>
                              <td>3</td>
                              <td><input type="text" class="form-control" id="txtNo3_1" ></td>
                              <td><input type="text" class="form-control" id="txtNo3_2" ></td>
                              <td><input type="text" class="form-control" id="txtNo3_3" ></td>
                              <td><input type="text" class="form-control" id="txtNo3_4" ></td>
                              <td><input type="text" class="form-control" id="txtNo3_5" ></td>
                              <td><input type="text" class="form-control" id="txtNo3_6"  ></td>
                              <!-- <td><input type="text" class="form-control" id="txtNo3_7" ></td> -->
                            </tr>
                            <tr>
                              <td>4</td>
                              <td><input type="text" class="form-control" id="txtNo4_1" ></td>
                              <td><input type="text" class="form-control" id="txtNo4_2" ></td>
                              <td><input type="text" class="form-control" id="txtNo4_3" ></td>
                              <td><input type="text" class="form-control" id="txtNo4_4" ></td>
                              <td><input type="text" class="form-control" id="txtNo4_5" ></td>
                              <td><input type="text" class="form-control" id="txtNo4_6" ></td>
                              <!-- <td><input type="text" class="form-control" id="txtNo4_7"  ></td> -->
                            </tr>
                            <tr>
                              <td>5</td>
                              <td><input type="text" class="form-control" id="txtNo5_1" ></td>
                              <td><input type="text" class="form-control" id="txtNo5_2" ></td>
                              <td><input type="text" class="form-control" id="txtNo5_3" ></td>
                              <td><input type="text" class="form-control" id="txtNo5_4" ></td>
                              <td><input type="text" class="form-control" id="txtNo5_5" ></td>
                              <td><input type="text" class="form-control" id="txtNo5_6" ></td>
                              <!-- <td><input type="text" class="form-control" id="txtNo5_7"></td> -->
                            </tr>
                          </table>
                     </td>
                  </tr>
                  <tr>
                    <td align="center" style="margin:20px;">
                      <input class="btn btn-primary btn-lg" type="button" name="btnsave" value=" Save "  onclick="SaveMyPlay();"/>
                      <input class="btn btn-warning btn-lg" type="button" name="btnsave" value=" Clear "  onclick="ClearAll();"/>
                    </td>
                  </tr>
                  <tr>
                      <td align="center" >
                        <span id="span_tb" style="color:red;"></span>
                      </td>
                  </tr>
            </table>
    </td>
  </tr>
  <tr>
    <td>
      <div style="height:350px;">&nbsp;</div>
    </td>
  </tr>
</table>