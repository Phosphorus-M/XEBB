<section class="features8 cid-qvVl2f6Vdi" data-bg-video="http://www.youtube.com/watch?v=A7ZkZazfvao" id="features8-x" data-rv-view="17" style="min-width: 65rem;">
	<br><br><br>
	<div class="container mbr-section__container--isolated">

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
		          echo '<div>
		 							<ul><li class="mbr-navbar__item mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active pull-right">
		              <a class="btn btn-danger" href="?view=admin">'. mb_strtoupper($lang['ACP'], 'UTF-8') .'</a>
		            </li></ul>
			          </div>';
		        }
		    ?>

		      <li><a href="?view=index"><i class="fa fa-home"></i> <?php echo $lang['Home']; ?></a></li>
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
															echo '<table style="border: 0px solid transparent !important;"onclick="document.location.href=\'forum/'.FriendlyURL($_forums[$id_del_foro]['id'],$_forums[$id_del_foro]['name']).'\'; return false;" ><tbody style="border: 0px solid transparent !important;"><tr style="border: 0px solid transparent !important;">
																<td style="border: 0px solid transparent !important;">
																<h4 class="title-forum" ><a href="forum/'.FriendlyURL($_forums[$id_del_foro]['id'],$_forums[$id_del_foro]['name']).'" >'.$_forums[$id_del_foro]['name'].'</a></h4>
																</td></tr>
																</tbody></table>
																<table style="table-layout: auto;" onclick="document.location.href=\'forum/'.FriendlyURL($_forums[$id_del_foro]['id'],$_forums[$id_del_foro]['name']).'\'; return false;">
															<tbody>
																	  	<tr style="border: 0px solid transparent !important; ">
																				<td class="col-md-1 col-md-push-2" style="width: 1%;border: 0px solid transparent !important;">
																					<img src="assets/forum/foros/foro_leido'.$extension.'" />
																				</td>
																	    <td class="col-md-2 col-md-push-1 forum"  >
												                <p>'.$_forums[$id_del_foro]['description'].'<br><hr>
												               <a href="#">'. $lang['last_post'] .'</a> '. $lang['by'] .' <a href="#">Autor :D </a><br></p>
																				<span class="extra" title="'. $lang['thread'] .', '. $lang['posts'] .'">'.number_format($_forums[$id_del_foro]['num_of_topics'],0,',','.').' '. $lang['thread'] .', '.number_format($_forums[$id_del_foro]['num_of_menssages'],0,',','.').' '. $lang['posts'] .' </span><br>
																			<br></td>
												            </tr>
																		</tbody><table></table><hr class="separator-of-forums">';
					          }
					    }else{
					      echo '<tbody class="row categorias_con_foros">
					          <tr>
					              <td class="row foros">
					                  '. $lang['dont_exist_no_one_forum'] .'.
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
										<td class="row foros" style="line-height: 37px;">'.$lang['dont_exist_no_one_annoucement'] .'.</td>
										</tr>
										</tbody>
										</table>';
					}
				?>
	</div>

</section>
