<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StartFinish;

/**
 * StartFinishSearch represents the model behind the search form about `common\models\StartFinish`.
 */
class StartFinishSearch extends StartFinish
{
    /**
     * @inheritdoc
     */
    public $fio;

    public function rules()
    {
        return [
            [['id_sf', 'empl_id', 'created_at', 'updated_at'], 'integer'],
            [['notes'], 'safe'],
            [['fio'],'safe'],
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
        $query = StartFinish::find();

        $query->joinWith(['user']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['fio'] = [

            'asc' => ['fio' => SORT_ASC],
            'desc' => ['fio' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_sf' => $this->id_sf,
            'empl_id' => $this->empl_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(["DATE_FORMAT(FROM_UNIXTIME(start_finish.created_at),'%d-%m-%Y' )"=>date('d-m-Y')]);
        $query->andFilterWhere(['like', 'notes', $this->notes]);
        $query->andFilterWhere(['like', 'fio', $this->fio]);

        return $dataProvider;
    }
}
