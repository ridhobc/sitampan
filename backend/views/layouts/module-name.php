<?php
use yii\helpers\Html;
?>

<ul class="dropdown-menu">
    <li>
        <ul class="menu">
			<?php if(Yii::$app->user->can('level-admin')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-cogs text-aqua fa-2x"></i><h4> '.Yii::t('app', 'Admin').'</h4>', ['/default/index']);?>
            </li>
			<?php endif; ?>
			<?php if(Yii::$app->user->can('level-admin')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-dashboard text-green fa-2x"></i> <h4>'.Yii::t('app', 'Dashboard').'</h4>', ['/dashboard/default/index']);?>
            </li>
			<?php endif; ?>
			<?php if(Yii::$app->user->can('level-admin')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-graduation-cap text-yellow fa-2x"></i> <h4>'.Yii::t('app', 'Surat Masuk').'</h4>', ['/bcf15/default/index']);?>
            </li>
			<?php endif; ?>
	
        </ul>
    </li>
</ul>
