<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id_producto
 * @property string $nombre
 * @property float $precio
 * @property string $tipo
 * @property resource|null $image
 *
 * @property Beneficio[] $beneficios
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'precio', 'tipo'], 'required'],
            [['nombre', 'tipo', 'image'], 'string'],
            [['precio'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'nombre' => 'Nombre',
            'precio' => 'Precio',
            'tipo' => 'Tipo',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[Beneficios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBeneficios()
    {
        return $this->hasMany(Beneficio::className(), ['id_producto' => 'id_producto']);
    }
}
