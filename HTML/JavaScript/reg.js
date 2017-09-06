 function goReg(registration_completed, already_a_member, we_are_registering, passwords_not_same, as_says_above, fill_the_fields, you_not_typed, not_agree_terms, if_you_dont_agree_terms) {
    var connect, form, response, result, user, pass, email, tyc, pass_dos;
    user = __('user_reg').value;
    pass = __('pass_reg').value;
    email = __('email_reg').value;
    pass_dos = __('pass_reg_dos').value;
    tyc = __('tyc_reg').checked ? true : false;

    if(tyc){
    	if(user != '' && (pass !='' && pass_dos !='') && email !=''){
    		if(pass == pass_dos){
			    form = 'user=' + user + '&pass=' + pass + '&email=' + email;
			    connect = window.XMLHttpRequest ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
			    connect.onreadystatechange = function(){
			    	if(connect.readyState == 4 && connect.status == 200){
			    		if(connect.responseText == 1){
				        	result = '<div class="alert alert-dismissible alert-success">';
				        	result += '<h4>'+ registration_completed +'</h4>';
				          	result += '<p><strong>'+ already_a_member +'</strong></p>';
				        	result += '</div>';
							__('_AJAX_REG_').innerHTML = result;

							setTimeout(location.reload(), 3000);
			    		}else {
			    			__('_AJAX_REG_').innerHTML = connect.responseText;
			    		}
			    		console.log(connect.responseText);
			    	}else if(connect.readyState != 4){
			        	result = '<div class="alert alert-dismissible alert-info">';
			        	result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			        	result += '<h4>'+ all_right +'</h4>';
			          	result += '<p><strong>'+ we_are_registering +'</strong></p>';
			          	result += '<div class="progress progress-striped active"><div class="progress-bar" style="width: 45%"></div></div>';
			        	result += '</div>';
			        	setTimeout(__('_AJAX_REG_').innerHTML = result, 3000);
			    	}
			    }
			    connect.open('POST','ajax.php?mode=reg', true);
			    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			    connect.send(form);
    		}else {
		        result = '<div class="alert alert-dismissible alert-danger">';
		        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		        result += '<h4>'+ passwords_not_same +'</h4>';
		        result += '<p><strong>'+ as_says_above +'</strong></p>';
		        result += '</div>';
		        __('_AJAX_REG_').innerHTML = result;
    		}
    	}else {
	        result = '<div class="alert alert-dismissible alert-danger">';
	        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	        result += '<h4>'+ fill_the_fields +'</h4>';
	        result += '<p><strong>'+ you_not_typed +'</strong></p>';
	        result += '</div>';
	        __('_AJAX_REG_').innerHTML = result;
    	}
    }else{
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<h4>'+ not_agree_terms +'...</h4>';
        result += '<p><strong>'+ if_you_dont_agree_terms +'</strong></p>';
        result += '</div>';
        __('_AJAX_REG_').innerHTML = result;
    }


}

function runScriptReg(e) {
    if (e.keyCode == 13) {
        goReg();
    }
}
