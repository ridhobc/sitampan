<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\detail\DetailView;
use yii\widgets\MaskedInput;
use kartik\datecontrol\DateControl;
use kartik\widgets\SwitchInput;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-solid box-success col-xs-6 col-lg-6 no-padding">
    <div class="box-header with-border">
        <h4 class="box-title"><i class="fa fa-lock"></i> <?php echo Yii::t('app', 'Ubah Password'); ?></h4>
    </div>
    <div class="box-body">
     
            <?php $form = ActiveForm::begin(); ?>
            <div class="user-form">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($user, 'currentPassword')->passwordInput() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($user, 'newPassword')->passwordInput() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>
                    </div>


                </div>
                <div class="form-group">
                    <?= Html::submitButton($user->isNewRecord ? 'Create' : 'Update', ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>  
 
    </div>
</div>

