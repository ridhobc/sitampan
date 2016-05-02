<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\penarikan\models\Bcf15 */

$this->title = 'Create Bcf15';
$this->params['breadcrumbs'][] = ['label' => 'Bcf15s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
