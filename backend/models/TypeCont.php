<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "type_cont".
 *
 * @property integer $id
 * @property string $type
 *
 * @property Bcf15DetailCont[] $bcf15DetailConts
 */
class TypeCont extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_cont';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15DetailConts()
    {
        return $this->hasMany(Bcf15DetailCont::className(), ['jenis_pk' => 'id']);
    }
}
