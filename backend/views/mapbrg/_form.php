<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Mapbrg */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="mapbrg-form">
    <div class="panel panel-default">
        
        <div class="panel-body payment-form ">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'kd_brglama')->textInput(['maxlength' => 10]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'perk_lama')->textInput(['maxlength' => 6]) ?>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'kd_brgbaru')->textInput(['maxlength' => 10]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'perk_baru')->textInput(['maxlength' => 6]) ?>
                </div>
            </div>
        </div>
    </div>

    

    

    

    

    

    <?= $form->field($model, 'ur_baru')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
