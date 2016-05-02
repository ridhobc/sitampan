<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\detail\DetailView;
use yii\widgets\MaskedInput;
use kartik\datecontrol\DateControl;
use kartik\widgets\SwitchInput;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="user-form">


    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'username')->textInput(['maxlength' => 50]) ?>
        </div>
        <div class="col-md-3">
               <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">

                    <?=
                    $form->field($model, 'birthday')->widget(\kartik\widgets\DatePicker::className(), [
                        'options' => ['placeholder' => 'Tgl Lahir..'],
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
        <div class="col-md-3">
            <?=
            $form->field($model, 'gender')->widget(\kartik\widgets\SwitchInput::className(), [
                'pluginOptions' => [
                    'onText' => 'Pria',
                    'offText' => 'Wanita',
                ]
            ])
            ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'nip')->textInput(['maxlength' => 30]) ?>
        </div>
        
    

        <div class="col-md-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => 30]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
        </div>


    </div>
    <div class="row">
        <div class="col-md-4">            
            <?php
            $agama = [
                '1' => 'Islam',
                '2' => 'Kristen',
                '3' => 'Kristen Protestan',
                '4' => 'Hindu',
                '5' => 'Budha',
                '6' => 'Lainnya'
            ];
            ?>
            <?=
            $form->field($model, 'religion_id')->widget(\kartik\widgets\Select2::className(), [
                'data' => $agama,
                'options' => [
                    'placeholder' => 'Pilih Agama',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>

        </div>
        <div class="col-md-3">
            <?php
            $level = [
                'admin' => 'administrator',
                'admin-sm' => 'admin surat masuk',
                'user' => 'user biasa'
            ];

            echo $form->field($model, 'role')->widget(\kartik\widgets\Select2::className(), [
                'data' => $level,
                'options' => [
                    'placeholder' => 'Pilih Level',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>

        </div>
        <div class="col-md-3">

            <?php
            $disposisi = \yii\helpers\ArrayHelper::map(
                            \backend\models\Disposisi::find()->all(), 'id', 'nama');

            echo $form->field($model, 'iddisposisi')->widget(\kartik\widgets\Select2::className(), [
                'data' => $disposisi,
                'options' => [
                    'placeholder' => 'Tentukan Id Disposisi',
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

    <?php ActiveForm::end(); ?>

</div>
