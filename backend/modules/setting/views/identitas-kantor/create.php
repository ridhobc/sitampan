<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\IdentitasKantor */

$this->title = 'Create Identitas Kantor';
$this->params['breadcrumbs'][] = ['label' => 'Identitas Kantors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identitas-kantor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
