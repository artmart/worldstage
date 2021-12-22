<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "prices".
 *
 * @property int $id
 * @property int $product_id
 * @property float $price_per_tile
 * @property float $ground_support
 * @property float $flown
 * @property float $sandbag_estimate
 * @property float $mini_g_block_estimate
 *
 * @property Products $product
 */
class Prices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['price_per_tile', 'ground_support', 'flown', 'sandbag_estimate', 'mini_g_block_estimate'], 'number'],
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
            'price_per_tile' => 'Price Per Tile',
            'ground_support' => 'Ground Support',
            'flown' => 'Flown',
            'sandbag_estimate' => 'Sandbag (Estimate)',
            'mini_g_block_estimate' => 'Mini-g Block (Estimate)',
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
