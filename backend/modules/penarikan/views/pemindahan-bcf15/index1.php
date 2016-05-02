<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\penarikan\models\Bcf15DetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bcf15 Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bcf15 Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'bcf15_id',
            'bcf15pos',
            'bc11no',
            'bc11tgl',
            // 'bc11pos',
            // 'bc11subpos',
            // 'nobl',
            // 'tglbl',
            // 'tgl_timbun',
            // 'nama_sarkut',
            // 'jumlah_brg',
            // 'satuan_brg',
            // 'uraian_brg',
            // 'berat_brg',
            // 'total_cont',
            // 'consignee',
            // 'alamat_consignee',
            // 'kota_consignee',
            // 'notify',
            // 'alamat_notify',
            // 'kota_notify',
            // 'tpp_id',
            // 'tps_id',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
