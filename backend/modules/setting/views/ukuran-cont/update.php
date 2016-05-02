<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeCont */

$this->title = 'Update Ukuran Cont: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Type Conts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-cont-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
