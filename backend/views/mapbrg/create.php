<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Mapbrg */

$this->title = 'Create Kode Barang';
$this->params['breadcrumbs'][] = ['label' => 'Mapbrgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mapbrg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
