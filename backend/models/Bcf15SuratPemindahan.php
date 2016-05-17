<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bcf15_surat_pemindahan".
 *
 * @property string $id
 * @property string $no_surat
 * @property string $tgl_surat
 * @property string $nd_dari_kasipab
 * @property string $nd_daftar_bcf15
 * @property string $nd_daftar_sp
 * @property string $nd_penandatangan_kasipab
 * @property string $surat_penandatangan_kakantor
 * @property string $no_nd_kasipab
 * @property string $tgl_nd_kasipab
 * @property string $status_surat
 * @property string $tps_id
 * @property string $tpp_id
 */
class Bcf15SuratPemindahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcf15_surat_pemindahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_surat', 'tgl_nd_kasipab'], 'safe'],
            [['tps_id', 'tpp_id'], 'integer'],
            [['no_surat', 'nd_penandatangan_kasipab', 'surat_penandatangan_kakantor', 'status_surat'], 'string', 'max' => 45],
            [['nd_dari_kasipab'], 'string', 'max' => 200],
            [['nd_daftar_bcf15', 'nd_daftar_sp'], 'string', 'max' => 250],
            [['no_nd_kasipab'], 'string', 'max' => 105],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_surat' => 'No Surat',
            'tgl_surat' => 'Tgl Surat',
            'nd_dari_kasipab' => 'Pengirim ND',
            'nd_daftar_bcf15' => 'Daftar BCF1.5',
            'nd_daftar_sp' => 'Daftar SP',
            'nd_penandatangan_kasipab' => 'Ttd Pengirim',
            'surat_penandatangan_kakantor' => 'TTD Ka Kantor',
            'no_nd_kasipab' => 'No ND',
            'tgl_nd_kasipab' => 'Tgl ND',
            'status_surat' => 'Status Surat',
            'tps_id' => 'Asal TPS',
            'tpp_id' => 'Tujuan TPP',
        ];
    }
    
     public function getBcf15s()
    {
        return $this->hasMany(Bcf15::className(), ['bcf15_surat_pemindahan_id' => 'id']);
    }
    public function getPenandatangan()
    {
        return $this->hasOne(Penandatangan::className(), ['id' => 'surat_penandatangan_kakantor']);
    }
}
