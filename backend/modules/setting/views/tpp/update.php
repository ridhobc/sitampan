<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tpp */

$this->title = 'Update Tpp: ' . ' ' . $model->namatpp;
$this->params['breadcrumbs'][] = ['label' => 'Tpps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->namatpp, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpp-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
