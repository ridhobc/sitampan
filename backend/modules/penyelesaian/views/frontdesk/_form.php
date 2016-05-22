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
        <?= Html::a('<i class="fa fa-file-word-o "></i> Tanda Terima', ['skep-penetapan-bcf15/export-skep-word', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>        


    </div>
    <div class="box-body">

        <div class="row">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-file-text"></i> Detail Permohonan 
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body payment-form">
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'nomor_permohonan')->textInput(array('placeholder' => 'nomor surat permohonan'), ['maxlength' => 200]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?=
                                $form->field($model, 'tgl_permohonan')->widget(\kartik\widgets\DatePicker::className(), [
                                    'options' => ['placeholder' => 'Tanggal Permohonan..'],
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
                                <?php
                                //= $form->field($model, 'training_id')->textInput()
                                $jabatan = \yii\helpers\ArrayHelper::map(
                                                backend\models\ViewBcf15::find()->where(['status_bcf15_detail' => [2,3,4,5]])->all(), 'id', 'bcf15pos', 'bcf15no');
                                echo $form->field($model, 'bcf15_detail_id')->widget(\kartik\widgets\Select2::classname(), [
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
                            <div class="col-sm-6">
                                <?= $form->field($model, 'hal_permohonan')->textArea(array('placeholder' => 'Perihal permohonan'), ['maxlength' => 255]) ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'nama_pemohon')->textInput(array('placeholder' => 'Nama Pemohon'), ['maxlength' => 255]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'alamat_pemohon')->textArea(array('placeholder' => 'alamat'), ['maxlength' => 255]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'kota_pemohon')->textInput(array('placeholder' => 'kota'), ['maxlength' => 255]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'email_pemohon')->textInput(array('placeholder' => 'Perihal permohonan'), ['maxlength' => 255]) ?>
                            </div>
                            <div class="col-md-3">
                                <?=
                                $form->field($model, 'status_lengkap')->widget(\kartik\widgets\SwitchInput::className(), [
                                    'pluginOptions' => [
                                        'onText' => 'Lengkap',
                                        'offText' => 'Kurang Lengkap',
                                    ]
                                ])
                                ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div> 
            <div class="col-md-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <i class="fa fa-user-times"></i> Detail Pemohon 
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body payment-form">
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'nama_petugas_ppjk')->textInput(array('placeholder' => 'Nama Petugas/Kurir/PPJK/ Pembawa surat permohonan'), ['maxlength' => 200]) ?>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <?= $form->field($model, 'no_telp_petugas_ppjk')->textInput(array('placeholder' => 'No Telp'), ['maxlength' => 200]) ?>
                            </div>

                        </div>


                    </div>
                </div>

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
