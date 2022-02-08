<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductadditionalsizesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productadditionalsizes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productadditionalsizes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Productadditionalsizes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'product_name',
            'phsyical_width_inches',
            'physica_height_inches',
            //'pixel_width',
            //'pixel_height',
            //'weight_per_tile_lbs',
            //'hardware_weight_percent',
            //'tiles_per_case',
            //'case_width_inch',
            //'case_height_inch',
            //'case_length_inch',
            //'full_power_draw_amps',
            //'recommended_max_height_ground',
            //'max_height_ground',
            //'recommended_max_height_flown',
            //'max_height_flown',
            //'price_per_tile',
            //'ground_support',
            //'flown',
            //'sandbag_estimate',
            //'mini_g_block_estimate',
            //'coloring_time_per_tile_installed',
            //'repair_time_per_tile_installed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
