<?php
use yii\helpers\Html;
$this->title = 'Create Prices';
$this->params['breadcrumbs'][] = ['label' => 'Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prices-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr />
    <?= $this->render('_form', ['model' => $model]) ?>
</div>