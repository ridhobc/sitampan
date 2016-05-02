<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = "TPP" . " " . $model->jabatan;
$this->params['breadcrumbs'][] = ['label' => 'TPP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-view">

    <p>


        <?=
        Html::a('<i class="glyphicon glyphicon-circle-arrow-left"></i> Back', ['index'], [
            'class' => 'btn btn-info',
        ])
        ?>
        <?= Html::a('<i class="glyphicon glyphicon-print"></i> Cetak', ['report', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'bootstrap' => true,
        'bordered' => true,
        'responsive' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Nama # ' . $model->namapejabat,
            'type' => DetailView::TYPE_INFO,
        ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
        'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
        'attributes' => [

            'jabatan',
            'namapejabat',
            'nippejabat', [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d M Y h:i:s']
            ],
            //'create_by',
            [
                'attribute' => 'created_by',
                'value' => $model->userCreated->name,
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:d M Y h:i:s']
            ],
            [
                'attribute' => 'updated_by',
                'value' => $model->userUpdated->name,
            ],
        ],
    ])
    ?>

</div>


