<?php

 use yii\helpers\Html; ?>
<?php
$kurangsyarat = backend\models\Bcf15Penyelesaian::find()->where(['status_penyelesaian' => ['2']])->count();
$proseslengkap = backend\models\Bcf15Penyelesaian::find()->where(['status_penyelesaian' => ['1']])->count();

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
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Kurang Syarat <span class="label label-warning"> ' . ($kurangsyarat) . ' </span> '), ['/penyelesaian/frontdesk/lengkap-tdk']) ?>
        </li>
        <li>		
            <?= Html::a('<i class="fa fa-angle-double-right"></i> ' . Yii::t('app', 'Lengkap <span class="label label-warning"> ' . ($proseslengkap) . ' </span> '), ['/penyelesaian/frontdesk/lengkap']) ?>
        </li>
        
                 
        





    </ul>
</li>
