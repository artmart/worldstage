<?php
use yii\helpers\Html;

$this->title = 'Create Ballast';
$this->params['breadcrumbs'][] = ['label' => 'Ballasts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ballasts-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr />
    <?= $this->render('_form', ['model' => $model]) ?>
</div>