<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PricesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prices-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'price_per_tile') ?>

    <?= $form->field($model, 'ground_support') ?>

    <?= $form->field($model, 'flown') ?>

    <?php // echo $form->field($model, 'sandbag_estimate') ?>

    <?php // echo $form->field($model, 'mini_g_block_estimate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
