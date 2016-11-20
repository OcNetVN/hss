    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <div class="row">
                <div class="col-lg-12">
                  <form class="form-horizontal" role="form">
                    <div class="panel">
                      <div class="panel-body">
                         <div class="row">
                          <div class="col-md-12">
                              <div class="col-lg-4">
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
                                <div class="col-lg-5">
                                  <input type="text" id="txtdate" readonly="readonly" class="form-control" style="width:200px;">
                                </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div id="divdetailsinfo">
                                <table class="prizetable">
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div style="font-weight:bold;" class="draw_info">
                                            Draw No <strong id="s_drawno"></strong>
                                            <br>
                                            <strong id="s_drawday"></strong>              
                                        </div>
                                        <br>
                                        <table width="250" border="1" cellspacing="0" cellpadding="2" align="left" style="margin:10px 0px 0px 0px;">
                                          <tbody>
                                            <tr>
                                              <td width="50%" class="header_blue" bgcolor="#004185" style="padding-left:25px;color:white;">1st Prize</td>
                                              <td class="winning_numbers_4d_b"><strong id="prs_1"></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="50%" class="header_blue" bgcolor="#004185" style="padding-left:25px;color:white;">2nd Prize</td>
                                              <td class="winning_numbers_4d_b"><strong id="prs_2"></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="50%" class="header_blue" bgcolor="#004185" style="padding-left:25px;color:white;">3rd Prize</td>
                                              <td class="winning_numbers_4d_b"><strong id="prs_3"></strong></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <table width="250" border="1" cellspacing="0" cellpadding="3" style="margin:10px 0px 0px 0px; border:1px solid">
                                          <tbody>
                                            <tr>
                                              <td class="header_blue" colspan="2" bgcolor="#004185" style="padding-left:50px;color:white;">Starter Prizes</td>
                                              </tr>
                                              <tr>
                                                <td class="winning_numbers_4d"><strong id="Starter_0_1"></strong></td>
                                                <td class="winning_numbers_4d"><strong id="Starter_0_2"></strong></td>
                                              </tr>
                                              <tr>
                                                <td class="winning_numbers_4d"><strong id="Starter_1_1"></strong></td>
                                                <td class="winning_numbers_4d"><strong id="Starter_1_2"></strong></td>
                                              </tr>
                                              <tr>
                                                <td class="winning_numbers_4d"><strong id="Starter_2_1"></strong></td>
                                                <td class="winning_numbers_4d"><strong id="Starter_2_2"></strong></td>
                                              </tr>
                                              <tr>
                                                <td class="winning_numbers_4d"><strong id="Starter_3_1"></strong></td>
                                                <td class="winning_numbers_4d"><strong id="Starter_3_2"></strong></td>
                                              </tr>
                                              <tr>
                                                <td class="winning_numbers_4d"><strong id="Starter_4_1"></strong></td>
                                                <td class="winning_numbers_4d"><strong id="Starter_4_2"></strong></td>
                                              </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <table width="250" border="1" cellspacing="0" cellpadding="3" style="margin:10px 0px 0px 0px;border:1px solid">
                                        <tbody>
                                          <tr>
                                            <td class="header_blue" colspan="2" bgcolor="#004185" style="padding-left:50px;color:white;">Consolation Prizes</td>
                                          </tr>
                                          <tr>
                                            <td class="winning_numbers_4d"><strong id="consolation_0_1"></strong></td>
                                            <td class="winning_numbers_4d"><strong id="consolation_0_2"></strong></td>
                                          </tr>
                                          <tr>
                                            <td class="winning_numbers_4d"><strong id="consolation_1_1"></strong></td>
                                            <td class="winning_numbers_4d"><strong id="consolation_1_2"></strong></td>
                                          </tr>
                                          <tr>
                                            <td class="winning_numbers_4d"><strong id="consolation_2_1"></strong></td>
                                            <td class="winning_numbers_4d"><strong id="consolation_2_2"></strong></td>
                                          </tr>
                                          <tr>
                                            <td class="winning_numbers_4d"><strong id="consolation_3_1"></strong></td>
                                            <td class="winning_numbers_4d"><strong id="consolation_3_2"></strong></td>
                                          </tr>
                                          <tr>
                                            <td class="winning_numbers_4d"><strong id="consolation_4_1"></strong></td>
                                            <td class="winning_numbers_4d"><strong id="consolation_4_2"></strong></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div> 
             <div class="row">                  
                  <div class="col-lg-12">
                    <form class="form-horizontal" role="form">
                      <div class="panel">
                        <div class="panel-body">
                          <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    <textarea  rows="6" class="form-control" id="ContentConvert"></textarea>
                                </div>
                                <div class="col-md-2">
                                   <button class="btn btn" style=" width:200px; margin-bottom:10px;" type="button" onclick="ConvertPools4D();">Convert </button><br />
                                   <button class="btn btn" style=" width:200px; margin-bottom:10px;" type="button" onclick="SavePools4D_AC();">Save</button><br />
                                   <button class="btn btn" style=" width:200px; margin-bottom:10px;" type="button" onclick="ClearPools4D();">Clear</button><br />
                                   <span id="sptt" style="display:none;color:red;">Convert Sucess</span>
                                   <span id="spnott" style="display:none;color:red;">Convert not Sucess</span>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      
      <!--main content end-->