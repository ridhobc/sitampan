<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItemChild */

$this->title = $model->parent;
$this->params['breadcrumbs'][] = ['label' => 'Auth Item Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-view">

    

    <p>
        <?=
        Html::a('<i class="glyphicon glyphicon-circle-arrow-left"></i> Back', ['index'], [
            'class' => 'btn btn-info',            
        ])
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'bootstrap' => true,
        'bordered' => true,
        'responsive' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Auth Item Children # ' . $model->parent,
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '', 
        'attributes' => [
            'parent',
            'child',
        ],
    ]) ?>

</div>
