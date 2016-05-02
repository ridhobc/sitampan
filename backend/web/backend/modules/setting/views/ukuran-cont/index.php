<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\UkuranContSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ukuran Conts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ukuran-cont-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ukuran Cont', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ukuran',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
