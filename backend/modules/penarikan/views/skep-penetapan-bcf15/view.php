<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SkepPenetapanBcf15 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Skep Penetapan Bcf15s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skep-penetapan-bcf15-view">

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
            'skep_no',
            'skep_tgl',
            'kepala_kantor',
        ],
    ]) ?>

</div>
