<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property string $sis
 * @property string $nombre
 * @property string $carrera
 * @property string $ci
 * @property string $email
 *
 * @property Cosumo[] $cosumos
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'carrera', 'ci', 'email'], 'required'],
            [['nombre', 'carrera', 'ci', 'email'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sis' => 'Sis',
            'nombre' => 'Nombre',
            'carrera' => 'Carrera',
            'ci' => 'Ci',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Cosumos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCosumos()
    {
        return $this->hasMany(Cosumo::className(), ['sis' => 'sis']);
    }
}
