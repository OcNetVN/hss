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
                                      </div>
                                </div>
                            </div>
                            <div class="row" id="divshowdata" >
                              
                            </div><!--end show data-->
                            <br />
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <textarea  rows="10" class="form-control" id="ContentConvert"></textarea>
                                            <span style="color: red; display: none;" id="notifycontent"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                            <span style="color: red; display: none;" id="notifyerr"><?php echo $this->lang->line(LANG_FAILED); ?></span>
                                            <span style="color: blue; display: none;" id="notifysuccess"><?php echo $this->lang->line(LANG_SUCCESS); ?></span>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn" id="btnclearall"  style=" width:200px;margin-bottom:5px;" type="button" onclick="ClearAll();"> <?php echo $this->lang->line(LANG_CLEAR_ALL); ?> </button> <br />
                                            <button class="btn btn" id="btnfourdgame" style=" width:200px; margin-bottom:10px;" type="button" onclick="ConvertSoccerLive();">Eng Live convert & Save</button><br />
                                            <button class="btn btn" id="btnfourdgame" style=" width:200px; margin-bottom:10px;" type="button" onclick="ConvertSoccerLiveCN();">Chi Live convert & Save</button><br />
                                            <button class="btn btn" id="btnfourdgame" style=" width:200px; margin-bottom:10px;" type="button" onclick="SaveTodayNoSoccer();">Today No Soccer & Save</button><br />
                                           <br /> 
                                        </div>
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