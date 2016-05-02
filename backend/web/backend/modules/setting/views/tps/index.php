<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\TpsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tps-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tps', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'namatps',
            'alamattps',
            'pimpinantps',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
