<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$action = '/productadditionalsizes/create';
if(isset($update)){$action = '/productadditionalsizes/update?id='.$model->id;}
?>

<div class="products-form">
<div class="panel-group"> <!-- offset-lg-1 col-lg-10-->
    <?php $form = ActiveForm::begin(['action' =>[$action], 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php // $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Products::find()->asArray()->orderBy('product_name')->all(), 'id', 'product_name'), ['prompt'=>'- Select -', 'class'=>'form-control'])
    echo $form->field($model, 'product_id')->hiddenInput()->label(false); //->textInput() 
    ?>
<div class="card">
<div class="card-header bg-info">Product Data</div>
  <div class="card-body"> 
  
<div class="row">  
    <div class="col-lg-6">
    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?> 
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'phsyical_width_inches')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'physica_height_inches')->textInput() ?>   
    </div>    
</div>
<div class="row">
    <div class="col-lg-2">
    <?= $form->field($model, 'pixel_width')->textInput() ?>    
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'pixel_height')->textInput() ?>   
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'weight_per_tile_lbs')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'hardware_weight_percent')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'tiles_per_case')->textInput() ?>    
    </div>    
</div>
<div class="row">
    <div class="col-lg-2">
    <?= $form->field($model, 'case_width_inch')->textInput() ?>   
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'case_height_inch')->textInput() ?>    
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'case_length_inch')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'max_height_ground')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'max_height_flown')->textInput() ?>   
    </div>
</div>    
<div class="row">
    <div class="col-lg-4">
    <?= $form->field($model, 'recommended_max_height_ground')->textInput() ?>    
    </div>
    <div class="col-lg-5">
    <?= $form->field($model, 'recommended_max_height_flown')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'full_power_draw_amps')->textInput() ?>    
    </div>
</div>



  </div>
</div>



<div class="card">
<div class="card-header bg-info">Prices</div>
  <div class="card-body"> 

<div class="row">
    <div class="col-lg-2">
    <?= $form->field($model, 'price_per_tile')->textInput() ?>
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'ground_support')->textInput() ?>
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'flown')->textInput() ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'sandbag_estimate')->textInput() ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'mini_g_block_estimate')->textInput() ?>
    </div>
</div>

</div>
</div>

<div class="card">
<div class="card-header bg-info">Coloring and Repair times</div>
  <div class="card-body">
<div class="row">
    <div class="col-lg-6">
    <?= $form->field($model, 'coloring_time_per_tile_installed')->textInput() ?>
    </div>
    <div class="col-lg-6">
    <?= $form->field($model, 'repair_time_per_tile_installed')->textInput() ?>
    </div>
</div>
</div>
</div>
</div> 

<hr />
<div class="row">
    <div class="offset-lg-9 col-lg-2">
        <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style'=>"width: 100%;"]) ?>
    </div>  
    </div>
</div> 
    <?php ActiveForm::end(); ?>
</div>
</div>
<br />
<br />