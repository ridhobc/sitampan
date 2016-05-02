<?php

 use yii\helpers\Html; ?>
<?php $bcfbaru = \backend\models\Bcf15::find()->where(['status_bcf15' => ['1']])->count(); ?>
<?php $spbaru = \backend\models\Bcf15::find()->where(['status_bcf15' => ['2']])->count(); ?>
<li class="treeview active">
    <?= Html::a('<i class="fa fa-folder-open"></i> <span>' . ('Penetapan') . '</span> <i class="fa fa-angle-left pull-right"></i>', ['/default/index']) ?>
    <ul class="treeview-menu">
        <li>
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Dashboard'), ['/bcf15/bcf15/dashboard']) ?>
        </li>
        <li>
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Penetapan BCF 1.5 <span class="label label-warning"> ' . ($bcfbaru) . ' </span> '), ['/bcf15/bcf15/index']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Surat Pengantar BCF 1.5 <span class="label label-warning"> ' . ($spbaru) . ' </span> '), ['/bcf15/bcf15/surat-pengantar']) ?>
        </li>
        <li>
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Pejabat Ttd'), ['/bcf15/penandatangan/index']) ?>
        </li>
    </ul>
</li>
