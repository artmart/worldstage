<?php
use yii\helpers\Html;

$this->title = 'Create Install time';
$this->params['breadcrumbs'][] = ['label' => 'Installtimes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="installtime-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr />
    <?= $this->render('_form', ['model' => $model]) ?>
</div>