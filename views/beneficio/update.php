<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficio */

$this->title = 'Update Beneficio: ' . $model->id_beneficio;
$this->params['breadcrumbs'][] = ['label' => 'Beneficios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_beneficio, 'url' => ['view', 'id_beneficio' => $model->id_beneficio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="beneficio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
