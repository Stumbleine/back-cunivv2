<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficio */

$this->title = 'Create Beneficio';
$this->params['breadcrumbs'][] = ['label' => 'Beneficios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beneficio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
