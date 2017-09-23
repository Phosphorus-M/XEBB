<section class="features8 cid-qvVl2f6Vdi" data-bg-video="http://www.youtube.com/watch?v=A7ZkZazfvao" id="features8-x" data-rv-view="17">
	<br><br><br><br>
	<div class="container mbr-section__container--isolated">
		<br><br><br><br><br><br><br>
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
		          echo '<div class="">
		 							<ul class=""><li class="mbr-navbar__item mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active pull-right">
		              <a class="btn btn-danger" href="?view=admin">PANEL DE ADMINISTRACIÓN</a>
		            </li></ul>
			          </div>';
		        }
		    ?>

		      <li><a href="?view=index"><i class="fa fa-home"></i> Inicio</a></li>
		    </ol>

				<?php

					if(false != $_categories) {
					  $prepare_sql = $db->prepare("SELECT id FROM forums WHERE id_categoria = ? ;");
					  $prepare_sql->bind_param('i',$id_categoria);
					  foreach($_categories as $id_categoria => $array_categoria) {
					    $prepare_sql->execute();
					    $prepare_sql->store_result();
					    echo '<table><tbody class="row categories_with_forums">
									<tr>
											<td id="categories" class="title_category">'.$_categories[$id_categoria]['name'].'</td>
											</tr>
											</tbody></table>
											<table>';
					    if ($prepare_sql->num_rows() > 0 ) {
					      $prepare_sql->bind_result($id_del_foro);
					        while($prepare_sql->fetch()) {
					          if($_forums[$id_del_foro]['status'] == 1) {
					              $extension = '.png';
					            } else {
					              $extension = '_bloqueado.png';
					            }
											/*echo '<tr >
														<td class="col-md-1 col-md-push-2" onclick="document.location.href=\'forum/'.FriendlyURL($_forums[$id_del_foro]['id'],$_forums[$id_del_foro]['name']).'\'; return false;">
														<p><a href="forum/'.FriendlyURL($_forums[$id_del_foro]['id'],$_forums[$id_del_foro]['name']).'">'.$_forums[$id_del_foro]['name'].'</a></p>
															<p class="col-md-2" ><img src="assets/forum/foros/foro_leido'.$extension.'" /></p><p>'.$_forums[$id_del_foro]['description'].'<br>
														</p><span class="extra" title="Topics, Posts">'.number_format($_forums[$id_del_foro]['num_of_topics'],0,',','.').' Temas, '.number_format($_forums[$id_del_foro]['num_of_menssages'],0,',','.').' Mensajes</span><br />
														</td>
														<td class="forum col-md-2 col-md-push-1" onclick="document.location.href=\'#\'; return false;">
															<a href="#">Ultimo mensaje</a> de <a href="#">Autor :D </a>
														</td></tr></tbody>';*/

														/*echo '<tbody>
															<tr>
																<td class="col-md-1" style="height:50px;line-height: 37px;">
																		<p><a href="forum/'.FriendlyURL($_forums[$id_del_foro]['id'],$_forums[$id_del_foro]['name']).'">'.$_forums[$id_del_foro]['name'].'</a></p>
																		<p><img src="assets/forum/foros/foro_leido'.$extension.'" /></p><p>'.$_forums[$id_del_foro]['description'].'<br>
																	</p>
																</td>
																<td class="forum col-md-1 col-md-push-1" onclick="document.location.href=\'#\'; return false;">
																	<a href="#">Ultimo mensaje acá texto largo</a> <br> de <a href="#">Autor :D </a>
																</td>
																</tr>
															</tr>
															</tbody>';*/
															echo '
															<table style="border: 0px solid transparent !important;"><tbody style="border: 0px solid transparent !important;"><tr style="border: 0px solid transparent !important;">
																<td style="border: 0px solid transparent !important;">
																<h4><a href="forum/'.FriendlyURL($_forums[$id_del_foro]['id'],$_forums[$id_del_foro]['name']).'" >'.$_forums[$id_del_foro]['name'].'</a></h4>
																</td></tr>
																</tbody></table>
																<table >
															<tbody>
																	  	<tr style="border: 0px solid transparent !important;">
																				<td class="col-md-1 col-md-push-2" style="max-width:200px !important; border: 0px solid transparent !important;">
																					<img src="assets/forum/foros/foro_leido'.$extension.'" />
																				</td>
																	    <td class="col-md-2 col-md-push-1 forum" >
												                <p>'.$_forums[$id_del_foro]['description'].'<br>
												                <a href="#">Ultimo mensaje acá texto largo</a><br></p>
																				<span class="extra" title="Topics, Posts">'.number_format($_forums[$id_del_foro]['num_of_topics'],0,',','.').' Temas, '.number_format($_forums[$id_del_foro]['num_of_menssages'],0,',','.').' Mensajes</span><br>
																			<br></td>
												            </tr>
																		</tbody><table><tr></tr></table>';
					          }
					    }else{
					      echo '<tbody class="row categorias_con_foros">
					          <tr>
					              <td class="row foros">
					                  No existe ningun foro.
						              </td>
												</tr>
												</tbody>';
					    }
					    echo '</table>';
					  }
					  $prepare_sql->close();

					} else {
					  echo '<table>
						<tbody class="row categorias_con_foros">
								<tr>
										<td class="row foros" style="line-height: 37px;">No existe ninguna categoría</td>
										</tr>
										</tbody>
										</table>';
					}
				?>
	</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>
