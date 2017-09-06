<div class="modal fade" id="Login" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
      <div id="_AJAX_LOGIN_"></div>
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span><?php echo $lang['login']; ?></h4>
       </div>
       <div class="modal-body">
         <div role="form" onkeypress="return runScriptLogin(event)" >
           <div class="form-group">
             <label for="usrname_or_email"><span class="glyphicon glyphicon-user"></span><?php echo $lang['user_or_email']; ?></label>
             <input type="text" class="form-control" id="user_login" placeholder="<?php echo $lang['enter_user_or_email'] ?>">
           </div>
           <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-eye-open"></span><?php echo $lang['password']; ?></label>
             <input type="password" class="form-control" id="pass_login" placeholder="<?php echo $lang['enter_pass']; ?>">
           </div>
           <div class="checkbox">
             <label><input type="checkbox" value="1" id="session_login" checked><?php echo $lang['remember_me']; ?></label>
           </div>
           <button type="button" class="btn btn-default btn-success btn-block" id="iniciar_sesion" onclick="goLogin('<?php echo $lang['connected']; ?>', '<?php echo $lang['we_are_redirecting_you']; ?>', '<?php echo $lang['processing']; ?>', '<?php echo $lang['we_are_connecting_you']; ?>')"><span class="glyphicon glyphicon-off"></span><?php echo $lang['login']; ?></button>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> <?php echo $lang['cancel']; ?></button>
         <p><?php echo $lang['not_registered']; ?><a data-toggle="modal" data-target="#Register"><?php echo $lang['register']; ?>!</a></p>
         <p><a data-toggle="modal" data-target="#Lostpass"><?php echo $lang['lost_pass']; ?></a></p>
       </div>
     </div>
   </div>
 </div>
 <script src="HTML/JavaScript/login.js" ></script>
