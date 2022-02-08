<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_additional sizes".
 *
 * @property int $id
 * @property int $product_id
 * @property string $product_name
 * @property float $phsyical_width_inches
 * @property float $physica_height_inches
 * @property float $pixel_width
 * @property float $pixel_height
 * @property float $weight_per_tile_lbs
 * @property float $hardware_weight_percent
 * @property float $tiles_per_case
 * @property float $case_width_inch
 * @property float $case_height_inch
 * @property float $case_length_inch
 * @property float|null $full_power_draw_amps
 * @property float|null $recommended_max_height_ground
 * @property float|null $max_height_ground
 * @property float|null $recommended_max_height_flown
 * @property float|null $max_height_flown
 * @property float $price_per_tile
 * @property float $ground_support
 * @property float $flown
 * @property float $sandbag_estimate
 * @property float $mini_g_block_estimate
 * @property float $coloring_time_per_tile_installed
 * @property float $repair_time_per_tile_installed
 *
 * @property Products $product
 */
class Productadditionalsizes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_additional_sizes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['product_name', 'phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent', 'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch', 'coloring_time_per_tile_installed', 'repair_time_per_tile_installed'], 'required'],
            [['phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent', 'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch', 'full_power_draw_amps', 'recommended_max_height_ground', 'max_height_ground', 'recommended_max_height_flown', 'max_height_flown', 'price_per_tile', 'ground_support', 'flown', 'sandbag_estimate', 'mini_g_block_estimate', 'coloring_time_per_tile_installed', 'repair_time_per_tile_installed'], 'number'],
            [['product_name'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'phsyical_width_inches' => 'Phsyical Width Inches',
            'physica_height_inches' => 'Physica Height Inches',
            'pixel_width' => 'Pixel Width',
            'pixel_height' => 'Pixel Height',
            'weight_per_tile_lbs' => 'Weight Per Tile Lbs',
            'hardware_weight_percent' => 'Hardware Weight Percent',
            'tiles_per_case' => 'Tiles Per Case',
            'case_width_inch' => 'Case Width Inch',
            'case_height_inch' => 'Case Height Inch',
            'case_length_inch' => 'Case Length Inch',
            'full_power_draw_amps' => 'Full Power Draw Amps',
            'recommended_max_height_ground' => 'Recommended Max Height Ground',
            'max_height_ground' => 'Max Height Ground',
            'recommended_max_height_flown' => 'Recommended Max Height Flown',
            'max_height_flown' => 'Max Height Flown',
            'price_per_tile' => 'Price Per Tile',
            'ground_support' => 'Ground Support',
            'flown' => 'Flown',
            'sandbag_estimate' => 'Sandbag Estimate',
            'mini_g_block_estimate' => 'Mini G Block Estimate',
            'coloring_time_per_tile_installed' => 'Coloring Time Per Tile Installed',
            'repair_time_per_tile_installed' => 'Repair Time Per Tile Installed',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
