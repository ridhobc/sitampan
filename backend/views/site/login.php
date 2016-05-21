<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Welcome: SITAMPAN';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<style type="text/css">
    html,body { 
        background: url('../web/images/background1.jpg') no-repeat center center fixed; 
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
        
    }
    .login-page,register-page{
        background: transparent;
    }
</style>

<div class="login-box panel panel-info" >
    <div class="login-logo panel-heading " >
        <h1 > <i class="fa fa-truck fa-1x text text-danger"> SITAMPAN </i> </h1>
        <p class="text text-info text-sm">Sistem Informasi Tempat Penimbunan Pabean</p>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body panel-body" >
        <p class="login-box-msg">Form Login </p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?=
                $form
                ->field($model, 'username', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username')])
        ?>

        <?=
                $form
                ->field($model, 'password', $fieldOptions2)
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
        ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>

    </div>
    <div class="panel-footer" >
        <div class="margin text-center">
            <?php
            if (Yii::$app->user->isGuest) {
                echo \yii\helpers\Html::a('<span> Go Home </span>', 'http://localhost/sitampan/frontend/web/index.php');
            }
            ?>
        </div>
        <a href="#">I forgot my password</a><br>
        <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="text-center">Register a new membership</a>
    </div>

    <!-- /.login-box-body -->
</div><!-- /.login-box -->
