<?php

 use yii\helpers\Html; ?>
<?php
$bcfbaru = \backend\models\Bcf15::find()->where(['status_bcf15' => ['3']])->count();
$bcterima = backend\models\SkepPenetapanBcf15::find()->where(['status_skep' => ['konsep']])->count();
$tpp = \backend\models\Bcf15Detail::find()->where(['tpp_id' => ['1'],'status_bcf15_detail' => ['2']])->count();
$srtpmdh = \backend\models\Bcf15SuratPemindahan::find()->where(['status_surat' => ['konsep']])->count();
$stilltps = \backend\models\Bcf15Detail::find()->where(['masuk_tpp' => ['0'],'status_bcf15_detail' => ['2']])->count();
?>
<li class="treeview active">
    <?= Html::a('<i class="fa fa-truck"></i> <span>' . ('Penarikan') . '</span> <i class="fa fa-angle-left pull-right"></i>', ['/default/index']) ?>
    <ul class="treeview-menu">
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Surat Pengantar <span class="label label-warning"> ' . ($bcfbaru) . ' </span> '), ['/penarikan/bcf15/index']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Skep Penetapan <span class="label label-warning"> ' . ($bcterima) . ' </span> '), ['/penarikan/bcf15/penetapan']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Penetapan TPP <span class="label label-warning"> ' . ($tpp) . ' </span> '), ['/penarikan/pemindahan-bcf15/index']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Surat Pemindahan <span class="label label-warning"> ' . ($srtpmdh) . ' </span> '), ['/penarikan/surat-pemindahan/index']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Masih di TPS <span class="label label-warning"> ' . ($stilltps) . ' </span> '), ['/penarikan/hanggar/still-in-tps']) ?>
        </li>
        
        <li>
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Dashboard Monitoring'), ['/penarikan/bcf15/dashboard']) ?>
        </li>            
        





    </ul>
</li>
