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
$this->title = 'Masih di TPS';
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
                $searchModel = new backend\modules\bcf15\models\Bcf15DetailContSearch();
                $searchModel->bcf15_detail_id = $model->id;
                $dataProvider = $searchModel->search(YII::$app->request->queryParams);

                return YII::$app->controller->renderPartial('_container_detail', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]);
            },
        ],
        [
            'attribute' => 'bcf15_id',
            'width' => '310px',
            'value' => function ($model, $key, $index, $widget) {
                return $model->bcf15->bcf15no;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => ArrayHelper::map(backend\modules\penarikan\models\Bcf15::find()->where(['status_bcf15' => [3,4,5,6]])->orderBy('id')->asArray()->all(), 'id', 'bcf15no'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Cari BCF 1.5'],
            'group' => TRUE, // enable grouping
        ],
        'bcf15pos',
        'bc11no',
        'bc11tgl',
        'bc11pos',
        'bc11subpos',
        'consignee',
        [
            'header' => 'TPS',
//            'filter' => $pejabat,
            'value' => function ($data) {
                return $data->tps->namatps;
            }
        ],
        [
            'header' => 'TPP Tujuan',
//            'filter' => $pejabat,
            'value' => function ($data) {
                return $data->tpp->namatpp;
            }
        ],
        [
                        'format' => 'raw',
                        'header' => 'Masuk TPP',
                        'value' => function ($data) {
                            if (\Yii::$app->user->identity->role == 'admin') {
                                if ($data->masuk_tpp == '0') {
                                    $request = Yii::$app->request;
                                    return Html::a("<i class='fa fa-close fa-2x text-danger text-center'></i>", ['bcf15/tbhdetailkep', 'idsk' => $request->get('id'), 'id' => $data->id], [
                                                'class' => '',
                                                'data' => [
                                                    'confirm' => 'Pastikan semua barang dari BCF 1.5 nomor : ' . $data->bcf15->bcf15no . ' ini telah masuk ke TPP ' .$data->tpp->namatpp,
                                                    'method' => 'post',
                                                    ],
                                            ]);
                                } else {
                                    $request = Yii::$app->request;
                                    return "<i class='fa fa-check  fa-2x text-success text-center '></i>";
                                }
                            }
                        },
                        ],
//        [
//            'header'=>'Konsep',
//            'format' => 'raw',
//            'value' => function ($data) {
//                return Html::a("<i class='fa fa-edit fa-2x'></i>", ['pemindahan-bcf15/update', 'id' => $data->id]);
//            },
//        ],            
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
//                Html::button('<i class="glyphicon glyphicon-plus"></i>  Create BCF 1.5', ['value' => Url::to('index.php?r=bcf15/bcf15/skep_create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
//                                Html::button('<i class="glyphicon glyphicon-plus"></i>  Buat Logbook', ['value' => Url::to('index.php?r=logbook/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
//                Html::a('<i class="glyphicon glyphicon-plus"></i>  Create Surat Pemindahan', ['surat-pemindahan/create'], ['class' => 'btn btn-success']) . ' ' .
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