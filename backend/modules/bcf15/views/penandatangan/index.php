<?php

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'List Pejabat Penetapan BCF 1.5';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<h4>Tambah Pejabat</h4>',
    'id' => 'modal',
    'size' => 'modal-lg',
    'options' => [
        'id' => 'modal',
        'tabindex' => false // important for Select2 to work properly
    ],
]);
echo "<div id='modalContent'></div>";
Modal::end();
$category = \yii\helpers\ArrayHelper::map(
                backend\models\CategoryPejabat::find()->all(), 'id', 'nmcategory');
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'jabatan',
    'namapejabat',
    'nippejabat',
    [
            'attribute' => 'category',
            'filter' => $category,
            'value' => function ($data) {
                return $data->category0->nmcategory;
            }
        ],
    [
        'format' => 'raw',
        'header' => 'Status',
       
        'value' => function ($data) {
            if (\Yii::$app->user->identity->role == 'admin') {
                if ($data->is_status == '0') {
                    return Html::a("<i class='fa fa-ban fa-2x text-danger'></i>", ['aktif', 'id' => $data->id], [
            'class' => '',
            'data' => [
                
                 'confirm' => 'Aktifkan?',
                'method' => 'post',
            ],
        ]);
                } else {
                    return Html::a("<i class='fa fa-check-square fa-2x text-info '></i>", ['nonaktif', 'id' => $data->id], [
            'class' => '',
            'data' => [
                'confirm' => 'Nonaktifkan?',
                'method' => 'post',
            ],
        ]);
                }
            }
        },
    ],
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
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Pejabat Manifest </h3>',
    ],
// your toolbar can include the additional full export menu
    'toolbar' => [

        $fullExportMenu,
        ['content' =>
            Html::button('<i class="glyphicon glyphicon-plus"></i>  Create Pejabat', ['value' => Url::to('index.php?r=bcf15/penandatangan/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
//            Html::a('<i class="glyphicon glyphicon-plus"></i> TPP', ['tpp/create'], ['class' => 'btn btn-success']). ' ' .
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

