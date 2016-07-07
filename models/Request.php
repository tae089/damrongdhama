<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "request".
 *
 * @property \MongoId|string $_id
 * @property mixed $req_code_file
 * @property mixed $req_report_id
 * @property mixed $req_report_date1
 * @property mixed $req_amphoe
 * @property mixed $req_channel
 * @property mixed $req_channel_remark
 * @property mixed $req_name_type
 * @property mixed $req_name
 * @property mixed $req_name_type1
 * @property mixed $req_name1
 * @property mixed $req_topic
 * @property mixed $req_topic_date
 * @property mixed $req_send_name
 * @property mixed $req_send_date
 * @property mixed $req_report_date
 * @property mixed $req_status
 * @property mixed $req_type
 * @property mixed $req_report_date2
 * @property mixed $req_alert1
 * @property mixed $req_alert2
 * @property mixed $req_alert3
 */
class Request extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['damrongdhama', 'request'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'req_year',
            'req_code_file',
            'req_report_id',
            'req_report_date1',
            'req_amphoe',
            'req_channel',
            'req_channel_remark',
            'req_name_type',
            'req_name',
            'req_name_type1',
            'req_name1',
            'req_topic',
            'req_topic_date',
            'req_send_name',
            'req_send_date',
            'req_report_date',
            'req_status',
            'req_type',
            'req_report_date2',
            'req_alert1',
            'req_alert2',
            'req_alert3',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['req_code_file', 'req_year','req_report_id', 'req_report_date1', 'req_amphoe', 'req_channel', 'req_channel_remark', 'req_name_type', 'req_name', 'req_name_type1', 'req_name1', 'req_topic', 'req_topic_date', 'req_send_name', 'req_send_date', 'req_report_date', 'req_status', 'req_type', 'req_report_date2', 'req_alert1', 'req_alert2', 'req_alert3'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'req_year' => 'ปีที่ดำเนินการ',
            'req_code_file' => 'รหัสแฟ้ม',
            'req_report_id' => 'เลขที่หนังสือรับ ',
            'req_report_date1' => 'ลงวันที่หนังสือรับ',
            'req_amphoe' => 'อำเภอ',
            'req_channel' => 'ช่องทางรับเรื่อง',
            'req_channel_remark' => 'หมายเหตุช่องทางการรับเรื่อง',
            'req_name_type' => 'ประเภทผู้ร้องทุกข์',
            'req_name' => 'ชื่อผู้ร้องทุกข์',
            'req_name_type1' => 'ประเภทผู้ถูกร้องทุกข์',
            'req_name1' => 'ชื่อผู้ถูกร้องทุกข์',
            'req_topic' => 'เรื่องร้องเรียน',
            'req_topic_date' => 'วันที่รับเรื่อง',
            'req_send_name' => 'หน่วยงานที่รับผิดชอบ',
            'req_send_date' => 'วันที่ส่งให้หน่วยงาน',
            'req_report_date' => 'วันที่หน่วยงานที่รับผิดชอบต้องรายงาน',
            'req_status' => 'สถานะดำเนินการ',
            'req_type' => 'ประเภทเรื่องร้องทุกข์',
            'req_report_date2' => 'ลงวันที่รายงาน(สถานะ) ',
            'req_alert1' => 'วันที่เตือนครั้งที่ 1',
            'req_alert2' => 'วันที่เตือนครั้งที่ 2',
            'req_alert3' => 'วันที่เตือนครั้งที่ 3',
        ];
    }
}
