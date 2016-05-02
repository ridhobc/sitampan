<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsgOfDay */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.checkbox label {
    padding-left: 30px !important;
}
</style>
<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
   <div class="msg-of-day-form">
    <?php $form = ActiveForm::begin([
			'id' => 'msg-of-day-form',
			'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'msg_details')->textArea(['maxlength' => 100, 'placeholder'=> Yii::t('app', 'Enter Message Details')])->label(false) ?>

   

    <?= $form->field($model, 'is_status')->checkBox(['value'=>0, 'uncheck'=>1], true)->label("<b>&nbsp;".Yii::t('app', 'Active')."</b>"); ?>

    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	<?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class' => 'btn btn-default btn-block']) ?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>
   </div>
  </div>
</div>
