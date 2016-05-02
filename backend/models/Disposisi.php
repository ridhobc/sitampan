<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "disposisi".
 *
 * @property integer $id
 * @property string $nip
 * @property string $nama
 * @property string $status
 */
class Disposisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disposisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'status'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'Nip',
            'nama' => 'Nama',
            'status' => 'Status',
        ];
    }
    public function getPspdetails()
    {
        return $this->hasMany(Pspdetail::className(), ['iddisposisi' => 'id']);
    }
}
