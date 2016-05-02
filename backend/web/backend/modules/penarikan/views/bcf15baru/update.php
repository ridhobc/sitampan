<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\penarikan\models\Bcf15 */

$this->title = 'Update Bcf15: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bcf15-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>