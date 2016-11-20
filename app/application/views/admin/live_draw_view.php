<!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              
              <!-- table start -->
              <div class="row">      
                  <div class="col-md-12">
                    <div class="panel">
                      <div class="panel-body">
                        <table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr >
                                <td id="trdatatime" width="30%">
                                  <div class="calendar-block ">
                                    <div class="cal1">
                                    </div>
                                  </div> 
                                        <!-- <p class="text-center">
                                            <div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                                  <input type="text" value="12-10-2015" readonly size="16" id="txtdate" class="form-control">
                                                  <span class="input-group-btn add-on">
                                                        <button class="btn btn-danger" type="button"><i class="icon-calendar" style="height: 15px;"></i></button>
                                                      </span>                                                  
                                              </div>
                                        </p> -->
                                  </div>
                                </td>
                                <td  align="center" width="50%">
                                  <select class="form-control" name="sechoose" id="sechoose" style="width:50%;">
                                    <option value="damacai">DAMACAI</option>
                                    <option value="magnum">MAGNUM</option>
                                    <option value="toto">TOTO</option>
                                    <option value="sinfourd">SIN 4D</option>
                                    <option value="sintoto">SIN TOTO</option>
                                  </select>

                                  <br/>
                                  Date show :<input type="text" id="txtdate" readonly="readonly" class="form-control" style="width:30%;">
                                </td>
                            </tr>
                        </table>
                        <form id="frdmc" name="frdmc" method="post" action="">
                          <table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" id="tbldamacai">
                              <tr>
                                <td height="35" width="30%" align="center" valign="bottom"><strong>1st</strong></td>
                                <td height="35" width="30%" align="center" valign="bottom"><strong>2nd</strong></td>
                                <td height="35" width="30%" align="center" valign="bottom"><strong>3rd</strong></td>
                              </tr>
                              <tr>
                                <td height="35" width="30%" align="center" valign="bottom">
                                  <input type="text" name="dmc1" id="dmc1" class="form-control"/ width="25%"><br><!-- <input class="form-control" type="text" id="giaithuong1"> -->
                                </td>
                                <td height="35" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc2" id="dmc2" width="25%" /><br><!-- <input class="form-control" type="text" id="giaithuong2"> --></td>
                                <td height="35" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc3" id="dmc3" width="25%" /><br><!-- <input class="form-control" type="text" id="giaithuong3"> --></td>
                              </tr>
                              <tr>
                                <td height="40" colspan="3" align="center" valign="bottom">
                                	<div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>Special</strong>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td height="40" align="center" width="30%" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_special1" id="dmc_special1" width="25%" />
                                </td>
                                <td height="40" align="center" width="30%" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_special2" id="dmc_special2" width="25%"/>
                                </td>
                                <td height="40" align="center" width="30%" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_special3" id="dmc_special3" width="25%"/>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" align="center" width="30%" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_special4" id="dmc_special4" width="25%"/>
                                </td>
                                <td height="35" align="center" width="30%" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_special5" id="dmc_special5" width="25%"/>
                                </td>
                                <td height="35" align="center" width="30%" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_special6" id="dmc_special6" width="25%"/>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" align="center" width="30%" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_special7" id="dmc_special7" width="25%"/>
                                </td>
                                <td height="35" align="center" width="30%" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_special8" id="dmc_special8" width="25%"/>
                                </td>
                                <td height="35" align="center" width="30%" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_special9" id="dmc_special9" width="25%"/>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" align="center" width="30%" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_special10" id="dmc_special10" width="25%" /></td>
                                <td height="35" align="center" width="30%" valign="bottom">&nbsp;</td>
                                <td height="35" align="center" width="30%" valign="bottom">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="40" width="30%" align="center" valign="bottom">
                                	<div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                	  <input class="btn btn-warning" type="reset"  name="button2" id="button2" value="All Clear"  onclick="ClearAllDamacai();"/>
                                	</div>
                                </td>
                                <td height="40" width="30%" align="center" valign="bottom">
                                	<div style="width:50%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>Consolation</strong>
                                  </div>
                                </td>
                                <td height="40" width="30%" align="center" valign="bottom">
                                	<div style="width:50%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>
                                	     <input class="btn btn-primary" type="button" name="button" id="btnsavedmc" value="Save" />
                                	  </strong>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td height="40" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_con1" id="dmc_con1" width="25%" /></td>
                                <td height="40" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_con2" id="dmc_con2" width="25%" /></td>
                                <td height="40" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_con3" id="dmc_con3" width="25%" /></td>
                              </tr>
                              <tr>
                                <td height="35" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_con4" id="dmc_con4" width="25%"/>
                                </td>
                                <td height="35" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_con5" id="dmc_con5" width="25%"/>
                                </td>
                                <td height="35" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_con6" id="dmc_con6" width="25%"/>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_con7" id="dmc_con7" width="25%"/>
                                </td>
                                <td height="35" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_con8" id="dmc_con8" width="25%"/>
                                </td>
                                <td height="35" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_con9" id="dmc_con9" width="25%"/>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" width="30%" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="dmc_con10" id="dmc_con10" width="25%"/></td>
                                <td height="35" width="30%" align="center" valign="bottom">&nbsp;</td>
                                <td height="35" width="30%" align="center" valign="bottom">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="3">
                                    <span style="color: red; display: none;" id="notifyerr"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                    <span style="color: blue; display: none;" id="notifysuccess"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                </td>
                              </tr>
                          </table>
                        </form>
                            
                        <form id="frmagnum" name="frmagnum" method="post" action="">
                            <table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" id="tblmagnum" style="display: none;">
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <strong>1st</strong>
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <strong>2nd</strong>
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <strong>3rd</strong>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <select name="semagnum1" id="semagnum1">
                                  <option value="">--</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                                  <option value="F">F</option>
                                  <option value="G">G</option>
                                  <option value="H">H</option>
                                  <option value="I">I</option>
                                  <option value="J">J</option>
                                  <option value="K">K</option>
                                  <option value="L">L</option>
                                  <option value="M">M</option>
                                </select></td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <select name="semagnum2" id="semagnum2">
                                  <option value="">--</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                                  <option value="F">F</option>
                                  <option value="G">G</option>
                                  <option value="H">H</option>
                                  <option value="I">I</option>
                                  <option value="J">J</option>
                                  <option value="K">K</option>
                                  <option value="L">L</option>
                                  <option value="M">M</option>
                                </select></td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <select name="semagnum3" id="semagnum3">
                                    <option value="">--</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                    <option value="I">I</option>
                                    <option value="J">J</option>
                                    <option value="K">K</option>
                                    <option value="L">L</option>
                                    <option value="M">M</option>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td height="40" colspan="3" align="center" valign="bottom" width="30%">
                                	<div style="width:80%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>Special</strong></div>
                                </td>
                              </tr>
                              <tr>
                                <td height="40" align="center" valign="bottom" width="30%">A
                                  <input class="form-control" type="text" name="magnum_special1" id="magnum_special1" width="25%" /></td>
                                <td height="40" align="center" valign="bottom" width="30%">B
                                  <input class="form-control" type="text" name="magnum_special2" id="magnum_special2" width="25%"/></td>
                                <td height="40" align="center" valign="bottom" width="30%">C
                                  <input class="form-control" type="text" name="magnum_special3" id="magnum_special3" width="25%"/></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">D
                                  <input class="form-control" type="text" name="magnum_special4" id="magnum_special4" width="25%" /></td>
                                <td height="35" align="center" valign="bottom">E
                                  <input class="form-control" type="text" name="magnum_special5" id="magnum_special5" width="25%"/></td>
                                <td height="35" align="center" valign="bottom">F
                                  <input class="form-control" type="text" name="magnum_special6" id="magnum_special6" width="25%"/></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">G
                                  <input class="form-control" type="text" name="magnum_special7" id="magnum_special7" width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">H
                                  <input class="form-control" type="text" name="magnum_special8" id="magnum_special8" width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">I
                                  <input class="form-control" type="text" name="magnum_special9" id="magnum_special9" width="25%"/></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">J
                                <input class="form-control" type="text" name="magnum_special10" id="magnum_special10" width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">K
                                  <input class="form-control" type="text" name="magnum_special11" id="magnum_special11" width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">L
                                  <input class="form-control" type="text" name="magnum_special12" id="magnum_special12" width="25%"/></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">M
                                  <input class="form-control" type="text" name="magnum_special13" id="magnum_special13" width="25%"/>
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">&nbsp;</td>
                                <td height="35" align="center" valign="bottom" width="30%">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="40" align="center" valign="bottom" width="30%">
                                	<div style="width:70%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                	  <input class="btn btn-warning" type="reset" name="button2" id="button2" value="All Clear"  onclick="ClearAllMagnum();"/>
                                	</div>
                                </td>
                                <td height="40" align="center" valign="bottom" width="30%">
                                	<div style="width:70%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>Consolation</strong></div>
                                </td>
                                <td height="40" align="center" valign="bottom" width="30%">
                                	<div style="width:70%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>
                                	     <input class="btn btn-primary" type="button" name="btnsavemagnum" id="btnsavemagnum" value=" Save " />
                                	  </strong>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td height="40" align="center" valign="bottom" width="30%" >
                                  <input class="form-control" type="text" name="magnum_con1" id="magnum_con1" width="70%" />
                                </td>
                                <td height="40" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="magnum_con2" id="magnum_con2" width="70%"/>
                                </td>
                                <td height="40" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="magnum_con3" id="magnum_con3" width="70%"/>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="magnum_con4" id="magnum_con4" width="70%"/>
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="magnum_con5" id="magnum_con5" width="70%"/>
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="magnum_con6" id="magnum_con6" width="70%"/>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="magnum_con7" id="magnum_con7" width="70%"/>
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="magnum_con8" id="magnum_con8" width="70%"/>
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="magnum_con9" id="magnum_con9" width="70%"/>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="magnum_con10" id="magnum_con10" width="70%"/>
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">&nbsp;</td>
                                <td height="35" align="center" valign="bottom" width="30%">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="3">
                                    <span style="color: red; display: none;" id="notifyerrmagnum"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                    <span style="color: blue; display: none;" id="notifysuccessmagnum"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                </td>
                              </tr>
                            </table>
                        </form>
                            
                        <form id="frtoto" name="frtoto" method="post" action="">
                            <table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" id="tbltoto" style="display: none;">
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%"><strong>1st</strong></td>
                                <td height="35" align="center" valign="bottom" width="30%"><strong>2nd</strong></td>
                                <td height="35" align="center" valign="bottom" width="30%"><strong>3rd</strong></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <select name="setoto1" id="setoto1">
                                  <option value="">--</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                                  <option value="F">F</option>
                                  <option value="G">G</option>
                                  <option value="H">H</option>
                                  <option value="I">I</option>
                                  <option value="J">J</option>
                                  <option value="K">K</option>
                                  <option value="L">L</option>
                                  <option value="M">M</option>
                                </select></td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <select name="setoto2" id="setoto2">
                                  <option value="">--</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                                  <option value="F">F</option>
                                  <option value="G">G</option>
                                  <option value="H">H</option>
                                  <option value="I">I</option>
                                  <option value="J">J</option>
                                  <option value="K">K</option>
                                  <option value="L">L</option>
                                  <option value="M">M</option>
                                </select></td>
                                <td height="35" align="center" valign="bottom">
                                  <select name="setoto3" id="setoto3" width="30%">
                                  <option value="">--</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                                  <option value="F">F</option>
                                  <option value="G">G</option>
                                  <option value="H">H</option>
                                  <option value="I">I</option>
                                  <option value="J">J</option>
                                  <option value="K">K</option>
                                  <option value="L">L</option>
                                  <option value="M">M</option>
                                </select></td>
                              </tr>
                              <tr>
                                <td height="40" colspan="3" align="center" valign="bottom" width="70%">
                                	<div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>Special</strong>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td height="40" align="center" valign="bottom" width="30%">A
                                  <input class="form-control" type="text" name="toto_special1" id="toto_special1" /></td>
                                <td height="40" align="center" valign="bottom" width="30%">B
                                  <input class="form-control" type="text" name="toto_special2" id="toto_special2" /></td>
                                <td height="40" align="center" valign="bottom" width="30%">C
                                  <input class="form-control" type="text" name="toto_special3" id="toto_special3" /></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">D
                                  <input class="form-control" type="text" name="toto_special4" id="toto_special4" width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">E
                                  <input class="form-control" type="text" name="toto_special5" id="toto_special5" width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">F
                                  <input class="form-control" type="text" name="toto_special6" id="toto_special6" width="25%"/></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">G
                                  <input class="form-control" type="text" name="toto_special7" id="toto_special7" width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">H
                                  <input class="form-control" type="text" name="toto_special8" id="toto_special8" width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">I
                                  <input class="form-control" type="text" name="toto_special9" id="toto_special9" width="25%"/></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">J
                                <input class="form-control" type="text" name="toto_special10" id="toto_special10" width="25%" /></td>
                                <td height="35" align="center" valign="bottom" width="30%">K
                                  <input class="form-control" type="text" name="toto_special11" id="toto_special11" width="25%" /></td>
                                <td height="35" align="center" valign="bottom" width="30%">L
                                  <input class="form-control" type="text" name="toto_special12" id="toto_special12" width="25%"/></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">M
                                  <input class="form-control" type="text" name="toto_special13" id="toto_special13" width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">&nbsp;</td>
                                <td height="35" align="center" valign="bottom" width="30%">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="40" align="center" valign="bottom" width="30%">
                                	<div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                	  <input class="btn btn-warning" type="reset" name="button2" id="button2" value="All Clear" / onclick="ClearAllToto();">
                                	</div>
                                </td>
                                <td height="40" align="center" valign="bottom" width="30%">
                                	<div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px"><strong>Consolation</strong></div>
                                </td>
                                <td height="40" align="center" valign="bottom" width="30%">
                                	<div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>
                                	     <input class="btn btn-primary" type="button" name="btnsavetoto" id="btnsavetoto" value=" Save " />
                                	  </strong>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td height="40" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="toto_con1" id="toto_con1" width="25%"/>
                                </td>
                                <td height="40" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="toto_con2" id="toto_con2" width="25%"/>
                                </td>
                                <td height="40" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="toto_con3" id="toto_con3" width="25%"/>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="toto_con4" id="toto_con4" width="25%"/>
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="toto_con5" id="toto_con5" width="25%" />
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="toto_con6" id="toto_con6" width="25%" />
                                </td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="toto_con7" id="toto_con7" width="25%"/>
                                </td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="toto_con8" id="toto_con8" width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="toto_con9" id="toto_con9" width="25%"/>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom" width="30%">
                                  <input class="form-control" type="text" name="toto_con10" id="toto_con10"  width="25%"/></td>
                                <td height="35" align="center" valign="bottom" width="30%">&nbsp;</td>
                                <td height="35" align="center" valign="bottom" width="30%">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="3">
                                    <span style="color: red; display: none;" id="notifyerrtoto"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                    <span style="color: blue; display: none;" id="notifysuccesstoto"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                </td>
                              </tr>
                            </table>
                        </form>    
                            
                        <form id="frsin4d" name="frsin4d" method="post" action="">
                            <table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" id="tblsinfourd" style="display: none;">
                              <tr>
                                <td height="35" align="center" valign="bottom"><strong>1st</strong></td>
                                <td height="35" align="center" valign="bottom"><strong>2nd</strong></td>
                                <td height="35" align="center" valign="bottom"><strong>3rd</strong></td>
                            </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom">
                                  <input class="form-control" type="text" name="sin4d1" id="sin4d1" />
                                </td>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d2" id="sin4d2" /></td>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d3" id="sin4d3" /></td>
                              </tr>
                              <tr>
                                <td height="40" colspan="3" align="center" valign="bottom" with="100%">
                                	<div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>Special</strong>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td height="40" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_special1" id="sin4d_special1" /></td>
                                <td height="40" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_special2" id="sin4d_special2" /></td>
                                <td height="40" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_special3" id="sin4d_special3" /></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_special4" id="sin4d_special4" /></td>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_special5" id="sin4d_special5" /></td>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_special6" id="sin4d_special6" /></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_special7" id="sin4d_special7" /></td>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_special8" id="sin4d_special8" /></td>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_special9" id="sin4d_special9" /></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_special10" id="sin4d_special10" /></td>
                                <td height="35" align="center" valign="bottom">&nbsp;</td>
                                <td height="35" align="center" valign="bottom">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="40" align="center" valign="bottom">
                                	<div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                	  <input class="btn btn-warning" type="reset" name="button2" id="button2" value="All Clear"  onclick="ClearAllSin4D();"/>
                                	</div>
                                </td>
                                <td height="40" align="center" valign="bottom">
                                	<div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px"><strong>Consolation</strong></div>
                                </td>
                                <td height="40" align="center" valign="bottom">
                                	<div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px"><strong>
                                	  <input class="btn btn-primary" type="button" name="button" id="btnsave_livedraw4d" value="Save" />
                                	</strong></div>
                                </td>
                              </tr>
                              <tr>
                                <td height="40" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_con1" id="sin4d_con1" /></td>
                                <td height="40" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_con2" id="sin4d_con2" /></td>
                                <td height="40" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_con3" id="sin4d_con3" /></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_con4" id="sin4d_con4" /></td>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_con5" id="sin4d_con5" /></td>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_con6" id="sin4d_con6" /></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_con7" id="sin4d_con7" /></td>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_con8" id="sin4d_con8" /></td>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_con9" id="sin4d_con9" /></td>
                              </tr>
                              <tr>
                                <td height="35" align="center" valign="bottom"><input class="form-control" type="text" name="sin4d_con10" id="sin4d_con10" /></td>
                                <td height="35" align="center" valign="bottom">&nbsp;</td>
                                <td height="35" align="center" valign="bottom">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="3">
                                    <span style="color: red; display: none;" id="notifyerrsin4d"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                    <span style="color: blue; display: none;" id="notifysuccesssin4d"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                </td>
                              </tr>
                          </table>
                        </form>
                        <form id="frsintoto" name="frsintoto" method="post" action="">
                          <table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" id="tblsintoto" style="display: none;">
                              <tr>
                                <td height="35" colspan="7" align="center" valign="bottom"><strong>Draw no: <span id="txtdrawnosintoto"></span></strong></td>
                              </tr>
                              <tr>
                                <td height="65" colspan="7" align="center" valign="bottom">
                                  <div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>Winning Number</strong>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td width="14%" height="35" align="center" valign="bottom">
                                	<!-- <p style="background-image: url(<?php //echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                                    <span id="spansintoto1" style="font-size: 35px; font-weight: bold; color: white;"></span>
                                  </p> -->
                                   <input type="text" id="spansintoto1" class="form-control">
                                </td>
                                <td width="14%" height="35" align="center" valign="bottom">
                                	<!-- <p style="background-image: url(<?php //echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                                    <span id="spansintoto2" style="font-size: 35px; font-weight: bold; color: white;"></span> -->
                                    <input type="text" id="spansintoto2" class="form-control">
                                </td>
                                <td width="14%" height="35" align="center" valign="bottom">
                                	<!-- <p style="background-image: url(<?php //echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                                    <span id="spansintoto3" style="font-size: 35px; font-weight: bold; color: white;"></span> -->
                                    <input type="text" id="spansintoto3" class="form-control">
                                </td>
                                <td width="14%" height="35" align="center" valign="bottom">
                                	<!-- <p style="background-image: url(<?php //echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                                    <span id="spansintoto4" style="font-size: 35px; font-weight: bold; color: white;"></span> -->
                                    <input type="text" id="spansintoto4" class="form-control">
                                </td>
                                <td width="14%" height="35" align="center" valign="bottom">
                                	<!-- <p style="background-image: url(<?php //echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                                    <span id="spansintoto5" style="font-size: 35px; font-weight: bold; color: white;"></span> -->
                                    <input type="text" id="spansintoto5" class="form-control">
                                </td>
                                <td width="14%" height="35" align="center" valign="bottom">
                                	<!-- <p style="background-image: url(<?php //echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                                    <span id="spansintoto6" style="font-size: 35px; font-weight: bold; color: white;"></span> -->
                                    <input type="text" id="spansintoto6" class="form-control">
                                </td>
                               <!--  <td width="14%" height="35" align="center" valign="bottom">
                                	<p style="background-image: url(<?php //echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                                    <span id="spansintoto7" style="font-size: 35px; font-weight: bold; color: white;"></span>
                                </td> -->
                              </tr>
                              <tr>
                                <td height="50" colspan="7" align="center" valign="bottom">
                                  <div style="width:100%; background-color:#333; color:#FFF; height:35px; font-size:18px">
                                    <strong>Additional Number</strong>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" colspan="7" align="center" valign="bottom">
                                	<!-- <p style="background-image: url(<?php //echo base_url('assets/img/app/orangecircle.png') ?>); width: 40px; height: 40px;">
                                    <span id="spansintoto8" style="font-size: 35px; font-weight: bold; color: white;"></span> --></p>
                                    <input type="text" id="spansintoto8" class="form-control">
                                  
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3">
                                    <span style="color: red; display: none;" id="notifyerrsintoto"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                    <span style="color: blue; display: none;" id="notifysuccesssintoto"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                </td>
                              </tr>
                              <tr>
                                <td height="35" colspan="3" align="center" valign="bottom">
                                  <input class="btn btn-warning funcClear" type="button" name="btnresetsintoto" id="btnresetsintoto" value="All Clear" />
                                </td>
                                <td height="35" align="center" valign="bottom">&nbsp;</td>
                                <td height="40" colspan="3" align="center" valign="bottom">
                                  <input class="btn btn-primary" type="button" name="btnsavesintoto" id="btnsavesintoto" value=" Save " />
                                </td>
                              </tr>
                          </table>
                        </form>
                      </div>  
                    </div>  
                  </div>  
              </div>
              <!-- table end -->

               <div class="row"> 
                <div class="panel">
                    <div class="panel-body">     
                      <div class="col-md-6">
                        <input style="margin-left:450px;" class="btn btn-primary" type="button" name="btnsavesintoto" id="SaveConvertDMT" value="Save To DMT " onclick="SaveConvertDMT();" />
                      </div>
                      <div class="col-md-4">
                          <span id="showmessageDMT" style="color:red;"></span>
                      </div>
                    </div>
                  </div>
                </div>
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end