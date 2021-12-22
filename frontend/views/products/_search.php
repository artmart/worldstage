<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'phsyical_width_inches') ?>

    <?= $form->field($model, 'physica_height_inches') ?>

    <?= $form->field($model, 'pixel_width') ?>

    <?php // echo $form->field($model, 'pixel_height') ?>

    <?php // echo $form->field($model, 'weight_per_tile_lbs') ?>

    <?php // echo $form->field($model, 'hardware_weight_percent') ?>

    <?php // echo $form->field($model, 'tiles_per_case') ?>

    <?php // echo $form->field($model, 'case_width_inch') ?>

    <?php // echo $form->field($model, 'case_height_inch') ?>

    <?php // echo $form->field($model, 'case_length_inch') ?>

    <?php // echo $form->field($model, 'link_to_picture_ground_support') ?>

    <?php // echo $form->field($model, 'link_to_picture_flown') ?>

    <?php // echo $form->field($model, 'full_power_draw_amps') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
