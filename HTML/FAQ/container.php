<section class="mbr-section mbr-after-navbar section-table cid-qtIRYU0Mfo" id="table1-p" data-bg-video="http://www.youtube.com/watch?v=A7ZkZazfvao" data-rv-view="514">
	<br><br><br><br>
	<div class="row container">
	<?php
	if(isset($_GET['error'])) {
			echo '<div class="alert alert-dismissible alert-danger">'. $lang['user_not_activated'] .'.</div>';
	}
	if(isset($_GET['success'])) {
			echo '<div class="alert alert-dismissible alert-success">' . $lang['user_activated'] . '</div>';
	}
	?>
			<ol class="breadcrumb">
		    <?php

			  if(isset($_SESSION['forum_id']) and $_users[$_SESSION['forum_id']]['permisos'] >= 2) {
			  	echo '<div class="pull-right">
			 							<ul class=""><li class="mbr-navbar__item">
			              <a class="btn btn-danger" href="?view=admin">PANEL DE ADMINISTRACIÓN</a>
			            </li></ul>
				          </div>';
			    }
			  ?>
				<li><a href="?view=index"><i class="fa fa-home"></i> Inicio</a></li>
			</ol>
			<table>
				<tbody class="row categorias_con_foros">
					<tr>
						<td id="categories" class="title_category"><?php echo $lang['faq']; ?></td>
					</tr>
				</tbody>
			</table>
			<?php
			for ($i=1; $i < 5; $i++) {
				echo '<table>
					<tbody>
						<tr>
							<th scope="col">'. $lang['d'. $i .'_name'] .'</th>
						</tr>
					</tbody>
					<tbody>
						<tr>
								<td >'.  $lang['d'. $i .'_document'] .'</td>
						</tr>
					</tbody>
				</table><br><br>';
			}
			?>
	</div>
</section>
