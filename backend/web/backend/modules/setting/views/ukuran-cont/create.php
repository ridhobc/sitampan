<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UkuranCont */

$this->title = 'Create Ukuran Cont';
$this->params['breadcrumbs'][] = ['label' => 'Ukuran Conts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ukuran-cont-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
