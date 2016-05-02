<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\penarikan\models\Bcf15 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcf15-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bcf15no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_bcf15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bcf15tgl')->textInput() ?>

    <?= $form->field($model, 'penandatangan_id')->textInput() ?>

    <?= $form->field($model, 'sp')->textInput() ?>

    <?= $form->field($model, 'no_sp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_sp')->textInput() ?>

    <?= $form->field($model, 'pejabat_sp')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_bcf15')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
