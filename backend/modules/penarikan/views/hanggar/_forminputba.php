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
    
    <div class="box-body">

        <div class="row">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-print"></i> Inout Berita Acara Pemindahan BCF 1.5
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body payment-form">
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'ba_no')->textInput(['maxlength' => 64]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?=
                                $form->field($model, 'ba_tgl')->widget(\kartik\widgets\DatePicker::className(), [
                                    'options' => ['placeholder' => 'Tanggal Berita Acara..'],
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
                    <div class="form-group">
                        <div class="col-sm-12">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>   
            
        </div>

    </div>


</div>
