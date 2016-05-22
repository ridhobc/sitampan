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

$this->title = 'Update User: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">
<?php $form = ActiveForm::begin(); ?>
   
    <div class="col-md-12 text-center">
        <?= Html::img($model->getPhoto($model->photo), ['alt' => 'No Image', 'class' => 'img-circle edusec-img-disp']); ?>
        <div class="photo-edit">

            <?=
            Html::a('<i class="fa fa-pencil"></i>', ['emp-photo', 'id' => $model->id], ['class' => 'photo-edit-icon', 'title' => 'Change Profile Picture', 'data-toggle' => "modal",
                'data-target' => "#basicModal"])
            ?>

        </div>
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content row">            
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user-form">


    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'username')->textInput(['maxlength' => 50]) ?>
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
        
        <div class="col-md-3">
            <?php
           $level = [
                'admin' => 'administrator',
                'manifest' => 'manifest',
                'pabean' => 'pabean',
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
        
    </div> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

  
</div>
   

</div>
   <?php ActiveForm::end(); ?>