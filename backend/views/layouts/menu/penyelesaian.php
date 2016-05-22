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
    <?= Html::a('<i class="fa fa-truck"></i> <span>' . ('Penyelesaian') . '</span> <i class="fa fa-angle-left pull-right"></i>', ['/default/index']) ?>
    <ul class="treeview-menu">
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Rekam Permohonan '), ['/penyelesaian/frontdesk/create']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'List Permohonan '), ['/penyelesaian/frontdesk/index']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Kurang Syarat'), ['/penarikan/bcf15/index']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Lengkap'), ['/penarikan/bcf15/index']) ?>
        </li>
        
                 
        





    </ul>
</li>
