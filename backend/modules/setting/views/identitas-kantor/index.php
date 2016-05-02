<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\IdentitasKantorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Identitas Kantors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identitas-kantor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Identitas Kantor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kementerian',
            'eseloni',
            'kanwil',
            'kppbc',
            // 'alamat1',
            // 'alamat2',
            // 'alamat3',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
