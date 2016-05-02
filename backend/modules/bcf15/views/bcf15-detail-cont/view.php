<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15DetailCont */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15 Detail Conts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-detail-cont-view">

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
            'bcf15_detail_id',
            'ukuran',
            'nomor_pk',
            'jenis_pk',
            'keterangan:ntext',
        ],
    ]) ?>

</div>
