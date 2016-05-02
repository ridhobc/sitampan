<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\CategoryPejabatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Category Pejabats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-pejabat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category Pejabat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nmcategory',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
