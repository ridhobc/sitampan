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
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-file-text"></i> Detail Kekurangan Dokumen 
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body payment-form">                        

                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'ur_kekurangan')->textArea(array('placeholder' => 'Uraikan Kekurangan dokumen '), ['maxlength' => 255]) ?>
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
