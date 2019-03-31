<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Call;

// ALTER TABLE `db` ADD `update_at` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL AFTER `create_at`;
// ALTER TABLE `db` ADD `status` TINYINT NOT NULL DEFAULT '1' AFTER `address`; 
// ALTER TABLE `db` CHANGE `update_at` `update_at` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP;
// ALTER TABLE `db` ADD `last_call` TIMESTAMP NOT NULL AFTER `status`;
// ALTER TABLE `db` CHANGE `last_call` `last_call` TIMESTAMP NULL;
/**
 * CallSearch represents the model behind the search form of `backend\models\Call`.
 */
class CallSearch extends Call
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'email', 'whatsapp', 'phone', 'address', 'create_at'], 'safe'],
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
        $query = Call::find();

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
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'whatsapp', $this->whatsapp])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
