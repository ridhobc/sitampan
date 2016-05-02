<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->kppbc;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuration'), 'url' => ['/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Identitas Kantor'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-cog"></i> <?php echo Yii::t('app', 'Set Up Identitas Kantor'); ?></h3>
    </div>
    <div class="box-body">
        <div class="col-xs-12">
            <div class="col-lg-8 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-search"></i> <?php echo Yii::t('app', 'Identitas Setup Details') ?></h3></div>
            <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
                <div class="col-xs-4 left-padding">

                </div>
                <div class="col-xs-4 ">

                </div>
                <div class="col-xs-4 ">
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-block btn-info']) ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="box box-primary view-item">
                <div class="organization-view">
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'options' => ['class' => 'table  detail-view'],
                        'attributes' => [
                            'kementerian',
                            'eseloni',
                            'kanwil',
                            'kppbc',
                            'alamat1',
                            'alamat2',
                            'alamat3',
                            [
                'attribute'=>'created_at',
                'format'=>['date','php:d M Y h:i:s']
            ],
            
            //'create_by',
            [
                'attribute'=>'created_by',
                'value'=>$model->userCreated->name,
            ],
            [
                'attribute'=>'updated_at',
                'format'=>['date','php:d M Y h:i:s']
            ],
            
            [
                'attribute'=>'updated_by',
                'value'=>$model->userUpdated->name,
            ],
                            
                        ],
                    ])
                    ?>

                </div></div></div>
    </div>
</div>

