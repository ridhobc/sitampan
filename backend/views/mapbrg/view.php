<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItemChild */

$this->title = $model->ur_baru;
$this->params['breadcrumbs'][] = ['label' => 'Kode Barang', 'url' => ['index']];
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
            'heading' => 'Kode Barang # ' . $model->perk_baru,
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '', 
        'attributes' => [
            'kd_brglama',
            'perk_lama',
            'kd_brgbaru',
            'perk_baru',
            'ur_baru',
        ],
    ]) ?>

</div>
