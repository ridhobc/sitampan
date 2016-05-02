<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\penarikan\models\Bcf15Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bcf15s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bcf15', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'bcf15no',
            'kd_bcf15',
            'bcf15tgl',
            'penandatangan_id',
            // 'sp',
            // 'no_sp',
            // 'tgl_sp',
            // 'pejabat_sp',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            // 'tahun',
            // 'status_bcf15',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
