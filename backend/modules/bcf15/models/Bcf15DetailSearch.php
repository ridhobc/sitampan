<?php

namespace backend\modules\bcf15\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bcf15Detail;

/**
 * Bcf15DetailSearch represents the model behind the search form about `backend\models\Bcf15Detail`.
 */
class Bcf15DetailSearch extends Bcf15Detail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bcf15_id', 'satuan_brg', 'tpp_id', 'tps_id','status_bcf15_detail'], 'integer'],
            [['bcf15pos','bc11no', 'bc11tgl', 'bc11pos', 'bc11subpos','nobl','tglbl', 'nama_sarkut', 'jumlah_brg', 'uraian_brg', 'berat_brg', 'consignee', 'alamat_consignee', 'kota_consignee', 'notify', 'alamat_notify', 'kota_notify'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Bcf15Detail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'bcf15_id' => $this->bcf15_id,
            'bc11tgl' => $this->bc11tgl,
            'satuan_brg' => $this->satuan_brg,
            'tpp_id' => $this->tpp_id,
            'tps_id' => $this->tps_id,
            'status_bcf15_detail' => $this->status_bcf15_detail,
        ]);

        $query->andFilterWhere(['like', 'bc11no', $this->bc11no])
            ->andFilterWhere(['like', 'bcf15pos', $this->bcf15pos])    
            ->andFilterWhere(['like', 'bc11pos', $this->bc11pos])
            ->andFilterWhere(['like', 'bc11subpos', $this->bc11subpos])
            ->andFilterWhere(['like', 'nobl', $this->nobl])
            ->andFilterWhere(['like', 'nama_sarkut', $this->nama_sarkut])
            ->andFilterWhere(['like', 'jumlah_brg', $this->jumlah_brg])
            ->andFilterWhere(['like', 'uraian_brg', $this->uraian_brg])
            ->andFilterWhere(['like', 'berat_brg', $this->berat_brg])
            ->andFilterWhere(['like', 'consignee', $this->consignee])
            ->andFilterWhere(['like', 'alamat_consignee', $this->alamat_consignee])
            ->andFilterWhere(['like', 'kota_consignee', $this->kota_consignee])
            ->andFilterWhere(['like', 'notify', $this->notify])
            ->andFilterWhere(['like', 'alamat_notify', $this->alamat_notify])
            ->andFilterWhere(['like', 'kota_notify', $this->kota_notify]);

        return $dataProvider;
    }
}
