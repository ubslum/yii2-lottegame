<?php

namespace ubslum\lottegame\models;

use DateTime;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ubslum\lottegame\models\GameScratchCard;

/**
 * GameScratchCardSearch represents the model behind the search form of `ubslum\lottegame\models\GameScratchCard`.
 */
class GameScratchCardSearch extends GameScratchCard
{
    public $date_created_vn;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reward', 'status'], 'integer'],
            [['id_member', 'pos_number', 'date_created', 'date_created_vn', 'date_updated', 'fullname', 'email', 'phone', 'identity_number', 'identity_date_created', 'reward_details'], 'safe'],
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
        $query = GameScratchCard::find()->where(['status' => GameScratchCard::WIN]);

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
            'date_updated' => $this->date_updated,
            'identity_date_created' => $this->identity_date_created,
            'reward' => $this->reward,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'id_member', $this->id_member])
            ->andFilterWhere(['like', 'pos_number', $this->pos_number])
            ->andFilterWhere(['like', 'date_created', $this->date_created])
            ->andFilterWhere(['like', 'date_created_vn', $this->date_created_vn])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'identity_number', $this->identity_number])
            ->andFilterWhere(['like', 'reward_details', $this->reward_details]);

        return $dataProvider;
    }

    public function getDateCreatedText($value)
    {
        $date = DateTime::createFromFormat('Y-m-d', $value);
        $this->date_created = $date->format('d-m-Y');
    }


    public function setDateCreatedText($value)
    {
        $date = DateTime::createFromFormat('d-m-Y', $value);
        $this->date_created = $date->format('Y-m-d');
    }
}
