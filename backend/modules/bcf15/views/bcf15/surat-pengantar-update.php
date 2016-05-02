<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15 */

$this->title = 'Edit SP: ' . ' ' . $model->no_sp.' tangal '. $model->tgl_sp;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bcf15-update">

    <?= $this->render('_formsp', [
        'model' => $model,
    ]) ?>

</div>
