<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\MaskedInput;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\SkepPenetapanBcf15 */

$this->title = 'Update Skep Penetapan Bcf15';
$this->params['breadcrumbs'][] = ['label' => 'Skep Penetapan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="skep-penetapan-bcf15-update">


    <?=
    $this->render('_form', [
        'model' => $model,
           'searchModeldet' => $searchModeldet,
            'dataProviderdet' => $dataProviderdet,
    ]);
       
    ?>

    <?php
    Modal::begin([
        'header' => '<h4>Container</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    $tps = \yii\helpers\ArrayHelper::map(
                    backend\modules\setting\models\Tps::find()->all(), 'id', 'namatps');
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

                return YII::$app->controller->renderPartial('_bcf15_detail', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]);
            },
        ],
        'no_sp',
        'tgl_sp',
        'bcf15no',
        'tahun',
        'nama_kirim_sp',
        'tgl_kirim_sp',
        'nama_terima_sp',
        'tgl_terima_sp',
        [
            'format' => 'raw',
            'header' => 'Detail Skep',
            'value' => function ($data) {
                if (\Yii::$app->user->identity->role == 'admin') {                   
                    if ($data->status_bcf15 == '4') {
                        $request = Yii::$app->request;
                        return Html::a("<i class='fa fa-plus-circle fa-2x text-danger text-center'></i>", ['bcf15/tbhdetailkep', 'idsk' =>  $request->get('id') , 'id' => $data->id], [
                                    'class' => '',
                                    'data' => [
                                        'confirm' => 'Tambahkan bcf15 nomor : '.$data->bcf15no.' Ke Skep',
                                        'method' => 'post',
                                    ],
                        ]);
                    } elseif ($data->status_bcf15 == '5') {
                        $request = Yii::$app->request;
                        return Html::a("<i class='fa fa-calendar-check-o  fa-2x text-success text-center '></i>", ['bcf15/btldetailkep', 'idsk' =>  $request->get('id') , 'id' => $data->id], [
                                    'class' => '',
                                    'data' => [

                                        'confirm' => 'Hapus bcf15 nomor : '.$data->bcf15no.' dari Skep',
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                        
              
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
            'heading' => 'Tambahkan Detail BCF 1.5 ke dalam Skep dengan Klik tombol <i class="fa fa-plus-circle fa-2x text-default"></i>',
        ],
// your toolbar can include the additional full export menu
        'toolbar' => [

            $fullExportMenu,
            ['content' =>
//                                                Html::button('<i class="glyphicon glyphicon-plus"></i>  Create BCF 1.5', ['value' => Url::to(['index.php?r=bcf15-detail/tambahbc11', 'id' => $modelBcf15->id]), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
//                                Html::button('<i class="glyphicon glyphicon-plus"></i>  Buat Logbook', ['value' => Url::to('index.php?r=logbook/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
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
    <?php
    $this->registerJs("
    $('#modal').on('show.bs.modal', function (event) {
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

</div>
