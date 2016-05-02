<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Komentar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-komentar">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Diisi ya kak..!</p>
    <div class="row">
        <div class="col-lg-5">
        <?php 
        $form = ActiveForm::begin(['id' => 'komentar-form']); 
        ?>
            <?= $form->field($model, 'nama') ?>
            <?= $form->field($model, 'pesan') ?>            
            <div class="form-group">
                <?= Html::submitButton('Submit', [
                    'class' => 'btn btn-primary', 'name' => 'komentar-button'
                ]) ?>
            </div>
        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
