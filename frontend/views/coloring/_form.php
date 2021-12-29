<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use frontend\models\Products;

$action = '/coloring/create';
if(isset($update)){$action = '/coloring/update?id='.$model->id;}
?>
<div class="coloring-form">
    <?php $form = ActiveForm::begin(['action' =>[$action]]); ?>
<div class="row">
    <?php // $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Products::find()->asArray()->orderBy('product_name')->all(), 'id', 'product_name'), ['prompt'=>'- Select -', 'class'=>'form-control'])
    echo $form->field($model, 'product_id')->hiddenInput()->label(false); ?>
    <div class="col-lg-10">
    <?= $form->field($model, 'coloring_time_per_tile_installed')->textInput() ?>
    </div>
    <div class="col-lg-2">
    <div class="form-group" style="margin-top: 30px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style'=>"width: 100%;"]) ?>
    </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>
</div>