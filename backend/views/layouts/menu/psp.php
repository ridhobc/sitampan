<?php

use yii\helpers\Html; ?>
    <?php $pspbaru = \backend\models\Psp::find()->where(['idpspstatus' => ['1']])->count(); ?>
<li class="treeview active">
        <?= Html::a('<i class="fa fa-calendar-check-o"></i> <span>' . ('PSP') . '</span> <i class="fa fa-angle-left pull-right"></i>', ['/psp/dashboard']) ?>
    <ul class="treeview-menu">
        
        <?php
        if (Yii::$app->user->can('level-admin-psp')) {
            ?>
            <li>
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Koordinator '), ['/psp/koordinator']) ?>

            </li>
            <?php } else { ?>
            <li>
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Dashboard'), ['/psp/dashboard']) ?>
            </li>
        <?php } ?>
        
        <li>
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'PSP'), ['/psp/index']) ?>
        </li>
        <li>
<?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Disposisi <span class="label label-warning"> ' . ($pspbaru) . ' </span>'), ['/psp/baru']) ?>

        </li>



    </ul>
</li>
