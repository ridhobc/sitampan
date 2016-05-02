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
            [[ 'kepala_kantor'], 'required'],
            [['skep_tgl'], 'safe'],
            [['skep_no'], 'string', 'max' => 100],
            [['kepala_kantor'], 'string', 'max' => 45],
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
