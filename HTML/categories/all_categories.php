  <div class="pull-right">
    <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
         <a class="mbr-buttons__btn btn btn-danger" href="?view=admin&section=configforums"><?php echo mb_strtoupper($lang['forum_management'], 'UTF-8'); ?></a>
     </li></ul></div>
      <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
          <a class="mbr-buttons__btn btn btn-danger" href="?view=admin&section=categories"><?php echo mb_strtoupper($lang['categories_management'], 'UTF-8'); ?></a>
      </li></ul></div>
      <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
          <a class="mbr-buttons__btn btn btn-danger active" href="?view=admin&section=categories&mode=add"><?php echo $lang['create_category']; ?></a>
      </li></ul></div>
    </div>
<div class="row categories_with_forums">
  <div class="col-sm-12">
      <div class="row title_category"><?php echo $lang['categories_management'] ?></div>

      <div class="row boxes">
        <div class="col-md-12">
          <?php

          if($_categories != false) {
           $HTML = '<table class="table"><thead><tr>
           <th style="width: 10%">Id</th>
           <th style="width: 70%">'. $lang['category_name'] .'</th>
           <th style="width: 20%">'. $lang['actions'] .'</th>
           </tr></thead>
           <tbody>';
            foreach ($_categories as $id_categoria => $Categories_array) {
                $HTML .= '<tr>
                  <td>'.$_categories[$id_categoria]['id'].'</td>
                  <td>'.$_categories[$id_categoria]['name'].'</td>
                  <td>
                    <div class="btn-group">
                       <ul>
                       <li><a href="?view=admin&section=categories&mode=edit&id='.$_categories[$id_categoria]['id'].'">'. $lang['edit'] .'</a></li>
                       <li><a onclick="DeleteItem(\' '.$lang['you_want_delete_this_category?'] .' \',\'?view=admin&section=categories&mode=delete&id='.$_categories[$id_categoria]['id'].'\')" >'. $lang['delete'] .'</a></li>
                     </ul>
                   </div>
                  </td>
                </tr>';
            }
            $HTML .= '</tbody></table>';
          } else {
            $HTML = '<div class="alert alert-dismissible alert-info">'. $lang['there_is_not_categories'] .'</div>';
          }
          echo $HTML;
          ?>
        </div>
      </div>
  </div>
</div>
