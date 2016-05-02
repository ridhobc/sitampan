
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
                    <td colspan="4" class="text text-uppercase" align="center" style="font-size:16px;font:arial;font-weight: bold"><?php echo $modelindetitas->kementerian ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" style="font-size:14px;font:arial"><?php echo $modelindetitas->eseloni ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" style="font-size:14px;font:arial"><?php echo $modelindetitas->kanwil ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" style="font-size:16px;font:arial"><?php echo $modelindetitas->kppbc ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="5" style="font-size:13px;font:arial"></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" style="font-size:16px;font:arial">KEPUTUSAN KEPALA <?php echo $modelindetitas->kppbc ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="5" style="font-size:13px;font:arial"></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" style="font-size:16px;font:arial">NOMOR KEP-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $model->skep_no ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="5" style="font-size:13px;font:arial"></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" style="font-size:16px;font:arial">T E N T A N G</td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="5" style="font-size:13px;font:arial"></td>
                </tr>

                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" style="font-size:16px;font:arial">PENETAPAN BARANG YANG DINYATAKAN TIDAK DIKUASAI  </td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="5" style="font-size:13px;font:arial"></td>
                </tr>

                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" style="font-size:16px;font:arial">KEPALA <?php echo $modelindetitas->kppbc ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="5" style="font-size:13px;font:arial"></td>
                </tr>                
                <tr>
                    <td class="text" valign="top" align="left" style="font-size:13px;font:arial">Menimbang</td><td valign="top">:</td>
                    <td valign="top" style="font-size:13px;font:arial">a. </td>
                    <td class="text" align="justify" style="text-justify:distribute;font-size:13px;font:arial">
                        Bahwa di <span style="text-transform: capitalize"> <?php echo $modelindetitas->kppbc ?> </span> terdapat barang yang 
                        tidak dikeluarkan dari Tempat Penimbunan Sementara yang berada di dalam area pelabuhan dalam 
                        jangka waktu 30 (tiga puluh) hari sejak penimbunannya dan barang yang tidak dikeluarkan dari 
                        Tempat Penimbunan Sementara yang berada di luar area pelabuhan dalam jangka waktu 60 (enam puluh)
                        hari sejak penimbunannya;
                    </td>
                </tr>  
                <tr>
                    <td class="text" valign="top" align="left" style="font-size:13px;font:arial"></td><td valign="top">:</td>
                     <td valign="top" style="font-size:13px;font:arial">b. </td>
                    <td class="text" align="justify" style="text-justify:distribute;font-size:13px;font:arial">
                        Bahwa berdasarkan pertimbangan sebagaimana dimaksud pada huruf a, serta dalam rangka 
                        melaksanakan ketentuan pasal 2 ayat (1) Peraturan Menteri Keuangan Nomor 62/PMK.04/2011 
                        tentang Penyelesaian Terhadap Barang yang Dinyatakan Tidak Dikuasai, Barang yang Dikuasai 
                        Negara dan Barang yang Menjadi Milik Negara, perlu dilakukan penetapan Barang yang Dinyatakan 
                        Tidak Dikuasai;
                    </td>
                </tr>
                <tr>
                    <td class="text" valign="top" align="left" style="font-size:13px;font:arial">Mengingat</td><td valign="top">:</td>
                    <td valign="top">1. </td>
                    <td class="text" align="justify" style="text-justify:distribute;font-size:13px;font:arial">
                        Undang-undang Nomor 10 Tahun 1995 tentang Kepabeanan sebagaimana telah diubah 
                        dengan Undang-Undang No. 17 Tahun 2006;
                    </td>
                </tr>  
                <tr>
                    <td class="text" valign="top" align="left" style="font-size:13px;font:arial"></td><td valign="top">:</td>
                    <td valign="top">2. </td>
                    <td class="text" align="justify" style="text-justify:distribute;font-size:13px;font:arial">
                        Peraturan Menteri Keuangan Nomor 62/PMK.04/2011 tentang Penyelesaian terhadap Barang yang Dinyatakan Tidak 
                        Dikuasai, Barang Yang Dikuasai Negara, dan Barang yang Menjadi Milik Negara;
                    </td>
                </tr>
                <tr>
                    <td class="text" valign="top" align="left" style="font-size:13px;font:arial"></td><td valign="top">:</td>
                    <td valign="top">3. </td>
                    <td class="text" align="justify" style="text-justify:distribute;font-size:13px;font:arial">
                        Keputusan Menteri Keuangan Nomor 263/KMK.05/1996 Tentang Buku Catatan Pabean
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="1.5" style="font-size:13px;font:arial"></td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" style="font-size:13px;font:arial">M E M U T U S K A N</td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="1.5" style="font-size:13px;font:arial"></td>
                </tr>
                <tr>
                    <td class="text" valign="top" align="left" style="font-size:13px;font:arial">Menetapkan</td><td valign="top">:</td>
                    <td valign="top"> </td>
                    <td class="text" align="justify" style="text-transform: uppercase;text-justify:distribute;font-size:13px;font:arial">
                        KEPUTUSAN <?php echo $modelindetitas->kppbc ?> TENTANG PENETAPAN BARANG YANG DINYATAKAN TIDAK DIKUASAI
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="5" style="font-size:13px;font:arial"></td>
                </tr>
                <tr>
                    <td class="text" valign="top" align="left" style="font-size:13px;font:arial">PERTAMA</td><td valign="top">:</td>
                    <td valign="top"></td>
                    <td class="text" align="justify" style="text-justify:distribute;font-size:13px;font:arial">
                        Menetapkan barang sebagaimana tercantum dalam lampiran Keputusan ini menjadi Barang Yang Dinyatakan Tidak Dikuasai. 
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="5" style="font-size:13px;font:arial"></td>
                </tr>
                <tr>
                    <td class="text" valign="top" align="left" style="font-size:13px;font:arial">KEDUA</td><td valign="top">:</td>
                    <td valign="top"></td>
                    <td class="text" align="justify" style="text-justify:distribute;font-size:13px;font:arial">
                        Keputusan ini mulai berlaku sejak tanggal ditetapkan, dengan catatan apabila dikemudian hari terdapat kekeliruan akan diadakan pembetulan seperlunya.
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="5" style="font-size:13px;font:arial"></td>
                </tr>
                <tr>
                    <td class="text" valign="top" align="left" style="font-size:13px;font:arial">KEDUA</td><td valign="top">:</td>
                    <td valign="top"></td>
                    <td class="text" align="justify" style="text-justify:distribute;font-size:13px;font:arial">
                        Salinan Keputusan ini disampaikan kepada :<br/>
                        1.	Direktur Jenderal Bea dan Cukai;<br/>
                        2.	Kepala Kantor Wilayah DJBC Jawa Timur I;<br/>
                        3.	Kepala Kantor Pelayanan Kekayaan Negara dan Lelang Surabaya;<br/>
                        4.	Pimpinan TPS PT Terminal Petikemas Surabaya.

                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text text-uppercase" align="center" height="5" style="font-size:13px;font:arial"></td>
                </tr>

            </table>

            <table style="text-transform: capitalize;font-size:13px;font:arial"  border="0" width="100%">
                <?php if ($modelPenandatangan) : ?>
                    <?php foreach ($modelPenandatangan as $k2 => $v2) : ?>
                        <tr>
                            <td width="300px"></td><td>Ditetapkan di <?php echo $model->skep_kota ?></td>                                                                          
                        </tr>
                         <tr>
                            <td width="200px"></td><td>Pada Tanggal <?php echo $model->skep_tgl ?></td>                                                                          
                        </tr>
                        <tr>
                            <td width="200px"></td><td><?= $v2['jabatan']; ?></td>                                                                          
                        </tr>
                        <tr>
                            <td ></td>
                            <td >
                                <br/><br/><br/><br/><br/>
                                                               
                            </td>
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
            
        </div>

    </div>


</div>

<!--<pagebreak style="size: landscape;page: land">
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
                <table style="font-size:13px" border="0" width="100%">
                    <tr >
                        <td width="50%" >Kepada  </td>
                        <td  class="text text-right"><?php //echo Yii::$app->formatter->asDate($model->tgl_sp)   ?></td>
                    </tr>
                    <tr >
                        <td >Yth <?php //echo $model->kepada_sp   ?></td>   
                        <td ></td>

                    </tr>
                    <tr >
                        <td height="40" colspan=2 align="center"></td>
                    </tr>
                    <tr>
                        <td  colspan=2 style="font-size:13px;font-weight: " align="center"><font style="text-decoration: underline;">&nbsp;&nbsp;   SURAT PENGANTAR &nbsp;&nbsp;  </font></td>
                    </tr>
                    <tr>
                        <td  colspan=2 style="font-size:13px" align="center">NOMOR : </td>
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
                    <td style="font-size:13px">1</td>
                    <td width="50%" style="font-size:13px">BCF 1.5 nomor : <?php // echo $model->bcf15no   ?><br/>
                        Tanggal <?php //echo Yii::$app->formatter->asDate($model->bcf15tgl)   ?>
                    </td>
                    <td style="font-size:13px">1 (Satu) Berkas</td>
                    <td style="font-size:13px;" align="justify" width="30%" height="200">Disampaikan kepada Saudara untuk penyelesaian lebih lanjut sesuai dengan Peraturan
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
</pagebreak>-->