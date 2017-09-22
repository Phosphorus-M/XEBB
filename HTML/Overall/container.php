<section class="features8 cid-qvVl2f6Vdi" data-bg-video="http://www.youtube.com/watch?v=A7ZkZazfvao" id="features8-x" data-rv-view="17">
	<br><br><br><br>
	<div class="row container">
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
	          echo '<div class="pull-right">
	 							<ul class=""><li class="mbr-navbar__item">
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
			    echo '<table><tbody class="row categorias_con_foros">
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

			          echo '<thead>
								  <tr>
								    <th scope="col" class="fotito" ></th>
								    <th scope="col">Foro y description</th>
								    <th scope="col">Temas y respuestas</th>
								    <th scope="col">Last Menssage</th>
								  </tr>
								</thead><tbody>
								  <tr>
								    <td>
			                <img src="assets/forum/foros/foro_leido'.$extension.'" />
											</td>
									    <td data-label="Foro y description">
			                <a href="forum/'.FriendlyURL($_forums[$id_del_foro]['id'],$_forums[$id_del_foro]['name']).'" >'.$_forums[$id_del_foro]['name'].'</a><br />
			                '.$_forums[$id_del_foro]['description'].'
			              </td>
			              <td data-label="Temas y respuestas">
			                '.number_format($_forums[$id_del_foro]['num_of_topics'],0,',','.').' Temas<br />
			                '.number_format($_forums[$id_del_foro]['num_of_menssages'],0,',','.').' Mensajes
			              </td>
			              <td data-label="Last Menssage">
			                <a href="#">Ultimo mensaje acá texto largo</a>
			              </td>
			            </tr>
									</tbody>';
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
