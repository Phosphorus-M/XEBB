<div class="modal fade" id="Register" role="dialog">
   <div class="modal-dialog">

     <div class="modal-content">
     <div id="_AJAX_REG_"></div>
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> <?php echo $lang['register']; ?></h4>
       </div>
       <div class="modal-body">
         <div role="form" onkeypress="return runScriptReg(event)" >
           <div class="form-group">
             <label for="usrname"><span class="glyphicon glyphicon-user"></span><?php echo $lang['user']; ?></label>
             <input type="text" class="form-control" id="user_reg" placeholder="<?php echo $lang['enter_username']; ?>">
           </div>
           <div class="form-group">
             <label for="usrname"><span class="glyphicon glyphicon-envelope"></span><?php echo $lang['email']; ?></label>
             <input type="email" class="form-control" id="email_reg" placeholder="<?php echo $lang['enter_mail']; ?>">
           </div>
           <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-eye-open"></span><?php echo $lang['password']; ?></label>
             <input type="password" class="form-control" id="pass_reg" placeholder="<?php echo $lang['enter_pass']; ?>">
           </div>
           <div class="form-group">
             <label for="psw_two"><span class="glyphicon glyphicon-eye-open"></span><?php echo $lang['repeat_pass']; ?></label>
             <input type="password" class="form-control" id="pass_reg_dos" placeholder="<?php echo $lang['enter_your_pass_again']; ?>">
           </div>
           <div class="checkbox">
             <label><input type="checkbox" id="tyc_reg" value="1" checked><?php echo $lang['agree_terms']; ?></label>
           </div>
           <button type="button" onclick="goReg('<?php echo $lang['registration_completed'];?>', '<?php echo $lang['already_a_member'];?>', '<?php echo $lang['all_right'];?>', '<?php echo $lang['we_are_registering'];?>', '<?php echo $lang['passwords_not_same'];?>', '<?php echo $lang['as_says_above'];?>', '<?php echo $lang['fill_the_fields'];?>', '<?php echo $lang['you_not_typed'];?>', '<?php echo $lang['not_agree_terms'];?>', '<?php echo $lang['if_you_dont_agree_terms'];?>')" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span><?php echo $lang['register']; ?></button>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span><?php echo $lang['cancel']; ?></button>
       </div>
     </div>
   </div>
 </div>

 <script src="HTML/JavaScript/reg.js"></script>
