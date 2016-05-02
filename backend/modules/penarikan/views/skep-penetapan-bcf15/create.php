<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\MaskedInput;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model backend\models\SkepPenetapanBcf15 */

$this->title = 'Konsep SKEP Penetapan BCF 1.5 ';
$this->params['breadcrumbs'][] = ['label' => 'Konsep', 'url' => ['bcf15/penetapan']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skep-penetapan-bcf15-create">

    <?=
    $this->render('_form', [
        'model' => $model,
        'searchModeldet' => $searchModeldet,
        'dataProviderdet' => $dataProviderdet,
    ])
    ?>

</div>
