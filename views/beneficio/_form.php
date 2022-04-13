<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beneficio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_producto')->textInput() ?>

    <?= $form->field($model, 'id_empresa')->textInput() ?>

    <?= $form->field($model, 'titulo')->textInput() ?>

    <?= $form->field($model, 'condiciones')->textInput() ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_fin')->textInput() ?>

    <?= $form->field($model, 'tipo_descuento')->textInput() ?>

    <?= $form->field($model, 'desc_porcentaje')->textInput() ?>

    <?= $form->field($model, 'desc_monto')->textInput() ?>

    <?= $form->field($model, 'desc_descrito')->textInput() ?>

    <?= $form->field($model, 'sucursales_disp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
