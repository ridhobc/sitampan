<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15Penyelesaian */

$this->title = 'Rekam Permohonan';
$this->params['breadcrumbs'][] = ['label' => 'Frontdesk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-penyelesaian-create"> 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
