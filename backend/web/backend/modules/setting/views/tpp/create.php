<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\Tpp */

$this->title = 'Create Tpp';
$this->params['breadcrumbs'][] = ['label' => 'Tpps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
