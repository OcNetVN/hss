    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <!-- search start -->
             <div class="row">                  
                  <div class="col-lg-12">
                    <form class="form-horizontal" role="form">
                      <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-lg-3" style="display:none;">
                                        <label>Choose League</label>
                                        <select class="form-control" id="cmb_ChooLea">
                                            <option value="0">-- Select Choose League --</option>
                                            <?php if(count($eventResult) != 0)
                                                 {
                                                    for($i=0;$i<count($eventResult);$i++)
                                                    { ?>
                                                        <option value="<?php echo $eventResult[$i]->Name_en; ?>"><?php echo $eventResult[$i]->Name_en; ?></option>
                                            <?php    }
                                                 }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                      <label>Choose Teams 1 To 12</label>
                                      <select class="form-control" id="cmb_ChooTeam">
                                            <option value="0">-- Select Choose Teams --</option>
                                            <?php if(count($choo_team) != 0)
                                                 {
                                                    foreach ($choo_team as $key => $value) 
                                                    { ?>
                                                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                            <?php    }
                                                 }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn" id="btndrawdate" style="margin-top:25px;" type="button" onclick="SearchManual();">Search</button>
                                    </div>
                                     
                                </div>
                            </div>
                            <div class="row" id="divshowdata"><!--show data-->
                            </div><!--end show data--><br />
                            
                        </div>
                      </div>
                    </form>
                  </div>
             </div>
            <!-- end search start -->
            <div class="row">                  
              <div class="col-sm-12">
                  <section class="panel" id="li_teams">
                    <?php 
                          for($i=0;$i<12;$i++)
                          {  ?>
                                <div class="row" id="show_team_<?php echo $i+1;?>" style="display:none;">
                                  <div class="col-md-12" id="team_1">
                                     <div class="col-md-6">
                                        <label>Team <?php echo $i+1; ?></label>
                                        <div class="col-md-12">
                                          <div class="col-md-4">
                                            <select class="form-control" id="cmb_team_1_<?php echo $i+1;?>">
                                                <option value="">--Select team --</option>
                                                <?php if(count($teamResult) > 0)
                                                      {
                                                          for($j=0;$j<count($teamResult);$j++)
                                                          { ?>
                                                                <option value="<?php echo $teamResult[$j]->Team_A_en;?>"><?php echo $teamResult[$j]->Team_A_en;?></option>
                                                        <?php }
                                                      }
                                                ?>
                                            </select>
                                          </div>
                                          <div class="col-md-2">
                                            <input type="text" class="form-control" id="txt_team1_<?php echo $i+1;?>" value="0" readonly="readonly">
                                          </div>
                                          <div class="col-md-2">
                                            <button class="btn btn"   type="button" onclick="ClickDoiA_<?php echo $i+1;?>();">+</button>
                                          </div>
                                          <div class="col-md-2">
                                            <input type="text" class="form-control" id="txt_add_<?php echo $i+1;?>" value="90'+1'">
                                          </div>
                                          <div class="col-md-2">
                                            <button class="btn btn"   type="button" onclick="ClickFT_<?php echo $i+1;?>();">FT</button>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="col-md-4">
                                            <select class="form-control" id="cmb_team_2_<?php echo $i+1;?>">
                                              <option value="">--Select team --</option>
                                                <?php 
                                                      if(count($teamResult) > 0)
                                                      {
                                                          for($k=0;$k<count($teamResult);$k++)
                                                          { ?>
                                                                <option value="<?php echo $teamResult[$k]->Team_B_en;?>"><?php echo $teamResult[$k]->Team_B_en;?></option>
                                                        <?php }
                                                      } 
                                                ?>
                                            </select>
                                          </div>
                                          <div class="col-md-2">
                                            <input type="text" class="form-control" id="txt_team2_<?php echo $i+1;?>" value="0" readonly="readonly">
                                          </div>
                                          <div class="col-md-2">
                                            <button class="btn btn"   type="button" onclick="ClickDoiB_<?php echo $i+1;?>();">+</button>
                                          </div>
                                        </div>
                                     </div>
                                  </div>
                                </div>
                    <?php  } ?>
                     
                  </section>
              </div>
            </div>

          </section>
      </section>
      
      <!--main content end-->