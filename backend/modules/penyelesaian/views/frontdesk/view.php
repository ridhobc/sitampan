<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = "No Surat" ." ". $model->nomor_permohonan;
$this->params['breadcrumbs'][] = ['label' => 'permohonan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-view">

    <p>


        <?=
        Html::a('<i class="glyphicon glyphicon-circle-arrow-left"></i> Back', ['index'], [
            'class' => 'btn btn-info',
        ])
        ?>
        <?= Html::a('<i class="glyphicon glyphicon-print"></i> Cetak', ['report','id' => $model->id], ['class' => 'btn btn-warning']) ?>

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
            'heading' => 'No Surat # ' . $model->nomor_permohonan,
            'type' => DetailView::TYPE_INFO,
        ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
        'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
        'attributes' => [

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
    ])
    ?>
    
</div>


