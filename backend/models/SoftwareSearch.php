<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Software;

/**
<<<<<<< HEAD
 * SoftwareSearchModel represents the model behind the search form about `backend\models\Software`.
=======
 * SoftwareSearch represents the model behind the search form about `backend\models\Software`.
>>>>>>> c0871f513ac8a7eecd0def0edf9d6fe281401880
 */
class SoftwareSearch extends Software
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dropbox_url'], 'integer'],
            [['title', 'view_url', 'remote_download_url', 'download', 'local_download_url', 'create_at', 'update_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Software::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'dropbox_url' => $this->dropbox_url,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'view_url', $this->view_url])
            ->andFilterWhere(['like', 'remote_download_url', $this->remote_download_url])
            ->andFilterWhere(['like', 'download', $this->download])
            ->andFilterWhere(['like', 'local_download_url', $this->local_download_url]);

        return $dataProvider;
    }
}
