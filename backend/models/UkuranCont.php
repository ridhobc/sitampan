<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ukuran_cont".
 *
 * @property integer $id
 * @property string $ukuran
 *
 * @property Bcf15DetailCont[] $bcf15DetailConts
 */
class UkuranCont extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ukuran_cont';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ukuran'], 'required'],
            [['ukuran'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ukuran' => 'Ukuran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15DetailConts()
    {
        return $this->hasMany(Bcf15DetailCont::className(), ['ukuran' => 'id']);
    }
}
