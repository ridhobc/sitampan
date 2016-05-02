<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tps */

$this->title = 'Create Tps';
$this->params['breadcrumbs'][] = ['label' => 'Tps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
