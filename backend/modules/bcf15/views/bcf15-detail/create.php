<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bcf15 */

$this->title = 'Tambah BC 11';
$this->params['breadcrumbs'][] = ['label' => 'Bcf15s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcf15-create">

    <?= $this->render('_form', [
       'modelBcf15Detail' => $modelBcf15Detail,
                    'modelBcf15DetailCont' => (empty($modelBcf15DetailCont)) ? [new Address] : $modelBcf15DetailCont
    ]) ?>

</div>
