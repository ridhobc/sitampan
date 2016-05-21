<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$year = date('Y');
$this->title = 'Surat Pemindahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suratmasuk-arsip-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>
    <div class="container-fluid">
    </div>

    <?php
    Modal::begin([
        'header' => '<h4>Surat</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
        'options' => [
            'id' => 'modal',
            'tabindex' => false // important for Select2 to work properly
            ],
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();

    Modal::begin([
        'header' => '<h4>Buat Surat Pengantar</h4>',
        'id' => 'myModal',
        'size' => 'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();

    $gridColumns = [
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                $modelbcf15 = (new \yii\db\Query())
                        ->select(['tahun', 'bcf15no', 'bcf15tgl', 'penandatangan_id', 'bcf15pos', 'bc11no', 'bc11tgl', 'bc11pos', 'bc11subpos', 'nobl',
                            'tglbl', 'tgl_timbun', 'nama_sarkut', 'jumlah_brg', 'satuan_brg', 'uraian_brg', 'berat_brg', 'total_cont', 'consignee',
                            'alamat_consignee', 'kota_consignee', 'tpp_id', 'tps_id', 'ts.id', 'namatps', 'alamattps', 'namatpp', 'alamattpp',
                            'no_sp', 'tgl_sp', 'nama_sarkut'])
                        ->from('bcf15 bd')
                        ->join('JOIN', 'bcf15_detail ts', 'bd.id = ts.bcf15_id')
                        ->join('JOIN', 'tps tp', 'tp.id = ts.tps_id')
                        ->join('JOIN', 'tpp tk', 'tk.id = ts.tpp_id')
                        ->where(['bcf15_surat_pemindahan_id' => $model->id])
                        ->orderBy('bd.id', 'bcf15pos')
                        ->all();

                $modelcont = (new \yii\db\Query())
                        ->select(['tahun', 'bcf15no', 'bcf15pos', 'bc11no', 'bc11tgl', 'bc11pos', 'nomor_pk', 'nobl',
                            'uc.ukuran', 'type', 'namatps', 'alamattps', 'namatpp', 'alamattpp',
                            ])
                        ->from('bcf15 bd')
                        ->join('JOIN', 'bcf15_detail ts', 'bd.id = ts.bcf15_id')
                        ->join('JOIN', 'bcf15_detail_cont dc', 'ts.id = dc.bcf15_detail_id')       
                        ->join('JOIN', 'type_cont ty', 'ty.id = dc.jenis_pk')  
                        ->join('JOIN', 'ukuran_cont uc', 'uc.id = dc.ukuran')  
                        ->join('JOIN', 'tps tp', 'tp.id = ts.tps_id')
                        ->join('JOIN', 'tpp tk', 'tk.id = ts.tpp_id')
                        ->where(['bcf15_surat_pemindahan_id' => $model->id])
                       ->all();

                $modelskep = (new \yii\db\Query())
                        ->select(['skep_no', 'skep_tgl', 'skep_penetapan_bcf15_id'])
                        ->from('skep_penetapan_bcf15 bd')
                        ->join('JOIN', 'bcf15 ts', 'bd.id = ts.skep_penetapan_bcf15_id')                       
                        ->where(['bcf15_surat_pemindahan_id' => $model->id])
                        ->all();
                             

                return YII::$app->controller->renderPartial('_detail-bcf15', [
                            'modelbcf15' => $modelbcf15,
                            'modelskep' => $modelskep,
                            'modelcont' => $modelcont,
                        ]);
            },
        ],
        'no_nd_kasipab',
        'tgl_nd_kasipab',
        'no_surat',
        'tgl_surat',
        [
            'header' => 'Total BCF1.5',
            'format' => 'raw',
            'value' => function ($data) {
                $count = backend\models\Bcf15::find()
                        ->where([
                            'bcf15_surat_pemindahan_id' => $data->id,
                        ])
                        ->count();
                $bcf15 = $count;
                if (!empty($count)) {
                    return $bcf15;
                } else {
                    return "-";
                }
            }
        ],
        'nd_daftar_bcf15',
        'status_surat',
        [
            'header' => 'Kepala Kantor(ttd)',
//            'filter' => $pejabat,
            'value' => function ($data) {
                return $data->penandatangan->namapejabat;
            }
        ],
        [
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a("<i class='fa fa-edit fa-2x'></i>", ['surat-pemindahan/update', 'id' => $data->id]);
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
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Surat</h3>',
        ],
// your toolbar can include the additional full export menu
        'toolbar' => [

            $fullExportMenu,
            ['content' =>
//                Html::button('<i class="glyphicon glyphicon-plus"></i>  Create Skep Penetapan', ['value' => Url::to('index.php?r=penarikan/skep-penetapan-bcf15/skep_create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-plus"></i>  Create Surat Pemindahan', ['surat-pemindahan/create'], ['class' => 'btn btn-success']) . ' ' .
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
<?php
$this->registerJs("
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title') 
        var href = button.attr('href') 
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");
?>