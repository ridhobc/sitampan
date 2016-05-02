<?php

namespace backend\modules\setting\models;

use Yii;

/**
 * This is the model class for table "tpp".
 *
 * @property integer $id
 * @property string $namatpp
 * @property string $alamattpp
 * @property string $pimpinantpp
 *
 * @property Bcf15Detail[] $bcf15Details
 */
class Tpp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['namatpp', 'alamattpp', 'pimpinantpp'], 'required'],
            [['namatpp', 'alamattpp'], 'string', 'max' => 200],
            [['pimpinantpp'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'namatpp' => 'Nama TPP',
            'alamattpp' => 'Alamat',
            'pimpinantpp' => 'Pimpinan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15Details()
    {
        return $this->hasMany(Bcf15Detail::className(), ['tpp_id' => 'id']);
    }
}
