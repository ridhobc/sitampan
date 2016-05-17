<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$year = date('Y');
$this->title = "Skep Penetapan";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suratmasuk-arsip-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>
    <div class="container-fluid">
    </div>

    <?php
    Modal::begin([
        'header' => '<h4>BCF 1.5</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
        'options' => [
            'id' => 'modal',
            'tabindex' => false // important for Select2 to work properly
            ],
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();

    Modal::begin([
        'header' => '<h4>Buat Surat Pengantar</h4>',
        'id' => 'myModal',
        'size' => 'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    $pejabat = \yii\helpers\ArrayHelper::map(
                    \backend\models\Penandatangan::find()->all(), 'id', 'jabatan', 'namapejabat');
    $status = \yii\helpers\ArrayHelper::map(
                    \backend\models\StatusBcf15::find()->all(), 'id', 'nmstatus');
    $gridColumns = [
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                $searchModel = new \backend\modules\penarikan\models\Bcf15Search(['skep_penetapan_bcf15_id' => $model->id]);
                $searchModel->skep_penetapan_bcf15_id = $model->id;
                $dataProvider = $searchModel->search(YII::$app->request->queryParams);

                return YII::$app->controller->renderPartial('_detail-penetapan', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]);
            },
        ],
        'skep_no',
        'skep_tgl',
        [
            'header' => 'Kepala Kantor(ttd)',
//            'filter' => $pejabat,
            'value' => function ($data) {
                return $data->penandatangan->namapejabat;
            }
        ],
        'status_skep',
        [
            'header' => 'Total BCF1.5',
            'format' => 'raw',
            'value' => function ($data) {
                $count = backend\models\Bcf15::find()
                        ->where([
                            'skep_penetapan_bcf15_id' => $data->id,
                        ])
                        ->count();
                $bcf15 = $count;
                if (!empty($count)) {
                    return  $bcf15;
                } else {
                    return "-";
                }
            }
        ],
        [
            'format' => 'raw',
            'header' => 'arsip',
            'value' => function ($data) {
                if (\Yii::$app->user->identity->role == 'admin') {
                    if ($data->status_skep == 'konsep') {

                        $request = Yii::$app->request;
                        return Html::a("<i class='fa fa-close fa-2x text-danger text-center'></i>", ['skep-penetapan-bcf15/tbharchive',  'id' => $data->id], [
                                    'class' => '',
                                    'data' => [
                                        'confirm' => 'Arsipkan skep nomor : ' . $data->skep_no . '',
                                        'method' => 'post',
                                        ],
                                ]);
                    } elseif ($data->status_skep == 'arsip') {
                        $request = Yii::$app->request;
                        return Html::a("<i class='fa fa-check fa-2x text-success text-center '></i>", ['skep-penetapan-bcf15/btlarchive',  'id' => $data->id], [
                                    'class' => '',
                                    'data' => [

                                        'confirm' => 'Batal Arsip skep nomor : ' . $data->skep_no . '',
                                        'method' => 'post',
                                        ],
                                ]);
                    }
                }
            },
        ],
        [
            'header' => 'Edit',
            'format' => 'raw',
            'value' => function ($data) {
                 if ($data->status_skep == 'konsep') {
                return Html::a("<i class='fa fa-edit fa-2x'></i>", ['skep-penetapan-bcf15/update', 'id' => $data->id]);
                 }else{
                   
                 }
            },
        ],
        
        [
            'header' => 'Delete',
            'format' => 'raw',
            'value' => function ($data) {        
                if($data->status_skep=='konsep'){
                    return Html::a("<i class='fa fa-trash fa-2x'></i>", ['skep-penetapan-bcf15/delete', 'id' => $data->id],['data-method'=>'post']);             
                }
            },
            ],
    ];
    $fullExportMenu = ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'target' => ExportMenu::TARGET_POPUP,
//            'messages'=> 'downloadProgress',
                'fontAwesome' => true,
                //'pjaxContainerId' => 'kv-pjax-container',
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-danger',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                ],
                    ],
            ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'pjax' => false,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> BCF 1.5</h3>',
        ],
// your toolbar can include the additional full export menu
        'toolbar' => [

            $fullExportMenu,
            ['content' =>
//                Html::button('<i class="glyphicon glyphicon-plus"></i>  Create Skep Penetapan', ['value' => Url::to('index.php?r=penarikan/skep-penetapan-bcf15/skep_create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-plus"></i>  Create Skep Penetapan', ['skep-penetapan-bcf15/create'], ['class' => 'btn btn-success']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                    'data-pjax' => 0,
                    'class' => 'btn btn-info',
                    'title' => Yii::t('kvgrid', 'Refresh')
                ])
        ],
        ],
        'export' => [
            'messages' => 'allowPopups',
            ],
    ]);
    ?>



</div>
<?php
$this->registerJs("
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title') 
        var href = button.attr('href') 
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");
?>