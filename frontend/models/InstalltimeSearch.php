<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Installtime;

/**
 * InstalltimeSearch represents the model behind the search form of `frontend\models\Installtime`.
 */
class InstalltimeSearch extends Installtime
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id'], 'integer'],
            [['install_type'], 'safe'],
            [['_1_column_tall', '_2_column_tall', '_3_column_tall', '_4_column_tall', '_5_column_tall', '_6_column_tall', '_7_column_tall', '_8_column_tall', '_9_column_tall', '_10_column_tall', '_11_column_tall', '_12_column_tall', '_13_column_tall', '_14_column_tall', '_15_column_tall'], 'number'],
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
        $query = Installtime::find();

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
            '_1_column_tall' => $this->_1_column_tall,
            '_2_column_tall' => $this->_2_column_tall,
            '_3_column_tall' => $this->_3_column_tall,
            '_4_column_tall' => $this->_4_column_tall,
            '_5_column_tall' => $this->_5_column_tall,
            '_6_column_tall' => $this->_6_column_tall,
            '_7_column_tall' => $this->_7_column_tall,
            '_8_column_tall' => $this->_8_column_tall,
            '_9_column_tall' => $this->_9_column_tall,
            '_10_column_tall' => $this->_10_column_tall,
            '_11_column_tall' => $this->_11_column_tall,
            '_12_column_tall' => $this->_12_column_tall,
            '_13_column_tall' => $this->_13_column_tall,
            '_14_column_tall' => $this->_14_column_tall,
            '_15_column_tall' => $this->_15_column_tall,
        ]);

        $query->andFilterWhere(['like', 'install_type', $this->install_type]);

        return $dataProvider;
    }
}
