<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\penarikan\models\SkepPenetapanBcf15Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skep-penetapan-bcf15-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'skep_no') ?>

    <?= $form->field($model, 'skep_tgl') ?>

    <?= $form->field($model, 'kepala_kantor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
