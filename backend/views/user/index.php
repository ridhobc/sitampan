<?php

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<h4>User</h4>',
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
    [
        'attribute' => 'photo',
        'format' => 'html',
        'value' => function ($data) {
            return Html::img(Yii::getAlias('@web') . '/user/' . $data['photo'], ['width' => '70px']);
        },
    ],
    'name',
    'nip',
    'email:email',
    'role',
    [
        'attribute' => 'status',
        'value' => function ($data) {
            $status = [
                '10' => 'Aktif',
                '0' => 'Banned'
            ];
            return $status[$data->status];
        }
    ],
    
    [
        'format' => 'raw',
        'header' => 'Ubah',
        'value' => function ($data) {

            if ($data->status == '10') {
                return Html::a(Html::encode(""), ['update', 'id' => $data->id], ['class' => 'fa fa-cog fa-2x']);
            } else {
                
                return "<i class='fa fa-minus  fa-2x text-danger text-center '></i>";
            }
        },
    ],
    [
        'format' => 'raw',
        'header' => 'Status',
        'value' => function ($data) {

            if ($data->status == '10') {
                $request = Yii::$app->request;
                return Html::a("<i class='fa fa-check fa-2x text-info text-center'></i>", ['banned', 'id' => $data->id], [
                            'class' => '',
                            'data' => [
                                'confirm' => 'User  : ' . $data->name . ' akan dibanned, lanjutkan?',
                                'method' => 'post',
                                ],
                        ]);
            } else {
                $request = Yii::$app->request;
                return Html::a("<i class='fa fa-ban  fa-2x text-danger text-center '></i>", ['unbanned', 'id' => $data->id], [
                            'class' => '',
                            'data' => [

                                'confirm' => 'User  : ' . $data->name . ' akan diaktifkan kembali, lanjutkan?',
                                'method' => 'post',
                                ],
                        ]);
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
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> User </h3>',
    ],
// your toolbar can include the additional full export menu
    'toolbar' => [

        $fullExportMenu,
        ['content' =>
//            Html::button('<i class="glyphicon glyphicon-plus"></i>  Create User', ['value' => Url::to('index.php?r=user/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
            Html::a('<i class="glyphicon glyphicon-plus"></i> Create User', ['create'], ['class' => 'btn btn-success']) . ' ' .
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

