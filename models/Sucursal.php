<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sucursal".
 *
 * @property int $id_sucursal
 * @property int $id_empresa
 * @property string $direccion
 * @property string $nombre
 * @property float $latitud
 * @property float $longitud
 *
 * @property Empresa $empresa
 */
class Sucursal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sucursal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_empresa', 'direccion', 'nombre', 'latitud', 'longitud'], 'required'],
            [['id_empresa'], 'default', 'value' => null],
            [['id_empresa'], 'integer'],
            [['direccion', 'nombre'], 'string'],
            [['latitud', 'longitud'], 'number'],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sucursal' => 'Id Sucursal',
            'id_empresa' => 'Id Empresa',
            'direccion' => 'Direccion',
            'nombre' => 'Nombre',
            'latitud' => 'Latitud',
            'longitud' => 'Longitud',
        ];
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
}
