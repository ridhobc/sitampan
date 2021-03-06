<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="suratmasuk-arsip-detail-index">
    <?php
    $jenis_pk = \yii\helpers\ArrayHelper::map(
                    \backend\models\TypeCont::find()->all(), 'id', 'type');
    
    $uk_pk = \yii\helpers\ArrayHelper::map(
                    \backend\models\UkuranCont::find()->all(), 'id', 'ukuran');
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nomor_pk',
            [
                'attribute' => 'ukuran',
                'filter' => $uk_pk,
                'value' => function ($data) {
                    return $data->ukuran0->ukuran;
                }
            ],
            [
                'attribute' => 'jenis_pk',
                'filter' => $jenis_pk,
                'value' => function ($data) {
                    return $data->jenisPk->type;
                }
            ],
            
            'keterangan',
            
        ],
    ]);
    ?>

</div>
