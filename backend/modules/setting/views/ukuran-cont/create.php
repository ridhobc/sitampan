<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TypeCont */

$this->title = 'Create Ukuran Cont';
$this->params['breadcrumbs'][] = ['label' => 'Type Conts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-cont-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
