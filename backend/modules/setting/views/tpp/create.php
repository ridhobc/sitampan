<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tpp */

$this->title = 'Create Tpp';
$this->params['breadcrumbs'][] = ['label' => 'Tpps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpp-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
