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
<div class="row category_with_forums">
  <div class="col-sm-12">
      <div class="row title_category"><?php echo $lang['categories_management']; ?></div>

      <div class="row boxes">
        <div class="col-md-12">
          <form class="form-horizontal" action="?view=admin&section=categories&mode=add" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label"><?php echo $lang['category']; ?></label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="name" placeholder="<?php echo $lang['category_name']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default"><?php echo $lang['reset']; ?></button>
                  <button type="submit" class="btn btn-primary"><?php echo $lang['create']; ?></button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
  </div>
</div>
