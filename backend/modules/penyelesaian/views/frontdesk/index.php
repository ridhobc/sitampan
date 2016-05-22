<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\penyelesaian\models\Bcf15PenyelesaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bcf15 Penyelesaians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-penyelesaian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bcf15 Penyelesaian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nomor_permohonan',
            'tgl_permohonan',
            'hal_permohonan:ntext',
            'tgl_masuk',
            // 'tgl_dikembalikan',
            // 'tgl_terima_lengkap',
            // 'nama_pemohon',
            // 'alamat_pemohon',
            // 'kota_pemohon',
            // 'no_telp_petugas_ppjk',
            // 'nama_petugas_ppjk',
            // 'email_pemohon:email',
            // 'petugas_penerima_dok',
            // 'nip_petugas_penerima',
            // 'status_lengkap',
            // 'status_penyelesaian',
            // 'ur_kekurangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
