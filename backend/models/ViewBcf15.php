<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "view_bcf15".
 *
 * @property integer $idbcf15
 * @property string $tahun
 * @property string $bcf15no
 * @property string $bcf15tgl
 * @property integer $id
 * @property integer $bcf15_id
 * @property string $bcf15pos
 * @property string $bc11no
 * @property string $bc11tgl
 * @property string $bc11pos
 * @property string $bc11subpos
 * @property string $status_bcf15_detail
 */
class ViewBcf15 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_bcf15';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbcf15', 'id', 'bcf15_id', 'status_bcf15_detail'], 'integer'],
            [['tahun', 'bcf15no', 'bcf15tgl', 'bcf15_id', 'bcf15pos', 'bc11no', 'bc11tgl', 'bc11pos', 'bc11subpos'], 'required'],
            [['bcf15tgl', 'bc11tgl'], 'safe'],
            [['tahun'], 'string', 'max' => 4],
            [['bcf15no'], 'string', 'max' => 100],
            [['bcf15pos'], 'string', 'max' => 6],
            [['bc11no'], 'string', 'max' => 10],
            [['bc11pos', 'bc11subpos'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbcf15' => 'Idbcf15',
            'tahun' => 'Tahun',
            'bcf15no' => 'Bcf15no',
            'bcf15tgl' => 'Bcf15tgl',
            'id' => 'ID',
            'bcf15_id' => 'Bcf15 ID',
            'bcf15pos' => 'Bcf15pos',
            'bc11no' => 'Bc11no',
            'bc11tgl' => 'Bc11tgl',
            'bc11pos' => 'Bc11pos',
            'bc11subpos' => 'Bc11subpos',
            'status_bcf15_detail' => 'Status Bcf15 Detail',
        ];
    }
}
