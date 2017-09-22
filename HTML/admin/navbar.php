<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="ext_menu-b" data-rv-view="0">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo"><a href=""><img src="assets/images/logo.png" class="mbr-navbar__brand-img mbr-brand__img" alt="XEBB"></a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active">
                              <?php /*echo '<li class="mbr-navbar__item">
                                <a class="mbr-buttons__link btn text-white" href="">

                                </a>
                              </li>';*/ ?>
                              <li class="mbr-navbar__item">
                                <a class="mbr-buttons__link btn text-white" href="?view=index">
                                  <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>&nbsp;<?php echo $lang['Home'];?>
                                </a>
                              </li>
                              <li class="mbr-navbar__item">
                                <a class="mbr-buttons__link btn text-white" href="?view=faq">
                                  <span class="mbri-question mbr-iconfont mbr-iconfont-btn"></span>
                        &nbsp;FAQ
                                </a>
                              </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if(!isset($_SESSION['forum_id'])){
include(HTML_DIR .'/SESSION/login.php');
include(HTML_DIR .'/SESSION/reg.php');
include(HTML_DIR .'/SESSION/lostpass.php');
}
 ?>
