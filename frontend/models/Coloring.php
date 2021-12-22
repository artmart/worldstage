<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "coloring".
 *
 * @property int $id
 * @property int $product_id
 * @property float $coloring_time_per_tile_installed
 *
 * @property Products $product
 */
class Coloring extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coloring';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'coloring_time_per_tile_installed'], 'required'],
            [['product_id'], 'integer'],
            [['coloring_time_per_tile_installed'], 'number'],
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
            'product_id' => 'Product',
            'coloring_time_per_tile_installed' => 'Coloring Time Per Tile Installed',
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
