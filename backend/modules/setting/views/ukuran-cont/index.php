<?php

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'List Ukuran Container';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<h4>Ukuran Container</h4>',
    'id' => 'modal',
    'size' => 'modal-lg',
    'options' => [
        'id' => 'modal',
        'tabindex' => false // important for Select2 to work properly
    ],
]);
echo "<div id='modalContent'></div>";
Modal::end();

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
            
            'ukuran',
                    ['class' => 'yii\grid\ActionColumn',
                        'header' => 'Update',
                        'template' => '{update} {view} '
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
                                        'label' => 'Export To',
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
                                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-modal-window"></i> Ukuran Container </h3>',
                            ],
// your toolbar can include the additional full export menu
                            'toolbar' => [

                                $fullExportMenu,
                                ['content' =>
                                    Html::button('<i class="glyphicon glyphicon-plus"></i>  Create Ukuran Container', ['value' => Url::to('index.php?r=setting/ukuran-cont/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
//            Html::a('<i class="glyphicon glyphicon-plus"></i> Type Container', ['type-cont/create'], ['class' => 'btn btn-success']). ' ' .
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

