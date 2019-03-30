<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cards;

/**
 * CardsSearch represents the model behind the search form of `backend\models\Cards`.
 */
class CardsSearch extends Cards
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'title', 'contact_number', 'email', 'whatsapp', 'gmap', 'payme', 'about', 'skill', 'education', 'awards', 'testimonials', 'compny_name', 'service', 'website_url', 'image_url'], 'safe'],
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
        //$query = Cards::find()->orderBy('status');
        $query = Cards::find();
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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'whatsapp', $this->whatsapp])
            ->andFilterWhere(['like', 'gmap', $this->gmap])
            ->andFilterWhere(['like', 'payme', $this->payme])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'skill', $this->skill])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'awards', $this->awards])
            ->andFilterWhere(['like', 'testimonials', $this->testimonials])
            ->andFilterWhere(['like', 'compny_name', $this->compny_name])
            ->andFilterWhere(['like', 'service', $this->service])
            ->andFilterWhere(['like', 'website_url', $this->website_url])
            ->andFilterWhere(['like', 'image_url', $this->image_url]);

        return $dataProvider;
    }
}
