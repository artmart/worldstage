<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
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
 * @property string|null $link_to_picture_ground_support
 * @property string|null $link_to_picture_flown
 * @property float|null $full_power_draw_amps
 *
 * @property Ballasts[] $ballasts
 * @property Coloring[] $colorings
 * @property InstallTimes[] $installTimes
 * @property Prices[] $prices
 * @property Repair[] $repairs
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_name', 'phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent', 'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch'], 'required'],
            [['phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent', 'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch', 'full_power_draw_amps'], 'number'],
            [['product_name', 'link_to_picture_ground_support', 'link_to_picture_flown'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'phsyical_width_inches' => 'Phsyical Width (Inches)',
            'physica_height_inches' => 'Physica Height (Inches)',
            'pixel_width' => 'Pixel Width',
            'pixel_height' => 'Pixel Height',
            'weight_per_tile_lbs' => 'Weight Per Tile (Lbs)',
            'hardware_weight_percent' => 'Hardware Weight (%)',
            'tiles_per_case' => 'Tiles Per Case',
            'case_width_inch' => 'Case Width (Inch)',
            'case_height_inch' => 'Case Height (Inch0',
            'case_length_inch' => 'Case Length (Inch)',
            'link_to_picture_ground_support' => 'Link To Picture Ground Support',
            'link_to_picture_flown' => 'Link To Picture Flown',
            'full_power_draw_amps' => 'Full Power Draw (Amps)',
        ];
    }

    /**
     * Gets query for [[Ballasts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBallasts()
    {
        return $this->hasMany(Ballasts::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Colorings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColorings()
    {
        return $this->hasMany(Coloring::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[InstallTimes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstallTimes()
    {
        return $this->hasMany(InstallTimes::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Prices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Prices::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Repairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepairs()
    {
        return $this->hasMany(Repair::className(), ['product_id' => 'id']);
    }
}