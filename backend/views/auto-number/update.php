<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AutoNumber */

$this->title = 'Update Auto Number: ' . ' ' . $model->group;
$this->params['breadcrumbs'][] = ['label' => 'Auto Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group, 'url' => ['view', 'id' => $model->group]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="auto-number-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
