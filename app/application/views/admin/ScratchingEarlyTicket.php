
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
                            <option value="MY" selected>Mal Board</option>
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
                            <div class="cal1"></div>
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
        </div>
    </section>
    <section class="wrapper site-min-height" id="section2"  style="display: none;">
        <!-- page start-->             
        <!-- table start -->
        <div class="row">    
             <label class="col-lg-2" style="font-weight: normal;"> Race Day : <span id='spRaceDay'> </span></label>
             <label class="col-lg-2 col-sm-2 control-label" style="font-weight: normal;width: 100px;"> Race No:</label>               
                       <select class="form-control m-bot15" style="width: 75px;" id="ChooseRacNo">
                            <option value="01" selected>01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>                            
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>                            
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>                             
                        </select>
                        <table width=" 500px">
                            <tr>
                                <td>
                                    <label class="col-lg-2 col-sm-2 control-label">Scratching      </label>                                      
                                </td>
                                <td>
                                    <input type="text" class="form-control"  id="txtScratching">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <label class="col-lg-2 col-sm-2 control-label"> Early Ticket    </label>
                                </td>
                                <td>
                                    <input type="text" class="form-control"  id="txtEarlyTicket">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <label class="col-lg-2 col-sm-2 control-label"> Master Choice    </label>
                                </td>
                                <td>
                                    <input type="text" class="form-control"  id="txtMasterChoice">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <label class="col-lg-2 col-sm-2 control-label"> Batam Tic      </label>
                                </td>
                                <td>
                                    <input type="text" class="form-control"  id="txtBatamTic">
                                </td>
                            </tr>
                             <tr>
                                <td colspan="2" align="center">
                                    <button type="button" class="btn btn-default" style="background-color: #009ACD;" id="btnSave">Save</button>
                                    <button type="button" class="btn btn-default" style="background-color: yellow;" id="btnClear">Clear</button>
                                    <button type="button" class="btn btn-default" style="background-color: red;" id="btnCance" >Cancel</button>
                                    <br>
                                    <span id="spMes"></span>
                                </td>  
                            </tr>
                        </table>   
        </div>
    </section>  
</section>

       
<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url('assets/js/ScratchingEarlyNew.js'); ?>"></script>
                