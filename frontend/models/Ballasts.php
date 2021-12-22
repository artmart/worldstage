<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ballasts".
 *
 * @property int $id
 * @property int $product_id
 * @property float $_1_column_tall
 * @property float $_2_column_tall
 * @property float $_3_column_tall
 * @property float $_4_column_tall
 * @property float $_5_column_tall
 * @property float $_6_column_tall
 * @property float $_7_column_tall
 * @property float $_8_column_tall
 * @property float $_9_column_tall
 * @property float $_10_column_tall
 * @property float $_11_column_tall
 * @property float $_12_column_tall
 * @property float $_13_column_tall
 * @property float $_14_column_tall
 * @property float $_15_column_tall
 *
 * @property Products $product
 */
class Ballasts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ballasts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', '_1_column_tall', '_2_column_tall', '_3_column_tall', '_4_column_tall', '_5_column_tall', '_6_column_tall', '_7_column_tall', '_8_column_tall', '_9_column_tall', '_10_column_tall', '_11_column_tall', '_12_column_tall', '_13_column_tall', '_14_column_tall', '_15_column_tall'], 'required'],
            [['product_id'], 'integer'],
            [['_1_column_tall', '_2_column_tall', '_3_column_tall', '_4_column_tall', '_5_column_tall', '_6_column_tall', '_7_column_tall', '_8_column_tall', '_9_column_tall', '_10_column_tall', '_11_column_tall', '_12_column_tall', '_13_column_tall', '_14_column_tall', '_15_column_tall'], 'number'],
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
            '_1_column_tall' => '1 Column Tall',
            '_2_column_tall' => '2 Column Tall',
            '_3_column_tall' => '3 Column Tall',
            '_4_column_tall' => '4 Column Tall',
            '_5_column_tall' => '5 Column Tall',
            '_6_column_tall' => '6 Column Tall',
            '_7_column_tall' => '7 Column Tall',
            '_8_column_tall' => '8 Column Tall',
            '_9_column_tall' => '9 Column Tall',
            '_10_column_tall' => '10 column tall',
            '_11_column_tall' => '11 Column Tall',
            '_12_column_tall' => '12 Column Tall',
            '_13_column_tall' => '13 Column Tall',
            '_14_column_tall' => '14 Column Tall',
            '_15_column_tall' => '15 Column Tall',
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
