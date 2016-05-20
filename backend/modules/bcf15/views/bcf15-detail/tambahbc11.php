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

$this->title = 'No BCF15 ' . $searchModel->bcf15->bcf15no;
$this->params['breadcrumbs'][] = ['label' => 'Tambah Detail BCF15', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */

/* @var $modelBcf15Detail app\modules\yii2extensions\models\Customer */

/* @var $modelBcf15DetailCont app\modules\yii2extensions\models\Address */


$js = '

jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {

    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {

        jQuery(this).html("Container: " + (index + 1))

    });

});


jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {

    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {

        jQuery(this).html("Container: " + (index + 1))

    });

});

';

$this->registerJs($js);
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-ship "></i> <?php echo Yii::t('app', 'Detail BCF15'); ?></h3>
        <?= Html::a('<i class="fa fa-home "></i> bcf15', ['bcf15/index'], ['class' => 'btn btn-primary']) ?>        
        <?= Html::a('<i class="fa fa-file-pdf-o "></i> cetak', ['bcf15/cetak-bcf15','id'=>$searchModel->bcf15->id], ['class' => 'btn btn-info']) ?>
        
    </div>
    <div class="box-body">

    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-ship"></i> Isikan Data BC11 dari BCF1.5 Nomor <?= Html::a($searchModel->bcf15->bcf15no, ['bcf15/view', 'id' => $searchModel->bcf15->id], ['class' => 'profile-link']) ?>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body payment-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($modelBcf15Detail, 'bcf15pos')->widget(\yii\widgets\MaskedInput::classname(), ['mask' => '99']) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($modelBcf15Detail, 'total_cont')->textInput(array('placeholder' => 'exp: 10 x 20"'),['maxlength' => true])?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">

                            <?= $form->field($modelBcf15Detail, 'bc11no')->widget(\yii\widgets\MaskedInput::classname(), ['mask' => '999999']) ?>
                        </div>
                        <div class="col-sm-6">
                            <?=
                            $form->field($modelBcf15Detail, 'bc11tgl')->widget(\kartik\widgets\DatePicker::className(), [
                                'options' => ['placeholder' => 'Tanggal BC 11..'],
                                'language' => 'id',
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'autoclose' => true,
                                    'todayHighlight' => true,
                                    'todayBtn' => true,
                                ]
                            ])
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">

                            <?= $form->field($modelBcf15Detail, 'bc11pos')->widget(\yii\widgets\MaskedInput::classname(), ['mask' => '9999']) ?>
                        </div>
                        <div class="col-sm-6">

                            <?= $form->field($modelBcf15Detail, 'bc11subpos')->widget(\yii\widgets\MaskedInput::classname(), ['mask' => '99']) ?>
                        </div>
                    </div>
                    <div class="row">                
                        <div class="col-sm-6">
                            <?= $form->field($modelBcf15Detail, 'nobl')->textInput(array('placeholder' => 'No BL atau AWB'),['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-6">
                            <?=
                            $form->field($modelBcf15Detail, 'tglbl')->widget(\kartik\widgets\DatePicker::className(), [
                                'options' => ['placeholder' => 'Tanggal BL/AWB..'],
                                'language' => 'id',
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'autoclose' => true,
                                    'todayHighlight' => true,
                                    'todayBtn' => true,
                                ]
                            ])
                            ?>
                           
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <?= $form->field($modelBcf15Detail, 'nama_sarkut')->textInput(array('placeholder' => 'Nama Kapal Pengangkut'),['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-6">
                            <?=
                            $form->field($modelBcf15Detail, 'tgl_timbun')->widget(\kartik\widgets\DatePicker::className(), [
                                'options' => ['placeholder' => 'Tanggal Timbun..'],
                                'language' => 'id',
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'autoclose' => true,
                                    'todayHighlight' => true,
                                    'todayBtn' => true,
                                ]
                            ])
                            ?>
                           
                        </div>

                    </div>
                    <div class="row">                
                        <div class="col-sm-4">
                            <?= $form->field($modelBcf15Detail, 'jumlah_brg')->textInput(array('placeholder' => 'Jumlah Barang'),['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($modelBcf15Detail, 'satuan_brg')->textInput(array('placeholder' => 'Satuan Barang'),['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($modelBcf15Detail, 'berat_brg')->textInput(array('placeholder' => 'Berat Bruto Barang'),['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">  
                        

                        <div class="col-md-12">
                            <?= $form->field($modelBcf15Detail, 'uraian_brg')->textarea(array('placeholder' => 'Uraian Barang'),['rows' => 3]) ?>
                        </div>

                    </div>
                    <div class="row">                
                        <div class="col-sm-12">
                            <?= $form->field($modelBcf15Detail, 'consignee')->textInput(array('placeholder' => 'Nama Importir/Penerima Barang'),['maxlength' => true]) ?>
                        </div>
                         </div> 
                    <div class="row">  
                        <div class="col-sm-8">
                            <?= $form->field($modelBcf15Detail, 'alamat_consignee')->textArea(array('placeholder' => 'Alamat Importir/penerima Barang'),['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($modelBcf15Detail, 'kota_consignee')->textInput(array('placeholder' => 'Kota Importir'),['maxlength' => true]) ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <?php
//= $form->field($model, 'training_id')->textInput()
                            $tpp = \yii\helpers\ArrayHelper::map(
                                            \backend\modules\setting\models\Tpp::findAll(1), 'id', 'namatpp');
                            
                            echo $form->field($modelBcf15Detail, 'tpp_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => $tpp,
                                'options' => [
                                    'placeholder' => 'Pilih TPP...',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <?php
//= $form->field($model, 'training_id')->textInput()
                            $tps = \yii\helpers\ArrayHelper::map(
                                            backend\modules\setting\models\Tps::find()->all(), 'id', 'namatps');
                            echo $form->field($modelBcf15Detail, 'tps_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => $tps,
                                'options' => [
                                    'placeholder' => 'Pilih TPS...',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ]);
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php
            DynamicFormWidget::begin([

                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 150, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelBcf15DetailCont[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nomor_pk',
                    'ukuran',
                    'jenis_pk',
                    'keterangan',
                ],
            ]);
            ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-truck"></i> Isikan Detail Container
                    <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Container</button>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body container-items"><!-- widgetContainer -->
                    <?php foreach ($modelBcf15DetailCont as $index => $modelBcf15DetailCont): ?>
                        <div class="item panel panel-danger"><!-- widgetBody -->
                            <div class="panel-heading">
                                <span class="panel-title-address">Container: <?= ($index + 1) ?></span>
                                <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (!$modelBcf15DetailCont->isNewRecord) {
                                    echo Html::activeHiddenInput($modelBcf15DetailCont, "[{$index}]id");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <?= $form->field($modelBcf15DetailCont, "[{$index}]nomor_pk")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php
                                        //= $form->field($model, 'training_id')->textInput()
                                        $uk = \yii\helpers\ArrayHelper::map(
                                                        \backend\models\UkuranCont::find()->all(), 'id', 'ukuran');
                                        echo $form->field($modelBcf15DetailCont, "[{$index}]ukuran")->dropDownList($uk, ['prompt' => 'pilih ukuran']
                                        );
                                        ?>                          
                                    </div>

                                    <div class="col-sm-3">

                                        <?php
                                        //= $form->field($model, 'training_id')->textInput()
                                        $uk = \yii\helpers\ArrayHelper::map(
                                                        \backend\models\TypeCont::find()->all(), 'id', 'type');
                                        echo $form->field($modelBcf15DetailCont, "[{$index}]jenis_pk")->dropDownList($uk, ['prompt' => 'jenis petikemas']
                                        );
                                        ?> 
                                    </div>
                                    <div class="col-sm-3">
                                        <?= $form->field($modelBcf15DetailCont, "[{$index}]keterangan")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div><!-- end:row -->   
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php DynamicFormWidget::end(); ?>

        </div>      


    </div>
    <div class="row">
        <div class="form-group">            

            <div class="col-sm-12">
                
                <?= Html::submitButton($modelBcf15DetailCont->isNewRecord ? 'Create' : 'Update', ['class' => $modelBcf15DetailCont->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<br/>
<div class="row">
    <div class="col-md-12">

        <?php
        Modal::begin([
            'header' => '<h4>Container</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
        $tps = \yii\helpers\ArrayHelper::map(
                        backend\modules\setting\models\Tps::find()->all(), 'id', 'namatps');
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
                    'bcf15pos',
                    'bc11no',
                    'bc11tgl',
                    'bc11pos',
                    'bc11subpos',
                    'nobl',
                    'uraian_brg',
                    'consignee',
                    
                    [
                        'attribute' => 'tps_id',
                        'filter' => $tps,
                        'value' => function ($data) {
                            return $data->tps->namatps;
                        }
                    ],
                    [
                        'header' => 'Tot Cont',
                        'format' => 'raw',
                        'value' => function ($data) {
                            $count = \backend\models\Bcf15DetailCont::find()
                                    ->where([
                                        'bcf15_detail_id' => $data->id,
                                    ])
                                    ->count();
                            $container = $count . '  Cont ';
                            if (!empty($count)) {
                                return Html::a($container, ['detcontainer', 'id' => $data->id], [
                                            'data-toggle' => "modal",
                                            'data-target' => "#modal",
                                            'data-title' => "Detail Data",
                                ]); // ubah ini
                            } else {
                                return "-";
                            }
                        }
                            ],
                            ['class' => 'yii\grid\ActionColumn',
                                'header' => 'action',
                                'template' => '{update} {view} '
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
                                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Data BC 11</h3>',
                            ],
// your toolbar can include the additional full export menu
                            'toolbar' => [

                                $fullExportMenu,
                                ['content' =>
//                                                Html::button('<i class="glyphicon glyphicon-plus"></i>  Create BCF 1.5', ['value' => Url::to(['index.php?r=bcf15-detail/tambahbc11', 'id' => $modelBcf15->id]), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
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
                        <?php
                        $this->registerJs("
    $('#modal').on('show.bs.modal', function (event) {
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


    </div>
</div>
</div>