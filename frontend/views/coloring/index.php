<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use frontend\models\Products;

$this->title = 'Colorings';
$this->params['breadcrumbs'][] = $this->title;
$products =  ArrayHelper::map(Products::find()->orderBy('product_name')->asArray()->all(), 'id', 'product_name');
?>
<div class="coloring-index">
<div class="row clearfix">
    <h1 class="col-sm-10"><?= Html::encode($this->title) ?></h1>
    <p class="col-sm-2 d-flex justify-content-end">
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Add', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
<hr />

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'product_id',
            ['attribute' => 'product_id', 'filter'=>$products,
                'value' => function($model) use ($products){return $products[$model->product_id];},
            ],
            'coloring_time_per_tile_installed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
