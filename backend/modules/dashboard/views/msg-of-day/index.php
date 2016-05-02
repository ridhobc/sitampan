<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use pheme\grid\ToggleColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsgOfDaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Message of Day List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> <?php echo Yii::t('app', 'Message of Day List') ?></h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	
	<div class="col-xs-4 left-padding">
	
	</div>
	<div class="col-xs-4 left-padding">
	
	</div>
      <div class="col-xs-4 left-padding">
        <?= Html::a(Yii::t('app', 'ADD'), ['create'], ['class' => 'btn btn-block btn-success']) ?>
	</div>
  </div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
	<div class="msg-of-day-index">
	<?php Pjax::begin([
		'enablePushState' => false,
		]); ?>
	    <?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'summary'=>'',
		'columns' => [
		    ['class' => 'yii\grid\SerialColumn'],
		  
		    'msg_details',
		    
                                             
                   [
        'format' => 'raw',
        'header' => 'Status',
       
        'value' => function ($data) {
            if (\Yii::$app->user->identity->role == 'admin') {
                if ($data->is_status == 0) {
                   return Html::a("Non Aktif", ['nonaktif', 'id' => $data->msg_of_day_id], [
            'class' => 'btn btn-info',
            'data' => [
                'confirm' => 'di non aktifkan?',
                'method' => 'post',
            ],
        ]);
                } else {
                     return Html::a("Aktif", ['aktif', 'id' => $data->msg_of_day_id], [
            'class' => 'btn btn-danger',
            'data' => [
                
                 'confirm' => 'Tampilkan dilayar?',
                'method' => 'post',
            ],
        ]);
                    
                }
            }
        },
    ],
                                                //		   [
//				'class' => '\pheme\grid\ToggleColumn',
//				'attribute'=>'is_status',
//				'enableAjax' => true,
//				'filter'=>['0'=>'Active', '1'=>'Deactive']
//		   ],

		   ['class' => 'backend\components\CustomActionColumn'],
		],
	    ]); 
	   Pjax::end();
	  ?>
	</div>
      </div>
   </div>
</div>
