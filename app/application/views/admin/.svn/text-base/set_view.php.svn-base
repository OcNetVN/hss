<!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              
              <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-lg-5 col-sm-4 control-label">Choose Country: </label>
                            <div class="col-lg-7">
                              <select class=" m-bot15" id="ChooseCountry">
                                      <option value="MY">Mal Board</option>
                                      <option value="SG">Sin Board</option>
                                      <option value="HK">HK Board</option>
                                      <option value="MC">Macau Board</option>
                                      <option value="SA">S Afica Board</option>
                                      <option value="AU">Australia Board</option>
                                      <option value="EU">Europe Board</option>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- table start -->
              <div class="row">                  
                  <div class="col-sm-8">
                      <section class="panel">
                          <table  width="100%" border="1" cellpadding="2" cellspacing="2" id="tbGetSE">
                              <tr>
                                <td colspan="3" align="center" bgcolor="#66CC33">
                                  <span>
                                      <!-- Malaysia 28/01/2015 Sun -->
                                      <strong id="Country"></strong>
                                      <strong id="countrydate"></strong>
                                  </span>
                                </td>
                              </tr>
                              <tr>
                                <td align="center" bgcolor="#FFCC00" width="100">Race</td>
                                <td align="center" bgcolor="#FFCC00" width="100">Early Ticket</td>
                                <td align="center" bgcolor="#FFCC00" width="150">Scaraching</td>
                              </tr>
                              <?php 
                                for($i=1;$i<=20;$i++){
                                    echo "<tr>";
                                    echo "<td align=\"center\" bgcolor=\"#0099CC\" ><span style=\"color: white;\">".$i."</span></td>";
                                    echo "<td align=\"center\"><input type=\"text\"  id=\"etic_1_".$i."\" tabindex=\"".$i."\" maxlength=\"20\"></td>";
                                    echo "<td align=\"center\"><input type=\"text\"  id=\"scr_1_'.$i.'\" tabindex=\"".$i."\" maxlength=\"20\"></td>";
                                    echo "</tr>";
                                }
                              ?>
                              
                          </table>
                          <div class="col-lg-12 text-center" style="padding:10px">
                           <p>
                                <button type="button" style="width: 100px" href="" class="btn btn-danger" onclick="SaveEarlyScratching();">Save</button>
                                <button type="button" style="margin-left: 10px; width: 100px" href="" class="btn btn-default" id="btnclear">Clear</button>
                           </p>
                          </div>
                          <div class="col-lg-12" style="padding:10px"><span id="spantb" style="color: red;"></span></div>
                      </section>
                  </div>
              </div>
              <!-- table end -->
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->