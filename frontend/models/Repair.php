<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "repair".
 *
 * @property int $id
 * @property int $product_id
 * @property float $repair_time_per_tile_installed
 *
 * @property Products $product
 */
class Repair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'repair_time_per_tile_installed'], 'required'],
            [['product_id'], 'integer'],
            [['repair_time_per_tile_installed'], 'number'],
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
