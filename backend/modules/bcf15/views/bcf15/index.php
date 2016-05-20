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
$this->title = 'Daftar BCF 1.5 Tahun ' . $year;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suratmasuk-arsip-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
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
                $searchModel = new \backend\modules\bcf15\models\Bcf15DetailSearch();
                $searchModel->bcf15_id = $model->id;
                $dataProvider = $searchModel->search(YII::$app->request->queryParams);

                return YII::$app->controller->renderPartial('_detail-bcf15', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
            },
        ],
        'tahun',
        'bcf15no',
        'bcf15tgl',
        [
            'attribute' => 'penandatangan_id',
            'filter' => $pejabat,
            'value' => function ($data) {
                return $data->penandatangan->namapejabat;
            }
        ],
        [
            'attribute' => 'penandatangan_id',
            'filter' => $pejabat,
            'value' => function ($data) {
                return $data->penandatangan->jabatan;
            }
        ],
        [
            'attribute' => 'status_bcf15',
            'filter' => $status,
            'value' => function ($data) {
                return $data->statusBcf15->nmstatus;
            }
        ],
        ['class' => 'yii\grid\ActionColumn',
            'header' => 'action',
            'template' => '{update} {view}'
        ],
        [
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a("<i class='fa fa-plus'></i> BC11", ['bcf15-detail/tambahbc11', 'id' => $data->id]);
            },
        ],
        [
            'format' => 'raw',
            'value' => function ($data) {

                return Html::a("<i class='fa fa-plus'></i> SP", ['surat-pengantar-add', 'id' => $data->id], [
//                            'data-toggle' => "modal",
//                            'data-target' => "#myModal",
//                            'data-title' => "Detail Data",
                ]); // ubah ini
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
//                Html::button('<i class="glyphicon glyphicon-plus"></i>  Create BCF 1.5', ['value' => Url::to('index.php?r=create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-plus"></i>  Create BCF 1.5', ['bcf15/create'], ['class' => 'btn btn-success']) . ' ' .
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