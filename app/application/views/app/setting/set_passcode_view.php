<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
        <table border="0" width="100%" cellspacing="2" cellpadding="2" style="background-color: #2F4F4F; font-size:X-Large;">
            <tbody>
                <tr>
                    <td width="90%" align="left">
                         <div style="vertical-align: middle; color: white;padding:10px;">
                         <?php
                              echo $this->lang->line(LANG_SET_PASSCODE);
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
                       <td align="center" style="padding:10px;">
                         <h3>
                            <?php
                              echo $this->lang->line(LANG_SET_PASSCODE);
                            ?>
                          </h3>
                       </td>
                    </tr>
                    <tr>
                       <td align="center" style="padding:10px;">Enter a passcode</td>
                    </tr>
                    <tr>
                       <td style="padding:15px;">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                  <td width="25%"><input type="text" maxlength="1" class="form-control" id="input_1"></td>
                                  <td width="25%"><input type="text" maxlength="1" class="form-control" id="input_2"></td>
                                  <td width="25%"><input type="text" maxlength="1" class="form-control" id="input_3"></td>
                                  <td width="25%"><input type="text" maxlength="1" class="form-control" id="input_4"></td>
                              </tr>
                           </table>
                       </td>
                    </tr>
                    <tr>
                      <td align="center"><span id="spantb" style="color:red;"></span></td>
                    </tr>

                    <tr>
                      <td style="padding:30px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <td width="25%" align="center">
                                <input type="button" class="form-control keynumber" onclick="Input1()" value="1" style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>
                              <td width="25%" align="center">
                                <input type="button" class="form-control keynumber" value="2" onclick="Input2()" style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>
                              <td width="25%" align="center">
                                <input type="button" class="form-control keynumber" value="3" onclick="Input3()" style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>  
                          </tr>
                          <tr>
                            <td width="25%" align="center">
                                <input type="button" class="form-control keynumber" value="4" onclick="Input4()" style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>
                              <td width="25%" align="center">
                                <input type="button" class="form-control keynumber" value="5" onclick="Input5()" style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>
                              <td width="25%" align="center">
                                <input type="button" class="form-control keynumber" value="6" onclick="Input6()" style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>
                          </tr>
                          <tr>
                            <td width="25%" align="center" >
                                <input type="button" class="form-control keynumber" value="7" onclick="Input7()"  style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                            </td>
                              <td width="25%" align="center">
                                <input type="button" class="form-control keynumber" value="8" onclick="Input8()" style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>
                              <td width="25%" align="center">
                                <input type="button" class="form-control keynumber" value="9" onclick="Input9()"  style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>
                          </tr>
                          <tr>
                            <td width="25%" align="center">
                                <input type="button" class="form-control" value="Cancel" onclick="InputCancel();" style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>
                              <td width="25%" align="center">
                                <input type="button" class="form-control keynumber" value="0" onclick="Input0()" style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>
                              <td width="25%" align="center">
                                <input type="button" class="form-control" value="OK" onclick="InputOK();" style="background-color:#CCCCCC;color:GhostWhite;font-weight:bold;font-size:18px;">
                              </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                </table>
              </td>
            </tr>
      </table>
    </td>
  </tr>
</table>