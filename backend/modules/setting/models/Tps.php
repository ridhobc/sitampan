<?php

namespace backend\modules\setting\models;

use Yii;

/**
 * This is the model class for table "tps".
 *
 * @property integer $id
 * @property string $namatps
 * @property string $alamattps
 * @property string $pimpinantps
 *
 * @property Bcf15Detail[] $bcf15Details
 */
class Tps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tps';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['namatps', 'alamattps', 'pimpinantps'], 'required'],
            [['namatps', 'alamattps', 'pimpinantps'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'namatps' => 'Nama TPS',
            'alamattps' => 'Alamat',
            'pimpinantps' => 'Pimpinan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15Details()
    {
        return $this->hasMany(Bcf15Detail::className(), ['tps_id' => 'id']);
    }
}
