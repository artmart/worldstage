<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use frontend\models\Products;

$this->title = 'Install times';
$this->params['breadcrumbs'][] = $this->title;
$products =  ArrayHelper::map(Products::find()->orderBy('product_name')->asArray()->all(), 'id', 'product_name');
?>
<div class="installtime-index">
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
            'install_type',
            '_1_column_tall',
            '_2_column_tall',
            '_3_column_tall',
            '_4_column_tall',
            '_5_column_tall',
            //'_6_column_tall',
            //'_7_column_tall',
            //'_8_column_tall',
            //'_9_column_tall',
            //'_10_column_tall',
            //'_11_column_tall',
            //'_12_column_tall',
            //'_13_column_tall',
            //'_14_column_tall',
            //'_15_column_tall',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
