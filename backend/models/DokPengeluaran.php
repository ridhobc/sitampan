<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dok_pengeluaran".
 *
 * @property string $id
 * @property string $jenis_dok
 * @property string $uraian_dok
 *
 * @property Bcf15Penyelesaian[] $bcf15Penyelesaians
 */
class DokPengeluaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dok_pengeluaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_dok', 'uraian_dok'], 'required'],
            [['jenis_dok'], 'string', 'max' => 100],
            [['uraian_dok'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_dok' => 'Jenis Dok',
            'uraian_dok' => 'Uraian Dok',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15Penyelesaians()
    {
        return $this->hasMany(Bcf15Penyelesaian::className(), ['dok_pengeluaran_id' => 'id']);
    }
}
