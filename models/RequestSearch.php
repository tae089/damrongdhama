<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Request;

/**
 * RequestSearch represents the model behind the search form about `app\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id','req_year', 'req_code_file', 'req_report_id', 'req_report_date1', 'req_amphoe', 'req_channel', 'req_channel_remark', 'req_name_type', 'req_name', 'req_name_type1', 'req_name1', 'req_topic', 'req_topic_date', 'req_send_name', 'req_send_date', 'req_report_date', 'req_status', 'req_type', 'req_report_date2', 'req_alert1', 'req_alert2', 'req_alert3'], 'safe'],
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
        $query = Request::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['req_topic_date'=>SORT_DESC]]
        ]);
 
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions

       if($this->req_topic_date) {
            $data1 = split('>',$this->req_topic_date);
            $data2 = split('<',$this->req_topic_date);
            if($data1[1]){$daten = ['$gt'=>new \MongoDate(strtotime($data1[1].' 00:00:00'))];}
            else if($data2[1]){$daten = ['$lt'=>new \MongoDate(strtotime($data2[1].' 00:00:00'))];}
            else{
                $daten = ['$gte'=>new \MongoDate(strtotime($this->req_topic_date.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($this->req_topic_date.' 23:59:59'))];
            }

        }else{$daten = $this->req_topic_date;}
        //=====================================
        if($this->req_report_date1) {
            $data1 = split('>',$this->req_report_date1);
            $data2 = split('<',$this->req_report_date1);
            if($data1[1]){$daten1 = ['$gt'=>new \MongoDate(strtotime($data1[1].' 00:00:00'))];}
            else if($data2[1]){$daten1 = ['$lt'=>new \MongoDate(strtotime($data2[1].' 00:00:00'))];}
            else{
                $daten1 = ['$gte'=>new \MongoDate(strtotime($this->req_report_date1.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($this->req_report_date1.' 23:59:59'))];
            }

        }else{$daten1 = $this->req_report_date1;}
        //=====================================
        if($this->req_send_date) {
            $data1 = split('>',$this->req_send_date);
            $data2 = split('<',$this->req_send_date);
            if($data1[1]){$daten2 = ['$gt'=>new \MongoDate(strtotime($data1[1].' 00:00:00'))];}
            else if($data2[1]){$daten2 = ['$lt'=>new \MongoDate(strtotime($data2[1].' 00:00:00'))];}
            else{
                $daten2= ['$gte'=>new \MongoDate(strtotime($this->req_send_date.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($this->req_send_date.' 23:59:59'))];
            }

        }else{$daten2 = $this->req_send_date;}
        //=====================================
        if($this->req_report_date) {
            $data1 = split('>',$this->req_report_date);
            $data2 = split('<',$this->req_report_date);
            if($data1[1]){$daten3 = ['$gt'=>new \MongoDate(strtotime($data1[1].' 00:00:00'))];}
            else if($data2[1]){$daten3 = ['$lt'=>new \MongoDate(strtotime($data2[1].' 00:00:00'))];}
            else{
                $daten3 = ['$gte'=>new \MongoDate(strtotime($this->req_report_date.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($this->req_report_date.' 23:59:59'))];
            }

        }else{$daten3 = $this->req_report_date;}
        //=====================================
        if($this->req_report_date2) {
            $data1 = split('>',$this->req_report_date2);
            $data2 = split('<',$this->req_report_date2);
            if($data1[1]){$daten4 = ['$gt'=>new \MongoDate(strtotime($data1[1].' 00:00:00'))];}
            else if($data2[1]){$daten4 = ['$lt'=>new \MongoDate(strtotime($data2[1].' 00:00:00'))];}
            else{
                $daten4 = ['$gte'=>new \MongoDate(strtotime($this->req_report_date2.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($this->req_report_date2.' 23:59:59'))];
            }

        }else{$daten4 = $this->req_report_date2;}
        if($this->req_year){
            
            $this->req_year = (int)$this->req_year;
        }
        //var_dump($this->req_year);
    //=====================================
        $query->andFilterWhere([
            'req_topic_date' => $daten,
            'req_report_date1' => $daten1,
            'req_send_date' => $daten2,
            'req_report_date' => $daten3,
            'req_report_date2' => $daten4,
            'req_year' => $this->req_year,
        ]);

        $query->andFilterWhere(['like', '_id', $this->_id])
           // ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'req_code_file', $this->req_code_file])
            ->andFilterWhere(['like', 'req_report_id', $this->req_report_id])
          //  ->andFilterWhere(['like', 'req_report_date1', $this->req_report_date1])
            ->andFilterWhere(['like', 'req_amphoe', $this->req_amphoe])
            ->andFilterWhere(['like', 'req_channel', $this->req_channel])
            ->andFilterWhere(['like', 'req_channel_remark', $this->req_channel_remark])
            ->andFilterWhere(['like', 'req_name_type', $this->req_name_type])
            ->andFilterWhere(['like', 'req_name', $this->req_name])
            ->andFilterWhere(['like', 'req_name_type1', $this->req_name_type1])
            ->andFilterWhere(['like', 'req_name1', $this->req_name1])
            ->andFilterWhere(['like', 'req_topic', $this->req_topic])
            //->andFilterWhere(['like', 'req_topic_date', $this->req_topic_date])
            ->andFilterWhere(['like', 'req_send_name', $this->req_send_name])
           // ->andFilterWhere(['like', 'req_send_date', $this->req_send_date])
          //  ->andFilterWhere(['like', 'req_report_date', $this->req_report_date])
            ->andFilterWhere(['like', 'req_status', $this->req_status])
            ->andFilterWhere(['like', 'req_type', $this->req_type])
            //->andFilterWhere(['like', 'req_report_date2', $this->req_report_date2])
            ->andFilterWhere(['like', 'req_alert1', $this->req_alert1])
            ->andFilterWhere(['like', 'req_alert2', $this->req_alert2])
            ->andFilterWhere(['like', 'req_alert3', $this->req_alert3]);

        return $dataProvider;
    }
}
