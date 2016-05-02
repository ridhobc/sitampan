<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-cog"></i> <?php echo Yii::t('app', 'Setting Identitas Kantor'); ?></h3>
    </div>
    <div class="box-body">
        <div class="col-xs-12 col-lg-12">
            <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
                <div class="organization-form">

                    <?php
                    $form = ActiveForm::begin([
                                'id' => 'organization-form',
                                'options' => ['enctype' => 'multipart/form-data'],
                                    //'enableAjaxValidation' => true,
                    ]);
                    ?>
                    <h2 class="page-header edusec-page-header-1">
                        <i class="fa fa-university"></i> <?php echo Yii::t('app', 'Institute Setup Details'); ?>
                    </h2>
                    <div class="col-sm-12 no-padding">
                        <div class ="col-sm-6">
                            <?= $form->field($model, 'kementerian', ['inputOptions' => [ 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Nama Kementerian')]])->textInput(['maxlength' => 255])->label() ?>
                        </div>
                        <div class = "col-sm-6">
                            <?= $form->field($model, 'eseloni', ['inputOptions' => [ 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Nama Direktorat Eselon I')]])->textInput(['maxlength' => 255])->label() ?>
                        </div>
                    </div>

                    <div class="col-sm-12 no-padding">
                        <div class = "col-sm-6">
                            <?= $form->field($model, 'kanwil', ['inputOptions' => [ 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Nama Kantor Wilayah/KPU')]])->textInput(['maxlength' => 255])->label() ?>
                        </div>
                        <div class = "col-sm-6">
                            <?= $form->field($model, 'kppbc', ['inputOptions' => [ 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Nama KPPBC/KPU/BPIB/PSO')]])->textInput(['maxlength' => 255])->label() ?>
                        </div>
                    </div>

                    <div class="col-sm-12 no-padding">
                        <div class = "col-sm-4">
                            <?= $form->field($model, 'alamat1', ['inputOptions' => [ 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Alamat Menyesuaikan Kop Surat')]])->textArea(['maxlength' => 255])->label() ?>
                        </div>
                        <div class = "col-sm-4">
                            <?= $form->field($model, 'alamat2', ['inputOptions' => [ 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Alamat Menyesuaikan Kop Surat ')]])->textArea(['maxlength' => 255])->label() ?>
                        </div>
                        <div class = "col-sm-4">
                            <?= $form->field($model, 'alamat3', ['inputOptions' => [ 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Alamat Menyesuaikan Kop Surat ')]])->textArea(['maxlength' => 255])->label() ?>
                        </div>
                    </div>

                    


                    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
                        <div class="col-xs-6">
                            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
                        </div>
                        <div class="col-xs-6">
                            <?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class' => 'btn btn-default btn-block']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>

    </div>
</div>
