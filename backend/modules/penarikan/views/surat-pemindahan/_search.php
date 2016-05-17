<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\penarikan\models\Bcf15SuratPemindahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcf15-surat-pemindahan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_surat') ?>

    <?= $form->field($model, 'tgl_surat') ?>

    <?= $form->field($model, 'nd_dari_kasipab') ?>

    <?= $form->field($model, 'nd_daftar_bcf15') ?>

    <?php // echo $form->field($model, 'nd_daftar_sp') ?>

    <?php // echo $form->field($model, 'nd_penandatangan_kasipab') ?>

    <?php // echo $form->field($model, 'surat_penandatangan_kakantor') ?>

    <?php // echo $form->field($model, 'no_nd_kasipab') ?>

    <?php // echo $form->field($model, 'tgl_nd_kasipab') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
