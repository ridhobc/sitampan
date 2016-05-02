<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15DetailCont */

$this->title = 'Create Bcf15 Detail Cont';
$this->params['breadcrumbs'][] = ['label' => 'Bcf15 Detail Conts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-detail-cont-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
