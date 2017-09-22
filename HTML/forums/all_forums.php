<?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>'. $lang['the_forum_has_been_deleted_successfully'] .'</strong>.
    </div>';
  }
  ?>
<div class="row container">
    <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
         <a class="mbr-buttons__btn btn btn-danger" href="?view=admin&section=configforums"><?php echo mb_strtoupper($lang['forum_management'], 'UTF-8'); ?></a>
     </li></ul></div>
     <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
         <a class="mbr-buttons__btn btn btn-danger active" href="?view=admin&section=configforums&mode=add"><?php echo $lang['CREATE_A_FORUM']; ?></a>
     </li></ul></div>
     <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
        <a class="mbr-buttons__btn btn btn-danger" href="?view=admin&section=categories"><?php echo mb_strtoupper($lang['categories_management'], 'UTF-8'); ?></a>
     </li></ul></div>
</div>
<div class="row categories_with_forums">
  <div class="col-sm-12">
      <div class="row title_category"><?php echo $lang['forum_management']; ?></div>
      <div class="row boxes">
        <div class="col-md-12">
          <?php

          if($_forums != false) {
           $HTML = '<table class="table"><thead><tr>
           <th width="5%">Id</th>
           <th>'. $lang['forum_name'] .'</th>
           <th>'. $lang['Messages'] .'</th>
           <th>'. $lang['topics'] .'</th>
           <th>'. $lang['category'].'</th>
           <th>'. $lang['status'] .'</th>
           <th width="20%" >'. $lang['actions'] .'</th>
           </tr></thead>
           <tbody>';
           foreach ($_forums as $id_forum => $content_array) {
                $status = $_forums[$id_forum]['status'] == 1 ? $lang['open'] : $lang['close'];
                $HTML .= '<tr>
                  <td>'.$_forums[$id_forum]['id'].'</td>
                  <td>'.$_forums[$id_forum]['name'].'</td>
                  <td>'.$_forums[$id_forum]['num_of_menssages'].'</td>
                  <td>'.$_forums[$id_forum]['num_of_topics'].'</td>
                  <td>'.$_categories[$_forums[$id_forum]['id_categoria']]['name'].'</td>
                  <td>'. $status .'</td>
                  <td>
                    <div class="btn-group">
                     <ul>
                       <li><a href="?view=admin&section=configforums&mode=edit&id='.$_forums[$id_forum]['id'].'">Editar</a></li>
                       <li><a onclick="DeleteItem(\' '. $lang['you_want_delete_this_forum?'] .'\',\'?view=admin&section=configforums&mode=delete&id='.$_forums[$id_forum]['id'].'\')" >'. $lang['delete'].'</a></li>
                     </ul>
                   </div>
                  </td>
                </tr>';
            }
            $HTML .= '</tbody></table>';
          } else {
            $HTML = '<div class="alert alert-dismissible alert-info">'. $lang['there_is_not_forum'].'</div>';
          }
          echo $HTML;
          ?>
        </div>
      </div>
  </div>
</div>
