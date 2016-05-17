<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;

$empInfo = backend\models\User::findOne(@Yii::$app->user->identity->id);
$Photo = $empInfo->getPhoto($empInfo->photo);
$ProfileLink = ['/employee/emp-master/view', 'id' => $empInfo->id];
?>
   
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $Photo ?>" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= @Yii::$app->user->identity->username ?></p>
                    <i class="fa fa-circle text-success"></i> <?= Html::a('Online', ['user/profil', 'id' => Yii::$app->user->id]) ?>

                </div>
            </div>
        <?php endif ?>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <?=
        Nav::widget(
                [
                    'encodeLabels' => false,
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        '<li class="header"></li>',
                        
                        '<li class="header"></li>',
//                    ['label' => '<i class="fa fa-dashboard"></i><span>Surat Masuk</span>', 'url' => ['/surat-masuk']],
                        [
                            'label' => '<i class="glyphicon glyphicon-lock"></i><span>Sing in</span>', //for basic
                            'url' => ['/site/login'],
                            'visible' => Yii::$app->user->isGuest
                        ],
                    ],
                ]
        );
        ?>
        <ul class="sidebar-menu">
            <li>
                <a href="#" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-info"><?= Yii::t('app', 'Menu'); ?></span>
                </a>
            </li>
	<?php if(Yii::$app->user->can('level-admin')) { ?>
	    <li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Admin').'</span>', ['/default/index']); ?></li>
	<?php } 
	      if(Yii::$app->user->can('level-admin')) {
	?>
	    <li><?= Html::a('<i class="fa fa-dashboard"></i> <span>'.Yii::t('app', 'Dashboard').'</span>', ['/dashboard/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('level-admin') || Yii::$app->user->can('level-admin-sm') || Yii::$app->user->can('level-user')) {
	?>
	    <li><?= Html::a('<i class="fa fa-cog"></i> <span>'.Yii::t('app', 'Configurasi').'</span>', ['/setting/default/index']);?></li>
	<?php }
        if(Yii::$app->user->can('level-admin') || Yii::$app->user->can('level-admin-sm') || Yii::$app->user->can('level-user')) {
	?>
	    <li><?= Html::a('<i class="fa fa-ship"></i> <span>'.Yii::t('app', 'BCF 1.5').'</span>', ['/bcf15/default/index']);?></li>
	<?php }
        if(Yii::$app->user->can('level-admin') || Yii::$app->user->can('level-admin-sm') || Yii::$app->user->can('level-user')) {
	?>
	    <li><?= Html::a('<i class="fa fa-truck"></i> <span>'.Yii::t('app', 'Penarikan BCF 1.5').'</span>', ['/penarikan/default/index']);?></li>
	<?php }
	      ?>
        </ul>

	<!-- sidebar-menu. -- End -->

    </section>

</aside>
