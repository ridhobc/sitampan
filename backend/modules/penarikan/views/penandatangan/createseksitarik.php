<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Penandatangan */

$this->title = 'Tambah Seksi Penandatangan Penarikan';
$this->params['breadcrumbs'][] = ['label' => 'Penandatangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penandatangan-create">


    <?= $this->render('_formkkantor', [
        'model' => $model,
    ]) ?>

</div>
