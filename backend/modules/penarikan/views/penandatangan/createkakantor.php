<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Penandatangan */

$this->title = 'Create Penandatangan';
$this->params['breadcrumbs'][] = ['label' => 'Penandatangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penandatangan-create">


    <?= $this->render('_formkkantor', [
        'model' => $model,
    ]) ?>

</div>
