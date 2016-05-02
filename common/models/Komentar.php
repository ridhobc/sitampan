<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "komentar".
 *
 * @property integer $id
 * @property string $nama
 * @property string $pesan
 */
class Komentar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komentar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'pesan'], 'required'],
            [['nama'], 'string', 'max' => 25],
            [['pesan'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'pesan' => 'Pesan',
        ];
    }
}
