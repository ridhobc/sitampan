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
            'bcf15pos',
            'bc11no',
            'bc11tgl',
            'bc11pos',
            'bc11subpos',
            'nobl',
            'tglbl',
            'tgl_timbun',
            'nama_sarkut',
            'consignee',
            'uraian_brg',
            
        ],
    ]);
    ?>

</div>
