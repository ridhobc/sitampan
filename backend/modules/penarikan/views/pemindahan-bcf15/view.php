<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15Detail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15 Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-detail-view">

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
            'bcf15_id',
            'bcf15pos',
            'bc11no',
            'bc11tgl',
            'bc11pos',
            'bc11subpos',
            'nobl',
            'tglbl',
            'tgl_timbun',
            'nama_sarkut',
            'jumlah_brg',
            'satuan_brg',
            'uraian_brg',
            'berat_brg',
            'total_cont',
            'consignee',
            'alamat_consignee',
            'kota_consignee',
            'notify',
            'alamat_notify',
            'kota_notify',
            'tpp_id',
            'tps_id',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
    ]) ?>

</div>
