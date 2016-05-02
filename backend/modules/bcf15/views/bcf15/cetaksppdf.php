
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use backend\models\Bcf15DetailCont;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TrainingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cetak BCF 1.5';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="training-index ">
    <div class="row">
        <div class="col-sm-12">

            <table  border="0" >
                <tr >
                    <td rowspan="6" valign="top" >
                        <?php echo Html::img('@web/images/logo.jpg', ['width' => '120', 'height' => '110']) ?>
                    </td>
                    <td colspan="3" class="text text-uppercase" align="center" style="font-size:15px;font:arial;font-weight: bold"><?php echo $modelindetitas->kementerian ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text text-uppercase" align="center" style="font-size:13px;font:arial"><?php echo $modelindetitas->eseloni ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text text-uppercase" align="center" style="font-size:13px;font:arial"><?php echo $modelindetitas->kanwil ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text text-uppercase" align="center" style="font-size:14px;font:arial"><?php echo $modelindetitas->kppbc ?></td>
                </tr>
                <tr>
                    <td colspan="3"  align="center" style="font-size:11px" ><small><?php echo $modelindetitas->alamat1 ?></small></td>
                </tr>
                <tr>
                    <td colspan="3"  align="center"  style="font-size:11px"><small><?php echo $modelindetitas->alamat2 ?> <?php echo $modelindetitas->alamat3 ?></small></td>
                </tr>
                <tr>
                    <td colspan="4"  align="center"  style="font-size:11px"><font style="text-decoration: underline;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        </font></td>
                </tr>                   
            </table>
            <table style="font-size:12px" border="0" width="100%">
                <tr >
                    <td width="50%" >Kepada  </td>
                    <td  class="text text-right"><?php echo Yii::$app->formatter->asDate($model->tgl_sp) ?></td>
                </tr>
                <tr >
                    <td >Yth <?php echo $model->kepada_sp ?></td>   
                    <td ></td>

                </tr>
                <tr >
                    <td height="40" colspan=2 align="center"></td>
                </tr>
                <tr>
                    <td  colspan=2 style="font-size:13px;font-weight: " align="center"><font style="text-decoration: underline;">&nbsp;&nbsp;   SURAT PENGANTAR &nbsp;&nbsp;  </font></td>
                </tr>
                <tr>
                    <td  colspan=2 style="font-size:12px" align="center">NOMOR : <?php echo $model->no_sp ?></td>
                </tr>
            </table>

        </div>

    </div>

    <table class="table table-cell table-bordered"   style="font-size:10px">
        <thead>

            <tr>
                <th align="center" style="font-size:13px" >NO</th>
                <th align="center" style="font-size:13px">JENIS SURAT /BERKAS YANG DIKIRIM</th>
                <th align="center" style="font-size:13px">BANYAKNYA</th>
                <th align="center" style="font-size:13px">KETERANGAN</th>
            </tr>
        </thead>
        <tbody>

            <tr valign="top">
                <td style="font-size:12px">1</td>
                <td width="50%" style="font-size:12px">BCF 1.5 nomor : <?php echo $model->bcf15no ?><br/>
                    Tanggal <?php echo Yii::$app->formatter->asDate($model->bcf15tgl) ?>
                </td>
                <td style="font-size:12px">1 (Satu) Berkas</td>
                <td style="font-size:12px;" align="justify" width="30%" height="200">Disampaikan kepada Saudara untuk penyelesaian lebih lanjut sesuai dengan Peraturan
                    Menteri Keuangan nomor : PMK-62/PMK.04/2011 tanggal 30 Maret 2011
                </td>
            </tr>
        </tbody>


    </table>

    <table class="table-condensed" border="0" >
        <?php if ($modelPenandatangan) : ?>
            <?php foreach ($modelPenandatangan as $k2 => $v2) : ?>
                <tr>
                    <td width="400px"></td><td><?= $v2['jabatan']; ?></td>                                                                          
                </tr>
                <tr>
                    <td ></td><td height="100px">&nbsp;</td>
                </tr>
                <tr>
                    <td ></td><td><?= $v2['namapejabat']; ?></td>                                                                          
                </tr>
                <tr>
                    <td ></td><td>NIP <?= $v2['nippejabat']; ?></td>                                                                          
                </tr>

            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-danger text-center"><?php echo Yii::t('app', 'No results found.'); ?></td>
            </tr>
        <?php endif; ?>
    </table>
    
    <table>
        <tr><td height="40" colspan="3"></td></tr>
        <tr><td colspan="3" style="font-size:11px"><font style="text-decoration: underline;font-weight: bold">TANDA TERIMA</font></td></tr>
        <tr><td colspan="3" style="font-size:10px">Diterima Oleh :</td></tr>
       
        <tr><td style="font-size:10px">Nama / NIP</td><td>:</td><td></td></tr>
        <tr><td style="font-size:10px">Tanggal </td><td>:</td><td></td></tr>
        <tr><td style="font-size:10px">Tanda Tangan </td><td>:</td><td></td></tr>
    </table>
    
    <table class="table table-bordered">
        <tr>
            <td height="50" style="font-size:10px">
                Catatan : Harap setelah tanda terima diisi, lembar ke 2 dikirim kembali kepada Kami
            </td>
        </tr>
    </table>




</div>


