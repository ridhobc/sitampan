
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
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td colspan="2">Lampiran Surat Kepala <span style="text-transform: capitalize"><?php echo $modelIdentitas['kppbc']; ?></span></td>
                                              
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td width="10%">Nomor</td><td width="20%">: S-&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $modelskep->no_surat ?>/WBC.10/KPP.MP.01/2016</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>Tanggal</td><td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php $tgl=  explode("-",$modelskep->tgl_surat); $tahun=$tgl[0];$bulan = bulan(date($tgl[1]));  echo $bulan ?> <?php echo $tahun ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="left"><h5 >DAFTAR BARANG YANG DINYATAKAN TIDAK DIKUASAI</h5></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="left"><h5 ><?php echo $modelIdentitas['kppbc']; ?></h5></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="left"><h5 >TAHUN <?php echo date('Y'); ?></h5></td>
                    </tr>
                    

                    
                </table>
            </div>
        </div>

    </div>
    <table class="table table-cell table-bordered"   style="font-size:10px">
        <thead>
            <tr>
                <th rowspan="2" align="center">No</th>
                <th colspan="3" align="center">BCF 1.5</th>
                <th colspan="3" align="center">BC 1.1</th>
                <th rowspan="2" align="center">Nama Sarkut</th>

                <th colspan="2" align="center">Nomor dan Merk Kemasan</th>
               
                <th rowspan="2" align="center">Uraian Barang</th>
                <th rowspan="2" align="center">Keterangan</th>
                <th rowspan="2" align="center">Kade</th>
                <th rowspan="2" align="center">TPP Tujuan</th>

            </tr>
            <tr>
                <th align="center">No</th>
                <th align="center">Tanggal</th>
                <th align="center">Pos BCF 1.5</th>
                <th align="center">No</th>
                <th align="center">Tanggal</th>
                <th align="center">Pos /Subpos</th>
                <th align="center">Jumlah</th>
                <th align="center">Nomor PK</th>
                


            </tr>
            <tr>
                <th align="center">1</th>
                <th align="center">2</th>
                <th align="center">3</th>
                <th align="center">4</th>
                <th align="center">5</th>
                <th align="center">6</th>
                <th align="center">7</th>
                <th align="center">8</th>
                <th align="center">9</th>
                <th align="center">10</th>
                <th align="center">11</th>
                <th align="center">12</th>
                <th align="center">13</th>
                <th align="center">14</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($modelbcf15) : ?>
                <?php foreach ($modelbcf15 as $k => $v) : ?>
                    <tr>
                        <td><?= ($k + 1); ?></td>
                        <td><?= $v['bcf15no']; ?></td>
                        <td><?= $v['bcf15tgl']; ?></td>
                        <td><?= $v['bcf15pos']; ?></td>
                        <td><?= $v['bc11no']; ?></td>
                        <td><?= $v['bc11tgl']; ?></td>
                        <td><?= $v['bc11pos']; ?>/<?= $v['bc11subpos']; ?></td>
                         <td><?= $v['nama_sarkut']; ?></td>
                         <td><?= $v['total_cont']; ?></td>
                        <td >
                            
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
                                        <?= $v1['nomor_pk']; ?> <?= $v1['ukuran']; ?> <?= $v1['type']; ?><br/>                                
                                           

                                     
                                    <?php endforeach; ?>
                                
                                <?php endif; ?>
                         
                        </td>
                        
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
                        <td><?= $v['namatpp']; ?></td>
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


