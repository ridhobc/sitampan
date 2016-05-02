<?php

use yii\helpers\Html;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TrainingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Home';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['index']];

?>
<div class="training-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    

    echo Highcharts::widget([
       'options' => [
          'chart'=> [
            'type'=> 'spline'
          ],
          'title' => ['text' => 'Surat Masuk Tahun '.$year],
          'xAxis' => [
            'categories'=> [
                'Jan','Feb','Mar',
                'Apr','May','Jun',
                'Jul','Aug','Sep',
                'Oct','Nov','Dec'
            ]
          ],
          'yAxis' => [
             'title' => ['text' => 'Jumlah Surat']
          ],
          'series' => [
                ['name' => 'surat', 'data' => $suratmasuk_per_month],
          ]
       ]
    ]);
    ?>
    

</div>
