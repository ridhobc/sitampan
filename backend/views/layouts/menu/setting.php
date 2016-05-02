<?php use yii\helpers\Html; ?>
<li class="treeview active ">
	<?= Html::a('<i class="fa fa-cog"></i> <span>'.('Setting').'</span> <i class="fa fa-angle-left pull-right"></i>', ['/default/index'])  ?>
        <ul class="treeview-menu">
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> '.Yii::t('app', 'Dashboard'), ['/bcf15/bcf15/dashboard'])  ?>
	    </li>
            <li>
		<?= Html::a('<i
                    class="fa fa-angle-double-right"></i> '.Yii::t('app', 'Identitas Kantor'), ['/setting/identitas-kantor/view', 'id'=>'1'])  ?>
	    </li>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> '.Yii::t('app', 'TPP'), ['/setting/tpp/index'])  ?>
	    </li>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> '.Yii::t('app', 'TPS'), ['/setting/tps/index'])  ?>
	    </li>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> '.Yii::t('app', 'Type Container'), ['/setting/type-cont/index'])  ?>
	    </li>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> '.Yii::t('app', 'Ukuran Container'), ['/setting/ukuran-cont/index'])  ?>
	    </li>
            
            
            
	
	   
        </ul>
</li>
