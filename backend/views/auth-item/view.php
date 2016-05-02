<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-view">

    <p>

        
        <?=
        Html::a('<i class="glyphicon glyphicon-circle-arrow-left"></i> Back', ['index'], [
            'class' => 'btn btn-info',            
        ])
        ?>
        
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'bootstrap' => true,
        'bordered' => true,
        'responsive' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Auth Item # ' . $model->name,
            'type' => DetailView::TYPE_INFO,
        ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
        'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
        'attributes' => [
            'name',
            //'type',
            [
                'attribute' => 'description',
                'format' => 'raw',
                'value' => '<span class="text-justify"><em>' . $model->description . '</em></span>',
                'type' => DetailView::INPUT_TEXTAREA,
                'options' => ['rows' => 4]
            ],
            
            'rule_name',
            'data:ntext',
            [
                'attribute' => 'created_at',
                'format' => 'date',
                'type' => DetailView::INPUT_DATE,
                'widgetOptions' => [
                    'pluginOptions' => ['format' => 'yyyy-mm-dd']
                ],
                'inputContainer' => ['class' => 'col-sm-6']
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'date',
                'type' => DetailView::INPUT_DATE,
                'widgetOptions' => [
                    'pluginOptions' => ['format' => 'yyyy-mm-dd']
                ],
                'inputContainer' => ['class' => 'col-sm-6']
            ],
        ],
    ])
    ?>

</div>
