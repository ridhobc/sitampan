<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Profil ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">

                <h3 class="panel-title">
                    User Profil dan IKU</h3>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class="pull-right">
                        <?=
                        Html::a(
                                'Logbook', ['/iku-user'], ['data-method' => 'post', 'class' => 'btn btn-info btn-flat '])
                        ?>
                    </div>
                    <div class="pull-left">
                        <?=
                        Html::a(
                                'Change Password', ['change_password'], ['data-method' => 'post', 'class' => 'btn btn-warning btn-flat '])
                        ?>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12">

                        <div class="col-md-4">
                            <div class="col-md-12 text-center">
                                <?= Html::img($model->getPhoto($model->photo), ['alt' => 'No Image', 'class' => 'img-circle edusec-img-disp']); ?>
                                <div class="photo-edit">

                                    <?=
                                    Html::a('<i class="fa fa-pencil"></i>', ['emp-photo', 'id' => $model->id], ['class' => 'photo-edit-icon', 'title' => 'Change Profile Picture', 'data-toggle' => "modal",
                                        'data-target' => "#basicModal"])
                                    ?>

                                </div>
                                <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content row">            
                                            <div class="modal-body">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>PROFIL USER</h5>
                            <?php
                            $agama = [
                                '1' => 'Islam',
                                '2' => 'Kristen',
                                '3' => 'Kristen Protestan',
                                '4' => 'Hindu',
                                '5' => 'Budha',
                                '6' => 'Lainnya'
                            ];
                            $disposisi = \yii\helpers\ArrayHelper::map(
                                            \backend\models\Disposisi::find()->all(), 'id', 'nama');
                            ?>
                            <?=
                            DetailView::widget([
                                'model' => $model,
                                'condensed' => true,
                                'hover' => true,
                                'bootstrap' => true,
                                'bordered' => true,
                                'responsive' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'Username # ' . $model->username,
                                    'type' => DetailView::TYPE_INFO,
                                ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'buttons1' => '{update}', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'attributes' => [
                                    'username',
//                        'password_hash',
//                        'auth_key',
                                    'name',
                                    'nip',
                                    'born',
                                    //'birthday',
//                                    [
//                                        'attribute' => 'birthday',
//                                        'format' => 'date',
//                                        'type' => DetailView::INPUT_DATE,
//                                        'widgetOptions' => [
//                                            'pluginOptions' => ['format' => 'yyyy-mm-dd']
//                                        ],
//                                        'inputContainer' => ['class' => 'col-sm-6']
//                                    ],
                                    'address:ntext',
                                    'phone',
                                    'email:email',
                                    [
                                        'attribute' => 'religion_id',
                                        'format' => 'raw',
                                        'value' => $agama[$model->religion_id],
                                        'type' => DetailView::INPUT_SELECT2,
                                        'widgetOptions' => [
                                            'data' => $agama,
                                            'options' => ['placeholder' => 'Select ...'],
                                            'pluginOptions' => ['allowClear' => true]
                                        ],
                                        'inputContainer' => ['class' => 'col-sm-6']
                                    ],
                                    [
                                        'attribute' => 'iddisposisi',
                                        'format' => 'raw',
                                        'value' => $disposisi[$model->iddisposisi],
                                        'type' => DetailView::INPUT_SELECT2,
                                        'widgetOptions' => [
                                            'data' => $disposisi,
                                            'options' => ['placeholder' => 'Select ...'],
                                            'pluginOptions' => ['allowClear' => true]
                                        ],
                                        'inputContainer' => ['class' => 'col-sm-6']
                                    ],
                                ]
                            ]);
                            ?>

                        </div>
                        <div class="col-md-8">
                            <span>
                                <h5>IKU</h5>
                            </span>
                            <?php
                            Modal::begin([
                                'header' => '<h4>Tambah IKU</h4>',
                                'id' => 'modal',
                                'size' => 'modal-lg',
                            ]);
                            echo "<div id='modalContent'></div>";
                            Modal::end();

                            $gridColumns = [
                                ['class' => 'yii\grid\SerialColumn'],
                                'kode_iku',
                                [
                                    'attribute' => 'iku_id',
                                    'value' => function ($data) {
                                        return $data->iku->nama_iku;
                                    }
                                ],
                                'definis_iku',
                                'tahun',
                                [
                                    'format' => 'raw',
                                    'header' => 'Actions',
                                    'value' => function ($data) {
                                        return Html::a(Html::encode("Delete"), ['iku-user/view', 'id' => $data->id]);
                                    },
                                        ],
//                ['class' => 'yii\grid\ActionColumn']
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
                                            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> IKU </h3>',
                                        ],
// your toolbar can include the additional full export menu
                                        'toolbar' => [

                                            $fullExportMenu,
                                            ['content' =>
                                                Html::a('<i class="glyphicon glyphicon-plus"></i> Buat IKU', ['iku-user/iku-create-user', 'id' => $model->id], ['class' => 'btn btn-success']) . ' ' .
//                                                Html::button('<i class="glyphicon glyphicon-plus"></i> IKU Baru', ['value' => Url::to('index.php?r=iku-user/iku-create-user'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


