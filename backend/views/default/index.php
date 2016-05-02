<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Master Configuration');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i> <?php echo Yii::t('app', 'Master Configuration'); ?></h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-flag"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'User'), ['/user']); ?></span>
                        <span class="edusec-link-box-number"><?= backend\models\User::find()->where(['status' => 10])->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['/user/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-building-o"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Auto Number'), ['/auto-number']); ?></span>
                        <span class="edusec-link-box-number"><?= backend\models\AutoNumber::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['/auto-number/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div> <!-- /. End Row-->
        


    </div><!-- /.box-body -->
</div>



