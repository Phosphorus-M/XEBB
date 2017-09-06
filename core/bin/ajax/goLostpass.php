<?php 
$db = new Conexion();
$email = $db->real_escape_string($_POST['email']);
$sql = $db->query("SELECT id,user FROM users WHERE email='$email' LIMIT 1;");
if ($db->rows($sql)>0) {
	$data = $db->recorrer($sql);
	$id = $data[0];
	$user = $data[1];
	$keypass = md5(time());
	$new_pass = strtoupper(substr(sha1(time()), 0, 8));
	$link = HOST_URL . '?view=lostpass&key=' . $keypass;

	$mail = new PHPMailer;
	$mail->CharSet = "UTF-8";
  	$mail->Encoding = "quoted-printable";
	$mail->isSMTP();                                      // Setea el mail para usar SMTP
	$mail->Host = PHPMAILER_HOST;  // Escecifica el Host del SMTP servers
	$mail->SMTPAuth = true;                               // Flag del login del SMTP
	$mail->Username = PHPMAILER_USER;                 // SMTP useruario
	$mail->Password = PHPMAILER_PASS;                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Permitir encriptación TLS, `ssl` para menos gasto de inodoros aconsejo usar SSL
	$mail->Port = PHPMAILER_PORT;                                    // Puerto TCP 
	$mail->setFrom(PHPMAILER_USER, BASE_NAME);		//Quien manda el correo
	$mail->addAddress($email, $user);     // A quien le tiene que llegar
	$mail->isHTML(true);                                  // Setea email si se enviara HTML
	$mail->Subject = 'Solicitud de nueva contraseña';
	$mail->Body    = LostpassTemplate($user,$link);
	$mail->AltBody = 'Hola' . $user . ' para obtener la nueva contraseña accede al siguiente enlace' . $link . ', si no has solicitado una nueva contraseña te pedimos que hagas caso omiso a este correo';
	if(!$mail->send()) {
		$HTML = '<div class="alert alert-dismissible alert-danger">
 				<button type="button" class="close" data-dismiss="alert">&times;</button>
	 			<strong>Hubo un error tecnico...</strong>' . $mail->ErrorInfo . '
				</div>';
	} else {
	    $db->query("UPDATE users SET keypass='$keypass', new_pass='$new_pass' WHERE id='$id';");
	    $HTML = 1;
	}
}else{
	$HTML = '<div class="alert alert-dismissible alert-danger">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<h4>No me mientas...!!</h4> <p>No hay ninguna cuenta registrada con ese mail!</p>
			</div>';
}
$db->liberar($sql);
$db->close();

echo $HTML;

?>