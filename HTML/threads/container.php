<section class="features8 cid-qvVl2f6Vdi" data-bg-video="http://www.youtube.com/watch?v=A7ZkZazfvao" id="features8-x" data-rv-view="17">
	<br><br><br><br>

	<div class="container mbr-section__container--isolated">
      <ol class="breadcrumb">
         <?php
            if(isset($_SESSION['forum_id']) and ($_forums[$forum_id]['status'] == 1 or $_users[$_SESSION['forum_id']]['permisos'] == 2)){
               $button = '<ul ><li class="mbr-navbar__item mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active pull-right">
                        <a class="mbr-buttons__btn btn btn-danger" href="?view=thread&mode=add&id_forum='.$forum_id.'">NUEVO TEMA</a>
                        </li></ul>';
               echo $button;
            }
         ?>
         <li class="mbr-navbar__items" ><a href="?view=index"><i class="fa fa-home"></i> Inicio</a> -> <a href="?view=forum&id=<?php echo $forum_id; ?>"><i class="fa fa-comments"></i> <?php echo $_forums[$forum_id]['name'] ?></a></li>
      </ol>
      <table>t
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

             echo '<div class="forums">
               <td class="col-md-1" style="height:50px;line-height: 37px;">
                 <img src="assets/forum/foros/anuncio_leido'.$extension.'" />
               </td>
               <td class="col-md-7 puntitos" style="padding-left: 0px;line-height: 37px;">
                 <a href="thread/'.FriendlyURL($stinky['id'],$stinky['title'],$forum_id).'">'.$stinky['title'].'</a>
               </td>
               <td class="col-md-2 left_border" style="text-align: center;font-weight: bold;">
                 '.number_format($stinky['views'],0,',','.').' Visitas<br />
                 '.number_format($stinky['replys'],0,',','.').' Respuestas
               </td>
               <td class="col-md-2 left_border puntitos" style="">
                 Por <a href="?view=profile&id='.$stinky['id_lastpost'].'">'.$_users[$stinky['id_lastpost']]['user'].'</a><br />
                 '.$stinky['lr_date'].'
               </td>
             </div>';
            }
            } else {
            echo '<div class="row foros">
             <div class="col-md-12" style="height:50px;line-height: 37px;">
               No existe ningún tema.
             </div>
            </div>';
            }

            ?>
            </tr>
            </tbody>
         </table>
      </table>

   <br><br><br>


   <ol class="breadcrumb">
      <?php
         if(isset($button)){
            echo $button;
         }
      ?>
      <li class="mbr-navbar__items" ><a href="?view=index"><i class="fa fa-home"></i> Inicio</a> -> <a href="?view=forum&id=<?php echo $forum_id; ?>"><i class="fa fa-comments"></i> <?php echo $_forums[$forum_id]['name'] ?></a></li>
   </ol>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>
