<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo Yii::t('stu', 'Disposisi Terbanyak'); ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th><?php echo Yii::t('app', 'No'); ?></th>
                                <th><?php echo Yii::t('app', 'Disposisi'); ?></th>

                                <th><?php echo Yii::t('app', 'Jumlah'); ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($stuCount) : ?>
                                <?php foreach ($stuCount as $k => $v) : ?>
                                    <tr>
                                        <td><?= ($k + 1); ?></td>
                                        <td><?= $v['nama']; ?></td>

                                        <td><?= $v['jumlah']; ?></td>
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
