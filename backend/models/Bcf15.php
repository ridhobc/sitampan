<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mdm\autonumber\NextValueValidator;
use mdm\autonumber\AutoNumber;

/**
 * This is the model class for table "bcf15".
 *
 * @property integer $id
 * @property string $bcf15no
 * @property string $bcf15tgl
 * @property integer $penandatangan_id
 *
 * @property Penandatangan $penandatangan
 * @property Bcf15Detail[] $bcf15Details
 */
class Bcf15 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcf15';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'bcf15tgl', 'penandatangan_id'], 'required'],
            [['bcf15tgl','created_at','updated_at','tahun','tgl_sp','tgl_kirim_sp','tgl_terima_sp'], 'safe'],
//              [['bcf15tgl'], 'date','format' => 'D m Y'],
            [['penandatangan_id'], 'integer'],
            [['created_by', 'updated_by','status_bcf15','pejabat_sp','skep_penetapan_bcf15_id'], 'integer'],
            [['bcf15no','kd_bcf15','no_sp'], 'string', 'max' => 100],
            [['kepada_sp','nama_kirim_sp','nama_terima_sp'], 'string', 'max' => 250],
           
            
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bcf15no' => 'No BCF 1.5',
            'bcf15tgl' => 'Tanggal BCF 1.5',
            'penandatangan_id' => 'Pejabat Penandatangan',
            'tahun' => 'Tahun Terbit',
             'status_bcf15' => 'Status BCF15',
            'kepada_sp' => 'Kepada Yth :',
            'nama_kirim_sp' => 'Petugas Kirim',
            'tgl_kirim_sp' => 'Tanggal Kirim',
            'kepada_sp' => 'Kepada Yth :',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenandatangan()
    {
        return $this->hasOne(Penandatangan::className(), ['id' => 'penandatangan_id']);
    }
     
    public function getStatusBcf15()
    {
        return $this->hasOne(StatusBcf15::className(), ['id' => 'status_bcf15']);
    }
    
    public function getUserCreated() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUserUpdated() {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    
    public function getSkepPenetapanBcf15() {
        return $this->hasOne(SkepPenetapanBcf15::className(), ['id' => 'skep_penetapan_bcf15_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15Details()
    {
        return $this->hasMany(Bcf15Detail::className(), ['bcf15_id' => 'id']);
    }
    
    public function behaviors() {
        return [
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'bcf15no', // required
                'group' => $this->id, // optional
                
//                  'value' => date('Y') . '-?', // format auto number. '?' will be replaced with generated number
                'value' => '?'.'/BCF1.5/'.date('Y'), // format auto number. '?' will be replaced with generated number
                'digit' => 4 // optional, default to null. 
            ],
           
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['updated_at', 'created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            'bleamble' => [
                'class' => BlameableBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['updated_by', 'created_by'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
                ],
            ]
        ];
    }
}
