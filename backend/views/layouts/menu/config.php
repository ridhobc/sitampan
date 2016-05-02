<?php use yii\helpers\Html; ?>
<li class="treeview active">
	<?= Html::a('<i class="fa fa-dashboard"></i> <span>'.('Admin').'</span> <i class="fa fa-angle-left pull-right"></i>', ['/#'])  ?>
        <ul class="treeview-menu">
	<?php if(Yii::$app->user->can('level-admin')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> '.( 'User'),['/user/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('level-admin')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> '.('Disposisi'),['/disposisi/index'])  ?>
	    </li>
	
	<?php }
         
        
	?>
        </ul>
</li>
