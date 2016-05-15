<?php

namespace backend\modules\penarikan\models;

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
            [['id', 'bcf15_id', 'tpp_id', 'tps_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['bcf15pos', 'bc11no', 'bc11tgl', 'bc11pos', 'bc11subpos', 'nobl', 'tglbl', 'tgl_timbun', 'nama_sarkut', 'jumlah_brg', 'satuan_brg', 'uraian_brg', 'berat_brg', 'total_cont', 'consignee', 'alamat_consignee', 'kota_consignee', 'notify', 'alamat_notify', 'kota_notify'], 'safe'],
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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
     'sort'=> ['defaultOrder' => ['bcf15_id'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'bcf15_id' => $this->bcf15_id,
            'bc11tgl' => $this->bc11tgl,
            'tglbl' => $this->tglbl,
            'tgl_timbun' => $this->tgl_timbun,
            'tpp_id' => $this->tpp_id,
            'tps_id' => $this->tps_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'bcf15pos', $this->bcf15pos])
            ->andFilterWhere(['like', 'bc11no', $this->bc11no])
            ->andFilterWhere(['like', 'bc11pos', $this->bc11pos])
            ->andFilterWhere(['like', 'bc11subpos', $this->bc11subpos])
            ->andFilterWhere(['like', 'nobl', $this->nobl])
            ->andFilterWhere(['like', 'nama_sarkut', $this->nama_sarkut])
            ->andFilterWhere(['like', 'jumlah_brg', $this->jumlah_brg])
            ->andFilterWhere(['like', 'satuan_brg', $this->satuan_brg])
            ->andFilterWhere(['like', 'uraian_brg', $this->uraian_brg])
            ->andFilterWhere(['like', 'berat_brg', $this->berat_brg])
            ->andFilterWhere(['like', 'total_cont', $this->total_cont])
            ->andFilterWhere(['like', 'consignee', $this->consignee])
            ->andFilterWhere(['like', 'alamat_consignee', $this->alamat_consignee])
            ->andFilterWhere(['like', 'kota_consignee', $this->kota_consignee])
            ->andFilterWhere(['like', 'notify', $this->notify])
            ->andFilterWhere(['like', 'alamat_notify', $this->alamat_notify])
            ->andFilterWhere(['like', 'kota_notify', $this->kota_notify]);

        return $dataProvider;
    }
}
