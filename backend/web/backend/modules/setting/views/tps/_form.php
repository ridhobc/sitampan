<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\Tps */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tps-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'namatps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamattps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pimpinantps')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
