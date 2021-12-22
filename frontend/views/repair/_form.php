<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Products;
?>
<div class="repair-form">
    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-lg-7">
    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Products::find()->asArray()->orderBy('product_name')->all(), 'id', 'product_name'), ['prompt'=>'- Select -', 'class'=>'form-control'])
    //$form->field($model, 'product_id')->textInput() ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'repair_time_per_tile_installed')->textInput() ?>
    </div>
    <div class="col-lg-2">
    <div class="form-group" style="margin-top: 30px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style'=>"width: 100%;"]) ?>
    </div>
    </div>
    
</div>
    <?php ActiveForm::end(); ?>
</div>