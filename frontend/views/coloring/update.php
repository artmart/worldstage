<?php
use yii\helpers\Html;

$this->title = 'Update Coloring'; // . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Colorings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coloring-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr />
    <?= $this->render('_form', ['model' => $model]) ?>
</div>