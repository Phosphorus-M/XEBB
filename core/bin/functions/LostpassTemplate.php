<?php
function LostpassTemplate($user,$link) {
  $HTML = '
  <html>
  <body style="background: #FFFFFF;font-family: Verdana; font-size: 14px;color:#1c1b1b;">
  <div style="">
      <h2>Hola '.$user.'</h2>
      <p style="font-size:17px;">Hemos recibido una solicitud de nueva contraseña en '. BASE_NAME .'.</p>
  	<p>El día '. date('d/m/y', time()) .' se genero esta solicitud.<br/>Si no has solicitado una nueva contraseña te pedimos que ignores este mensaje, en cambio si deseas adquirir la nueva contraseña debes hacer click en el siguiente enlace.</p>
  	<p style="padding:15px;background-color:#ECF8FF;">
  			Para modificar tu contraseña por favor has <a style="font-weight:bold;color: #2BA6CB;" href="' . $link . '" >clic aquí &raquo;</a>
  	</p>
      <p style="font-size: 9px;">'. BASE_COPY .'</p>
  </div>
  </body>
  </html>
  ';
      return $HTML;
}
?>