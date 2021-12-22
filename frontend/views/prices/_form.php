<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Products;
?>
<div class="prices-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Products::find()->asArray()->orderBy('product_name')->all(), 'id', 'product_name'), ['prompt'=>'- Select -', 'class'=>'form-control'])
    //$form->field($model, 'product_id')->textInput() ?>

<div class="row">
    <div class="col-lg-4">
    <?= $form->field($model, 'price_per_tile')->textInput() ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'ground_support')->textInput() ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'flown')->textInput() ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
    <?= $form->field($model, 'sandbag_estimate')->textInput() ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'mini_g_block_estimate')->textInput() ?>
    </div>
    <div class="col-lg-4">
    <div class="form-group" style="margin-top: 30px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style'=>"width: 100%;"]) ?>
    </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
