<?php

namespace backend\modules\penyelesaian\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Penandatangan;

/**
 * PenandatanganSearch represents the model behind the search form about `backend\models\Penandatangan`.
 */
class PenandatanganSearch extends Penandatangan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category', 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_status'], 'integer'],
            [['jabatan', 'namapejabat', 'nippejabat', 'plh'], 'safe'],
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
        $query = Penandatangan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'category' => $this->category,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'is_status' => $this->is_status,
        ]);

        $query->andFilterWhere(['like', 'jabatan', $this->jabatan])
            ->andFilterWhere(['like', 'namapejabat', $this->namapejabat])
            ->andFilterWhere(['like', 'nippejabat', $this->nippejabat])
            ->andFilterWhere(['like', 'plh', $this->plh]);

        return $dataProvider;
    }
}
