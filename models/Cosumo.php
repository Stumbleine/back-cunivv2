<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cosumo".
 *
 * @property int $id_consumo
 * @property string $sis
 * @property int $id_beneficio
 * @property string $fecha
 *
 * @property Beneficio $beneficio
 * @property Estudiante $sis0
 */
class Cosumo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cosumo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sis', 'id_beneficio', 'fecha'], 'required'],
            [['sis'], 'string'],
            [['id_beneficio'], 'default', 'value' => null],
            [['id_beneficio'], 'integer'],
            [['fecha'], 'safe'],
            [['id_beneficio'], 'exist', 'skipOnError' => true, 'targetClass' => Beneficio::className(), 'targetAttribute' => ['id_beneficio' => 'id_beneficio']],
            [['sis'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['sis' => 'sis']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_consumo' => 'Id Consumo',
            'sis' => 'Sis',
            'id_beneficio' => 'Id Beneficio',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * Gets query for [[Beneficio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBeneficio()
    {
        return $this->hasOne(Beneficio::className(), ['id_beneficio' => 'id_beneficio']);
    }

    /**
     * Gets query for [[Sis0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSis0()
    {
        return $this->hasOne(Estudiante::className(), ['sis' => 'sis']);
    }
}
