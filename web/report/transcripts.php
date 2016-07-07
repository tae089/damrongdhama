<?php
header("Content-Type:application/vnd.adobe.pdf");
require_once('tcpdf.php');
require_once('fpdi.php');
require_once('cls.php');
require_once('hrclass.php');
$hr = new hrclass;
$cur = new Currency;
$con = new connect_base;
$con->connect();

class PDF extends FPDI {
    /**
     * "Remembers" the template id of the imported page
     */
    var $_tplIdx;
    
    /**
     * include a background template for every page
     */
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('transcript.pdf');
            $this->_tplIdx = $this->importPage(1);
            
        }
        
        $this->useTemplate($this->_tplIdx);
    }
    
    function Footer() {}
}
//=======================================================================
date_default_timezone_set('Asia/Bangkok');
$pdf = new PDF($orientation = 'P', $unit = 'mm', 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false);
$pdf->SetMargins(2, 35, 0, 5);
$pdf->SetAutoPageBreak(true, 5);
//===========================================================================
$class = $_GET['class'];
$room = $_GET['room'];
$school_year = $_GET['school_year'];
$term = $_GET['term'];

//=========================================================================== Plot PDF
$pdf->SetFont("thsarabun", "", 16);
$sql="select t.title_name1,s.student_fname,s.student_lname,s.student_id,s.id from student s,sys_title t where s.title_id=t.title_id and s.room=$room and s.school_year=$school_year";
$rs =$hr->run_sql_select($sql);
$sql="select c.class_name,r.classroom_name from classroom r,classname c where r.id = $room and r.class=c.id";
$cname = $hr->run_sql_select($sql);
$cname1 = split(' ',$cname[0][0]);if(trim($cname1[0])=='มัธยมศึกษาปีที่'){$cc='ม.';}if(trim($cname1[0])=='ประถมศึกษาปีที่'){$cc='ป.';}
$class_room = $cc.$cname1[1].'/'.$cname[0][1]; 
$sql="select teacher_id from teacher_class where classroom=$room";
$rsts=$hr->run_sql_select($sql);$teacher_class='';
foreach ($rsts as $rst) {
    $sql="select t.title_name1,v.fname,v.lname from v_person v,sys_title t where v.person_id=".$rst[teacher_id]." and v.tname = t.title_id";
    $teacher = $hr->run_sql_select($sql);
    $teacher_name1 = $teacher[0][0].$teacher[0][1].' '.$teacher[0][2];
    if($teacher_class=='')
    {
        $teacher_class = $teacher_name1;
    }else{
        $teacher_class = $teacher_class." , ".$teacher_name1;
    }
}
$sql="select p.plan_name,p.id from plan p,plan_class c where c.room=$room and c.plan_id=p.id";
$pname = $hr->run_sql_select($sql);
$plan_name = $pname[0][0];
$pid = $pname[0][1];
$sql = "select c.cause1_id,c.cause1_name,c.unit,c.id from cause1 c,plan_cause p where p.cause1_id=c.id and p.plan_id=$pid and p.class='$class' and c.cause1_type=1 and c.term=$term";
$subjects = $hr->run_sql_select($sql); $num1 = $hr->run_sql_count($sql);
$sql = "select c.cause1_id,c.cause1_name,c.unit,c.id from cause1 c,plan_cause p where p.cause1_id=c.id and p.plan_id=$pid and p.class='$class' and c.cause1_type=2 and c.term=$term";
$subject1s = $hr->run_sql_select($sql); $num2 = $hr->run_sql_count($sql);
$sql = "select c.cause1_id,c.cause1_name,c.unit,c.id from cause1 c,plan_cause p where p.cause1_id=c.id and p.plan_id=$pid and p.class='$class' and c.cause1_type=3 and c.term=$term";
$subject2s = $hr->run_sql_select($sql);
$num = $num1 + $num2;
foreach ($rs as $rs1) {
$grade1=0;$unit1=0;$sum=0;
$pdf->AddPage();
$fullname = trim($rs1[title_name1]).trim($rs1[student_fname]).' '.$rs1[student_lname];
$pdf->SetXY(114.5, 26.8);$pdf->Write(0,$term);
$pdf->SetXY(142, 26.8);$pdf->Write(0,$school_year);
$pdf->SetFont("thsarabun", "", 14);
$pdf->SetXY(55, 36.5);$pdf->Write(0,$fullname);
$pdf->SetXY(132, 36.5);$pdf->Write(0,$class_room);
$pdf->SetXY(160, 36.5);$pdf->Write(0,$rs1[no]);
$pdf->SetXY(48, 55);$pdf->Write(0,$teacher_class);
$pdf->SetXY(48, 45.5);$pdf->Write(0,$plan_name);
$pdf->SetFont("thsarabun", "B", 14);
$pdf->SetXY(35, 78);$pdf->Write(0,'สาระพื้นฐาน');
$pdf->SetFont("thsarabun", "", 14);
$pdf->SetXY(11, 84.5);
$table='<table width="550" border="0" >';

foreach ($subjects as $subject) {
        $sql="select score,grade from grade where student_id=$rs1[id] and cause1_id=$subject[id] and school_year=$school_year";
        $score = $hr->run_sql_select($sql);
        $sql="select max(score) from grade g,student s where g.cause1_id=$subject[id] and s.room=$room and g.school_year=$school_year and g.student_id=s.id";
        $max = $hr->run_sql_select($sql);
        $sql="select min(score) from grade g,student s where g.cause1_id=$subject[id] and s.room=$room and g.school_year=$school_year and g.student_id=s.id";
        $min = $hr->run_sql_select($sql);
        $avg = ($max[0][0]+$min[0][0])/2;
        if($avg==0){$avg='';}
        if($score){$grade=$score[0][1]*$subject[unit];$sum=$sum+$score[0][0];}
        $grade1 = $grade1 + $grade;
        if($subject[unit]){$unit1=$unit1 + $subject[unit];}
        $table.='<tr><td width="65" align="center">'.$subject[cause1_id].'</td><td width="174.5">&nbsp;&nbsp;'.$subject[cause1_name].'</td>
        <td width="50" align="center">'.$subject[unit].'</td><td width="49" align="center">'.$score[0][0].'</td><td width="49" align="center">'.$score[0][1].'</td>
        <td width="50" align="center">'.$min[0][0].'</td><td width="50" align="center">'.$max[0][0].'</td><td width="47" align="center">'.$avg.'</td></tr>'; 
}
$table.='<tr><td width="65" align="center"></td><td width="174.5">&nbsp;&nbsp;<b>สาระเพิ่มเติม</b></td></tr>';
foreach ($subject1s as $subject1) {
        $sql="select score,grade from grade where student_id=$rs1[id] and cause1_id=$subject[id] and school_year=$school_year";
        $score = $hr->run_sql_select($sql);
        $sql="select max(score) from grade g,student s where g.cause1_id=$subject1[id] and s.room=$room and g.school_year=$school_year and g.student_id=s.id";
        $max = $hr->run_sql_select($sql);
        $sql="select min(score) from grade g,student s where g.cause1_id=$subject1[id] and s.room=$room and g.school_year=$school_year and g.student_id=s.id";
        $min = $hr->run_sql_select($sql);
        $avg = ($max[0][0]+$min[0][0])/2;
        if($avg==0){$avg='';}
        if($score){$grade=$score[0][1]*$subject[unit];$sum=$sum+$score[0][0];}
        $grade1 = $grade1 + $grade;
        if($subject1[unit]){$unit1=$unit1 + $subject[unit];}
        $table.='<tr><td width="65" align="center">'.$subject1[cause1_id].'</td><td width="174.5">&nbsp;&nbsp;'.$subject1[cause1_name].'</td>
        <td width="50" align="center">'.$subject1[unit].'</td><td width="49" align="center">'.$score[0][0].'</td><td width="49" align="center">'.$score[0][1].'</td>
        <td width="50" align="center">'.$min[0][0].'</td><td width="50" align="center">'.$max[0][0].'</td><td width="47" align="center">'.$avg.'</td></tr>'; 
}
$sql="select c.cause2_id,c.cause2_name,c.unit,c.id from teach1_student s,teach1 t,cause2 c where s.student_id=$rs1[id] and s.teach1_id = t.id and t.cause2_id = c.id and c.term=1";
$frees = $hr->run_sql_select($sql);
if($frees)
{
    foreach ($frees as $free) {
        $sql="select score,grade from grade_free where student_id=$rs1[id] and cause2_id=$free[id] and school_year=$school_year";
        $score = $hr->run_sql_select($sql);
        $sql="select max(score) from grade_free g,student s where g.cause2_id=$free[id] and s.room=$room and g.school_year=$school_year and g.student_id=s.id";
        $max = $hr->run_sql_select($sql);
        $sql="select min(score) from grade_free g,student s where g.cause2_id=$free[id] and s.room=$room and g.school_year=$school_year and g.student_id=s.id";
        $min = $hr->run_sql_select($sql);
        $avg = ($max[0][0]+$min[0][0])/2;
        if($avg==0){$avg='';}
        if($score){$grade=$score[0][1]*$subject[unit];$sum=$sum+$score[0][0];}
        $grade1 = $grade1 + $grade;
        if($free[unit]){$unit1=$unit1 + $subject[unit];}
        $table.='<tr><td width="65" align="center">'.$free[cause2_id].'</td><td width="174.5">&nbsp;&nbsp;'.$free[cause2_name].'</td>
        <td width="50" align="center">'.$free[unit].'</td><td width="49" align="center">'.$score[0][0].'</td><td width="49" align="center">'.$score[0][1].'</td>
        <td width="50" align="center">'.$min[0][0].'</td><td width="50" align="center">'.$max[0][0].'</td><td width="47" align="center">'.$avg.'</td></tr>'; 
    }
}
$table.='<tr><td width="65" align="center"></td><td width="174.5">&nbsp;&nbsp;<b>กิจกรรม</b></td></tr>';
foreach ($subject2s as $subject2) {
        $sql="select score from score_elective where cause1_id=$subject2[id] and student_id=$rs1[id] and school_year=$school_year";
        $score = $hr->run_sql_select($sql);
        if($score)
        {
           if($score[0][0]==='T'){$pass='ผ';}if($score[0][0]==='F'){$pass='มผ';} 
       }else{$pass='';}
        
        if($subject2[unit]==0){$subject2[unit]='';}
        $table.='<tr><td width="65" align="center">'.$subject2[cause1_id].'</td><td width="174.5">&nbsp;&nbsp;'.$subject2[cause1_name].'</td>
        <td width="50" align="center">'.$subject2[unit].'</td><td width="49" align="center"></td><td width="49" align="center">'.$pass.'</td>
        <td width="50" align="center"></td><td width="50" align="center"></td><td width="47" align="center"></td></tr>'; 
}
$table.='</table>';
$pdf->writeHTML($table , true, false, false, false, '');
$avg1 = $grade1/$unit1;
$avg2 = $sum/$num;
$pdf->SetXY(55, 245.5);$pdf->Write(0,round($avg1,2));
$pdf->SetXY(100, 245.5);$pdf->Write(0,round($avg2,2));
}

$pdf->Output("pt05.pdf", 'I');
?>
