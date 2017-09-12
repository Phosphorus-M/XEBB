<section class="mbr-section mbr-after-navbar section-table cid-qtIRYU0Mfo" id="table1-p" data-bg-video="http://www.youtube.com/watch?v=A7ZkZazfvao" data-rv-view="514">
	<br><br><br><br>
	<?php
	if(isset($_GET['error'])) {
			echo '<div class="alert alert-dismissible alert-danger">'. $lang['user_not_activated'] .'.</div>';
	}
	if(isset($_GET['success'])) {
			echo '<div class="alert alert-dismissible alert-success">' . $lang['user_activated'] . '</div>';
	}
	?>
	<div class="row container">

	    <?php
	        if(isset($_SESSION['forum_id']) and $_users[$_SESSION['forum_id']]['permisos'] >= 2) {
	          echo '
	          <div class="pull-right">
	            <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
	              <a class="mbr-buttons__btn btn btn-danger" href="?view=admin">PANEL DE ADMINISTRACIÓN</a>
	            </li></ul></div>
	          </div>
	          ';
	        }
	    ?>

	</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>
