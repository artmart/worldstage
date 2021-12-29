<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use frontend\models\Products;

$install_types = ['Flown'=>'Flown', 'Ground Stack'=>'Ground Stack', 'Custom'=>'Custom'];

$action = '/installtime/create';
if(isset($update)){$action = '/installtime/update?id='.$model->id;}
?>

<div class="installtime-form">
<div class="mt-1 offset-lg-1 col-lg-10">
    <?php $form = ActiveForm::begin(['action' =>[$action]]); ?>
<div class="row">
    
    <?php // $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Products::find()->asArray()->orderBy('product_name')->all(), 'id', 'product_name'), ['prompt'=>'- Select -', 'class'=>'form-control'])
    echo $form->field($model, 'product_id')->hiddenInput()->label(false);?>

    <div class="col-lg-12">
    <?= $form->field($model, 'install_type')->dropDownList($install_types, ['prompt'=>'- Select -', 'class'=>'form-control'])
    
    //$form->field($model, 'install_type')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, '_1_column_tall')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_2_column_tall')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_3_column_tall')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_4_column_tall')->textInput() ?>   
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, '_5_column_tall')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_6_column_tall')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_7_column_tall')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_8_column_tall')->textInput() ?>   
    </div>
</div>    
<div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, '_9_column_tall')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_10_column_tall')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_11_column_tall')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_12_column_tall')->textInput() ?>   
    </div>
</div> 
<div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, '_13_column_tall')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_14_column_tall')->textInput() ?>    
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, '_15_column_tall')->textInput() ?>   
    </div>
    <div class="col-lg-3">
    <div class="form-group" style="margin-top: 30px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style'=>"width: 100%;"]) ?>
    </div>   
    </div>
</div>  
    <?php ActiveForm::end(); ?>

</div>
</div>