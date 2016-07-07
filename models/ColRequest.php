<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "col_request".
 *
 * @property \MongoId|string $_id
 * @property mixed $req_date
 * @property mixed $req_amphoe
 * @property mixed $req_channel
 * @property mixed $req_type
 * @property mixed $req_name
 * @property mixed $req_name_type
 * @property mixed $req_name1
 * @property mixed $req_name1_type
 * @property mixed $req_topic
 * @property mixed $req_topic_date
 * @property mixed $system_date1
 * @property mixed $req_send_name
 * @property mixed $req_send_date
 * @property mixed $system_date2
 * @property mixed $req_report_date
 * @property mixed $req_report_id
 * @property mixed $req_alert1
 * @property mixed $system_date3
 * @property mixed $req_alert2
 * @property mixed $system_date4
 * @property mixed $req_alert3
 * @property mixed $system_date5
 * @property mixed $req_status
 * @property mixed $req_id
 */
class ColRequest extends \yii\mongodb\ActiveRecord
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
            'req_date',
            'req_amphoe',
            'req_channel',
            'req_type',
            'req_name',
            'req_name_type',
            'req_name1',
            'req_name1_type',
            'req_topic',
            'req_topic_date',
            'system_date1',
            'req_send_name',
            'req_send_date',
            'system_date2',
            'req_report_date',
            'req_report_id',
            'req_alert1',
            'system_date3',
            'req_alert2',
            'system_date4',
            'req_alert3',
            'system_date5',
            'req_status',
            'req_id',
            'req_report_date1',
            'req_code_file',
            'req_year',
            'req_date',
            'req_results',
            'req_alert1z',
            'req_alert2z',
            'req_alert3z',
            'req_alert1_comment',
            'req_alert2_comment',
            'req_alert3_comment',
            'req_update',
            'req_update_date1',
            'req_update_detail1',
            'req_update_user1',
            'req_update_show',
            'req_rec_new',
            'req_send_id',
            'req_name_age',
            'req_name_add',
            'req_name_tel',
            'req_name_office',
            'req_name_office_tel',
            'req_name1_age',
            'req_name1_add',
            'req_name1_tel',
            'req_name1_office',
            'req_name1_office_tel',
            'req_premise',
            'req_assign',
            'req_out',
            'req_name01',
            'req_name11',
            'req_send_id01',
            'req_send_date01',
            'req_date_report',
            'req_report_dates',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['req_date', 'req_amphoe', 'req_channel', 'req_type', 'req_name', 'req_name_type', 'req_name1', 'req_name1_type', 'req_topic', 'req_topic_date', 'system_date1', 'req_send_name', 'req_send_date', 'system_date2', 'req_report_date', 'req_report_id', 'req_alert1', 'system_date3', 
            'req_alert2', 'system_date4', 'req_alert3', 'system_date5', 'req_status', 'req_id','req_report_date1','req_code_file','req_year','req_date','req_results','req_alert1z','req_alert2z','req_alert3z','req_alert1_comment','req_alert2_comment','req_alert3_comment','req_update','req_update_date1','req_update_detail1','req_update_user1','req_update_show','req_rec_new','req_send_id', 'req_name_age','req_name_add','req_name_tel','req_name_office','req_name_office_tel','req_name1_age','req_name1_add','req_name1_tel','req_name1_office','req_name1_office_tel','req_premise','req_assign','req_out','req_name01','req_name11','req_send_id01','req_send_date01','req_date_report','req_report_dates'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'req_date' => 'วันที่แจ้ง(ผู้แจ้ง)',
            'req_amphoe' => 'อำเภอ',
            'req_channel' => 'ช่องทาง',
            'req_type' => 'ประเภทเรื่องร้องเรียน',
            'req_name' => 'ชื่อผู้ร้อง',
            'req_name_type' => 'ประเภทผู้ร้อง',
            'req_name1' => 'ชื่อผู้ถูกร้อง',
            'req_name1_type' => 'ประเภทผู้ถูกร้อง',
            'req_topic' => 'เรื่องร้องเรียน',
            'req_topic_date' => 'วันที่รับเรื่อง',
            'system_date1' => 'System Date1',
            'req_send_name' => 'หน่วยงานที่รับผิดชอบ',

            'system_date2' => 'System Date2',
            'req_report_date' => 'วันที่หน่วยงานต้องรายงาน',


            'req_report_date1' => 'ลงวันที่หนังสือส่ง',
            'req_report_id' => 'เลขที่หนังสือส่ง',

            'req_send_date' => 'ลงวันที่หนังสือรับ',
            'req_send_id' => 'เลขที่หนังสือรับ',


            // 'req_report_date1' => 'ลงวันที่หนังสือรับ',
            // 'req_report_id' => 'เลขที่หนังสือรับ',

            // 'req_send_date' => 'ลงวันที่หนังสือส่ง',
            // 'req_send_id' => 'เลขที่หนังสือส่ง',


            'req_alert1' => 'วันที่แจ้งเตือนครั้งที่ 1',
            'system_date3' => 'System Date3',
            'req_alert2' => 'วันที่แจ้งเตือนครั้งที่ 2',
            'system_date4' => 'System Date4',
            'req_alert3' => 'วันที่แจ้งเตือนครั้งที่ 3',
            'system_date5' => 'System Date5',
            'req_status' => 'สถานะเรื่องร้องเรียน',
            'req_id' => 'ผู้บันทึก',
            'req_year'=>'ปีที่ดำเนินการ',
            'req_code_file'=>'รหัสแฟ้ม',
            'req_date'=>'วันที่ร้องทุกข์',
            'req_results'=>'ผลการดำเนินการ',
            'req_alert1_comment' => 'หมายเหตุ(1)',
            'req_alert1z'=>'วันทีหน่วยงานต้องรายงาน',
            'req_alert2z'=>'วันที่ต้องรายงานครั้งที่ 2',
            'req_alert3z'=>'วันที่ต้องรายงานครั้งที่ 3',
            'req_alert2_comment'=>'หมายเหตุ(2)',
            'req_alert3_comment' =>'หมายเหตุ(3)',
            'req_update_show'=>'ความคืบหน้า',
            'req_name_age'=>'อายุ',
            'req_name_add'=>'ที่อยู่',
            'req_name_tel'=>'หมายเลขโทรศัพท์',
            'req_name_office'=>'สถานที่ทำงาน',
            'req_name_office_tel'=>'หมายเลขโทรศัพท์ที่ทำงาน',
            'req_name1_age'=>'อายุ',
            'req_name1_add'=>'ที่อยู่',
            'req_name1_tel'=>'หมายเลขโทรศัพท์',
            'req_name1_office'=>'สถานที่ทำงาน',
            'req_name1_office_tel'=>'หมายเลขโทรศัพท์',
            'req_premise'=>'หลักฐานประกอบคำร้องเรียน',
            'req_assign'=>'ชื่อผู้รับผิดชอบ',
            'req_out'=>'สถานะ',
            'req_name01'=>'จาก',
            'req_name11'=>'ถึง',
            'req_send_id01'=>'เลขที่หนังสือ',
            'req_send_date01' => 'ลงวันที่หนังสือ',
            'req_date_report'=>'หน่วยงานต้องรายงานกลับภายใน(วัน)',
            'req_report_dates'=>'วันที่รายงาน',
            

        ];
    }
}
