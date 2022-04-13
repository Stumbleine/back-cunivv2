<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficio */

$this->title = $model->id_beneficio;
$this->params['breadcrumbs'][] = ['label' => 'Beneficios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="beneficio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_beneficio' => $model->id_beneficio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_beneficio' => $model->id_beneficio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_beneficio',
            'id_producto',
            'id_empresa',
            'titulo',
            'condiciones',
            'fecha_inicio',
            'fecha_fin',
            'tipo_descuento',
            'desc_porcentaje',
            'desc_monto',
            'desc_descrito',
            'sucursales_disp',
        ],
    ]) ?>

</div>
