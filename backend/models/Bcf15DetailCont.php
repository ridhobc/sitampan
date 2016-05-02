<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bcf15_detail_cont".
 *
 * @property integer $id
 * @property integer $bcf15_detail_id
 * @property string $nomor_pk
 * @property string $keterangan
 * @property integer $jenis_pk
 * @property integer $ukuran
 *
 * @property Bcf15Detail $bcf15Detail
 * @property TypeCont $jenisPk
 * @property UkuranCont $ukuran0
 */
class Bcf15DetailCont extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcf15_detail_cont';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'nomor_pk', 'jenis_pk', 'ukuran'], 'required'],
            [['bcf15_detail_id', 'jenis_pk', 'ukuran'], 'integer'],
            [['keterangan'], 'string'],
            [['nomor_pk'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bcf15_detail_id' => 'Bcf15 Detail ID',
            'nomor_pk' => 'Nomor Pk',
            'keterangan' => 'Keterangan',
            'jenis_pk' => 'Jenis Pk',
            'ukuran' => 'Ukuran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15Detail()
    {
        return $this->hasOne(Bcf15Detail::className(), ['id' => 'bcf15_detail_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisPk()
    {
        return $this->hasOne(TypeCont::className(), ['id' => 'jenis_pk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUkuran0()
    {
        return $this->hasOne(UkuranCont::className(), ['id' => 'ukuran']);
    }
}
