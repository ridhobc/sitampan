<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Dev Note';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-12">
            <h4>Todos</h4>
            <input type="checkbox"> Fungsionalitas CRUD  semua fitur <small>masih menggunakan tampilan default yii</small>  <br>
            - <input type="checkbox"> Kelola User <br>
            - <input type="checkbox" checked="checked"> Kelola Unit <br>
            - <input type="checkbox" checked="checked"> Kelola Teknisi <br>
            - <input type="checkbox" checked="checked"> Kelola Jenis Keluhan <br>
            - <input type="checkbox" checked="checked"> Kelola Pengaduan <br>
            -- <input type="checkbox" checked="checked"> Admin (disposisi) <br>
            -- <input type="checkbox" checked="checked"> Teknisi (respon) <br>
            -- <input type="checkbox" checked="checked"> User <br>
            <input type="checkbox"> Sempurnakan display field-field, termasuk halaman index <small>masih menggunakan default style</small> <br>
            - <input type="checkbox"> Kelola Pengaduan <br>
            -- <input type="checkbox"> Semua Pengaduan <br>
            -- <input type="checkbox"> Pengaduan Belum didisposisi <br>
            -- <input type="checkbox"> Pengaduan didisposisikan ke saya <br>
            -- <input type="checkbox"> Pengaduan Saya <br>
            <input type="checkbox"> Hak akses tiap-tiap fitur <br>
            <input type="checkbox"> Tampilan material design <br>
            <input type="checkbox"> Dokumentasi Pengembangan menggunakan Yii

        </div>
    </div>
</div>
