<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tps */

$this->title = 'Tps: ' . ' ' . $model->namatps;
$this->params['breadcrumbs'][] = ['label' => 'Tps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->namatps, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tps-update">  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
