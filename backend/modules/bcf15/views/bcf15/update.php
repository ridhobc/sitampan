<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15 */

$this->title = 'Update Bcf15: ' . ' ' . $model->bcf15no.' tangal '. $model->bcf15tgl;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bcf15-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
