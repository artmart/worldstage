<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Productadditionalsizes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productadditionalsizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productadditionalsizes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_id',
            'product_name',
            'phsyical_width_inches',
            'physica_height_inches',
            'pixel_width',
            'pixel_height',
            'weight_per_tile_lbs',
            'hardware_weight_percent',
            'tiles_per_case',
            'case_width_inch',
            'case_height_inch',
            'case_length_inch',
            'full_power_draw_amps',
            'recommended_max_height_ground',
            'max_height_ground',
            'recommended_max_height_flown',
            'max_height_flown',
            'price_per_tile',
            'ground_support',
            'flown',
            'sandbag_estimate',
            'mini_g_block_estimate',
            'coloring_time_per_tile_installed',
            'repair_time_per_tile_installed',
        ],
    ]) ?>

</div>
