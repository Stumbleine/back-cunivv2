<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BeneficioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beneficios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beneficio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Beneficio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_beneficio',
            'id_producto',
            'id_empresa',
            'titulo',
            'condiciones',
            //'fecha_inicio',
            //'fecha_fin',
            //'tipo_descuento',
            //'desc_porcentaje',
            //'desc_monto',
            //'desc_descrito',
            //'sucursales_disp',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Beneficio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_beneficio' => $model->id_beneficio]);
                 }
            ],
        ],
    ]); ?>


</div>
