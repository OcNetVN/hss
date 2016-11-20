    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height" id="section1">
              <!-- page start-->             
              <!-- table start -->
				<div class="row">
					<div class="col-md-4">
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
                <div class="row">                  
                  <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="calendar-block ">
                                <div class="cal1">
                                </div>
                            </div>                            
                        </div>
                        <div class="col-lg-12 text-center" style="padding-bottom:10px">
                           <p>
                                <!-- <a href="javascript:;" class="btn btn-danger" id="btnaddnew" ></a>-->
                                <button type="button" class="btn btn-danger" id="btnaddnew">Add New</button>
                           </p>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="panel" id="panel1">
                        <div class="panel-body">
                          <form class="form-horizontal" role="form">
                          	<div class="form-group">
                          			<div class="col-lg-2"><span id="spRaceDate_get" style="display:none"></span></div>
                          			<div class="col-lg-10"><span id="spRaceDate"></span></div>
                          	</div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Title: </label>
                                <div class="col-lg-10">
                                  <input type="text" class="form-control" placeholder="" id="txtUpTitle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Chinese: </label>
                                <div class="col-lg-10">
                                  <input type="text" id="txtUpChine" class="form-control" placeholder="" id="txtUpChine">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Status: </label>
                                <div class="col-lg-10">
                                  <select class="form-control m-bot15" id="cmb_Status">
                                      <option value="OPEN">Open</option>
                                      <option value="CLOSE">Close</option>
                                  </select>
                                </div>
                            </div>
							<div class="form-group">
								<p class="text-center">
								<a class="btn btn-primary" href="javascript:void(0)" type="button" onclick="UpdateRaceCardCo();">Update</a>
								<a class="btn btn-primary" href="javascript:void(0)" type="button" id="gotoearly">Goto Early Ticket</a>
								</p>
								<p ><span id="tbMessage" style="color:red;padding-left:12px;"></span></p>
                            </div>
                          </form>
                        </div>

                      	<table class="table table-hover table-bordered" id="tblrace" style="display:none">
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
                    </div>
					<div class="panel" id="panel2" style="display:none;">
						<div class="panel-body">
							<form class="form-horizontal" role="form">
								<div class="container">
									<div class="row">
										<div class='col-sm-3'>
											<div class="form-group">
                                                
												<div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
												  <input type="text" value="12-03-2015" readonly size="16" id="dateadd" class="form-control">
													  <span class="input-group-btn add-on">
														<button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
													  </span>
												</div>
											</div>
										</div>
									</div>
								</div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Title: </label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" placeholder="" id="txt_Title">
                                    </div>
                                </div>
								<div class="form-group">
									<label class="col-lg-2 col-sm-2 control-label">Chinese: </label>
									<div class="col-lg-10">
									  <input type="text" class="form-control" placeholder="" id="_txtChinese">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 col-sm-2 control-label">Status: </label>
									<div class="col-lg-10">
										<label class="col-lg-2 col-sm-2 control-label">
                                            <span id="spStatus">OPEN</span> 
                                        </label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 col-sm-2 control-label">No Of Race: </label>
									<div class="col-lg-10">
									  <select class="form-control m-bot15" id="senumberrace">
                                        <?php for($i=1;$i <= 20;$i++)
                                        	{
                                            	echo '<option value="'.$i.'">'.$i.'</option>';
                                        	}
                                        ?>
										  <!--<option>1</option>
										  <option>2</option>
										  <option>3</option>
										  <option>4</option>
										  <option>5</option>
										  <option>6</option>
										  <option>7</option>
										  <option>8</option>
										  <option>9</option>
										  <option>10</option>-->
									  </select>
									</div>
								</div>
								<div class="form-group">
									<p class="text-center">
									<a class="btn btn-primary" href="javascript:;" id="btnsaveadd" >Save</a>
									</p>
								</div>
							</form>
						</div>
					</div>
                  </div>
              </div>  
              <!-- table end -->
              
              <!-- page end-->
          </section>
		  
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
                                         Meter:   
                                         <input type="text" class="form-control" style="width:80px;display: inline-block;" id="txt_Meter">
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
										<a class="btn btn-danger" href="javascript:void(0)" id="btncancelrace" onclick="CancelRaceCarDetail();">Cancel</a>
									</p>
									<p class="tbSaveRaceDailDetail" style="color:red;"></p>
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
                                            echo '<td><a class="btn btn-primary" style="margin-left:-8px; margin-right:-8px;" href="javascript:void(0)" type="button" id="InsertColor'.$i.'"  >Jocky Color</a></td>';
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
									<button type="button" class="btn btn-info" style="margin-bottom: 5px; width:150px" 	  onclick="ConvertHK();">HK turf convert</button><br />
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

		  <!-- go to Early Ticket -->
		  <section class="wrapper site-min-height" id="section3" style="display:none">
		  		 <!-- table start -->
              <div class="row">                  
                  <div class="col-sm-8">
                      <section class="panel">
                          <table  width="100%" border="1" cellpadding="2" cellspacing="2" id="tbGetSE">
                              <tr>
                                <td colspan="3" align="center" bgcolor="#66CC33"><strong id="stCountrydate"><!--Malaysia 28/01/2015 Sun--></strong></td>
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
                                <button type="button" style="width: 100px" href="" class="btn btn-danger" id="btnSaveEDetail">Save</button>
                                <button type="button" style="margin-left: 10px; width: 100px" href="" class="btn btn-default" id="btnclear">Clear</button>
                           </p>
                          </div>
                          <div class="col-lg-12" style="padding:10px"><span id="spantb" style="color: red;"></span></div>
                      </section>
                  </div>
              </div>
              <!-- table end -->
		  </section>
		  <!-- end go to Early Ticket -->
      </section>
      
      <div id="popupJockeyShow" style="width:600px;display:none;background: none repeat scroll 0% 0% #FFF !important;">
         <div  class="row">
         	<span id="idHorseNo" style="display:none;"></span>
         	<h4>Please choose image jockey color</h4>
            <div id="listJockyColor" style="padding-left:10px;background: none repeat scroll 0% 0%"></div>
            <br>
            	<!-- <textarea  rows="4" class="form-control" id="imageColor"> -->
            <!-- </textarea> -->
            <div id="imageColor"></div>

           <!--  <div class="row" style="padding-left:30px;">
            	<p>
	                <input type="text"  name="myfile" id="myfile" class="form-control">
	                <input type="button" value="Add"  onclick  = "AddColor();"/> 
	            </p>
            </div> -->
         </div>
      </div>

      <!--main content end-->
