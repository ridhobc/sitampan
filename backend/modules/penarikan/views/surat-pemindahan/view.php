<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15SuratPemindahan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15 Surat Pemindahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-surat-pemindahan-view">

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
            'no_surat',
            'tgl_surat',
            'nd_dari_kasipab',
            'nd_daftar_bcf15',
            'nd_daftar_sp',
            'nd_penandatangan_kasipab',
            'surat_penandatangan_kakantor',
            'no_nd_kasipab',
            'tgl_nd_kasipab',
        ],
    ]) ?>

</div>
