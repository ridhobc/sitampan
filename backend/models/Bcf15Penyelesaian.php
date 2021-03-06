<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bcf15_penyelesaian".
 *
 * @property string $id
 * @property string $nomor_permohonan
 * @property string $tgl_permohonan
 * @property string $hal_permohonan
 * @property string $tgl_masuk
 * @property string $tgl_dikembalikan
 * @property string $tgl_terima_lengkap
 * @property string $nama_pemohon
 * @property string $alamat_pemohon
 * @property string $kota_pemohon
 * @property string $no_telp_petugas_ppjk
 * @property string $nama_petugas_ppjk
 * @property string $email_pemohon
 * @property string $petugas_penerima_dok
 * @property string $nip_petugas_penerima
 * @property string $status_lengkap
 * @property string $status_penyelesaian
 * @property string $ur_kekurangan
 * @property string $bcf15_detail_id
 * @property string $dok_pengeluaran_id
 * @property string $no_dok_pengeluaran
 * @property string $tgl_dok_pengeluaran
 * @property string $dok_pembayaran_id
 * @property string $no_dok_pembayaran
 * @property string $tgl_dok_pembayaran
 * @property string $jenis_penyelesaian_id
 * @property string $no_nd_btl
 * @property string $tgl_nd_btl
 * @property string $bbs_bm_pdri
 * @property string $uraian_bbs_bm_pdri
 *
 * @property DokPembayaran $dokPembayaran
 * @property DokPengeluaran $dokPengeluaran
 */
class Bcf15Penyelesaian extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'bcf15_penyelesaian';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nomor_permohonan', 'tgl_permohonan', 'hal_permohonan', 'nama_pemohon', 'alamat_pemohon', 'kota_pemohon'], 'required'],
            [['tgl_permohonan', 'tgl_masuk', 'tgl_dikembalikan', 'tgl_terima_lengkap', 'tgl_dok_pengeluaran', 'tgl_dok_pembayaran', 'tgl_nd_btl'], 'safe'],
            [['hal_permohonan', 'ur_kekurangan', 'uraian_bbs_bm_pdri'], 'string'],
            [['petugas_penerima_dok', 'bcf15_detail_id', 'dok_pengeluaran_id', 'dok_pembayaran_id', 'jenis_penyelesaian_id', 'bbs_bm_pdri','kasi_id'], 'integer'],
            [['nomor_permohonan', 'kota_pemohon', 'no_telp_petugas_ppjk', 'email_pemohon'], 'string', 'max' => 45],
            [['nama_pemohon', 'alamat_pemohon'], 'string', 'max' => 200],
            [['nama_petugas_ppjk', 'nip_petugas_penerima', 'no_dok_pembayaran', 'no_nd_btl'], 'string', 'max' => 100],
            [['status_lengkap', 'status_penyelesaian'], 'string', 'max' => 5],
            [['no_dok_pengeluaran'], 'string', 'max' => 150],
//            [['dok_pembayaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => DokPembayaran::className(), 'targetAttribute' => ['dok_pembayaran_id' => 'id']],
//            [['dok_pengeluaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => DokPengeluaran::className(), 'targetAttribute' => ['dok_pengeluaran_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nomor_permohonan' => 'Nomor',
            'tgl_permohonan' => 'Tanggal',
            'hal_permohonan' => 'Hal',
            'tgl_masuk' => 'Tgl Rekam',
            'tgl_dikembalikan' => 'Tgl Kembali ke pmohon',
            'tgl_terima_lengkap' => 'Tgl Terima Lengkap',
            'nama_pemohon' => 'Nama',
            'alamat_pemohon' => 'Alamat',
            'kota_pemohon' => 'Kota',
            'no_telp_petugas_ppjk' => 'No Telp',
            'nama_petugas_ppjk' => 'Nama Petugas Ppjk',
            'email_pemohon' => 'Email',
            'petugas_penerima_dok' => 'Petugas Penerima Dok',
            'nip_petugas_penerima' => 'Nip Petugas Penerima',
            'status_lengkap' => 'Kelengkapan Syarat',
            'status_penyelesaian' => 'Status Penyelesaian',
            'ur_kekurangan' => 'Ur Kekurangan',
            'bcf15_detail_id' => 'No Pos BCF 1.5',
            'dok_pengeluaran_id' => 'Dok Pengeluaran',
            'no_dok_pengeluaran' => 'No Dok Pengeluaran',
            'tgl_dok_pengeluaran' => 'Tgl Dok Pengeluaran',
            'dok_pembayaran_id' => 'Dok Pembayaran',
            'no_dok_pembayaran' => 'No Dok Pembayaran',
            'tgl_dok_pembayaran' => 'Tgl Dok Pembayaran',
            'jenis_penyelesaian_id' => 'Jenis Penyelesaian',
            'no_nd_btl' => 'Nomor ND',
            'tgl_nd_btl' => 'Tgl ND',
            'bbs_bm_pdri' => 'Pembebasan/Tdk dipungut',
            'uraian_bbs_bm_pdri' => 'Uraian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokPembayaran() {
        return $this->hasOne(DokPembayaran::className(), ['id' => 'dok_pembayaran_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokPengeluaran() {
        return $this->hasOne(DokPengeluaran::className(), ['id' => 'dok_pengeluaran_id']);
    }

    public function getBcf15Detail() {
        return $this->hasOne(Bcf15Detail::className(), ['id' => 'bcf15_detail_id']);
    }

    public function getViewBcf() {
        return $this->hasOne(ViewBcf15::className(), ['id' => 'bcf15_detail_id']);
    }

    public function getPetugasTerima() {
        return $this->hasOne(User::className(), ['id' => 'petugas_penerima_dok']);
    }

}
