<?php 
$db = new Conexion();
$pass = Encrypt($_POST['pass']);
$user = $db->real_escape_string($_POST['user']);
$email = $db->real_escape_string($_POST['email']);
$sql = $db->query("SELECT user FROM users WHERE user='$user' OR email='$email' LIMIT 1;");
if ($db->rows($sql) == 0 ) {
	$keyreg = md5(time());
	$link = HOST_URL . '?view=activar&key=' . $keyreg;
	$mail = new PHPMailer;
	$mail->CharSet = "UTF-8";
  	$mail->Encoding = "quoted-printable";
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = PHPMAILER_HOST;  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = PHPMAILER_USER;                 // SMTP username
	$mail->Password = PHPMAILER_PASS;                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = PHPMAILER_PORT;                                    // TCP port to connect to
	$mail->setFrom(PHPMAILER_USER, BASE_NAME);		//Quien manda el correo
	$mail->addAddress($email, $user);     // A quien le tiene que llegar
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Activación de tu cuenta';
	$mail->Body    = EmailTemplate($user,$link);
	$mail->AltBody = 'Hola' . $user . ' para activar tu cuenta accede al siguiente enlace' . $link;
	if(!$mail->send()) {
		$HTML = '<div class="alert alert-dismissible alert-danger">
 		 <button type="button" class="close" data-dismiss="alert">&times;</button>
 		 <strong>Hubo un error tecnico...</strong>' . $mail->ErrorInfo . '
			</div>';
	} else {
		$db->query("INSERT INTO users (user, pass, email, keyreg) VALUES ('$user','$pass','$email','$keyreg');");
		$sql_2 = $db->query("SELECT MAX(id) AS id FROM users;");
		$_SESSION['forum_id'] = $db->recorrer($sql_2)[0];
		$db->liberar($sql_2);
		$HTML = 1;
	}

}else{
	$usuario = $db->recorrer($sql)[0];
	$mail = $db->recorrer($sql)[1];
	if (strtolower($user) == strtolower($usuario)) {
		$HTML = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>No eres el primero...</strong> Ya hay un usuario con ese nombre.
	</div>';
	}else{
		$HTML = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>¿Momento que?...</strong> El mail ya esta ingresado en otra cuenta!.
	</div>';
	}
}
$db->liberar($sql);
$db->close();

echo $HTML;

?>	