<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use backend\modules\bcf15\models\Bcf15DetailSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = $model->bcf15no . ' ' . ' tahun' . ' ' . $model->bcf15no;
$this->params['breadcrumbs'][] = ['label' => 'Surat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="Surat-masuk-view">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-ship "></i> <?php echo Yii::t('app', 'Detail BCF15'); ?></h3>
            <?= Html::a('<i class="fa fa-home "></i> back', ['bcf15/index'], ['class' => 'btn btn-primary']) ?>        
            <?= Html::a('<i class="fa fa-file-pdf-o "></i> cetak', ['bcf15/cetak-bcf15', 'id' => $model->id], ['class' => 'btn btn-info']) ?>

        </div>
        <div class="box-body">

            <div class="row">

                <div class="col-xs-12">
                    <div class="box box-primary view-item" style="padding-bottom:5px">
                        <div class="fees-collect-category-view">
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
                                    'heading' => 'BCF1.5 No  # ' . $model->bcf15no,
                                    'type' => DetailView::TYPE_INFO,
                                ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'attributes' => [
                                    //'id',
                                    'bcf15no',
                                    'bcf15tgl',
                                    'tahun',
                                    [
                                        'attribute' => 'penandatangan_id',
                                        'value' => $model->penandatangan->namapejabat,
                                    ],
                                    [
                                        'attribute' => '',
                                        'value' => $model->penandatangan->jabatan,
                                    ],
                                    [
                                        'attribute' => 'created_at',
                                        'format' => ['date', 'php:d M Y h:i:s']
                                    ],
                                    //'create_by',
                                    [
                                        'attribute' => 'created_by',
                                        'value' => $model->userCreated->name,
                                    ],
                                    [
                                        'attribute' => 'updated_at',
                                        'format' => ['date', 'php:d M Y h:i:s']
                                    ],
                                    [
                                        'attribute' => 'updated_by',
                                        'value' => $model->userUpdated->name,
                                    ],
                                ],
                            ])
                            ?>
                        </div>
                        <div class="box box-success">
                            <div class="box-header" id="callout-input-needs-type">
                                <h4 class="box-title"><?php echo Yii::t('app', 'Details BCF 1.5'); ?></h4>
                            </div>
                            <div class="box-body table-responsive">
                                <?php
                                $searchModel = new Bcf15DetailSearch([
                                    'bcf15_id' => $model->id,
                                ]);
                                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                ?>
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'summary' => '',
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        'bc11no',
                                        'bc11tgl',
                                        'bc11pos',
                                        'bc11subpos',
                                        'nobl',
                                        'tglbl',
                                        'tgl_timbun',
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'template' => '{update} {delete}',
                                            'buttons' => [
                                                'update' => function ($url, $model) {
                                                    $url = \Yii::$app->getUrlManager()->createUrl(["fees/fees-category-details/update", "fcd_id" => $model->id, "fcc_id" => $model->id]);
                                                    return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
                                                                'title' => Yii::t('yii', 'Update'),
                                                    ]);
                                                },
                                                'delete' => function ($url, $model) {
                                                    $url = \Yii::$app->getUrlManager()->createUrl(["fees/fees-category-details/delete", "fcd_id" => $model->id, "fcc_id" => $model->id]);
                                                    return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                                                                'title' => Yii::t('yii', 'Delete'),
                                                                'data' => [
                                                                    'confirm' => Yii::t('fees', 'Are you sure you want to delete this item?'),
                                                                    'method' => 'post',
                                                    ]]);
                                                }
                                            ]
                                        ],
                                    ],
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
