<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ColRequest;

/**
 * ColRequestSearch represents the model behind the search form about `app\models\ColRequest`.
 */
class ColRequest01Search extends ColRequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'req_date', 'req_amphoe', 'req_channel', 'req_type', 'req_name', 'req_name_type', 'req_name1', 'req_name1_type', 'req_topic', 'req_topic_date', 'system_date1', 'req_send_name', 'req_send_date', 'system_date2', 'req_report_date', 'req_report_id', 'req_alert1', 'system_date3', 'req_alert2', 'system_date4', 'req_alert3', 'system_date5', 'req_status', 'req_id','req_year','req_code_file','req_report_date1', 'req_results','req_alert1z','req_alert2z','req_alert3z','req_alert1_comment'], 'safe'],
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
        $user_name = Yii::$app->user->identity->username;
        $dt = new \DateTime(date('Y-m-d H:i:s'));
        $ts = $dt->getTimestamp();
        $query = ColRequest::find()->where(['req_alert1'=>'','req_report_id'=>'','req_send_date'=>['$ne'=>''],'req_status'=>['$ne'=>'ยุติเรื่อง'],'req_out'=>'F']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['req_date'=>SORT_DESC]]
        ]);
        $dataProvider->pagination->pageSize=10;
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if($this->req_alert1z){
            $data=explode(' - ', $this->req_alert1z);
            if($data[0]){
                $datend = ['$gte'=>new \MongoDate(strtotime($data[0].' 00:00:00')),'$lte'=>new \MongoDate(strtotime($data[1].' 23:59:59'))];
            }

        }else{$datend = $this->req_alert1z;}

        if($this->req_alert1){
            $data1=explode(' - ', $this->req_alert1);
            if($data1[0]){
                $daten1 = ['$gte'=>new \MongoDate(strtotime($data1[0].' 00:00:00')),'$lte'=>new \MongoDate(strtotime($data1[1].' 23:59:59'))];
            }

        }else{$daten1 = $this->req_alert1;} 
        

        $query->andFilterWhere([
            'req_alert1z' => $datend,
            'req_alert1' => $daten1,
        ]);

        // grid filtering conditions
        $query->andFilterWhere(['like', '_id', $this->_id])
            //->andFilterWhere(['like', 'req_date', $this->req_date])
            ->andFilterWhere(['like', 'req_amphoe', $this->req_amphoe])
            ->andFilterWhere(['like', 'req_channel', $this->req_channel])
            ->andFilterWhere(['like', 'req_type', $this->req_type])
            ->andFilterWhere(['like', 'req_name', $this->req_name])
            ->andFilterWhere(['like', 'req_name_type', $this->req_name_type])
            ->andFilterWhere(['like', 'req_name1', $this->req_name1])
            ->andFilterWhere(['like', 'req_name1_type', $this->req_name1_type])
            ->andFilterWhere(['like', 'req_topic', $this->req_topic])
            //->andFilterWhere(['like', 'req_topic_date', $this->req_topic_date])
            ->andFilterWhere(['like', 'system_date1', $this->system_date1])
            ->andFilterWhere(['like', 'req_send_name', $this->req_send_name])
            //->andFilterWhere(['like', 'req_send_date', $this->req_send_date])
            ->andFilterWhere(['like', 'system_date2', $this->system_date2])
            //->andFilterWhere(['like', 'req_report_date', $this->req_report_date])
            ->andFilterWhere(['like', 'req_report_id', $this->req_report_id])
            //->andFilterWhere(['like', 'req_alert1', $this->req_alert1])
            ->andFilterWhere(['like', 'system_date3', $this->system_date3])
            //s->andFilterWhere(['like', 'req_alert2', $this->req_alert2])
            ->andFilterWhere(['like', 'system_date4', $this->system_date4])
            ->andFilterWhere(['like', 'req_alert3', $this->req_alert3])
            ->andFilterWhere(['like', 'system_date5', $this->system_date5])
            ->andFilterWhere(['like', 'req_status', $this->req_status])

            ->andFilterWhere(['like', 'req_year', $this->req_year])
            ->andFilterWhere(['like', 'req_code_file', $this->req_code_file])
            ->andFilterWhere(['like', 'req_alert1_comment', $this->req_alert1_comment])
            
            ->andFilterWhere(['like', 'req_id', $this->req_id])
            ->andFilterWhere(['like', 'req_results', $this->req_results]);

        return $dataProvider;
    }
}
