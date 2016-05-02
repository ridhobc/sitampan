<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Penandatangan */

$this->title = 'Create Penandatangan';
$this->params['breadcrumbs'][] = ['label' => 'Penandatangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penandatangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
