<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Products;
$product =  Products::find()->where(['id' =>$model->product_id])->one();

$this->title ='Coloring for Product: '. $product->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Colorings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="coloring-view">
<div class="row clearfix">
    <h1 class="col-sm-10"><?= Html::encode($this->title) ?></h1>
    <hr />
    <p class="col-sm-2 d-flex justify-content-end">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
<hr />
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            ['attribute' => 'product_id', 'value' => function($model) use ($product){return $product->product_name;}],
            'coloring_time_per_tile_installed',
        ],
    ]) ?>

</div>
