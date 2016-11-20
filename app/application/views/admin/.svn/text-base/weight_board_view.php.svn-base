
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              
              <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-lg-5 col-sm-4 control-label">Race Card ID: </label>
                            <div class="col-lg-7">
                              <select class="form-control m-bot15" id="RaceCardID">
                                 <!-- <option value="MY">Mal Board</option>
                                  <option value="SG">Sin Board</option>
                                  <option value="HK">HK Board</option>
                                  <option value="MC">HK Board</option>
                                  <option value="SA">Macau Board</option>
                                  <option value="AU">S Afica Board</option>
                                  <option value="EU">Australia Board</option>-->
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                      <label class="col-md-2 control-label">Horse:</label>
                      <input type="text" id="txt_totalhorse" style="width:100px;" readonly="readonly" class="form-control">
                    </div>
                </div>
              <!-- table start -->
              <div class="row">                  
                  <div class="col-lg-12">
                    <div></div>
                    <div class="panel">
                        <table width="100%" border="1" cellpadding="0" cellspacing="0" id="tbGetToteMala">
                          <thead>
                            <tr style="background: #58c9f3; color:#fff">
                              <th>No</th>
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
                              
                            </tr>
                          </thead>
                          <tbody id="tbodyinput">
                            <tr>
                                <td stye="background: #58c9f3;color:#fff">WGT Ib.</td>
                                <?php 
                                for($i=1;$i<=20;$i++)
                                {
                                    echo '<td><input type="text" style="width:50px;margin-right:-22px; height:30px;"  id="input_1_'.$i.'" tabindex="'.$i.'"></td>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <td stye="background: #58c9f3;color:#fff">HDP</td>
                              <?php 
                                for($i=1;$i<=20;$i++)
                                {
                                    echo '<td><input type="text" style="width:50px;margin-right:-22px; height:30px;" maxlength="4" id="iinput_2_'.$i.'" tabindex="'.$i.'"></td>';
                                }
                                ?>
                            </tr>
                          </tbody>
                        </table>
                        <div class="panel-body">
                          <form class="form-horizontal" role="form">
                             <div class="panel"> 
                             
                              <div class="col-lg-12" style="padding:10px">
                               <p>
                                   <button type="button"  href="" class="btn btn-danger" id="btnsave" onclick="SaveWeightBoard();">Save To Horse Board</button>
                                   <button type="button" style="margin-left: 10px;" href="" class="btn btn-default" id="btnclear">Clear</button>
                               </p>
                              </div>
                              <div class="col-lg-12" style="padding:10px"><span id="spantb" style="color: red;"></span></div>
                            </form>
                        </div>
                        <div class="panel-body">
                            <div class="panel">
                              <div class="col-lg-12" style="padding:10px">
                                <div class="col-md-8">
                                  <textarea  rows="6" class="form-control" id="ContentConvert"></textarea>
                                </div>
                                <div class="col-md-2">
                                  <button class="btn btn" style="background:#006600; width:200px; margin-bottom:10px;" type="button" onclick="ConvertWeight();" >Convert</button>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
              <!-- table end -->
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
?>
