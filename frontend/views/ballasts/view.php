<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Products;

$product =  Products::find()->where(['id' =>$model->product_id])->one();
$this->title = 'Ballast for Product: '. $product->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Ballasts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ballasts-view">
<div class="row clearfix">
    <h1 class="col-sm-10"><?= Html::encode($this->title) ?></h1>
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
            //'product_id',
            ['attribute' => 'product_id', 'value' => function($model) use ($product){return $product->product_name;}],
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
