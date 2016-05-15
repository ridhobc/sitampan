<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mdm\autonumber\NextValueValidator;
use mdm\autonumber\AutoNumber;

/**
 * This is the model class for table "bcf15_detail".
 *
 * @property integer $id
 * @property integer $bcf15_id
 * @property string $bc11no
 * @property string $bc11tgl
 * @property string $bc11pos
 * @property string $bc11subpos
 * @property string $nama_sarkut
 * @property string $jumlah_brg
 * @property integer $satuan_brg
 * @property string $uraian_brg
 * @property string $berat_brg
 * @property string $consignee
 * @property string $alamat_consignee
 * @property string $kota_consignee
 * @property string $notify
 * @property string $alamat_notify
 * @property string $kota_notify
 * @property integer $tpp_id
 * @property integer $tps_id
 *
 * @property Bcf15 $bcf15
 * @property Tpp $tpp
 * @property Tps $tps
 * @property Bcf15DetailCont[] $bcf15DetailConts
 */
class Bcf15Detail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcf15_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'bc11no', 'bc11tgl', 'bc11pos', 'bc11subpos', 'nama_sarkut', 'jumlah_brg', 'satuan_brg', 'uraian_brg', 'berat_brg', 'consignee', 'alamat_consignee', 'kota_consignee'
                ,  'tps_id','tpp_id','nobl','tglbl','tgl_timbun','bcf15pos'], 'required'],
            
            [['bcf15_id',  'tpp_id', 'tps_id'], 'integer'],
            [['bc11tgl','created_at','updated_at'], 'safe'],
            [['bc11no', 'nama_sarkut', 'jumlah_brg', 'uraian_brg'], 'string', 'max' => 200],
            [['consignee', 'alamat_consignee', 'kota_consignee', 'notify', 'alamat_notify', 'kota_notify','total_cont'], 'string', 'max' => 200],
            [['berat_brg','bcf15pos'], 'string', 'max' => 20],
            [['bc11pos', 'bc11subpos','satuan_brg'], 'string', 'max' => 4],
            [['created_by', 'updated_by'], 'integer'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bcf15_id' => 'Bcf15 ID',
            'bcf15pos' => 'Pos Bcf15',
            'bc11no' => 'Nomor BC11',
            'bc11tgl' => 'Tgl BC11',
            'bc11pos' => 'Pos',
            'bc11subpos' => 'Sub Pos',
            'nama_sarkut' => 'Nama Sarkut',
            'jumlah_brg' => 'Jml Brg',
            'satuan_brg' => 'Sat Brg',
            'uraian_brg' => 'Uraian Brg',
            'berat_brg' => 'Berat Brg',
            'consignee' => 'Consignee/Importir',
            'alamat_consignee' => 'Alamat Importir',
            'kota_consignee' => 'Kota Importir',
            'notify' => 'Notify',
            'alamat_notify' => 'Alamat Notify',
            'kota_notify' => 'Kota Notify',
            'tpp_id' => 'TPP',
            'tps_id' => 'TPS',
            'nobl' => 'Nomor BL/AWB',
            'tglbl' => 'Tgl BL/AWB',
            'tgl_timbun' => 'Tgl Timbun',
            'total_cont' => 'Total Cont',
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15()
    {
        return $this->hasOne(Bcf15::className(), ['id' => 'bcf15_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpp()
    {
        return $this->hasOne(\backend\modules\setting\models\Tpp::className(), ['id' => 'tpp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTps()
    {
        return $this->hasOne(\backend\modules\setting\models\Tps::className(), ['id' => 'tps_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15DetailConts()
    {
        return $this->hasMany(Bcf15DetailCont::className(), ['bcf15_detail_id' => 'id']);
    }
   

  
    public function getUserCreated() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUserUpdated() {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    
     public function behaviors() {
        return [
            
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
