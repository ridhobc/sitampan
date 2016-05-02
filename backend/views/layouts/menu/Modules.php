<?php use yii\helpers\Html; ?>

	<?php if(Yii::$app->user->can('level-admin')) { ?>
	    <li><?= Html::a('<i class="fa fa-cogs"></i> <span>Admin</span>', ['/default/index']); ?></li>
	<?php 
              }
	      if(Yii::$app->user->can('level-admin')) {
	?>
	    <li><?= Html::a('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', ['/dashboard/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('level-admin') || Yii::$app->user->can('level-admin-sm')) {
	?>
	    <li><?= Html::a('<i class="fa fa-folder-open"></i> <span>Surat Masuk</span>', ['/surat-masuk/index']);?></li>
	<?php }
	     
	?>
	   
	