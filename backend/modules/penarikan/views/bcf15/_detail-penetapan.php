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
         
            'tahun',
            'bcf15no',
            'bcf15tgl',
            'no_sp',            
             'tgl_sp',            
             
            [
            'header' => 'status',
//            'filter' => $status,
            'value' => function ($data) {
                return $data->statusBcf15->nmstatus;
            }
        ],
            
             
             
                ],
            ]);
            ?>

</div>
