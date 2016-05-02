<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Barang */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <?php
    $satuan = [
        '1' => 'Pcs',
        '2' => 'Unit',
        '3' => 'Pkg',
        '4' => 'Lainnya'
    ];
    ?>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nama',
            'merek',
            'satuan',
//            [
//                'attribute' => 'satuan',
//                'value' => $satuan[$model->satuan]
//            ],
        ],
    ])
    ?>

</div>
