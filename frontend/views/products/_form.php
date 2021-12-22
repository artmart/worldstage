<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="products-form">
<div class="mt-1 offset-lg-1 col-lg-10">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>   
<div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'phsyical_width_inches')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'physica_height_inches')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'pixel_width')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'pixel_height')->textInput() ?>   
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
    <?= $form->field($model, 'weight_per_tile_lbs')->textInput() ?>    
    </div>
    <div class="col-lg-6">
    <?= $form->field($model, 'hardware_weight_percent')->textInput() ?>   
    </div>
</div>    
<div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'tiles_per_case')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'case_width_inch')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'case_height_inch')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'case_length_inch')->textInput() ?>   
    </div>
</div>    
<div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'full_power_draw_amps')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'link_to_picture_flown')->textInput(['maxlength' => true]) ?>   
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'link_to_picture_ground_support')->textInput(['maxlength' => true]) ?>   
    </div>
    <div class="col-lg-2">
        <div class="form-group" style="margin-top: 30px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style'=>"width: 100%;"]) ?>
    </div>  
    </div>
</div>  
    <?php ActiveForm::end(); ?>
</div>
</div>