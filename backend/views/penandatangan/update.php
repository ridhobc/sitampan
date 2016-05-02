<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Penandatangan */

$this->title = 'Jabatan: ' . ' ' . $model->jabatan;
$this->params['breadcrumbs'][] = ['label' => 'Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jabatan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penandatangan-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
