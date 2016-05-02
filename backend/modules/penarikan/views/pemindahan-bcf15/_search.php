<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\penarikan\models\Bcf15DetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcf15-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bcf15_id') ?>

    <?= $form->field($model, 'bcf15pos') ?>

    <?= $form->field($model, 'bc11no') ?>

    <?= $form->field($model, 'bc11tgl') ?>

    <?php // echo $form->field($model, 'bc11pos') ?>

    <?php // echo $form->field($model, 'bc11subpos') ?>

    <?php // echo $form->field($model, 'nobl') ?>

    <?php // echo $form->field($model, 'tglbl') ?>

    <?php // echo $form->field($model, 'tgl_timbun') ?>

    <?php // echo $form->field($model, 'nama_sarkut') ?>

    <?php // echo $form->field($model, 'jumlah_brg') ?>

    <?php // echo $form->field($model, 'satuan_brg') ?>

    <?php // echo $form->field($model, 'uraian_brg') ?>

    <?php // echo $form->field($model, 'berat_brg') ?>

    <?php // echo $form->field($model, 'total_cont') ?>

    <?php // echo $form->field($model, 'consignee') ?>

    <?php // echo $form->field($model, 'alamat_consignee') ?>

    <?php // echo $form->field($model, 'kota_consignee') ?>

    <?php // echo $form->field($model, 'notify') ?>

    <?php // echo $form->field($model, 'alamat_notify') ?>

    <?php // echo $form->field($model, 'kota_notify') ?>

    <?php // echo $form->field($model, 'tpp_id') ?>

    <?php // echo $form->field($model, 'tps_id') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
