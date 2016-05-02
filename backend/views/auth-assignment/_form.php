<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="panel panel-default">
    <div class="panel-body payment-form">

        <div class="form-group">
            
            <div class="col-sm-3">
                <?php
                //= $form->field($model, 'training_id')->textInput()
                $user = \yii\helpers\ArrayHelper::map(
                                \backend\models\User::find()->all(), 'id', 'name');


                echo $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => $user,
                    'options' => [
                        'placeholder' => 'Pilih User...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
                ?>
            </div> 
            
            <div class="col-sm-3">
                <?php
                //= $form->field($model, 'training_id')->textInput()
                $authitem = \yii\helpers\ArrayHelper::map(
                                \backend\models\AuthItem::find()->all(), 'name', 'name');


                echo $form->field($model, 'item_name')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => $authitem,
                    'options' => [
                        'placeholder' => 'Pilih Authentifikasi...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
                ?>


            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>           
            
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    </div>

    
