<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Productadditionalsizes */

$this->title = 'Create Productadditionalsizes';
$this->params['breadcrumbs'][] = ['label' => 'Productadditionalsizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productadditionalsizes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
