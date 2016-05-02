<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SuratMasuk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-masuk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'agenda_bukus')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'tgl_terima')->textInput() ?>

    <?= $form->field($model, 'no_surat')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'tgl_surat')->textInput() ?>

    <?= $form->field($model, 'asal')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rinci')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'Keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'agenda_ip')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'create_at')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'create_by')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'update_at')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'update_by')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
