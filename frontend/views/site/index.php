<?php

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php
//    // to home atau web index
//    echo \yii\helpers\Url::home();
//
//    // to current controller
//    echo \yii\helpers\Url::to();
//
//    // to current controller action index
//    echo \yii\helpers\Url::to(['index']);
//    
//    // to person controller action index
//    echo \yii\helpers\Url::to(['person/index']);
//
//    // to person controller action index
//    // and add parameter nama dengan nilai hafid
//    echo \yii\helpers\Url::to(['person/index','nama'=>'hafid']);
//
//    // to home
//    echo \yii\helpers\Html::a('Home',\yii\helpers\Url::home());
//    // to google.com
//    echo \yii\helpers\Html::a('Google','http://www.google.com');
//    // to current controller
//    echo \yii\helpers\Html::a('Site','');
//    // to person controller, action index
//    echo \yii\helpers\Html::a('Person',['person/index']);
//
//    use \yii\helpers\Html;
//    use \yii\helpers\Url;
//    // to home
//    echo Html::a('Home',Url::home());
//    echo Html::a('Google','http://www.google.com');
//    echo Html::a('Site','');
//    echo Html::a('Person',['person/index']);
    ?>

    
    <div class="jumbotron">
        <h1>Selamat Datang!</h1>

        <p class="lead">Aplikasi Database IP.(Under Construct)</p>
       <?php 
       if (Yii::$app->user->isGuest) {
       echo \yii\helpers\Html::a('Anda Belum terdaftar? Daftar Lah','http://10.102.216.86/adminip/frontend/web/index.php?r=site%2Fsignup');  
       }else{
       echo \yii\helpers\Html::a('Rekam Surat','http://10.102.216.86/adminip/backend/web/index.php?r=surat-masuk%2Findex');
       }
       ?>
        
    </div>

    
</div>
