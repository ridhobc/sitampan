<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="suratmasuk-arsip-detail-index">
    <?php
    $sm = \yii\helpers\ArrayHelper::map(
                    \backend\models\SuratMasuk::find()->all(), 'id', 'agenda_ip');
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'user_id',
//            'disposisi_id',
            'kode_iku',
            [
                'attribute' => 'nama_iku',
                'value' => function ($data) {
                    return $data->iku->nama_iku;
                }
            ],
            'definis_iku',
            'tahun',
            
//            [
//                'attribute' => 'tgl_mulai',
//                'value' => function ($data) {
//                    return $data->logbookdetail->tgl_mulai;
//                }
//            ],
//            [
//                'attribute' => 'no_surat',
//                'value' => function ($data) {
//                    return $data->arsip->no_surat;
//                }
//            ],
//            [
//                'attribute' => 'tgl_surat',
//                'value' => function ($data) {
//                    return $data->arsip->tgl_surat;
//                }
//            ],
//            [
//                'attribute' => 'hal',
//                'value' => function ($data) {
//                    return $data->arsip->hal;
//                }
//            ],
//            [
//                'attribute' => 'Disposisi',
//                'value' => function ($data) {
//                    return $data->arsip->rinci;
//                }
//            ],
//            
//            [
//                'attribute' => 'Status Surat',
//                'value' => function ($data) {
//                    $status = [
//                        '0' => 'Open',
//                        '1' => 'Close',
//                    ];
//                    return $status[$data->arsip->status];
//                }
//                    ],
                //'keterangan:ntext',
                ],
            ]);
            ?>

</div>
