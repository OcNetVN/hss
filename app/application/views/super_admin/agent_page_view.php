 <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->

                <!-- form add new username start -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                <b>
                                <?php 
                                  if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level']==3)
                                    echo $this->lang->line(LANG_TITE_CUSTOMER_PAGE); 
                                  else
                                  {
                                    if(isset($role) && $role==1)
                                        echo $this->lang->line(LANG_TITE_CUSTOMER_PAGE); 
                                    else
                                        echo $this->lang->line(LANG_TITE_AGENT_LOGIN); 
                                  }
                                ?>
                                </b>
                            </header>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form">
                                    <!-- <div class="form-group">
                                        <label class="col-lg-12"><h3><a href="<?php //echo base_url("super_admin/gen_statement"); ?>"><?php //echo $this->lang->line(LANG_LINK_STATEMENT); ?></a></h3></label>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">
                                            <?php
                                                if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level']==3)
                                                    echo $this->lang->line(LANG_TR_CUSTOMER_NAME);
                                                else
                                                {
                                                    if(isset($role) && $role==1)
                                                        echo $this->lang->line(LANG_TR_CUSTOMER_NAME);
                                                    else
                                                        echo $this->lang->line(LANG_TR_AGENT_NAME);
                                                }
                                            ?>
                                            : <span style="color: red;">(*)</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" id="agenname" class="form-control" placeholder="" value="<?php echo $user->fullname; ?>">
                                            <span style="color: red; display: none;" id="notifyfullname"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                        </div>
                                    </div>
                                    <span <?php if((isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level']==3) || (isset($role) && $role == 1)) echo 'style="display: none;"'; ?>>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_USERNAME); ?>: <span style="color: red;">(*)</span></label>
                                            <div class="col-lg-10">
                                                <input type="text" id="username" class="form-control" placeholder="" value="<?php echo $user->id; ?>">
                                                <span style="color: red; display: none;" id="notifyusername"><?php echo $this->lang->line(LANG_NOT_NULL); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_PASS_NEW); ?>: </label>
                                            <div class="col-lg-10">
                                                <input type="password" class="form-control" id="txtpassnew" placeholder="">
                                            </div>
                                        </div>
                                    </span>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_CONTACT); ?>:</label>
                                        <div class="col-lg-10">
                                            <input type="text" id="contact" class="form-control" placeholder="" value="<?php echo $user->phonenumber; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_STATUS); ?>:</label>
                                        <div class="col-lg-10">
                                            <?php 
                                                if($user->status == 1 || $user->status == "1")
                                                {
                                                    echo '<input name="radiostatus" id="radio-02" value="1" type="radio" checked="checked"> '.$this->lang->line(LANG_ACTIVE);
                                                    echo '<br />';
                                                    echo '<input name="radiostatus" id="radio-03" value="0" type="radio"> '.$this->lang->line(LANG_INACTIVE);
                                                }
                                                else
                                                {
                                                    echo '<input name="radiostatus" id="radio-02" value="1" type="radio"> '.$this->lang->line(LANG_ACTIVE);
                                                    echo '<br />';
                                                    echo '<input name="radiostatus" id="radio-03" value="0" type="radio" checked="checked"> '.$this->lang->line(LANG_INACTIVE);
                                                }
                                                    
                                            ?>
                                            

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_FEES); ?>:</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <?php 
                                                        if($user->currency=="RM")
                                                        {
                                                            echo '<input name="feesradio" id="radio-02" value="1" type="radio" checked> RM';
                                                            echo '<br />';
                                                            echo '<input name="feesradio" id="radio-03" value="0" type="radio"> $';
                                                        }
                                                        else
                                                        {
                                                            echo '<input name="feesradio" id="radio-02" value="1" type="radio"> RM';
                                                            echo '<br />';
                                                            echo '<input name="feesradio" id="radio-03" value="0" type="radio" checked> $';
                                                        }
                                                            
                                                    ?>
                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="text" id="txt_fees" class="form-control" placeholder="" value="<?php $a = explode(".",$user->fees); echo $a[0] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] == 1 && isset($role) && $role==1)
                                        {
                                    ?>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_IMEI); ?>:</label>
                                                <div class="col-lg-10">
                                                    <input type="text" id="txtemei" maxlength="7" class="form-control" placeholder="" value="<?php echo $user->ImieNo; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_VERIFYCODE); ?>:</label>
                                                <div class="col-lg-10">
                                                    <input type="text" id="txtverifycode" maxlength="5" class="form-control" placeholder="" value="<?php echo $user->verifyCode; ?>" disabled>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                        <div class="form-group">
                                                <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_IMEI); ?>:</label>
                                                <div class="col-lg-10">
                                                    <input type="text" id="txtemei" maxlength="7" class="form-control" placeholder="" value="<?php echo $user->ImieNo; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_VERIFYCODE); ?>:</label>
                                                <div class="col-lg-10">
                                                    <input type="text" id="txtverifycode" maxlength="5" class="form-control" placeholder="" value="<?php echo $user->verifyCode; ?>" disabled>
                                                </div>
                                            </div>
                                    <?php        
                                        }
                                    ?>
                                    <!--<div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">
                                      <?php echo $this->lang->line(LANG_TR_DUEDATE); ?>
                                      </label>
                                      <div class="col-lg-2">
                                        <div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                            <?php 
                                                if($user->duedate != "")
                                                {
                                                    $arr_duedate = explode(" ",$user->duedate);
                                                    $arr_duedate = explode("-",$arr_duedate[0]);
                                                }
                                              ?>
                                              <input type="text" value="<?php if($user->duedate != "") echo $arr_duedate[2]."-".$arr_duedate[1]."-".$arr_duedate[0] ?>" readonly size="16" class="form-control" id="txtduedate">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button" style="height: 35px;">
                                                <i class="icon-calendar"></i>
                                                </button>
                                              </span>
                                          </div>
                                      </div>        
                                    </div>-->
                                    <?php
                                        if((isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] == 3) || (isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] == 1 && isset($role) && $role==1))
                                        {
                                    ?>
                                            <div class="form-group">
                                              <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_DUEDATE); ?>:</label>
                                              <div class="col-lg-3">
                                                  <div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                                      <?php 
                                                        if($user->duedate != "")
                                                        {
                                                            $arr_duedate = explode(" ",$user->duedate);
                                                            $arr_duedate = explode("-",$arr_duedate[0]);
                                                        }
                                                      ?>
                                                      <input type="text" value="<?php if($user->duedate != "") echo $arr_duedate[2]."-".$arr_duedate[1]."-".$arr_duedate[0] ?>" readonly size="16" class="form-control" id="txtduedate">
                                                          <span class="input-group-btn add-on">
                                                            <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                                          </span>
                                                  </div>
                                              </div>
                                              <div class="col-lg-2">
                                                <button class="btn btn-warning" type="button" id="btncleartxduedate">
                                                <i class="glyphicon glyphicon-remove-sign"></i>
                                                </button>
                                              </div>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                    <?php if($parent==null)
                                            {echo "";}
                                          else
                                          {
                                     ?>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label"><?php 
                                        if ($user->level =="4")
                                            echo $this->lang->line(LANG_SHOW_AGENT_CONTACT);
                                            //echo "Show agent's contact"; 
                                        else
                                            echo $this->lang->line(LANG_SHOW_ADMIN_CONTACT);
                                            //echo "Show admin's contact"; 
                                        ?>:</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <?php 
                                                        if($user->showpcontact=="1")
                                                        {
                                                            echo '<input name="showparentradio" id="radio_show_pid_1" value="1" type="radio" checked> ';
                                                            echo $this->lang->line(LANG_TR_SHOW);
                                                            echo '<br />';
                                                            echo '<input name="showparentradio" id="radio_show_pid_2" value="0" type="radio">';
                                                            echo $this->lang->line(LANG_TR_NOT_SHOW);
                                                        }
                                                        else
                                                        {
                                                            echo '<input name="showparentradio" id="radio_show_pid_1" value="1" type="radio"> ';
                                                            echo $this->lang->line(LANG_TR_SHOW);
                                                            echo '<br />';
                                                            echo '<input name="showparentradio" id="radio_show_pid_2" value="0" type="radio" checked> ';
                                                            echo $this->lang->line(LANG_TR_NOT_SHOW);
                                                        } 
                                                    ?>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="text" id="txt_parent_contact" class="form-control" placeholder="" value="<?php if($parent==null) echo ''; else echo $parent->phonenumber; ?>">
                                                                           
                                                </div>
                                                <div class="col-lg-2">
                                                    <a class="btn btn-danger" type="button" onclick="SaveParentContact('<?php if($parent== null) echo ''; else echo $parent->rowid; ?>');">
                                                        <i class="icon-save"> (<?php echo $parent->id; ?>)</i>
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                          }
                                     ?>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label"><?php echo $this->lang->line(LANG_TR_REMARK); ?>:</label>
                                        <div class="col-lg-10">
                                            <input type="text" id="txt_remark" class="form-control" placeholder="" value="<?php echo $user->remark; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <span style="color: red; display: none;" id="notifyerr"><?php echo $this->lang->line(LANG_UPDATE_FAILED); ?></span>
                                                <span style="color: blue; display: none;" id="notifysuccess"><?php echo $this->lang->line(LANG_UPDATE_SUCCESS); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <input type="button" class="btn btn-danger" onclick="SaveAddAgent('<?php echo $user->rowid; ?>')" value="<?php echo $this->lang->line(LANG_BUTTON_SAVE); ?>">
                                            <input type="button" class="btn btn-defualt" value="<?php 
                                                                                                  if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level']==3 || (isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] == 1 && isset($role) && $role==1))
                                                                                                    echo $this->lang->line(LANG_BUTTON_DELETE_CUSTOMER); 
                                                                                                  else
                                                                                                    echo $this->lang->line(LANG_BUTTON_DELETE_AGENT); 
                                                                                                ?>" onclick="DeleteAddAgent('<?php echo $user->rowid;?>')">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- form add new username end -->
                <!-- table start -->
                <?php 
                    if($user->level !=4)
                    {
                ?>
                  <div class="row">                   
                      <div class="col-sm-12">
                          <section class="panel">
                              <header class="panel-heading">
                                  <?php echo $this->lang->line(LANG_TR_TOTAL_CUSTOMER); ?>:
                              </header>
                              <div class="row"> 
                                  <div class="col-sm-6">
                                    <table class="table table-hover table-bordered">
                                      <thead>
                                      <tr>
                                          <th><?php echo $this->lang->line(LANG_ACTIVE); ?></th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php 
                                                if(isset($active_member) && count($active_member)>0)
                                                {
                                                    foreach($active_member as $row_active_member)
                                                    {
                                                        echo '<tr>';
                                                          echo '<td>'.$row_active_member->id.'</td>';
                                                        echo '</tr>';
                                                    }
                                                }
                                                else
                                                {
                                                    echo '<tr>';
                                                      echo '<td>'.$this->lang->line(LANG_NULL).'</td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                      </tbody>
                                    </table>
                                    <div class="text-center" id="divpagination">
                                      <!--show pagination-->
                                      <?php ?>
                                    </div> 
                                  </div>
                                  <div class="col-sm-6">
                                    <table class="table table-hover table-bordered">
                                      <thead>
                                      <tr>
                                          <th><?php echo $this->lang->line(LANG_INACTIVE); ?></th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                            <?php 
                                                if(isset($inactive_member) && count($inactive_member)>0)
                                                {
                                                    foreach($inactive_member as $row_inactive_member)
                                                    {
                                                        echo '<tr>';
                                                          echo '<td>'.$row_inactive_member->id.'</td>';
                                                        echo '</tr>';
                                                    }
                                                }
                                                else
                                                {
                                                    echo '<tr>';
                                                      echo '<td>'.$this->lang->line(LANG_NULL).'</td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                      </tbody>
                                    </table>
                                    <div class="text-center" id="divpagination2">
                                      <!--show pagination-->
                                    </div> 
                                  </div>
                              </div>
                          </section>
                      </div>
                  </div>
                  <!-- table end -->
                  <?php } ?>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->