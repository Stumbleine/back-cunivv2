<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BeneficioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beneficio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_beneficio') ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'id_empresa') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'condiciones') ?>

    <?php // echo $form->field($model, 'fecha_inicio') ?>

    <?php // echo $form->field($model, 'fecha_fin') ?>

    <?php // echo $form->field($model, 'tipo_descuento') ?>

    <?php // echo $form->field($model, 'desc_porcentaje') ?>

    <?php // echo $form->field($model, 'desc_monto') ?>

    <?php // echo $form->field($model, 'desc_descrito') ?>

    <?php // echo $form->field($model, 'sucursales_disp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
