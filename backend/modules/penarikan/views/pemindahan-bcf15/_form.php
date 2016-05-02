<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15Detail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcf15-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bcf15_id')->textInput() ?>

    <?= $form->field($model, 'bcf15pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc11no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc11tgl')->textInput() ?>

    <?= $form->field($model, 'bc11pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc11subpos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nobl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tglbl')->textInput() ?>

    <?= $form->field($model, 'tgl_timbun')->textInput() ?>

    <?= $form->field($model, 'nama_sarkut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_brg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'satuan_brg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uraian_brg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'berat_brg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_cont')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'consignee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_consignee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kota_consignee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_notify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kota_notify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tpp_id')->textInput() ?>

    <?= $form->field($model, 'tps_id')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
