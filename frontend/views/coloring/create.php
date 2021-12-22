<?php
use yii\helpers\Html;
$this->title = 'Create Coloring';
$this->params['breadcrumbs'][] = ['label' => 'Colorings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coloring-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr />
    <?= $this->render('_form', ['model' => $model]) ?>
</div>