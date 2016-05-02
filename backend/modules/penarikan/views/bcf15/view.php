<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-view">

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
            'bcf15no',
            'kd_bcf15',
            'bcf15tgl',
            'penandatangan_id',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'tahun',
            'status_bcf15',
        ],
    ]) ?>

</div>
