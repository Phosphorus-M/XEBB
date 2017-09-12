function goLostpass(check_your_email, acquire_a_new_password, be_patient, an_email_will_soon_be_sent, you_forgot_that, you_must_fill_in_the_empty_field) {
    var connect, form, response, result, email;
    email = __('email_lostpass').value;
    if(email != ''){
        form = 'email=' + email;
        connect = window.XMLHttpRequest ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function(){
            if(connect.readyState == 4 && connect.status == 200){
                if(connect.responseText == 1){
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<h4>'+ check_your_email +'</h4>';
                    result += '<p><strong>'+ acquire_a_new_password +'</strong></p>';
                    result += '</div>';
                    __('_AJAX_LOSTPASS_').innerHTML = result;
                    location.reload();
                }else {
                    __('_AJAX_LOSTPASS_').innerHTML = connect.responseText;
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                result += '<h4>'+ be_patient +'</h4>';
                result += '<p><strong>'+ an_email_will_soon_be_sent +'</strong></p>';
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
        result += '<h4>'+ you_forgot_that +'</h4>';
        result += '<p><strong>'+ you_must_fill_in_the_empty_field +'</strong></p>';
        result += '</div>';
        __('_AJAX_LOSTPASS_').innerHTML = result;
    }

}

function runScriptLostpass(e) {
    if (e.keyCode == 13) {
        goLostpass();
    }
}
