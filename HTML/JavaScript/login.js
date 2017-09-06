function goLogin(connected, we_are_redirecting_you, processing, we_are_connecting_you) {
    var connect, form, response, result, user, pass, session;
    user = __('user_login').value;
    pass = __('pass_login').value;
    session = __('session_login').checked ? true : false;
    form = 'user=' + user + '&pass=' + pass + '&session' + session;
    connect = window.XMLHttpRequest ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function(){
    	if(connect.readyState == 4 && connect.status == 200){
    		if(connect.responseText == 1){
	        	result = '<div class="alert alert-dismissible alert-success">';
	        	result += '<h4>'+ connected +'</h4>';
	          	result += '<p><strong>'+ we_are_redirecting_you +'</strong></p>';
	        	result += '</div>';
				__('_AJAX_LOGIN_').innerHTML = result;
				location.reload();
    		}else {
    			__('_AJAX_LOGIN_').innerHTML = connect.responseText;
    		}
    		console.log(connect.responseText);
    	}else if(connect.readyState != 4){
        	result = '<div class="alert alert-dismissible alert-warning">';
        	result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        	result += '<h4>'+ processing +'</h4>';
          	result += '<p><strong>'+ we_are_connecting_you +'</strong></p>';
        	result += '</div>';
        	__('_AJAX_LOGIN_').innerHTML = result;
    	}
    }
    connect.open('POST','ajax.php?mode=login', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form);
}

function runScriptLogin(e) {
    if (e.keyCode == 13) {
        goLogin();
    }
}
