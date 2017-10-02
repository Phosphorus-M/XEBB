<?php

function GetUserStatus($time) {
  if($time >= (time() - (60*5))) {
    return 'icon_online.gif';
  } else {
    return 'icon_offline.gif';
  }
}

?>
