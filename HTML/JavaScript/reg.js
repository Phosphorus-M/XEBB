 function goReg() {
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
				        	result += '<h4>Registro Completado</h4>';
				          	result += '<p><strong>Ya eres miembro... Felicidades!</br>Te estamos redireccionando...</strong></p>';
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
			        	result += '<h4>Todo correcto...</h4>';
			          	result += '<p><strong>Estamos registrandote...</strong></p>';
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
		        result += '<h4>Las contraseñas deben ser iguales...</h4>';
		        result += '<p><strong>... Lo que dice arriba ...</strong></p>';
		        result += '</div>';
		        __('_AJAX_REG_').innerHTML = result;
    		}
    	}else {
	        result = '<div class="alert alert-dismissible alert-danger">';
	        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	        result += '<h4>Rellena los campos mi vida...</h4>';
	        result += '<p><strong>Increible pero te falto teclear un poco allí...</strong></p>';
	        result += '</div>';
	        __('_AJAX_REG_').innerHTML = result;
    	}
    }else{
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<h4>¿No estas de acuerdo con los terminos?...</h4>';
        result += '<p><strong>Parece que no puedes completar el registro sino aceptas los terminos...</strong></p>';
        result += '</div>';
        __('_AJAX_REG_').innerHTML = result;
    }


}

function runScriptReg(e) {
    if (e.keyCode == 13) {
        goReg();
    }
}