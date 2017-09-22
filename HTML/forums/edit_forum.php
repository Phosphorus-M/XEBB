  <?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>'. $lang['completed'] .'</strong> '. $lang['the_forum_has_been_created'] .'.
    </div>';
  }
  if(isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
      echo '<div class="alert alert-dismissible alert-danger">
        <strong>'. $lang['error'] .'</strong> '. $lang['all_fields_must_be_filled'] .'.
      </div>';
    }else {
      echo '<div class="alert alert-dismissible alert-danger">
        <strong>'. $lang['error'] .'</strong> '. $lang['there_must_be_a_category'] .'.
      </div>';
    }

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
      <div class="row title_category"><?php echo $lang['forum_management'] ?></div>

      <div class="row boxes">
        <div class="col-md-12">
          <form class="form-horizontal" action="?view=admin&section=configforums&mode=edit&id=<?php echo $_GET['id'] ?>" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label"><?php echo $lang['forum']; ?></label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="name" placeholder="Nombre para el Foro" value="<?php echo $_forums[$_GET['id']]['name']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label"><?php echo $lang['description']; ?></label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="description" placeholder="<?php echo $lang['forum_description']; ?>" value="<?php echo $_forums[$_GET['id']]['description']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label"><?php echo $lang['category']; ?></label>
                <div class="col-lg-10">
                  <select class="form-control" name="categories">
                    <?php
                    foreach ($_categories as $id_category => $array_category) {
                      if ($id_category == $_forums[$_GET['id']]['id_categoria']) {
                        echo "<option value=". $id_category ." selected >" . $_categories[$id_category]['name'] . "</option>";
                      }else {
                        echo "<option value=". $id_category .">" . $_categories[$id_category]['name'] . "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label"><?php echo $lang['status']; ?></label>
                <div class="col-lg-10">
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" value="1" <?php  if ($_forums[$_GET['id']]['status'] == 1) {
                        echo 'checked=""';
                      }
                         ?>><?php echo $lang['open']; ?></label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" value="0" <?php if ($_forums[$_GET['id']]['status'] == 0) {
                        echo 'checked=""';
                      } ?>><?php echo $lang['close']; ?></label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default"><?php echo $lang['reset']; ?></button>
                  <button type="submit" class="btn btn-primary"><?php echo $lang['update']; ?></button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
  </div>
</div>
