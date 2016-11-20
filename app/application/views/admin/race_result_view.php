<!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              
              <!-- table start -->
              <div class="row">      
                  <div class="col-md-4">
                    <div class="panel">
                      <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="row">
              								<div class="col-md-12">
              									<div class="form-group">
              										<label class="col-lg-5 col-sm-4 control-label">Choose country: </label>
              										<div class="col-lg-7">
              											<select class="form-control m-bot15" id="ChooseCountry">
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
                        </form>  
                      </div>  
                    <div class="panel-body">
                            <div class="calendar-block ">
                                <div class="cal1">

                                </div>
                            </div>                            
                        </div>
                    </div>  
                  </div>          
                  <div class="col-sm-8">
                      <section class="panel" id="showlistRaceResult" style="display:none">
                        <!-- eidt list danh sach Race Result -->
                        <table class="table table-hover table-bordered" id="tblrace" >
                          <thead>
                          <tr>
                              <th>ID</th>
                              <th>RaceNo</th>
                          </tr>
                          </thead>
                          <tbody id="tbodyraceno">
                          <tr>
                              <td>MY15012805</td>
                              <td>01</td>
                          </tr>
                          <tr>
                              <td>MY15012805</td>
                              <td>02</td>
                          </tr>
                          <tr>
                              <td>MY15012805</td>
                              <td>03</td>
                          </tr>
                          <tr>
                              <td>MY15012805</td>
                              <td>04</td>
                          </tr>
                          </tbody>
                        </table>
                      </section>
                        <!-- end eidt list danh sách Race Result -->
                        <section class="panel" id="sectionres" >
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
                                  <td><input type="text" class="form-control" placeholder="" id="txtWin2"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtPlace2"></td>
                                  <td  style="background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtWin2_s">
                                  </td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtPlace2_s">
                                  </td>
                              </tr>
                              <tr>
                                  <td><input type="text" class="form-control" placeholder="" id="txtNo3"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtLengh3"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtWin3"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtPlace3"></td>
                                  <td  style="background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtWin3_s">
                                  </td>
                                  <td  style="font-size: small;text-align: right; background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtPlace3_s">
                                  </td>
                              </tr>
                              <tr>
                                  <td><input type="text" class="form-control" placeholder="" id="txtNo4"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtLength4"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtWin1"></td>
                                  <td><input type="text" class="form-control" placeholder="" id="txtPlace4"></td>
                                  <td  style="background-color: #B5E61D;">
                                    <input type="text" class="form-control" placeholder="" id="txtWin4_s">
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
                                <button type="button" style="width: 100px" href="" class="btn btn-danger" onclick="SaveResult_detail();">Save</button>
                                <button type="button" style="margin-left: 10px; width: 100px" href="" class="btn btn-default" id="btnClearRR">Clear</button>
                                <button type="reset" style="margin-left: 10px; width: 100px" href="" class="btn btn-default" id="btnResult_Cancel">Cancel</button></p>
                          </div>
                        </form>
                       </section>
  
                  </div>
              </div>
              <!-- table end -->
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->