<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MapbrgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mapbrg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kd_brglama') ?>

    <?= $form->field($model, 'perk_lama') ?>

    <?= $form->field($model, 'kd_brgbaru') ?>

    <?= $form->field($model, 'perk_baru') ?>

    <?= $form->field($model, 'ur_baru') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
