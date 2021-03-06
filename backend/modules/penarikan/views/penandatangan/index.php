<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\penarikan\models\PenandatanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penandatangans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penandatangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penandatangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jabatan',
            'namapejabat',
            'nippejabat',
            'category',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'is_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
