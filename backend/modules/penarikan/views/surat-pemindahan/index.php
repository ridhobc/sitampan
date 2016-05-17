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
$this->title = 'Surat Pemindahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suratmasuk-arsip-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>
    <div class="container-fluid">
    </div>

    <?php
    Modal::begin([
        'header' => '<h4>Surat</h4>',
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
        'no_nd_kasipab',
        'tgl_nd_kasipab',
        'no_surat',
        'tgl_surat',
        [
            'header' => 'Total BCF1.5',
            'format' => 'raw',
            'value' => function ($data) {
                $count = backend\models\Bcf15::find()
                        ->where([
                            'bcf15_surat_pemindahan_id' => $data->id,
                        ])
                        ->count();
                $bcf15 = $count;
                if (!empty($count)) {
                    return $bcf15;
                } else {
                    return "-";
                }
            }
        ],
        'nd_daftar_bcf15',
        'status_surat',
        [
            'header' => 'Kepala Kantor(ttd)',
//            'filter' => $pejabat,
            'value' => function ($data) {
                return $data->penandatangan->namapejabat;
            }
        ],
        [
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a("<i class='fa fa-edit fa-2x'></i>", ['surat-pemindahan/update', 'id' => $data->id]);
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
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Surat</h3>',
        ],
// your toolbar can include the additional full export menu
        'toolbar' => [

            $fullExportMenu,
            ['content' =>
//                Html::button('<i class="glyphicon glyphicon-plus"></i>  Create Skep Penetapan', ['value' => Url::to('index.php?r=penarikan/skep-penetapan-bcf15/skep_create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-plus"></i>  Create Surat Pemindahan', ['surat-pemindahan/create'], ['class' => 'btn btn-success']) . ' ' .
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