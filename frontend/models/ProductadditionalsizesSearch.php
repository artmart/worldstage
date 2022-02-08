<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Productadditionalsizes;

/**
 * ProductadditionalsizesSearch represents the model behind the search form of `frontend\models\Productadditionalsizes`.
 */
class ProductadditionalsizesSearch extends Productadditionalsizes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id'], 'integer'],
            [['product_name'], 'safe'],
            [['phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent', 'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch', 'full_power_draw_amps', 'recommended_max_height_ground', 'max_height_ground', 'recommended_max_height_flown', 'max_height_flown', 'price_per_tile', 'ground_support', 'flown', 'sandbag_estimate', 'mini_g_block_estimate', 'coloring_time_per_tile_installed', 'repair_time_per_tile_installed'], 'number'],
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
        $query = Productadditionalsizes::find();

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
            'recommended_max_height_ground' => $this->recommended_max_height_ground,
            'max_height_ground' => $this->max_height_ground,
            'recommended_max_height_flown' => $this->recommended_max_height_flown,
            'max_height_flown' => $this->max_height_flown,
            'price_per_tile' => $this->price_per_tile,
            'ground_support' => $this->ground_support,
            'flown' => $this->flown,
            'sandbag_estimate' => $this->sandbag_estimate,
            'mini_g_block_estimate' => $this->mini_g_block_estimate,
            'coloring_time_per_tile_installed' => $this->coloring_time_per_tile_installed,
            'repair_time_per_tile_installed' => $this->repair_time_per_tile_installed,
        ]);

        $query->andFilterWhere(['like', 'product_name', $this->product_name]);

        return $dataProvider;
    }
}
