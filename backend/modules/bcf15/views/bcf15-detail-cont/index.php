<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Bcf15DetailContSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bcf15 Detail Conts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-detail-cont-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bcf15 Detail Cont', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'bcf15_detail_id',
            'ukuran',
            'nomor_pk',
            'jenis_pk',
            // 'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
