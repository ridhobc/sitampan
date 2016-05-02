<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "status_bcf15".
 *
 * @property string $id
 * @property string $nmstatus
 *
 * @property Bcf15[] $bcf15s
 */
class StatusBcf15 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_bcf15';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nmstatus'], 'required'],
            [['nmstatus'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nmstatus' => 'Nmstatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15s()
    {
        return $this->hasMany(Bcf15::className(), ['status_bcf15' => 'id']);
    }
}
