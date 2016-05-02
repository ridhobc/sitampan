<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Penandatangan */

$this->title = 'Update Penandatangan: ' . ' ' . $model->jabatan;
$this->params['breadcrumbs'][] = ['label' => 'Penandatangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penandatangan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
