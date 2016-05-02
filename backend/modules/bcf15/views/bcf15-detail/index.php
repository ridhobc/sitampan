/*<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$nomor = $modelBcf15->bcf15no;
$this->title = 'Daftar Detail BCF 15   ' . $nomor;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suratmasuk-arsip-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    <div class="container-fluid">


    </div>

    <?php
    Modal::begin([
        'header' => '<h4>BCF 1.5</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
        'options' => [
            'id' => 'modal',
            'tabindex' => false // important for Select2 to work properly
        ],
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    $pejabat = \yii\helpers\ArrayHelper::map(
                    \backend\models\Penandatangan::find()->all(), 'id', 'jabatan', 'namapejabat');
    $gridColumns = [
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                $searchModel = new \backend\modules\bcf15\models\Bcf15DetailContSearch();
                $searchModel->bcf15_detail_id = $model->id;
                $dataProvider = $searchModel->search(YII::$app->request->queryParams);

                return YII::$app->controller->renderPartial('_container_detail', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
            },
                ],
                'bcf15_id',
            'bc11no',
            'bc11tgl',
            'bc11pos',
                ['class' => 'yii\grid\ActionColumn',
                    'header' => 'action',
                    'template' => '{update} {view} {delete}'
                ],
                [
                    'format' => 'raw',
                    'value' => function ($data) {
                        return Html::a(Html::encode("Data BC11"), ['bcf15-detail/index', 'id' => $data->id]);
                    },
                        ],
            ];
            $fullExportMenu = ExportMenu::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => $gridColumns,
                        'target' => ExportMenu::TARGET_POPUP,
//            'messages'=> 'downloadProgress',
                        'fontAwesome' => true,
                        //'pjaxContainerId' => 'kv-pjax-container',
                        'dropdownOptions' => [
                            'label' => 'Full',
                            'class' => 'btn btn-danger',
                            'itemsBefore' => [
                                '<li class="dropdown-header">Export All Data</li>',
                            ],
                        ],
            ]);
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'pjax' => false,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> BCF 1.5</h3>',
                ],
// your toolbar can include the additional full export menu
                'toolbar' => [

                    $fullExportMenu,
                    ['content' =>
                        
                       Html::button('<i class="glyphicon glyphicon-plus"></i>  Create BCF 1.5', ['value' => Url::to(['index.php?r=bcf15-detail/tambahbc11','id' => $modelBcf15->id]), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
                        
//                                Html::button('<i class="glyphicon glyphicon-plus"></i>  Buat Logbook', ['value' => Url::to('index.php?r=logbook/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                            'data-pjax' => 0,
                            'class' => 'btn btn-info',
                            'title' => Yii::t('kvgrid', 'Refresh')
                        ])
                    ],
                ],
                'export' => [
                    'messages' => 'allowPopups',
                ],
            ]);
            ?>



</div>
