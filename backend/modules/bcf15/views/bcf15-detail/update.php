<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15Detail */

$this->title = 'Update Bcf15 Detail: ' . ' ' . $modelBcf15Detail->id;
$this->params['breadcrumbs'][] = ['label' => 'Bcf15 Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelBcf15Detail->id, 'url' => ['view', 'id' => $modelBcf15Detail->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bcf15-detail-update">
    <?=
    $this->render('_form', [
        'modelBcf15Detail' => $modelBcf15Detail,
        'modelBcf15DetailCont' => (empty($modelBcf15DetailCont)) ? [new Address] : $modelBcf15DetailCont,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ])
    ?>

</div>
