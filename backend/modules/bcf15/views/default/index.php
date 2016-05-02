<?php

use yii\helpers\Html;
use backend\models\Bcf15;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

$this->title = Yii::t('app', 'Dashboard BCF 15');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".disp-count{cursor:default;} .disp-count:hover {background-color:none !important}");
?>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-folder-open"></i> <?php echo Yii::t('app', 'BCF 1.5'); ?></h3>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-folder-open"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'BCF 1.5 tahun ' . date('Y')), ['/surat-masuk/index']); ?></span>
                        <span class="edusec-link-box-number"><?= Bcf15::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['/course/courses/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-folder-open"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'BCF1.5  hari ini ' . date('Y')), ['/surat-masuk/index']); ?></span>
                        <span class="edusec-link-box-number"><?= Bcf15::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['/course/courses/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-folder-open"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Pencabutan tahun ' . date('Y')), ['/surat-masuk/index']); ?></span>
                        <span class="edusec-link-box-number"><?= Bcf15::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['/course/courses/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-folder-open"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Pencabutan hari ini ' . date('Y')), ['/surat-masuk/index']); ?></span>
                        <span class="edusec-link-box-number"><?= Bcf15::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['/course/courses/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div> <!-- /. End Row-->
        <div class="col-md-8">            
                <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-area-chart "></i> <?php echo Yii::t('app', 'Grafik Surat Masuk'); ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    
                </div>
            </div>       
            
        </div>
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo Yii::t('stu', 'Disposisi Terbanyak'); ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-list-ul"></i> <?php echo Yii::t('app', '10 Surat Masuk Terbaru'); ?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" title="Remove" data-toggle="tooltip" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        
                    </div>
                    
                </div>	


            </div>
        </div>

    </div><!-- /.box-body -->
</div>

