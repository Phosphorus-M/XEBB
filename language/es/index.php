<?php
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
$lang = array_merge($lang, array(
	//Footer
	'user_not_activated' => '<strong>Error!</strong> no se ha podido activar tu usuario',
	'user_activated' => '<strong>Activado!</strong> tu usuario ha sido activado correctamente.',
	'LICENSE' => 'XEBB es de codigo abierto y gratuito, por lo que cualquiera puede obtenerlo sin tener que pagar, darle uso, modificarlo y adaptarlo para sus necesidades sin necesidad de pedirselo al autor del software.',
	'BASE_DESCRIPTION' => 'XEBB es un sistema de foros complejo pero simplificado para que cualquiera pueda diseñar de manera optima su propio foro.',
	'Information' => 'INFORMACIÓN',
	'ASK_FOR_HELP' => 'PEDIR AYUDA',
	'LEAVE_MAIL' => 'Deje su mail si desea que el autor se pongan en contacto con usted:',
	'THANKS_FOR_FILLING' => 'Gracias por rellenar el formulario!',
	'submit' => 'Enviar',
	'follow_us' => 'Siguenos:',
	//Nav. Bar
	'Home' => 'Inicio',
	'register' => 'Registrarse',
	'login' => 'Iniciar Session',
	'view_profile' => 'Ver Perfil',
	'Account' => 'Cuenta',
	'logout' => 'Desconectarse',
	//Register
	'cancel' => ' Cancelar',
	'agree_terms' => 'Acepto los T&C',
	'enter_your_pass_again' => 'Introduce tu contraseña de nuevo',
	'repeat_pass' => ' Repite tu Contraseña',
	'enter_pass' => 'Introduce tu contraseña',
	'password' => ' Contraseña',
	'enter_mail' => 'Introduce tu correo electrónico',
	'email' => ' Email',
	'enter_username' => 'Introduce un nombre de usuario',
	'user' => ' Usuario',
	//Lost password
	'reset_password' => ' Restaurar Contraseña',
	'restore' => ' Recuperar',
	//Login
	'user_or_email' => ' Usuario o Email',
	'enter_user_or_email' => 'Introducir nombre de usuario o Email',
	'remember_me' => 'Recordarme',
	'lost_pass' => '¿Contraseña perdida?',
	'not_registered' => '¿No estás registrado?',
	//Conection Process
	'connected' => 'Conectado',
	'we_are_redirecting_you' => 'Te estamos redireccionando...',
	'processing' => 'Procesando...',
	'we_are_connecting_you' => 'Estamos conectándote...',
	//Register Process
	'registration_completed' => 'Registro Completado',
	'already_a_member' => 'Ya eres miembro... Felicidades!</br>Te estamos redireccionando...',
	'all_right' => 'Todo correcto...',
	'we_are_registering' => 'Estamos registrándote...',
	'passwords_not_same' => 'Las contraseñas deben ser iguales...',
	'as_says_above' => '... Lo que dice arriba ...',
	'fill_the_fields' => 'Rellena los campos mi vida...',
	'you_not_typed' => 'Increible pero te falto teclear un poco allí...',
	'not_agree_terms' => '¿No estás de acuerdo con los términos?',
	'if_you_dont_agree_terms' => 'Parece que no puedes completar el registro si no aceptas los términos...',
	//Reset Pass Process
	'' => 'Revisa tu correo',
	'' => 'Te hemos mandado el link para adquirir una nueva contraseña a tu mail...'
	)
);
?>
