<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #2F4F4F; font-size:X-Large;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                         <div style="vertical-align: middle; color: white;padding:10px;">
                         <?php
                              echo $this->lang->line(LANG_FEEDBACK);
                          ?>
                         </div>
                    </td>
                    <td width="10%" align="right">
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
  </tr>
  <tr>
    <td id="tbllistracecard">
       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-weight:bold;">
            <tr>
              <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                    <tr>                            
                      <td align="left" style="padding:10px;">
                        <?php echo $this->lang->line(LANG_PLEASE_FEEL);?><br>
                        <?php echo $this->lang->line(LANG_WE_WILL);?>
                        <?php echo $this->lang->line(LANG_THANKS_YOU);?>
                       <!--  Please feel free to input any question or suggestion.<br>
                        We will take them seriously.
                        Thanks you for your kindly support. -->
                      </td>
                    </tr>
                    <tr>
                      <td align="left" style="padding:10px;">
                         <?php 
                        if($this->lang->line(LANG_EN) == "English")
                        { // tiếng ANh ?>
                              <textarea class="form-control" rows="8" id="txtEnglish"></textarea>
                      <?php  }
                        else
                        { // Tiếng tàu ?>
                              <textarea class="form-control" rows="8" id="txtChinese"></textarea>
                     <?php }?>
                        
                      </td>
                    </tr>
                    <tr>
                       <td align="center">
                        <a class="btn btn-primary" href="javascript:void(0)" type="button" onclick="SaveFeedback();">Save</a>
                        <a class="btn btn-warning" href="javascript:void(0)" type="button" onclick="ClearAll();">Clear</a>
                       </td>
                    </tr>
                </table>
              </td>
            </tr>
      </table>
    </td>
  </tr>
</table>