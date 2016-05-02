<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\TppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tpps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tpp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'namatpp',
            'alamattpp',
            'pimpinantpp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
