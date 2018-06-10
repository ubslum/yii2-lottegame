<?php

namespace ubslum\lottegame\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ubslum\lottegame\models\GameGuess;

/**
 * GameGuessSearch represents the model behind the search form of `ubslum\lottegame\models\GameGuess`.
 */
class GameGuessSearch extends GameGuess
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['id_member', 'pos_number', 'date_created', 'date_updated', 'fullname', 'email', 'phone', 'identity_number', 'identity_date_created', 'answer_one', 'answer_two'], 'safe'],
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
        $query = GameGuess::find();

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
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
            'identity_date_created' => $this->identity_date_created,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'id_member', $this->id_member])
            ->andFilterWhere(['like', 'pos_number', $this->pos_number])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'identity_number', $this->identity_number])
            ->andFilterWhere(['like', 'answer_one', $this->answer_one])
            ->andFilterWhere(['like', 'answer_two', $this->answer_two]);

        return $dataProvider;
    }
}
