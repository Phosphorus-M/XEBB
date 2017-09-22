<section class="mbr-section mbr-after-navbar section-table cid-qtIRYU0Mfo" id="table1-p" data-bg-video="http://www.youtube.com/watch?v=A7ZkZazfvao" data-rv-view="514">
	<br><br><br><br>
	<div class="row container">
	<?php
	if(isset($_GET['error'])) {
			echo '<div class="alert alert-dismissible alert-danger">'. $lang['user_not_activated'] .'.</div>';
	}
	if(isset($_GET['success'])) {
			echo '<div class="alert alert-dismissible alert-success">' . $lang['user_activated'] . '</div>';
	}
	?>

<table width="100%" cellspacing="0" cellpadding="5" border="0">
<tbody><tr>
<td valign="top">
<table border="0" cellspacing="0" cellpadding="5" class="tborder">
<tbody><tr>
	<td class="thead">
	<div class="float_left text-white"><strong><?php echo $lang['sections']; ?></strong></div>
	</td>
</tr>
<tr>
<td align="center" class="trow2">
	<div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
		<a class="mbr-buttons__btn btn btn-danger" href="?view=admin&section=startedpage"><?php echo $lang['HOMEPAGE']; ?></a>
		<div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
			<a class="mbr-buttons__btn btn btn-danger" href="?view=admin&section=categories"><?php echo $lang['CATEGORIES']; ?></a>
			<div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
				<a class="mbr-buttons__btn btn btn-danger" href="?view=admin&section=configforums"><?php echo $lang['FORUMS']; ?></a>
</td>
</tr>

</tbody></table>
</td>
<td valign="top" width="78%">
<table border="0" cellspacing="0" cellpadding="5" class="tborder">
<thead>
<tr>
	<td class="thead" colspan="5">
		<?php
		require(HTML_DIR . $archivo)
		?>
	</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody></table>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>
