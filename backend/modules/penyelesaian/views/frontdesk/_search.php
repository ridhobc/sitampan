<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\penyelesaian\models\Bcf15PenyelesaianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcf15-penyelesaian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nomor_permohonan') ?>

    <?= $form->field($model, 'tgl_permohonan') ?>

    <?= $form->field($model, 'hal_permohonan') ?>

    <?= $form->field($model, 'tgl_masuk') ?>

    <?php // echo $form->field($model, 'tgl_dikembalikan') ?>

    <?php // echo $form->field($model, 'tgl_terima_lengkap') ?>

    <?php // echo $form->field($model, 'nama_pemohon') ?>

    <?php // echo $form->field($model, 'alamat_pemohon') ?>

    <?php // echo $form->field($model, 'kota_pemohon') ?>

    <?php // echo $form->field($model, 'no_telp_petugas_ppjk') ?>

    <?php // echo $form->field($model, 'nama_petugas_ppjk') ?>

    <?php // echo $form->field($model, 'email_pemohon') ?>

    <?php // echo $form->field($model, 'petugas_penerima_dok') ?>

    <?php // echo $form->field($model, 'nip_petugas_penerima') ?>

    <?php // echo $form->field($model, 'status_lengkap') ?>

    <?php // echo $form->field($model, 'status_penyelesaian') ?>

    <?php // echo $form->field($model, 'ur_kekurangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
