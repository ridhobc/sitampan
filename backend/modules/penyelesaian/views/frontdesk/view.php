<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\grid\DataColumn;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = "No Surat" . " " . $model->nomor_permohonan;
$this->params['breadcrumbs'][] = ['label' => 'permohonan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-view">

    <div class="box box-default">
        <div class="box-header with-border">

            <?= Html::a('<i class="fa fa-home "></i> Home', ['frontdesk/index'], ['class' => 'btn btn-success']) ?>        
            <?= Html::a('<i class="fa fa-file-word-o "></i> Tanda Terima', ['skep-penetapan-bcf15/export-skep-word', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>        


        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">                    
                    <?php
                    $status = [
                        '1' => 'Proses',
                        '2' => 'Dikembalikan',
                        '3' => 'Selesai',
                    ];
                    ?>
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
                            'heading' => 'No Surat # ' . $model->nomor_permohonan,
                            'type' => DetailView::TYPE_INFO,
                        ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                        'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                        'attributes' => [

                            'nomor_permohonan',
                            'tgl_permohonan',
                            'hal_permohonan:ntext',
                            'tgl_masuk',
                            'tgl_dikembalikan',
                            'tgl_terima_lengkap',
                            'nama_pemohon',
                            'alamat_pemohon',
                            'kota_pemohon',
                            'no_telp_petugas_ppjk',
                            'email_pemohon:email',
                            'nama_petugas_ppjk',
                            [
                                'attribute' => 'petugas_penerima_dok',
                                'value' => $model->petugasTerima->name,
                            ],
                            'nip_petugas_penerima',
                            [
                                'attribute' => 'status_lengkap',
                                'value' => ($model->status_lengkap == 1) ? 'Lengkap' : 'Kurang Lengkap'
                            ],
                            [
                                'attribute' => 'status_penyelesaian',
                                'value' => $status[$model->status_penyelesaian]
                            ],
                            'ur_kekurangan:ntext',
                            ],
                    ])
                    ?>


                </div>
                <div class="col-md-6">
                    
                                <?php
                                $pejabat = \yii\helpers\ArrayHelper::map(
                                                \backend\models\Penandatangan::find()->all(), 'id', 'jabatan', 'namapejabat');
                                $status = \yii\helpers\ArrayHelper::map(
                                                \backend\models\StatusBcf15::find()->all(), 'id', 'nmstatus');
                                $gridColumns = [
                                    [
                                        'class' => 'kartik\grid\ExpandRowColumn',
                                        'value' => function ($model, $key, $index, $column) {
                                            return GridView::ROW_COLLAPSED;
                                        },
                                        'detail' => function ($model, $key, $index, $column) {
                                            $modelcont = (new \yii\db\Query())
                                                    ->select([ 'uc.ukuran', 'type', 'namatps', 'alamattps', 'namatpp', 'alamattpp', 'nomor_pk'
                                                    ])
                                                    ->from(' bcf15_detail_cont dc')
                                                    ->join('JOIN', 'bcf15_detail ts', 'ts.id = dc.bcf15_detail_id')
                                                    ->join('JOIN', 'type_cont ty', 'ty.id = dc.jenis_pk')
                                                    ->join('JOIN', 'ukuran_cont uc', 'uc.id = dc.ukuran')
                                                    ->join('JOIN', 'tps tp', 'tp.id = ts.tps_id')
                                                    ->join('JOIN', 'tpp tk', 'tk.id = ts.tpp_id')
                                                    ->where(['bcf15_id' => $model->bcf15_id, 'bcf15_detail_id' => $model->id])
                                                    ->all();

                                            return YII::$app->controller->renderPartial('_detail-bcf15', [
                                                        'modelcont' => $modelcont,
                                                        
                                                    ]);
                                        },
                                    ],
                                    'bcf15pos',
                                    'bc11no',
                                    'bc11tgl',
//      
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
                                        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> BCF 1.5 No : ' .$model->viewBcf->bcf15no. '</h3>',
                                    ],
// your toolbar can include the additional full export menu
                                    'toolbar' => [

                                        $fullExportMenu,
                                        ['content' =>
//                Html::button('<i class="glyphicon glyphicon-plus"></i>  Create BCF 1.5', ['value' => Url::to('index.php?r=bcf15/bcf15/skep_create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
//                                Html::button('<i class="glyphicon glyphicon-plus"></i>  Buat Logbook', ['value' => Url::to('index.php?r=logbook/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
//                                            Html::a('<i class="glyphicon glyphicon-plus"></i>  Rekam Permohonan', ['frontdesk/create'], ['class' => 'btn btn-success']) . ' ' .
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


                </div>
            </div>
        </div>
    </div>
</div>

</div>


