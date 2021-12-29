<?php
use yii\helpers\Html;
$this->title = 'Update Ballasts: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Ballasts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['products/view', 'id' => $model->product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ballasts-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr />
    <?= $this->render('_form', ['model' => $model, 'update'=>1]) ?>
</div>