<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductadditionalsizesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productadditionalsizes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'phsyical_width_inches') ?>

    <?= $form->field($model, 'physica_height_inches') ?>

    <?php // echo $form->field($model, 'pixel_width') ?>

    <?php // echo $form->field($model, 'pixel_height') ?>

    <?php // echo $form->field($model, 'weight_per_tile_lbs') ?>

    <?php // echo $form->field($model, 'hardware_weight_percent') ?>

    <?php // echo $form->field($model, 'tiles_per_case') ?>

    <?php // echo $form->field($model, 'case_width_inch') ?>

    <?php // echo $form->field($model, 'case_height_inch') ?>

    <?php // echo $form->field($model, 'case_length_inch') ?>

    <?php // echo $form->field($model, 'full_power_draw_amps') ?>

    <?php // echo $form->field($model, 'recommended_max_height_ground') ?>

    <?php // echo $form->field($model, 'max_height_ground') ?>

    <?php // echo $form->field($model, 'recommended_max_height_flown') ?>

    <?php // echo $form->field($model, 'max_height_flown') ?>

    <?php // echo $form->field($model, 'price_per_tile') ?>

    <?php // echo $form->field($model, 'ground_support') ?>

    <?php // echo $form->field($model, 'flown') ?>

    <?php // echo $form->field($model, 'sandbag_estimate') ?>

    <?php // echo $form->field($model, 'mini_g_block_estimate') ?>

    <?php // echo $form->field($model, 'coloring_time_per_tile_installed') ?>

    <?php // echo $form->field($model, 'repair_time_per_tile_installed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
