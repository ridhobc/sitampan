<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$empInfo = backend\models\User::findOne(@Yii::$app->user->identity->id);

$Photo = $empInfo->getPhoto($empInfo->photo);
$ProfileLink = ['/employee/emp-master/view', 'id' => $empInfo->id];
?>


<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->

                
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i> Hak Akses

                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Pengaturan Hak Akses</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <?= Html::a('User', ['/user']) ?>
                                </li> 
                                <li>
                                    <?= Html::a('Auth Item', ['/auth-item']) ?>
                                </li>                
                                <li>
                                    <?= Html::a('Auth Item Child', ['/auth-item-child']) ?>
                                </li>  
                                <li>
                                    <?= Html::a('Auth Assignment', ['/auth-assignment']) ?>
                                </li>

                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">#</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->

                <?php
                if (Yii::$app->user->isGuest) {
                    ?>
                    <li class="footer">
                        <?= Html::a('Login', ['/site/login']) ?>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span><?= @Yii::$app->user->identity->username ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="<?= $Photo ?>" class="img-circle" alt="User Image"/>                               
                               
                                <p>
                                    <?= @Yii::$app->user->identity->username ?> - <?= @Yii::$app->user->identity->email ?>
                                    <small><?= @Yii::$app->user->identity->role ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!--            <li class="user-body">
                                            <div class="col-xs-4 text-center">
                                                
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">

                                    <?= Html::a('Profil', ['user/profil', 'id' => Yii::$app->user->id], ['class' => 'btn btn-primary']) ?>

                                </div>
                                <div class="pull-right">
                                    <?=
                                    Html::a(
                                            'Sign out', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    )
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </li><?php
                }
                ?>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
