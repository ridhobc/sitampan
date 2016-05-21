<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-calendar"></i> <?php echo Yii::t('stu', 'BCF1.5'); ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th><?php echo Yii::t('app', 'No'); ?></th>
                                <th><?php echo Yii::t('app', 'BCF 1.5'); ?></th>
                                <th><?php echo Yii::t('app', 'Tgl'); ?></th>
                                <th><?php echo Yii::t('app', 'No Pos'); ?></th>
                                <th><?php echo Yii::t('app', 'BC 11/Pos'); ?></th>
                                <th><?php echo Yii::t('app', 'Kapal'); ?></th>  
                                <th><?php echo Yii::t('app', 'Importir'); ?></th>
                                <th><?php echo Yii::t('app', 'No SP'); ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($modelbcf15) : ?>
                                <?php foreach ($modelbcf15 as $k => $v) : ?>
                                    <tr>
                                        <td><?= ($k + 1); ?></td>
                                        <td><?= $v['bcf15no']; ?></td>
                                        <td><?= $v['bcf15tgl']; ?></td>
                                        <td><?= $v['bcf15pos']; ?></td>
                                        <td><?= $v['bc11no']; ?>/<?= $v['bc11pos']; ?></td>
                                        <td><?= $v['nama_sarkut']; ?></td>
                                        <td><?= $v['consignee']; ?></td>
                                        <td><?= $v['no_sp']; ?>/<?= $v['tgl_sp']; ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-danger text-center"><?php echo Yii::t('app', 'No results found.'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-bookmark"></i> <?php echo Yii::t('stu', 'SKEP'); ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th><?php echo Yii::t('app', 'No'); ?></th>
                                <th><?php echo Yii::t('app', 'SKEP'); ?></th>
                                <th><?php echo Yii::t('app', 'Tgl'); ?></th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($modelskep) : ?>
                                <?php foreach ($modelskep as $k => $v) : ?>
                                    <tr>
                                        <td><?= ($k + 1); ?></td>
                                        <td><?= $v['skep_no']; ?></td>
                                        <td><?= $v['skep_tgl']; ?></td>


                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-danger text-center"><?php echo Yii::t('app', 'No results found.'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-cubes"></i> <?php echo Yii::t('stu', 'Container'); ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th><?php echo Yii::t('app', 'No'); ?></th>
                                <th><?php echo Yii::t('app', 'BCF15'); ?></th>
                                <th><?php echo Yii::t('app', 'Container'); ?></th>
                                <th><?php echo Yii::t('app', 'Size'); ?></th>
                                <th><?php echo Yii::t('app', 'Tipe'); ?></th>
                                <th><?php echo Yii::t('app', 'TPS'); ?></th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($modelcont) : ?>
                                <?php foreach ($modelcont as $k => $v) : ?>
                                    <tr>
                                        <td><?= ($k + 1); ?></td>
                                        <td><?= $v['bcf15no']; ?></td>
                                        <td><?= $v['nomor_pk']; ?></td>
                                        <td><?= $v['ukuran']; ?></td>
                                        <td><?= $v['type']; ?></td>
                                        <td><?= $v['namatps']; ?></td>


                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-danger text-center"><?php echo Yii::t('app', 'No results found.'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


