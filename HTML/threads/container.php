<section class="features8 cid-qvVl2f6Vdi" data-bg-video="http://www.youtube.com/watch?v=A7ZkZazfvao" id="features8-x" data-rv-view="17">
	<br><br><br><br>

	<div class="container mbr-section__container--isolated">
      <ol class="breadcrumb text-white">
         <?php
            if(isset($_SESSION['forum_id']) and ($_forums[$forum_id]['status'] == 1 or $_users[$_SESSION['forum_id']]['permisos'] == 2)){
               $button = '<ul ><li  class="mbr-navbar__item mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active pull-right">
                        <a  class="mbr-buttons__btn btn btn-danger" href="?view=thread&mode=add&forum_id='.$forum_id.'">NUEVO TEMA</a>
                        </li></ul>';
               echo $button;
            }
         ?><br>
         <li class="mbr-navbar__items" ><a href="?view=index"><i class="fa fa-home"></i> Inicio</a> -> <a href="?view=forum&id=<?php echo $forum_id; ?>"><i class="fa fa-comments"></i> <?php echo $_forums[$forum_id]['name'] ?></a></li>
      </ol>
      <table>
         <table>
            <tbody class="categorias_con_foros">
               <tr>
                     <td id="categories" class="title_category">Anuncios</td>

            <?php

            if($db->rows($sql_stinky) > 0) {
            while($stinky = $db->recorrer($sql_stinky)) {

             if($stinky['status'] == 1) {
               $extension = '.png';
             } else {
               $extension = '_bloqueado.png';
             }
					 echo '<table style="table-layout: auto;" onclick="document.location.href=\'thread/'.FriendlyURL($stinky['id'],$stinky['title'],$forum_id).'\'; return false;">
						 <tbody>
										 <tr style="border: 0px solid transparent !important; ">
											 <td class="col-md-1 col-md-push-2" style="width: 1%;border: 0px solid transparent !important;">
												 <img src="assets/forum/foros/anuncio_leido'.$extension.'" />
											 </td>
										 <td class="col-md-2 col-md-push-1 forum"  >
											 <p><h6><a href="thread/'.FriendlyURL($stinky['id'],$stinky['title'],$forum_id).'" >'.$stinky['title'].'</a></h6><br>
											<a href="#">Ultimo mensaje</a> de <a href="?view=profile&id='.$stinky['id_lastpost'].'">'.$_users[$stinky['id_lastpost']]['user'].'</a><br>'.$stinky['lr_date'].'</p>
											 <span class="extra" title="Topics, Posts">'.number_format($stinky['views'],0,',','.').'  Visitas, '.number_format($stinky['replys'],0,',','.').'  Respuestas</span><br>
										 <br></td>
									 </tr>
									 </tbody><table></table><hr class="separator-of-forums">';
            }
            } else {
            echo '<tbody class="row categorias_con_foros">
                <tr>
                    <td class="row foros">
                        No existe ningun anuncio.
                      </td>
                    </tr>
                    </tbody>';
            }

            ?>
            </tr>
            </tbody>
         </table>
      </table>
      <br>
      <table>
         <table>
            <tbody class="categorias_con_foros">
               <tr>
                     <td id="categories" class="title_category">Temas</td>
             <?php

             if($db->rows($sql) > 0) {
               while($thread = $db->recorrer($sql)) {

                 if($thread['status'] == 1) {
                   $extension = '.png';
                 } else {
                   $extension = '_bloqueado.png';
                 }

                 /*echo '<div class="row forums">
                   <div class="col-md-7 puntitos" style="padding-left: 0px;line-height: 37px;">
                     <a href=""></a>
                   </div>
                 </div>';*/
                 echo '<table style="table-layout: auto;" onclick="document.location.href=\'thread/'.FriendlyURL($thread['id'],$thread['title'],$forum_id).'\'; return false;">
      						 <tbody>
      										 <tr style="border: 0px solid transparent !important; ">
      											 <td class="col-md-1 col-md-push-2" style="width: 1%;border: 0px solid transparent !important;">
      												 <img src="assets/forum/foros/foro_leido'.$extension.'" />
      											 </td>
      										 <td class="col-md-2 col-md-push-1 forum"  >
      											 <p><h6><a href="thread/'.FriendlyURL($thread['id'],$thread['title'],$forum_id).'" >'.$thread['title'].'</a></h6><br>
      											<a href="#">Ultimo mensaje</a> de <a href="?view=profile&id='.$thread['id_lastpost'].'">'.$thread['title'].'</a><br>'.$thread['lr_date'].'</p>
      											 <span class="extra" title="Topics, Posts">'.number_format($thread['views'],0,',','.').'  Visitas, '.number_format($thread['replys'],0,',','.').'  Respuestas</span><br>
      										 <br></td>
      									 </tr>
      									 </tbody><table></table><hr class="separator-of-forums">';
               }
             } else {
               echo '<tbody class="row categorias_con_foros">
                   <tr>
                       <td class="row foros">
                           No existe ningun tema.
                         </td>
                       </tr>
                       </tbody>';
             }

             ?>
           </tr>
           </tbody>
        </table>
     </table>
   <br><br><br>


   <ol class="breadcrumb text-white">
      <?php
         if(isset($button)){
            echo $button;
         }
      ?>
      <li class="mbr-navbar__items" ><a href="?view=index"><i class="fa fa-home"></i> Inicio</a> -> <a href="?view=forum&id=<?php echo $forum_id; ?>"><i class="fa fa-comments"></i> <?php echo $_forums[$forum_id]['name'] ?></a></li>
   </ol>
</div>

</section>
