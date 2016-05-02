<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="panel panel-default">
        <div class="panel-body payment-form">
            <div class="row">
                <div class="col-md-6">
                    <?php
                //= $form->field($model, 'training_id')->textInput()
                $itemname = \yii\helpers\ArrayHelper::map(
                                \backend\models\AuthItem::find()->all(), 'name', 'name');


                echo $form->field($model, 'parent')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => $itemname,
                    'options' => [
                        'placeholder' => 'Pilih Item Name...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
                ?>
                   
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                       <?php
                //= $form->field($model, 'training_id')->textInput()
                $itemname = \yii\helpers\ArrayHelper::map(
                                \backend\models\AuthItem::find()->all(), 'name', 'name');


                echo $form->field($model, 'child')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => $itemname,
                    'options' => [
                        'placeholder' => 'Pilih child...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
                ?>
                    
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div> 
    

    <div class="form-group">
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
