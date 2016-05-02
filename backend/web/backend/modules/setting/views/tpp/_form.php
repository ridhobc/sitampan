<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\Tpp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tpp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'namatpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamattpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pimpinantpp')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
