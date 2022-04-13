<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Beneficio;

/**
 * BeneficioSearch represents the model behind the search form of `app\models\Beneficio`.
 */
class BeneficioSearch extends Beneficio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_beneficio', 'id_producto', 'id_empresa'], 'integer'],
            [['titulo', 'condiciones', 'fecha_inicio', 'fecha_fin', 'tipo_descuento', 'desc_descrito', 'sucursales_disp'], 'safe'],
            [['desc_porcentaje', 'desc_monto'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Beneficio::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_beneficio' => $this->id_beneficio,
            'id_producto' => $this->id_producto,
            'id_empresa' => $this->id_empresa,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'desc_porcentaje' => $this->desc_porcentaje,
            'desc_monto' => $this->desc_monto,
        ]);

        $query->andFilterWhere(['ilike', 'titulo', $this->titulo])
            ->andFilterWhere(['ilike', 'condiciones', $this->condiciones])
            ->andFilterWhere(['ilike', 'tipo_descuento', $this->tipo_descuento])
            ->andFilterWhere(['ilike', 'desc_descrito', $this->desc_descrito])
            ->andFilterWhere(['ilike', 'sucursales_disp', $this->sucursales_disp]);

        return $dataProvider;
    }
}
