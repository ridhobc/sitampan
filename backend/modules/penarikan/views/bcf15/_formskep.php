<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcf15-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'skep_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skep_tgl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala_kantor')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
