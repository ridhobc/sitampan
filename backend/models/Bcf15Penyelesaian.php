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
 */
class Bcf15Penyelesaian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcf15_penyelesaian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_permohonan', 'tgl_permohonan', 'hal_permohonan',  'nama_pemohon', 'alamat_pemohon', 'kota_pemohon'], 'required'],
            [['tgl_permohonan', 'tgl_masuk', 'tgl_dikembalikan', 'tgl_terima_lengkap'], 'safe'],
            [['hal_permohonan', 'ur_kekurangan'], 'string'],
            [['petugas_penerima_dok'], 'integer'],
            [['nomor_permohonan', 'kota_pemohon', 'no_telp_petugas_ppjk', 'email_pemohon'], 'string', 'max' => 45],
            ['email_pemohon','email'],
            
            [['nama_pemohon', 'alamat_pemohon'], 'string', 'max' => 200],
            [['nama_petugas_ppjk', 'nip_petugas_penerima'], 'string', 'max' => 100],
            [['status_lengkap', 'status_penyelesaian'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
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
        ];
    }
}
