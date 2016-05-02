<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar ATK';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Barang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nama',
            'merek',
            //'satuan',
            [
                //'header'=>'Agama',
                'attribute' => 'satuan',
                'value' => function($data1) {
                    $satuan = [
                    '1' => 'Pcs',
                    '2' => 'Unit',
                    '3' => 'Pkg',
                    '4' => 'Lainnya'
                    ];
                    return $satuan[$data1->satuan];
                }
            ],
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<div class="row">
    <div class="col-md-6">
        <?= Html::a('Export', ['export'], ['class' => 'btn btn-default']) ?>

        <?= Html::a('Report', ['report'], ['class' => 'btn btn-default']) ?>

        
    </div>
    
</div>
