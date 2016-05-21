<?php

namespace backend\modules\penarikan\models;

use Yii;
use backend\models\SkepPenetapanBcf15;
use backend\models\StatusBcf15;
use backend\models\Penandatangan;
/**
 * This is the model class for table "bcf15".
 *
 * @property integer $id
 * @property string $tahun
 * @property string $bcf15no
 * @property string $kd_bcf15
 * @property string $bcf15tgl
 * @property integer $penandatangan_id
 * @property integer $sp
 * @property string $kepada_sp
 * @property string $no_sp
 * @property string $tgl_sp
 * @property integer $pejabat_sp
 * @property string $nama_kirim_sp
 * @property string $tgl_kirim_sp
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $status_bcf15
 * @property string $skep_penetapan_bcf15_id
 * @property string $nama_terima_sp
 * @property string $tgl_terima_sp
 *
 * @property SkepPenetapanBcf15 $skepPenetapanBcf15
 * @property StatusBcf15 $statusBcf15
 * @property Penandatangan $penandatangan
 * @property Bcf15Detail[] $bcf15Details
 */
class Bcf15 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcf15';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahun', 'bcf15no', 'kd_bcf15', 'bcf15tgl', 'penandatangan_id', 'sp', 'kepada_sp', 'no_sp', 'tgl_sp', 'pejabat_sp', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['bcf15tgl', 'tgl_sp', 'tgl_kirim_sp', 'tgl_terima_sp'], 'safe'],
            [['penandatangan_id', 'sp', 'pejabat_sp', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status_bcf15', 'skep_penetapan_bcf15_id'], 'integer'],
            [['tahun'], 'string', 'max' => 4],
            [['bcf15no', 'kd_bcf15'], 'string', 'max' => 100],
            [['kepada_sp', 'nama_kirim_sp', 'nama_terima_sp'], 'string', 'max' => 255],
            [['no_sp'], 'string', 'max' => 50],
            [['skep_penetapan_bcf15_id'], 'exist', 'skipOnError' => true, 'targetClass' => SkepPenetapanBcf15::className(), 'targetAttribute' => ['skep_penetapan_bcf15_id' => 'id']],
            [['status_bcf15'], 'exist', 'skipOnError' => true, 'targetClass' => StatusBcf15::className(), 'targetAttribute' => ['status_bcf15' => 'id']],
            [['penandatangan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Penandatangan::className(), 'targetAttribute' => ['penandatangan_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun',
            'bcf15no' => 'Nomor BCF 1.5',
            'kd_bcf15' => 'Kd Bcf15',
            'bcf15tgl' => 'Tgl',
            'penandatangan_id' => 'Penandatangan',
            'sp' => 'Sp',
            'kepada_sp' => 'Tujuan Sp',
            'no_sp' => 'No SP',
            'tgl_sp' => 'Tgl',
            'pejabat_sp' => 'Pejabat',
            'nama_kirim_sp' => 'Pengirim',
            'tgl_kirim_sp' => 'Tgl Kirim',
            
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status_bcf15' => 'Status Bcf15',
            'skep_penetapan_bcf15_id' => 'Skep Penetapan Bcf15 ID',
            'nama_terima_sp' => 'Nama Terima Sp',
            'tgl_terima_sp' => 'Tgl Terima Sp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkepPenetapanBcf15()
    {
        return $this->hasOne(\backend\models\SkepPenetapanBcf15::className(), ['id' => 'skep_penetapan_bcf15_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusBcf15()
    {
        return $this->hasOne(StatusBcf15::className(), ['id' => 'status_bcf15']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenandatangan()
    {
        return $this->hasOne(Penandatangan::className(), ['id' => 'penandatangan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15Details()
    {
        return $this->hasMany(Bcf15Detail::className(), ['bcf15_id' => 'id']);
    }
}
