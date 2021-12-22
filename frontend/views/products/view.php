<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Product: '. $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">
<div class="row clearfix">
    <h1 class="col-sm-9"><?= Html::encode($this->title) ?></h1>
    <p class="col-sm-3 d-flex justify-content-end">
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
            'product_name',
            'phsyical_width_inches',
            'physica_height_inches',
            'pixel_width',
            'pixel_height',
            'weight_per_tile_lbs',
            'hardware_weight_percent',
            'tiles_per_case',
            'case_width_inch',
            'case_height_inch',
            'case_length_inch',
            'link_to_picture_ground_support',
            'link_to_picture_flown',
            'full_power_draw_amps',
        ],
    ]) ?>

</div>
