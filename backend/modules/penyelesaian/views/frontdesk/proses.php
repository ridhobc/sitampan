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

        <?= Html::a('<i class="fa fa-home "></i> Home', ['bcf15/penetapan'], ['class' => 'btn btn-success']) ?>               


    </div>
    <div class="box-body">

        <div class="row">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-file-text"></i> Penyelesaian 
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body payment-form">
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'no_nd_btl')->textInput(array('placeholder' => 'nomor Nota Dinas'), ['maxlength' => 200]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?=
                                $form->field($model, 'tgl_nd_btl')->widget(\kartik\widgets\DatePicker::className(), [
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
                            <div class="col-md-6">
                                 <?= Html::a('<i class="fa fa-male "></i> Kepala Seksi ', ['penandatangan/create'], ['class' => 'btn btn-primary']) ?>
                                <?php
                                $jabatan = \yii\helpers\ArrayHelper::map(
                                                \backend\models\Penandatangan::find()->where(['is_status' => '1', 'category' => '4'])->all(), 'id', 'namapejabat', 'jabatan');
                                echo $form->field($model, 'kasi_id')->widget(\kartik\widgets\Select2::classname(), [
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
                            <div class="col-md-4">
                                <?php
                                $jabatan = \yii\helpers\ArrayHelper::map(
                                                \backend\models\DokPengeluaran::find()->all(), 'id', 'jenis_dok');
                                echo $form->field($model, 'dok_pengeluaran_id')->widget(\kartik\widgets\Select2::classname(), [
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
                            <div class="col-sm-4">
                                <?= $form->field($model, 'no_dok_pengeluaran')->textInput(array('placeholder' => 'nomor Nota Dinas'), ['maxlength' => 200]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?=
                                $form->field($model, 'tgl_dok_pengeluaran')->widget(\kartik\widgets\DatePicker::className(), [
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
                            <div class="col-md-4">
                                <?php
                                $jabatan = \yii\helpers\ArrayHelper::map(
                                                \backend\models\DokPembayaran::find()->all(), 'id', 'jenis_dok');
                                echo $form->field($model, 'dok_pembayaran_id')->widget(\kartik\widgets\Select2::classname(), [
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
                            <div class="col-sm-4">
                                <?= $form->field($model, 'no_dok_pembayaran')->textInput(array('placeholder' => 'nomor Nota Dinas'), ['maxlength' => 200]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?=
                                $form->field($model, 'tgl_dok_pembayaran')->widget(\kartik\widgets\DatePicker::className(), [
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
                            
                            <div class="col-md-6">
                                <?=
                                $form->field($model, 'bbs_bm_pdri')->widget(\kartik\widgets\SwitchInput::className(), [
                                    'pluginOptions' => [
                                        'onText' => 'Pbebasan/tdk dipungut',
                                        'offText' => 'Bayar BeaMasuk dan PDRI',
                                    ]
                                ])
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $jabatan = \yii\helpers\ArrayHelper::map(
                                                backend\models\JenisPenyelesaian::find()->all(), 'id', 'nama_penyelesaian');
                                echo $form->field($model, 'jenis_penyelesaian_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => $jabatan,
                                    'options' => [
                                        'placeholder' => 'Pilih Penyelesaian...',
                                    ],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        ],
                                ]);
                                ?>

                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <?= Html::submitButton($model->isNewRecord ? 'Rekam' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-primary']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

            </div> 



        </div>

    </div>


</div>
