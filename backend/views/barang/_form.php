<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Barang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <?= $form->field($model, 'nama')->textInput(['maxlength' => 45]) ?>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'merek')->textInput(['maxlength' => 45]) ?>
            </div>

        </div>
        <div class="row">

            <div class="col-md-3">
                <?php
                $satuan = [
                    '1' => 'Pcs',
                    '2' => 'Unit',
                    '3' => 'Pkg',
                    '4' => 'Lainnya'
                ];
                ?>
                <?=
                $form->field($model, 'satuan')->widget(\kartik\widgets\Select2::className(), [
                    'data' => $satuan,
                    'options' => [
                        'placeholder' => 'Pilih Satuan',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
                ?>

            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
