<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15DetailContSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcf15-detail-cont-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bcf15_detail_id') ?>

    <?= $form->field($model, 'ukuran') ?>

    <?= $form->field($model, 'nomor_pk') ?>

    <?= $form->field($model, 'jenis_pk') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
