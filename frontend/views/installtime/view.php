<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
//use yii\helpers\ArrayHelper;
use frontend\models\Products;
$product =  Products::find()->where(['id' =>$model->product_id])->one();

$this->title = 'Install Time for Product: '. $product->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Install times', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="installtime-view">
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
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'product_id',
            ['attribute' => 'product_id', 'value' => function($model) use ($product){return $product->product_name;}],
            'install_type',
            '_1_column_tall',
            '_2_column_tall',
            '_3_column_tall',
            '_4_column_tall',
            '_5_column_tall',
            '_6_column_tall',
            '_7_column_tall',
            '_8_column_tall',
            '_9_column_tall',
            '_10_column_tall',
            '_11_column_tall',
            '_12_column_tall',
            '_13_column_tall',
            '_14_column_tall',
            '_15_column_tall',
        ],
    ]) ?>

</div>
