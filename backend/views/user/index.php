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
            return Html::a(Html::encode(""), ['update', 'id' => $data->id], ['class' => 'fa fa-cog fa-2x']);
        },
    ],
    [
        'format' => 'raw',
        'header' => 'Status',
        'value' => function ($data) {

            if ($data->status == '10') {
                $request = Yii::$app->request;
                return Html::a("<i class='fa fa-check fa-2x text-info text-center'></i>", ['bcf15/tbhdetailkep', 'idsk' => $request->get('id'), 'id' => $data->id], [
                            'class' => '',
                            'data' => [
                                'confirm' => 'Tambahkan bcf15 nomor : ' . $data->username . ' Ke Skep',
                                'method' => 'post',
                                ],
                        ]);
            } else {
                $request = Yii::$app->request;
                return Html::a("<i class='fa fa-close  fa-2x text-success text-center '></i>", ['surat-pemindahan/btllampsrt', 'idsk' => $request->get('id'), 'id' => $data->id], [
                            'class' => '',
                            'data' => [

                                'confirm' => 'Hapus bcf15 nomor : ' . $data->username . ' dari Lampiran',
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
            Html::button('<i class="glyphicon glyphicon-plus"></i>  Create User', ['value' => Url::to('index.php?r=user/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
//            Html::a('Create Auth Item Child', ['create'], ['class' => 'btn btn-success']). ' ' .
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

