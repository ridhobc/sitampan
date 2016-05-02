<?php

 use yii\helpers\Html; ?>
<?php
$bcfbaru = \backend\models\Bcf15::find()->where(['status_bcf15' => ['3']])->count();
$bcterima = \backend\models\Bcf15::find()->where(['status_bcf15' => ['4']])->count();
$skep = \backend\models\Bcf15::find()->where(['status_bcf15' => ['5']])->count();
?>
<li class="treeview active">
    <?= Html::a('<i class="fa fa-folder-open"></i> <span>' . ('Penarikan') . '</span> <i class="fa fa-angle-left pull-right"></i>', ['/default/index']) ?>
    <ul class="treeview-menu">
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Surat Pengantar <span class="label label-warning"> ' . ($bcfbaru) . ' </span> '), ['/penarikan/bcf15/index']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Skep Penetapan <span class="label label-warning"> ' . ($bcterima) . ' </span> '), ['/penarikan/bcf15/penetapan']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Pemindahan BCF 1.5 <span class="label label-warning"> ' . ($skep) . ' </span> '), ['/penarikan/pemindahan-bcf15/index']) ?>
        </li>
        <li>
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Monitoring'), ['/penarikan/bcf15/dashboard']) ?>
        </li>            
        <li>
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Progres Penarikan'), ['/penarikan/bcf15/btl']) ?>
        </li>





    </ul>
</li>
