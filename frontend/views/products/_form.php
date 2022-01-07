<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="products-form">
<div class="mt-1 offset-lg-1 col-lg-10">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
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
    <div class="col-lg-3">
    <?= $form->field($model, 'weight_per_tile_lbs')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'hardware_weight_percent')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'tiles_per_case')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'case_width_inch')->textInput() ?>   
    </div>
</div>    
<div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'case_height_inch')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'case_length_inch')->textInput() ?>   
    </div>
    <div class="col-lg-6">
    <?= $form->field($model, 'recommended_max_height_ground')->textInput() ?>    
    </div>
</div>  



<div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'max_height_ground')->textInput() ?>   
    </div>
    <div class="col-lg-6">
    <?= $form->field($model, 'recommended_max_height_flown')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'max_height_flown')->textInput() ?>   
    </div>
</div>


<div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'full_power_draw_amps')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?php // $form->field($model, 'link_to_picture_flown')->textInput(['maxlength' => true]) ?> 
    <?= $form->field($model, 'link_to_picture_flown')->fileInput() ?>
    <?php 
	   $file = Url::to('@web/uploads/products/'.$model->link_to_picture_flown, true);//Yii::getAlias('uploads/products') . "$model->link_to_picture_flown";
		if ($model->link_to_picture_flown){ ?>
			<div class="form-group">
             <img src="<?=$file?>" alt="" width="200" height="200">
			</div>	
    <?php } ?>  
    </div>
    <div class="col-lg-3">
    <?php // $form->field($model, 'link_to_picture_ground_support')->textInput(['maxlength' => true]) ?> 
    <?= $form->field($model, 'link_to_picture_ground_support')->fileInput() ?>
    <?php 
	   $file1 = Url::to('@web/uploads/products/'.$model->link_to_picture_ground_support, true);
		if ($model->link_to_picture_ground_support){ ?>
			<div class="form-group">
             <img src="<?=$file1?>" alt="" width="200" height="200">
			</div>	
    <?php } ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'primary_picture')->radioList(['0'=>'Ground support', '1'=>'Flown']) ?>
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