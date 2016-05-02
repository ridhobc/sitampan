<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\detail\DetailView;
use yii\widgets\MaskedInput;
use kartik\datecontrol\DateControl;
use kartik\widgets\SwitchInput;
use kartik\builder\Form;
/* @var $this yii\web\View */
/* @var $model backend\models\Tps */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="tps-form">
    <div class="row">
        <div class="col-md-8">
           <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
     <div class="row">
        <div class="col-md-4">
          <?= $form->field($model, 'namapejabat')->textInput(['maxlength' => true]) ?>
        </div>
   
        <div class="col-md-4">
           <?= $form->field($model, 'nippejabat')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>


