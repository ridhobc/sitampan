<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$year = date('Y');
$this->title = 'Pmohonan Kurang Syarat';
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
                $searchModel = new \backend\modules\bcf15\models\Bcf15DetailSearch();
                $searchModel->id = $model->bcf15_detail_id;
                $dataProvider = $searchModel->search(YII::$app->request->queryParams);

                return YII::$app->controller->renderPartial('_detail-bcf15', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]);
            },
        ],
        'nomor_permohonan',
        'tgl_permohonan',
        'hal_permohonan:ntext',
        'tgl_masuk',
        'nama_pemohon',
        'nama_petugas_ppjk',
        [
            'header' => 'Kelengkapan Dok',
            'value' => function ($data) {
                $status = [
                    '1' => 'Lengkap',
                    '0' => 'Blm Lengkap'
                ];
                return $status[$data->status_lengkap];
            }
        ],
        'ur_kekurangan',
        [
            'header' => 'Status',
            'value' => function ($data) {
                $status = [
                    '1' => 'Proses',
                    '2' => 'Dikembalikan',
                    '3' => 'Selesai'
                ];
                return $status[$data->status_penyelesaian];
            }
        ],
        [
            'header' => 'Proses',
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a("<i class='fa fa-edit fa-2x'></i>", ['frontdesk/update', 'id' => $data->id]);
            },
        ],
        [
            'header' => 'view',
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a("<i class='fa fa-eye fa-2x'></i>", ['view', 'id' => $data->id]);
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
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Surat Permohonan</h3>',
        ],
// your toolbar can include the additional full export menu
        'toolbar' => [

            $fullExportMenu,
            ['content' =>
//                Html::button('<i class="glyphicon glyphicon-plus"></i>  Create BCF 1.5', ['value' => Url::to('index.php?r=bcf15/bcf15/skep_create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
//                                Html::button('<i class="glyphicon glyphicon-plus"></i>  Buat Logbook', ['value' => Url::to('index.php?r=logbook/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
//                Html::a('<i class="glyphicon glyphicon-plus"></i>  Rekam Permohonan', ['frontdesk/create'], ['class' => 'btn btn-success']) . ' ' .
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