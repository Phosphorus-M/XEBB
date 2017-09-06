function goLostpass() {
    var connect, form, response, result, email;
    email = __('email_lostpass').value;
    if(email != ''){
        form = 'email=' + email;
        connect = window.XMLHttpRequest ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function(){
            if(connect.readyState == 4 && connect.status == 200){
                if(connect.responseText == 1){
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<h4>Revisa tu correo</h4>';
                    result += '<p><strong>Te hemos mandado el link para adquirir una nueva contraseña a tu mail...</strong></p>';
                    result += '</div>';
                    __('_AJAX_LOSTPASS_').innerHTML = result;
                    location.reload();
                }else {
                    __('_AJAX_LOSTPASS_').innerHTML = connect.responseText;
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                result += '<h4>Se pasiente...</h4>';
                result += '<p><strong>En breve se enviara un correo a tu mail...</strong></p>';
                result += '</div>';
                __('_AJAX_LOSTPASS_').innerHTML = result;
            }
        }
        connect.open('POST','ajax.php?mode=lostpass', true);
        connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        connect.send(form);
    }else{
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<h4>Te quedo eso de ahí...</h4>';
        result += '<p><strong>Debes rellenar el campo vacio... si... el unico que hay...</strong></p>';
        result += '</div>';
        __('_AJAX_LOSTPASS_').innerHTML = result;
    }

}

function runScriptLostpass(e) {
    if (e.keyCode == 13) {
        goLostpass();
    }
}