<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15Penyelesaian */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15 Penyelesaians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-penyelesaian-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nomor_permohonan',
            'tgl_permohonan',
            'hal_permohonan:ntext',
            'tgl_masuk',
            'tgl_dikembalikan',
            'tgl_terima_lengkap',
            'nama_pemohon',
            'alamat_pemohon',
            'kota_pemohon',
            'no_telp_petugas_ppjk',
            'nama_petugas_ppjk',
            'email_pemohon:email',
            'petugas_penerima_dok',
            'nip_petugas_penerima',
            'status_lengkap',
            'status_penyelesaian',
            'ur_kekurangan:ntext',
        ],
    ]) ?>

</div>
