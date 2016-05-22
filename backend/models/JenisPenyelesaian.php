<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jenis_penyelesaian".
 *
 * @property string $id
 * @property string $nama_penyelesaian
 *
 * @property Bcf15Penyelesaian[] $bcf15Penyelesaians
 */
class JenisPenyelesaian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_penyelesaian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_penyelesaian'], 'required'],
            [['nama_penyelesaian'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_penyelesaian' => 'Nama Penyelesaian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15Penyelesaians()
    {
        return $this->hasMany(Bcf15Penyelesaian::className(), ['jenis_penyelesaian_id' => 'id']);
    }
}
