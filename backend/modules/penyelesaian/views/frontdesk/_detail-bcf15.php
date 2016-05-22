<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="container">
    <div class="row">
       
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header border-1">
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
                               
                                <th><?php echo Yii::t('app', 'Container'); ?></th>
                                <th><?php echo Yii::t('app', 'Size'); ?></th>
                                <th><?php echo Yii::t('app', 'Tipe'); ?></th>
                                <th><?php echo Yii::t('app', 'TPS'); ?></th>
                                <th><?php echo Yii::t('app', 'TPP'); ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($modelcont) : ?>
                                <?php foreach ($modelcont as $k => $v) : ?>
                                    <tr>
                                        <td><?= ($k + 1); ?></td>
                                       
                                        <td><?= $v['nomor_pk']; ?></td>
                                        <td><?= $v['ukuran']; ?></td>
                                        <td><?= $v['type']; ?></td>
                                        <td><?= $v['namatps']; ?></td>
                                        <td><?= $v['namatpp']; ?></td>

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


