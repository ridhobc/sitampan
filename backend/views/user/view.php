<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php
    $agama = [
                        '1' => 'Islam',
                        '2' => 'Kristen',
                        '3' => 'Kristen Protestan',
                        '4' => 'Hindu',
                        '5' => 'Budha',
                        '6' => 'Lainnya'
                    ];
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'name',
            [
                'attribute'=>'gender',
                'value'=>($model->gender==1)?'Pria':'Wanita'
            ],
            
            'born',
            'birthday',
            'address:ntext',
            'phone',
            'email:email',
            //'religion_id',
            [
                'attribute'=>'religion_id',
                'value'=>$agama[$model->religion_id]
            ],
            
            'role',
            //'status',
            [
                'attribute'=>'status',
                'value'=>($model->status==10)?'Aktif':'Banned'
            ],
            //'created_at',
            [
                'attribute'=>'created_at',
                'format'=>['date','php: d M Y h:i:s']
            ],
            //'updated_at',
            [
                'attribute'=>'updated_at',
                'format'=>['date','php: d M Y h:i:s']
            ],
        ],
    ]) ?>

</div>
