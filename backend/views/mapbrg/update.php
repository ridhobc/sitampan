<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Mapbrg */

$this->title = 'Update Kode Barang: ' . ' ' . $model->kd_brglama;
$this->params['breadcrumbs'][] = ['label' => 'Mapbrgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_brglama, 'url' => ['view', 'kd_brglama' => $model->kd_brglama, 'perk_lama' => $model->perk_lama, 'kd_brgbaru' => $model->kd_brgbaru]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mapbrg-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
