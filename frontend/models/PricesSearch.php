<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Prices;

/**
 * PricesSearch represents the model behind the search form of `frontend\models\Prices`.
 */
class PricesSearch extends Prices
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id'], 'integer'],
            [['price_per_tile', 'ground_support', 'flown', 'sandbag_estimate', 'mini_g_block_estimate'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Prices::find();

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
            'product_id' => $this->product_id,
            'price_per_tile' => $this->price_per_tile,
            'ground_support' => $this->ground_support,
            'flown' => $this->flown,
            'sandbag_estimate' => $this->sandbag_estimate,
            'mini_g_block_estimate' => $this->mini_g_block_estimate,
        ]);

        return $dataProvider;
    }
}
