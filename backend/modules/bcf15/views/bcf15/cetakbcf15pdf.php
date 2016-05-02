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

// FUNGSI BULAN DALAM BAHASA INDONESIA
function bulan($bln){
$bulan = $bln;
Switch ($bulan){
 case 1 : $bulan="Januari";
 Break;
 case 2 : $bulan="Februari";
 Break;
 case 3 : $bulan="Maret";
 Break;
 case 4 : $bulan="April";
 Break;
 case 5 : $bulan="Mei";
 Break;
 case 6 : $bulan="Juni";
 Break;
 case 7 : $bulan="Juli";
 Break;
 case 8 : $bulan="Agustus";
 Break;
 case 9 : $bulan="September";
 Break;
 case 10 : $bulan="Oktober";
 Break;
 case 11 : $bulan="November";
 Break;
 case 12 : $bulan="Desember";
 Break;
 }
return $bulan;
}



?>
<div class="training-index ">

    <div class="row">
        <div class="col-sm-12">

            <div class="col-sm-6 right-side">
                <table class="table table-mailbox table-row " style="font-size: 12px">
                    <tr>
                        <td colspan="3" align="center"><h5 >DAFTAR BARANG-BARANG IMPOR YANG DINYATAKAN SEBAGAI BARANG IMPOR TIDAK DIKUASAI</h5></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td width="10%">Nomor</td><td width="20%">: <?php echo $model->bcf15no ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>Tanggal</td><td>:  <?php $tgl=  explode("-",$model->bcf15tgl); $tahun=$tgl[0];$bulan = bulan(date($tgl[1])); $tanggal=$tgl[2]; echo $tanggal ?> <?php echo $bulan ?> <?php echo $tahun ?></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <table class="table table-cell table-bordered"   style="font-size:10px">
        <thead>
            <tr>
                <th rowspan="2" align="center">No</th>
                <th colspan="3" align="center">BC 1.1</th>
                <th rowspan="2" align="center">Nama Sarkut</th>

                <th colspan="2" align="center">Nomor dan Merk PK</th>
                <th colspan="2" align="center">Waktu Timbun</th>
                <th rowspan="2" align="center">Uraian Barang</th>
                <th rowspan="2" align="center">Keterangan</th>
                <th rowspan="2" align="center">Kade</th>

            </tr>
            <tr>
                <th align="center">No</th>
                <th align="center">Tanggal</th>
                <th align="center">Pos /Subpos</th>
                <th align="center">Jumlah</th>
                <th align="center">Nomor PK</th>
                <th align="center">Tgl Timbun</th>
                <th align="center">Lama Timbun</th>


            </tr>
        </thead>
        <tbody>
            <?php if ($modelDetailBcf15) : ?>
                <?php foreach ($modelDetailBcf15 as $k => $v) : ?>
                    <tr>
                        <td><?= ($k + 1); ?></td>
                        <td><?= $v['bc11no']; ?></td>
                        <td><?= $v['bc11tgl']; ?></td>
                        <td><?= $v['bc11pos']; ?>/ <?= $v['bc11subpos']; ?></td>
                        <td><?= $v['nama_sarkut']; ?></td>
                        <td>
                            <?= $v['total_cont']; ?>                       
                        </td>
                        <td width="22%">
                            <table  border="0" >
                                <?=
                                $id = $v['id'];
                                $modelDetailBcf15Cont = (new \yii\db\Query())
                                        ->select(['sm.id', 'nomor_pk', 'keterangan', 'jenis_pk', 'uc.ukuran', 'type', 'uc.id'])
                                        ->from('bcf15_detail_cont sm')
                                        ->join('JOIN', 'bcf15_detail cs', 'cs.id = sm.bcf15_detail_id ')
                                        ->join('JOIN', 'type_cont tc', 'tc.id = sm.jenis_pk')
                                        ->join('JOIN', 'ukuran_cont uc', 'uc.id = sm.ukuran')
                                        ->where([
                                            'cs.id' => $id
                                        ])
                                        ->all();
                                if ($modelDetailBcf15Cont) :
                                    ?>
                                    <?php foreach ($modelDetailBcf15Cont as $k1 => $v1) : ?>
                                        <tr>
                                            <td><?= $v1['nomor_pk']; ?></td>                                

                                            <td><?= $v1['ukuran']; ?></td>
                                            <td><?= $v1['type']; ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="text-danger text-center"><?php echo Yii::t('app', 'No results found.'); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </td>
                        <td><?= $v['tgl_timbun']; ?></td>
                        <td><?php 
                        $tglbc11=$v['bc11tgl'];
                        $tgltimbun=$v['tgl_timbun']; 
                        $datetime1 = new DateTime($tglbc11);
                        $datetime2 = new DateTime($tgltimbun);
                        $difference = $datetime1->diff($datetime2);
                        echo $difference->days;
                          ?></td>
                        <td>
                            <span><?= $v['uraian_brg']; ?></span><br/>
                            <span>Kemasan :<?= $v['jumlah_brg']; ?> <?= $v['satuan_brg']; ?> </span><br/>
                            <span>Bruto :<?= $v['berat_brg']; ?> </span>
                        </td>
                        <td>
                            <span><?= $v['consignee']; ?></span><br/>
                            <span><?= $v['alamat_consignee']; ?> <?= $v['kota_consignee']; ?> </span>
                        </td>
                        <td><?= $v['namatps']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="text-danger text-center"><?php echo Yii::t('app', 'No results found.'); ?></td>
                </tr>
            <?php endif; ?>
        </tbody>


    </table>

    <table class="table-condensed" border="0" >
        <?php if ($modelPenandatangan) : ?>
            <?php foreach ($modelPenandatangan as $k2 => $v2) : ?>
                <tr>
                    <td width="600px"></td><td><?= $v2['jabatan']; ?></td>                                                                          
                </tr>
                <tr>
                    <td width="600px"></td><td height="50px"></td>
                </tr>
                <tr>
                    <td width="600px"></td><td><?= $v2['namapejabat']; ?></td>                                                                          
                </tr>
                <tr>
                    <td width="600px"></td><td>NIP <?= $v2['nippejabat']; ?></td>                                                                          
                </tr>

            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-danger text-center"><?php echo Yii::t('app', 'No results found.'); ?></td>
            </tr>
        <?php endif; ?>
    </table>




</div>


