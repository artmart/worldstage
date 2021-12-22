<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `frontend\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['product_name', 'link_to_picture_ground_support', 'link_to_picture_flown'], 'safe'],
            [['phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent', 'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch', 'full_power_draw_amps'], 'number'],
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
        $query = Products::find();

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
            'phsyical_width_inches' => $this->phsyical_width_inches,
            'physica_height_inches' => $this->physica_height_inches,
            'pixel_width' => $this->pixel_width,
            'pixel_height' => $this->pixel_height,
            'weight_per_tile_lbs' => $this->weight_per_tile_lbs,
            'hardware_weight_percent' => $this->hardware_weight_percent,
            'tiles_per_case' => $this->tiles_per_case,
            'case_width_inch' => $this->case_width_inch,
            'case_height_inch' => $this->case_height_inch,
            'case_length_inch' => $this->case_length_inch,
            'full_power_draw_amps' => $this->full_power_draw_amps,
        ]);

        $query->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'link_to_picture_ground_support', $this->link_to_picture_ground_support])
            ->andFilterWhere(['like', 'link_to_picture_flown', $this->link_to_picture_flown]);

        return $dataProvider;
    }
}
