<?php

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Auth Items';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<h4>Auth Item</h4>',
    'id' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'></div>";
Modal::end();

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'name',
    'description',
    ['class' => 'yii\grid\ActionColumn']
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
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-wrench"></i> Auth Item Children</h3>',
    ],
// your toolbar can include the additional full export menu
    'toolbar' => [

        $fullExportMenu,
        ['content' =>
            Html::button('<i class="glyphicon glyphicon-plus"></i> Create Auth Item', ['value' => Url::to('index.php?r=auth-item/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                'data-pjax' => 0,
                'class' => 'btn btn-info',
                'title' => Yii::t('kvgrid', 'Refresh')
            ])
        ],
    ],
    'export' => [
'messages'=> 'allowPopups',

],
]);
?>

