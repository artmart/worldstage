<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">
<div class="row clearfix">
    <h1 class="col-sm-10"><?= Html::encode($this->title) ?></h1>

    <p class="col-sm-2 d-flex justify-content-end">
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Add', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
<hr />
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'product_name',
            'phsyical_width_inches',
            'physica_height_inches',
            'pixel_width',
            'pixel_height',
            //'weight_per_tile_lbs',
            //'hardware_weight_percent',
            //'tiles_per_case',
            //'case_width_inch',
            //'case_height_inch',
            //'case_length_inch',
            //'link_to_picture_ground_support',
            //'link_to_picture_flown',
            //'full_power_draw_amps',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
