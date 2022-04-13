<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id_empresa
 * @property string $razon_social
 * @property string|null $nit
 * @property string $telefono
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string $categoria
 *
 * @property Beneficio[] $beneficios
 * @property Cajero[] $cajeros
 * @property Sucursal[] $sucursals
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['razon_social', 'telefono', 'categoria'], 'required'],
            [['razon_social', 'nit', 'telefono', 'facebook', 'instagram', 'categoria'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'razon_social' => 'Razon Social',
            'nit' => 'Nit',
            'telefono' => 'Telefono',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * Gets query for [[Beneficios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBeneficios()
    {
        return $this->hasMany(Beneficio::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * Gets query for [[Cajeros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCajeros()
    {
        return $this->hasMany(Cajero::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * Gets query for [[Sucursals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSucursals()
    {
        return $this->hasMany(Sucursal::className(), ['id_empresa' => 'id_empresa']);
    }
}
