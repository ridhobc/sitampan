<?php

namespace backend\modules\setting\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\setting\models\IdentitasKantor;

/**
 * IdentitasKantorSearch represents the model behind the search form about `backend\modules\setting\models\IdentitasKantor`.
 */
class IdentitasKantorSearch extends IdentitasKantor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['kementerian', 'eseloni', 'kanwil', 'kppbc', 'alamat1', 'alamat2', 'alamat3'], 'safe'],
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
        $query = IdentitasKantor::find();

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
        ]);

        $query->andFilterWhere(['like', 'kementerian', $this->kementerian])
            ->andFilterWhere(['like', 'eseloni', $this->eseloni])
            ->andFilterWhere(['like', 'kanwil', $this->kanwil])
            ->andFilterWhere(['like', 'kppbc', $this->kppbc])
            ->andFilterWhere(['like', 'alamat1', $this->alamat1])
            ->andFilterWhere(['like', 'alamat2', $this->alamat2])
            ->andFilterWhere(['like', 'alamat3', $this->alamat3]);

        return $dataProvider;
    }
}
