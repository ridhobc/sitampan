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

$this->title = 'Manajemen IKU';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suratmasuk-arsip-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    <div class="container-fluid">
        
        
    </div>

    <?php
    Modal::begin([
        'header' => '<h4>Iku</h4>',
        'id' => 'modal',
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
                $searchModel = new \backend\models\IkuUserSearch();
                $searchModel->user_id = $model->id;
                $dataProvider = $searchModel->search(YII::$app->request->queryParams);

                return YII::$app->controller->renderPartial('_daftar-iku', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
            },
                ],               
               
                 'name',
                 'nip',
                
                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {view} '
                ],
//                [
//                    'format' => 'raw',
//                    'value' => function ($data) {
//                        return Html::a(Html::encode("Add File"), ['addfile', 'id' => $data->id]);
//                    },
//                        ],
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
                            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Manajemen IKU</h3>',
                        ],
// your toolbar can include the additional full export menu
                        'toolbar' => [

                            $fullExportMenu,
                            ['content' =>
//                                Html::a('<i class="glyphicon glyphicon-plus"></i> Buat IKU Baru', ['iku/create'], ['class' => 'btn btn-success']) . ' ' .
//                                Html::button('<i class="glyphicon glyphicon-plus"></i>  Buat Logbook', ['value' => Url::to('index.php?r=logbook/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
                                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['iku-pegawai'], [
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
