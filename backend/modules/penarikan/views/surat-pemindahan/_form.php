<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\MaskedInput;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\SkepPenetapanBcf15 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-default">
    <div class="box-header with-border">

        <?= Html::a('<i class="fa fa-home "></i> Home', ['surat-pemindahan/index'], ['class' => 'btn btn-primary']) ?>        
        <?= Html::a('<i class="fa fa-file-word-o "></i> Konsep', ['surat-pemindahan/export-surat-word', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>        
        
        <?= Html::a('<i class="fa fa-file-pdf-o "></i> Lamp Skep PDF', ['surat-pemindahan/export-surat-lamp-pdf', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>        
    </div>
    <div class="box-body">

        <div class="row">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-print"></i> Isikan Detail Surat Pemindahan
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body payment-form">
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="text text-warning badge badge-warning">Surat Pemindahan</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'no_surat')->textInput(['maxlength' => 64]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?=
                                $form->field($model, 'tgl_surat')->widget(\kartik\widgets\DatePicker::className(), [
                                    'options' => ['placeholder' => 'Tanggal Surat..'],
                                    'language' => 'id',
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd',
                                        'autoclose' => true,
                                        'todayHighlight' => true,
                                        'todayBtn' => true,
                                    ]
                                ])
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?php
                                //= $form->field($model, 'training_id')->textInput()
                                $jabatan = \yii\helpers\ArrayHelper::map(
                                                \backend\models\Penandatangan::find()->where(['is_status' => '1', 'category' => '5'])->all(), 'id', 'namapejabat', 'jabatan');
                                echo $form->field($model, 'surat_penandatangan_kakantor')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => $jabatan,
                                    'options' => [
                                        'placeholder' => 'Pilih Penandatangan...',
                                    ],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        ],
                                ]);
                                ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <?= Html::a('<i class="fa fa-male "></i> Kepala Kantor', ['penandatangan/createkakantor'], ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="text text-warning badge badge-warning">Nota Dinas</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'no_nd_kasipab')->textInput(['maxlength' => 64]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?=
                                $form->field($model, 'tgl_nd_kasipab')->widget(\kartik\widgets\DatePicker::className(), [
                                    'options' => ['placeholder' => 'Tanggal ND..'],
                                    'language' => 'id',
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd',
                                        'autoclose' => true,
                                        'todayHighlight' => true,
                                        'todayBtn' => true,
                                    ]
                                ])
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'nd_dari_kasipab')->textArea(['maxlength' => 255]) ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'nd_daftar_sp')->textArea(['maxlength' => 255]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'nd_daftar_bcf15')->textArea(['maxlength' => 255]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <?php
                                $jabatan = \yii\helpers\ArrayHelper::map(
                                                \backend\models\Penandatangan::find()->where(['is_status' => '1', 'category' => '2'])->all(), 'id', 'namapejabat', 'jabatan');
                                echo $form->field($model, 'nd_penandatangan_kasipab')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => $jabatan,
                                    'options' => [
                                        'placeholder' => 'Pilih Penandatangan...',
                                    ],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        ],
                                ]);
                                ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-2">
                                <?= Html::a('<i class="fa fa-male "></i> Kepala Seksi Penarikan', ['penandatangan/createseksitarik'], ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                            <?php
//= $form->field($model, 'training_id')->textInput()
                            $tpp = \yii\helpers\ArrayHelper::map(
                                            \backend\modules\setting\models\Tpp::find()->all(), 'id', 'namatpp');
                            
                            echo $form->field($model, 'tpp_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => $tpp,
                                'options' => [
                                    'placeholder' => 'Pilih TPP...',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <?php
//= $form->field($model, 'training_id')->textInput()
                            $tps = \yii\helpers\ArrayHelper::map(
                                            backend\modules\setting\models\Tps::find()->all(), 'id', 'namatps');
                            echo $form->field($model, 'tps_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => $tps,
                                'options' => [
                                    'placeholder' => 'Pilih TPS...',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ]);
                            ?>
                        </div>
                    </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>   
            <div class="col-md-6">
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
                $tpp = \yii\helpers\ArrayHelper::map(
                                backend\modules\setting\models\Tpp::find()->all(), 'id', 'namatpp');
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
                    'bcf15no',
                    'bcf15tgl',
                    'tahun',
                    'no_sp',
                    'tgl_sp',
                    
                    [
                        'format' => 'raw',
                        'header' => 'Hapus',
                        'value' => function ($data) {
                            if (\Yii::$app->user->identity->role == 'admin') {
                                if ($data->status_bcf15 == '5') {
                                    $request = Yii::$app->request;
                                    return Html::a("<i class='fa fa-plus-circle fa-2x text-danger text-center'></i>", ['bcf15/tbhdetailkep', 'idsk' => $request->get('id'), 'id' => $data->id], [
                                                'class' => '',
                                                'data' => [
                                                    'confirm' => 'Tambahkan bcf15 nomor : ' . $data->bcf15no . ' Ke Skep',
                                                    'method' => 'post',
                                                    ],
                                            ]);
                                } elseif ($data->status_bcf15 == '6') {
                                    $request = Yii::$app->request;
                                    return Html::a("<i class='fa fa-close  fa-2x text-success text-center '></i>", ['surat-pemindahan/btllampsrt', 'idsk' => $request->get('id'), 'id' => $data->id], [
                                                'class' => '',
                                                'data' => [

                                                    'confirm' => 'Hapus bcf15 nomor : ' . $data->bcf15no . ' dari Lampiran',
                                                    'method' => 'post',
                                                    ],
                                            ]);
                                }
                            }
                        },
                        ],
                ];
                $fullExportMenu = ExportMenu::widget([
                            'dataProvider' => $dataProviderdet,
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
                    'dataProvider' => $dataProviderdet,
                    'filterModel' => $searchModeldet,
                    'columns' => $gridColumns,
                    'pjax' => false,
                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => 'Lampiran Surat Pemindahan BCF 1.5',
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



            </div>
        </div>

    </div>


</div>
