<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BallastsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ballasts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, '_1_column_tall') ?>

    <?= $form->field($model, '_2_column_tall') ?>

    <?= $form->field($model, '_3_column_tall') ?>

    <?php // echo $form->field($model, '_4_column_tall') ?>

    <?php // echo $form->field($model, '_5_column_tall') ?>

    <?php // echo $form->field($model, '_6_column_tall') ?>

    <?php // echo $form->field($model, '_7_column_tall') ?>

    <?php // echo $form->field($model, '_8_column_tall') ?>

    <?php // echo $form->field($model, '_9_column_tall') ?>

    <?php // echo $form->field($model, '_10_column_tall') ?>

    <?php // echo $form->field($model, '_11_column_tall') ?>

    <?php // echo $form->field($model, '_12_column_tall') ?>

    <?php // echo $form->field($model, '_13_column_tall') ?>

    <?php // echo $form->field($model, '_14_column_tall') ?>

    <?php // echo $form->field($model, '_15_column_tall') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
