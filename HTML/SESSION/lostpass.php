<div class="modal fade" id="Lostpass" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div id="_AJAX_LOSTPASS_"></div>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span><?php echo $lang['reset_password']; ?></h4>
        </div>
        <div class="modal-body">
          <div role="form" onkeypress="return runScriptLostpass(event)" >
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-enveloper"></span><?php echo $lang['email']; ?></label>
              <input type="email" class="form-control" id="email_lostpass" placeholder="<?php echo $lang['enter_mail']; ?>">
            </div>
            <button type="button" class="btn btn-default btn-success btn-block" onclick="goLostpass('<?php echo $lang['check_your_email']; ?>', '<?php echo $lang['acquire_a_new_password']; ?>', '<?php echo $lang['be_patient']; ?>', '<?php echo $lang['an_email_will_soon_be_sent'];  ?>', '<?php echo $lang['you_forgot_that']; ?>', '<?php echo $lang['you_must_fill_in_the_empty_field']; ?>')" ><span class="glyphicon glyphicon-off"></span><?php echo $lang['restore']; ?></button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span><?php $lang['cancel'] ?></button>
        </div>
      </div>
    </div>
  </div>
<script src="HTML/JavaScript/lostpass.js"></script>
