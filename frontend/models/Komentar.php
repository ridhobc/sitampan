<?php
namespace frontend\models;
class Komentar extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'komentar';
    }

    public function rules()
    {
        return [
            [['nama', 'pesan'], 'required'],
        ];
    }
}
