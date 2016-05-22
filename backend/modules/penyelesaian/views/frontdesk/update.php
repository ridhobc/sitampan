<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15Penyelesaian */

$this->title = 'Proses Kelengkapan ' . $model->nomor_permohonan;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15 Penyelesaians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bcf15-penyelesaian-update">


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
