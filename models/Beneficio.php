<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "beneficio".
 *
 * @property int $id_beneficio
 * @property int $id_producto
 * @property int $id_empresa
 * @property string $titulo
 * @property string $condiciones
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $tipo_descuento
 * @property float|null $desc_porcentaje
 * @property float|null $desc_monto
 * @property string|null $desc_descrito
 * @property string|null $sucursales_disp
 *
 * @property Codigo[] $codigos
 * @property Cosumo[] $cosumos
 * @property Empresa $empresa
 * @property Producto $producto
 */
class Beneficio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'beneficio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_empresa', 'titulo', 'condiciones', 'fecha_inicio', 'fecha_fin', 'tipo_descuento'], 'required'],
            [['id_producto', 'id_empresa'], 'default', 'value' => null],
            [['id_producto', 'id_empresa'], 'integer'],
            [['titulo', 'condiciones', 'tipo_descuento', 'desc_descrito'], 'string'],
            [['fecha_inicio', 'fecha_fin', 'sucursales_disp'], 'safe'],
            [['desc_porcentaje', 'desc_monto'], 'number'],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_producto' => 'id_producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_beneficio' => 'Id Beneficio',
            'id_producto' => 'Id Producto',
            'id_empresa' => 'Id Empresa',
            'titulo' => 'Titulo',
            'condiciones' => 'Condiciones',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'tipo_descuento' => 'Tipo Descuento',
            'desc_porcentaje' => 'Desc Porcentaje',
            'desc_monto' => 'Desc Monto',
            'desc_descrito' => 'Desc Descrito',
            'sucursales_disp' => 'Sucursales Disp',
        ];
    }

    /**
     * Gets query for [[Codigos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigos()
    {
        return $this->hasMany(Codigo::className(), ['id_beneficio' => 'id_beneficio']);
    }

    /**
     * Gets query for [[Cosumos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCosumos()
    {
        return $this->hasMany(Cosumo::className(), ['id_beneficio' => 'id_beneficio']);
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id_producto' => 'id_producto']);
    }
}
