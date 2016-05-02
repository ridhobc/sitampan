<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SuratMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Masuks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-masuk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Surat Masuk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'agenda_bukus',
            'tgl_terima',
            'no_surat',
            'tgl_surat',
            'asal',
            'hal:ntext',
            'rinci',
            'Keterangan:ntext',
            // 'agenda_ip',
            // 'create_at',
            // 'create_by',
            // 'update_at',
            // 'update_by',

            ['class' => 'yii\grid\ActionColumn',
                'template'    => '{view}'
                
                ],
        ],
    ]); ?>

</div>
