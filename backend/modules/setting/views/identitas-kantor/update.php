<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\IdentitasKantor */

$this->title = 'Update Identitas Kantor: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Identitas Kantors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="identitas-kantor-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
