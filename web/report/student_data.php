<?php
require_once 'MPDF57/mpdf.php'; //เรียกใช้งาน mpdf
ob_start(); //คำสั่งในการเริ่มต้นเก็บ HTML ที่แสดงผลบนหน้าจอทั้งหมดใส่ไว้ในตัวแปร

$id=$_GET['id'];
//$name_school=$_GET['name_school'];
//include "../include/session.php";
include "./include/connect.php";
//คำนำหน้า
function get_title($id){
    $sql="select * from sys_title where title_id='".$id."'";
    $query=mysql_query($sql);   
    $result=mysql_fetch_array($query);
    return $result['title_name1'];
}

//ศาสนา
function get_religion($id){
    $sql="select * from sys_religion where id='".$id."'";
    $query=mysql_query($sql);   
    $result=mysql_fetch_array($query);
    if ($result) {
        $data=$result['religion_name'];
    }else{
        $data="-";
    }
    return $data;
}

//อาชืพ
function get_career_type($id){
    $sql="select * from career_type where id='".$id."'";
    $query=mysql_query($sql);   
    $result=mysql_fetch_array($query);
    if ($result) {
        $data=$result['career_type_name'];
    }else{
        $data="-";
    }
    return $data;
}

//สถานะภาพครอบครัว
function get_family_status($id){
    $sql="select * from family_status where id='".$id."'";
    $query=mysql_query($sql);   
    $result=mysql_fetch_array($query);
    if ($result) {
        $data=$result['family_status_name'];
    }else{
        $data="-";
    }
    return $data;
}

//จังหวัด
function get_province($id){
    $sql="select * from sys_province where province_id='".$id."'";
    $query=mysql_query($sql);   
    $result=mysql_fetch_array($query);
    if ($result) {
        $data=$result['province_name'];
    }else{
        $data="-";
    }
    return $data;
}

//อำเภอ
function get_amphoe($id){
    $sql="select * from sys_amphoe where  amphoe_code='".$id."'";
    $query=mysql_query($sql);   
    $result=mysql_fetch_array($query);
    if ($result) {
        $data=$result['amphoe_name'];
    }else{
        $data="-";
    }
    return $data;
}

//ตำบล
function get_district($id){
    $sql="select * from sys_district where  district_code='".$id."'";
    $query=mysql_query($sql);   
    $result=mysql_fetch_array($query);
    if ($result) {
        $data=$result['district_name'];
    }else{
        $data="-";
    }
    return $data;
}

function get_date($data){
 $re = explode('-', $data);
 $dates = $re[2]."/".$re[1]."/".($re[0]+543);
 return $dates;
}

$sql="select * from student
left join classname on classname.id=student.class
left join sys_religion on sys_religion.id=student.religion
left join career_type on career_type.id=student.father_career_type
where student.id='$id'";
$query=mysql_query($sql);	
$result=mysql_fetch_array($query);	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <mata charset="utf-8"/>
    <title>พิมพ์ประวัติส่วนตัวนักเรียน</title>
</head>
<body style="font-family: thsaraban; font-size: 20px;">
    <div style="text-align: center; font-size: 24px;"><b>ประวัติส่วนตัวนักเรียน</b></div>
    <div style="text-align: center; font-size: 24px;"><b>โรงเรียนเทศบาล 6 นครอุดรธานี สังกัดเทศบาลนครอุดรธานี</b></div>
    <br/>
    <table style="width: 100%; border-spacing: inherit; border-collapse: inherit;" border="1">
        <tr>
            <td width="25%" style="border-bottom: inherit; border-left: inherit; border-right: inherit;"><b>เลขประจำตัวประชาชน</b></td>
            <td width="30%" style="border-bottom: inherit; border-left: inherit; border-right: inherit;"><?= $result['id_card']?></td>
            <td width="20%" style="border-bottom: inherit; border-left: inherit; border-right: inherit;"><b>รหัสนักเรียน</b></td>
            <td width="15%" style="border-bottom: inherit; border-left: inherit; border-right: inherit;"><?= $result['student_id']?></td>
            <td width="10%" style="border-bottom: inherit; border-left: inherit; border-right: inherit;"></td>
        </tr>
        <tr>
            <td style="border-top: inherit; border-left: inherit; border-right: inherit;"><b>ชื่อ-นามสกุล</b></td>
            <td style="border-top: inherit; border-left: inherit; border-right: inherit;"><?= get_title($result['title_id']).trim($result['student_fname'])."&nbsp;".$result['student_lname']?></td>
            <td style="border-top: inherit; border-left: inherit; border-right: inherit;"><b>วัน/เดือน/ปีเกิด</b></td>
            <td style="border-top: inherit; border-left: inherit; border-right: inherit;"><?=get_date($result['birth_date']);?></td>
            <td style="border-top: inherit; border-left: inherit; border-right: inherit;"></td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td width="25%"><b>เชื้อชาติ</b></td>
            <td width="30%"><?= ($result['race'])? $result['race'] : "-";?></td>
            <td width="25%"><b>สัญชาติ</b></td>
            <td width="30%"><?= ($result['national'])? $result['national'] : "-";?></td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="20%"><b>ศาสนา</b></td>
            <td width="15%"><?= $result['religion_name']?></td>
            <td><b>น้ำหนัก</b></td>
            <td><?php if($result['weight'] == ""){echo "-";}else{echo $result['weight'];}?> กิโลกรัม</td>

        </tr>
        <tr>
            <td><b>ส่วนสูง</b></td>
            <td><?php if($result['height'] == ""){echo "-";}else{echo $result['height'];}?> เซนติเมตร</td>
            <td><b>หมู่เลือด</b></td>
            <td><?= ($result['blood'])? $result['blood'] : "-";?></td>
            <td></td>
        </tr>
        <tr>
            <td><b>ชั้นปีการศึกษา</b></td>
            <td><?= $result['class_name']?></td>
            <td><b>ชั้น</b></td>
            <td><?= $result['class_name1']?></td>
        </tr>
        <tr>
         <td><b>ห้อง</b></td>
         <td><?= $result['room']?></td>
         <td><b>โทรศัพท์ </b></td>
         <td><?=($result['student_tel'])? $result['student_tel'] : "-";?></td>
     </tr>
     <tr>
        <td><b></b></td>
        <td></td>
        <td><b></b></td>
        <td></td>
        <td></td>
    </tr>
  <!--      <tr>
            <td><b>แผนการเรียน</b></td>
            <td><?php if($result['plan'] == ""){echo "-";}else{echo $result['plan'];}?></td>
            <td><b>ชั้นเรียนสุดท้าย</b></td>
            <td><?php if($result['lastClass'] == ""){echo "-";}else{echo $result['lastClass'];}?></td>
            <td></td>
        </tr> -->
        <tr>
            <td height="30"></td>
            <td height="30"></td>
            <td height="30"></td>
            <td height="30"></td>
            <td height="30"></td>
        </tr>
        <tr>
            <td><b>ชื่อบิดา</b></td>
            <td><?= get_title($result['father_title']).trim($result['father_fname'])."&nbsp;".$result['father_lname']?></td>
            <td><b>ประเภทอาชีพ</b></td>
            <td><?= get_career_type($result['father_career_type']);?></td>
            <td></td>
        </tr>
        <tr>
            <td><b>เชื้อชาติ</b></td>
            <td><?=($result['mother_race'])? $result['mother_race'] : "-";?></td>
            <td><b>สัญชาติ</b></td>
            <td><?=($result['mother_national'])? $result['mother_national'] : "-";?></td>
            <td><b></b></td>
            <td></td>
        </tr>
        <tr>
           <td><b>รายได้/เดือน</b></td>
           <td><?=($result['father_salary'])? number_format($result['father_salary'],2) : "-";?> บาท</td>
       </tr>
       <tr>
        <td><b>ชื่อมารดา</b></td>
        <td><?= get_title($result['mother_title']).trim($result['mother_fname'])."&nbsp;".$result['mother_lname']?></td>
        <td><b>ประภทอาชีพ</b></td>
        <td><?= get_career_type($result['mother_career_type']);?></td>
        <td></td>
    </tr>
    <tr>
        <td><b>เชื้อชาติ</b></td>
        <td><?=($result['mother_race'])? $result['mother_race'] : "-";?></td>
        <td><b>สัญชาติ</b></td>
        <td><?=($result['mother_national'])? $result['mother_national'] : "-";?></td>
        <td></td>
    </tr>
    <tr>
        <td><b>สถานภาพ</b></td>
        <td><?= get_family_status($result['family_status']);?></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td height="30"></td>
        <td height="30"></td>
        <td height="30"></td>
        <td height="30"></td>
        <td height="30"></td>
    </tr>
    <tr>
        <td><b>ชื่อผู้ปกครอง</b></td>
        <td><?= get_title($result['parent_title']).trim($result['parent_fname'])."&nbsp;".$result['parent_lname']?></td>
        <td><b>ประเภทอาชีพ</b></td>
        <td><?= get_career_type($result['parent_career_type'])?></td>
        <td></td>
    </tr>
    <tr>
        <td><b>อาชีพ</b></td>
        <td><?= ($result['parent_career'])? $result['parent_career'] : "-";?></td>
        <td><b>ความเกี่ยวข้อง</b></td>
        <td><?= $result['connected']?></td>
        <td></td>
    </tr>
    <tr>
        <td><b>ความเกี่ยวข้อง</b></td>
        <td><?= ($result['relation'])? $result['relation'] : "-";?></td>
        <td><b>อื่นๆ</b></td>
        <td><?php if($result['other'] == ""){echo "-";}else{echo $result['other'];}?></td>
        <td></td>
    </tr>
       <!--  <tr>
            <td><b>สิทธิการเบิกค่ารักษาพยาบาล</b></td>
            <td><?php if($result['treatment'] == ""){echo "-";}else{echo $result['treatment'];}?></td>
            <td><b>รายได้ต่อปี</b></td>
            <td><?php if($result['revenue'] == ""){echo "-";}else{echo $result['revenue'];}?></td>
            <td><b>บาท</b></td>
        </tr> -->
        <tr>
            <td height="30"></td>
            <td height="30"></td>
            <td height="30"></td>
            <td height="30"></td>
            <td height="30"></td>
        </tr>
        <tr>
            <td><b>ที่อยู่ตามทะเบียนบ้าน</b></td>
            <td colspan="4"><?= ($result['family_ban_no'])? "บ้านเลขที่".$result['family_ban_no'] : "";?>&nbsp;<?=($result['family_moo'])? "หมู่ที่ ".$result['family_moo']: "";?>&nbsp;<?=($result['family_ban_name'])? "ชื่อหมู่บ้าน ".$result['family_ban_name'] : "";?>&nbsp;<?=($result['family_tambol'])? "ต.".get_district($result['family_tambol']): "";?>&nbsp;<?=($result['family_amphoe'])? "อ.".get_amphoe($result['family_amphoe']) : "";?>&nbsp;<?=($result['family_province'])? get_province($result['family_province']) : "";?>&nbsp;<?=($result['family_postcode'])? $result['family_postcode'] : "";?></td>
        </tr>
        <tr>
            <td><b>ที่อยู่ผู้ปกครอง</b></td>
            <td colspan="4"><?= ($result['parent_ban_no'])? "บ้านเลขที่".$result['parent_ban_no'] : "";?>&nbsp;<?=($result['parent_moo'])? "หมู่ที่ ".$result['parent_moo']: "";?>&nbsp;<?=($result['parent_moo'])? "ชื่อหมู่บ้าน ".$result['parent_moo'] : "";?>&nbsp;<?=($result['parent_tambol'])? "ต.".get_district($result['parent_tambol']): "";?>&nbsp;<?=($result['parent_amphoe'])? "อ.".get_amphoe($result['parent_amphoe']) : "";?>&nbsp;<?=($result['parent_province'])? get_province($result['parent_province']) : "";?>&nbsp;<?=($result['parent_postcode'])? $result['parent_postcode'] : "";?></td>
        </tr>
        <tr>
            <td><b>โทรศัพท์</b></td>
            <td><?php if($result['parent_tel'] == ""){echo "-";}else{echo $result['parent_tel'];}?></td>
            <td><b></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b></b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
</html>
<?php
$html = ob_get_contents(); //คำสั่งในการรับค่าการแสดงผลที่เก็บไว้
ob_end_clean(); //คำสั่งในการ clen ค่าใน buffer
$mpdf = new mPdf('th_sarabun'); //ตั้งค่า font ในรูปแบบ THSaraban
$mpdf->WriteHTML($html); //นำค่าที่เก็บไว้แสดงผลออกเป็น pdf
$mpdf->SetJS('this.print();');
$mpdf->Output();