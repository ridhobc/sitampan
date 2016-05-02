<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="suratmasuk-arsip-detail-index">
    <?php
//    $sm = \yii\helpers\ArrayHelper::map(
//                    \backend\models\SuratMasuk::find()->all(), 'id', 'agenda_ip');
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
         
            'bc11no',
            'bc11tgl',
            'bc11pos',
            'bc11subpos',
            
             'consignee',
            
             'notify',
            
             
             [
                'attribute' => 'tps_id',
                'value' => function ($data) {
                    return $data->tps->namatps;
                }
            ],
            [
                'attribute' => 'tpp_id',
                'value' => function ($data) {
                    return $data->tpp->namatpp;
                }
            ],
//            [
//                'header' => 'Detail',
//                'format' => 'raw',
//                'value' => function ($data) {
//                    return Html::a($data->kode_iku, ['/logbook-detail/cetak-iku', 'ikuid' => $data->id]); // ubah ini
//                }
//                    ],
//                    [
//                        'attribute' => 'iku_id',
//                        'value' => function ($data) {
//                            return $data->iku->nama_iku;
//                        }
//                    ],
//                    'definis_iku',
//                    'tahun',
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
