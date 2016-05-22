<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15Penyelesaian */

$this->title = 'Update Bcf15 Penyelesaian: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15 Penyelesaians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bcf15-penyelesaian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
