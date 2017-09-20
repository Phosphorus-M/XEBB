<!DOCTYPE html>
<html>
<?php include 'HTML/admin/header.php'; ?>
<body>
<?php
if(file_exists('language/'.substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,2).'/')){
  $language = 'language/'.substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,2);
}else {
  $language = 'language/en';
}
if(isset($_GET['view'])){
  if(file_exists('core/controllers/' . strtolower($_GET['view']) . 'Controller.php')){
    include $language.'/'. strtolower($_GET['view']) .'.php';
    include $language.'/index.php';
  }
} else {
  include $language.'/index.php';
}
include 'HTML/admin/navbar.php';
include 'HTML/admin/container.php';
include 'HTML/Overall/footer.php';
?>

<script src="assets/icons/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/smooth-scroll/smooth-scroll.js"></script>
<script src="assets/navbar/script.js"></script>
<script src="assets/icons/jquery/jquery.min.js"></script>
<script src="assets/popper/popper.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/smooth-scroll/smooth-scroll.js"></script>
<script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
<script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
<script src="assets/jquery-mb-ytplayer/jquery.mb.ytplayer.min.js"></script>
<script src="assets/jquery-mb-vimeo_player/jquery.mb.vimeo_player.js"></script>
<script src="assets/theme/js/script.js"></script>
<script src="assets/formoid/formoid.min.js"></script>
</body>
</html>
