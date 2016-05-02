<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Update User: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-default alert alert-danger">
        <div class="panel-body payment-form " >
            <h4>User ini akan di banned, User tersebut tidak dapat login ke system, untuk dapat login harus diaktifkan kembali </h4>
            <div class="row">
                <div class="col-md-4 " >
                    <?=
                    $form->field($model, 'status')->widget(\kartik\widgets\SwitchInput::className(), [
                        'pluginOptions' => [
                            'onText' => 'Aktif',
                            'offText' => 'Banned',
                        ]
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>






    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
