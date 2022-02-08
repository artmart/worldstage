<?php
use yii\helpers\Html;

$this->title = 'Update Product additional sizes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product additional sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productadditionalsizes-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', ['model' => $model, 'update'=>1]) ?>
</div>