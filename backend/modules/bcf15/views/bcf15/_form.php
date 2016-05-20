<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppbi */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="ppbi-form">

    <?php $form = ActiveForm::begin(); ?> 
    <div class="panel panel-default">

        <div class="panel-body payment-form">
            <div class="row">

                <div class="col-sm-6">

                    <?=
                    $form->field($model, 'bcf15tgl')->widget(\kartik\widgets\DatePicker::className(), [
                        'options' => ['placeholder' => 'Tgl Tgl BCF 1.5..'],
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
                                    \backend\models\Penandatangan::find()->where(['is_status' => '1', 'category' => '1'])->all(), 'id', 'namapejabat', 'jabatan');
                    echo $form->field($model, 'penandatangan_id')->widget(\kartik\widgets\Select2::classname(), [
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
                    <?= Html::a('<i class="fa fa-male "></i> Kepala Seksi Penetapan', ['penandatangan/create'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <br/>



            <div class="row">
                <div class="form-group">            

                    <div class="col-sm-12">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

