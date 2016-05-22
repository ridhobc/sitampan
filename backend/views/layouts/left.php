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
        <!-- /.search form -->

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
                <a href="<?= Yii::$app->homeUrl ?>" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-info"><?= Yii::t('app', 'Menu'); ?></span>
                </a>
            </li>
	<?php

	    if(($this->context->module->id == 'bcf15') )
		 echo $this->render('menu/bcf15');
            else if(($this->context->module->id == 'setting') )
		 echo $this->render('menu/setting');
            else if(($this->context->module->id == 'penarikan') )
		 echo $this->render('menu/penarikan');
            else if(($this->context->module->id == 'penyelesaian') )
		 echo $this->render('menu/penyelesaian');
            else if(get_class($this->context) == 'backend\controllers\PspController' || get_class($this->context) == 'backend\controllers\PspdetailController' || get_class($this->context) == 'backend\controllers\PspstatusController'  )
		 echo $this->render('menu/psp');
	    else if($this->context->module->id == 'report' || get_class($this->context) == 'app\controllers\LoginDetailsController') 
	    	 echo $this->render('menu/report');
	    else if ($this->context->module->id == 'dashboard')
	         echo $this->render('menu/dashboard');
            
	    
	    else if ($this->context->action->id == 'resetemploginid' || $this->context->action->id == 'resetemppassword' || $this->context->action->id == 'updateemploginid')
		 echo $this->render('menu/employee');
	  
	    else if ($this->context->module->id == 'rights' || $this->context->module->id == 'admin')
	         echo $this->render('menu/rights');
	    else
		 echo $this->render('menu/config');
	?>
        </ul>
    </section>

</aside>
