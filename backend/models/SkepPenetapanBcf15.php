<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "skep_penetapan_bcf15".
 *
 * @property string $id
 * @property string $skep_no
 * @property string $skep_tgl
 * @property string $kepala_kantor
 * @property string $skep_kota
 * @property string $status_skep
 * @property string $daftar_bcf15
 * @property string $daftar_sp
 * @property string $kepala_seksi
 * @property string $tps_id
 *
 * @property Bcf15[] $bcf15s
 */
class SkepPenetapanBcf15 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skep_penetapan_bcf15';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skep_tgl'], 'safe'],
            [['skep_no'], 'string', 'max' => 100],
            [['kepala_kantor', 'skep_kota', 'status_skep', 'kepala_seksi', 'tps_id'], 'string', 'max' => 45],
            [['daftar_bcf15', 'daftar_sp'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skep_no' => 'Skep No',
            'skep_tgl' => 'Skep Tgl',
            'kepala_kantor' => 'Kepala Kantor',
            'skep_kota' => 'Skep Kota',
            'status_skep' => 'Status Skep',
            'daftar_bcf15' => 'Daftar Bcf15',
            'daftar_sp' => 'Daftar Sp',
            'kepala_seksi' => 'Kepala Seksi',
            'tps_id' => 'Tps ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
       public function getBcf15s()
    {
        return $this->hasMany(Bcf15::className(), ['skep_penetapan_bcf15_id' => 'id']);
    }
    public function getPenandatangan()
    {
        return $this->hasOne(Penandatangan::className(), ['id' => 'kepala_kantor']);
    }
}
