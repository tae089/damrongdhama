<?php
class hrclass
{
//===================== generate xfdf

function thainum($num){  
    return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),  
    array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),  
    $num);  
}

function createXFDF( $file, $info, $enc='UTF-8' )
{
    $data = '<?xml version="1.0" encoding="'.$enc.'"?>' . "\n" .
        '<xfdf xmlns="http://ns.adobe.com/xfdf/" xml:space="preserve">' . "\n" .
        '<fields>' . "\n";
    foreach( $info as $field => $val )
    {
        $data .= '<field name="' . $field . '">' . "\n";
        if( is_array( $val ) )
        {
            foreach( $val as $opt )
                $data .= '<value>' .
                    htmlentities( $opt, ENT_COMPAT, $enc ) .
                    '</value>' . "\n";
        }
        else
        {
            $data .= '<value>' .
                htmlentities( $val, ENT_COMPAT, $enc ) .
                '</value>' . "\n";
        }
        $data .= '</field>' . "\n";
    }
    $data .= '</fields>' . "\n" .
        '<ids original="' . md5( $file ) . '" modified="' .
            time() . '" />' . "\n" .
        '<f href="' . $file . '" />' . "\n" .
        '</xfdf>' . "\n";
    return $data;
}
//===================== get date diff
function year_datediff($datez){
$sql="select year(now())";$exec=mysql_query($sql);$rs0=mysql_fetch_array($exec);
//echo $rs0[0]."<br>";
$nowyear=$rs0[0];
$sql="select year('$datez')";$exec=mysql_query($sql);$rs1=mysql_fetch_array($exec);
//echo $rs1[0]."<br>";
$byear=$rs1[0];
$yeardiff=$nowyear - $byear;
//echo $yeardiff."<br>";

$sql="select month(now())";$exec=mysql_query($sql);$rs0=mysql_fetch_array($exec);
//echo $rs0[0]."<br>";
$nowmonth=$rs0[0];
$sql="select month('$datez')";$exec=mysql_query($sql);$rs1=mysql_fetch_array($exec);
//echo $rs1[0]."<br>";
$bmonth=$rs1[0];

if($rs1[0] > $rs0[0]){$yeardiff--;}
if($nowmonth==$bmonth){
$sql="select day(now())";$exec=mysql_query($sql);$rsday1=mysql_fetch_array($exec);
$sql="select day('$datez')";$exec=mysql_query($sql);$rsday2=mysql_fetch_array($exec);
if($rsday2[0] > $rsday1[0]){$yeardiff--;}
}
return $yeardiff;
}
//===================== change date to inter ============================================
function gen_doc_id($table){	
$d=date('Ymd');
$sql="select * from $table where substring(form_no,1,8)='$d'";
$exec=mysql_query($sql);
$num=mysql_num_rows($exec);
$form=split('form',$table);

$rows=($num-0)+(1-0);
if(strlen($rows)==1){$rows="00".$rows;}
if(strlen($rows)==2){$rows="0".$rows;}
$docid=$d.$form[1].$rows;
return $docid;
}
function change_datetobase($datez){
	if(trim($datez)==""){
		$date2=0;		
	}else{
	$date1=split('-',$datez);
	$date2=($date1[2]-543)."-".$date1[1]."-".$date1[0];
	$date2=strtotime($date2);
	}
	return $date2;
}
function change_datetobaseY($datez){
	if(trim($datez)==""){
		$date2=0;		
	}else{
	$date1=split('-',$datez);
	$date2=($date1[2]-543)."-".$date1[1]."-".$date1[0];
	//$date2=strtotime($date2);
	}
	return $date2;
}
function change_basetodate($datez){
	if($datez==0){
		$date2="";	
	}else{
//	$datez = date("Y-m-d",$datez);
	$date1=split('-',$datez);
	$date2=$date1[2]."-".$date1[1]."-".($date1[0]+543);
	}
	return $date2;
}
function change_basetodateT($datez){
	if($datez==0){
		$date2="";	
	}else{
	$datez = date("Y-m-d",$datez);
	$date1=split('-',$datez);
	$date2=$date1[2]."-".$date1[1]."-".($date1[0]+543);
	}
	return $date2;
}
function pid_format($pid){
$d1=substr("$pid",0,1);
$d2=substr("$pid",1,4);
$d3=substr("$pid",5,5);
$d4=substr("$pid",10,2);
$d5=substr("$pid",12,1);
if($d1==""&&$d2==""&&$d3==""&&$d4==""&&$d5==""){
return "";
}else{
return $d1."-".$d2."-".$d3."-".$d4."-".$d5;
}
}
function get_date($state,$flag){
if($state=="now"){
$nowyear=date("Y")+543;
$nowmonth=date("m");
$nowday=date("d");
}else{
$date1=split("-",$state);
$nowyear=$date1[0]+543;
$nowmonth=$date1[1];
$nowday=$date1[2];
}
switch ($nowmonth){
	case '1' :
				$month1="มกราคม";break;
	case '2' :
				$month1="กุมภาพันธ์";break;
	case '3' :
				$month1="มีนาคม";break;
	case '4' :
				$month1="เมษายน";break;
	case '5' :
				$month1="พฤษภาคม";break;
	case '6' :
				$month1="มิถุนายน";break;
	case '7' :
				$month1="กรกฏาคม";break;
	case '8' :
				$month1="สิงหาคม";break;
	case '9' :
				$month1="กันยายน";break;
	case '10' :
				$month1="ตุลาคม";break;
	case '11' :
				$month1="พฤศจิกายน";break;
	case '12' :
				$month1="ธันวาคม";break;
	
}
if($flag=="y"){if($nowyear=="543"){return "";}else{return $nowyear;}}
if($flag=="m"){return $month1;}
if($flag=="d"){if($nowday=="00"){return "";}else{return $nowday;}}
}

function get_dateS($state,$flag){
if($state=="now"){
$nowyear=date("Y")+543;
$nowmonth=date("m");
$nowday=date("d");
}else{
$date1=split("-",$state);
$nowyear=$date1[0]+543;
$nowmonth=$date1[1];
$nowday=$date1[2];
}
switch ($nowmonth){
	case '1' :
				$month1="ม.ค.";break;
	case '2' :
				$month1="ก.พ.";break;
	case '3' :
				$month1="มี.ค.";break;
	case '4' :
				$month1="เม.ย.";break;
	case '5' :
				$month1="พ.ค.";break;
	case '6' :
				$month1="มิ.ย.";break;
	case '7' :
				$month1="ก.ค.";break;
	case '8' :
				$month1="ส.ค.";break;
	case '9' :
				$month1="ก.ย.";break;
	case '10' :
				$month1="ต.ค.";break;
	case '11' :
				$month1="พ.ย.";break;
	case '12' :
				$month1="ธ.ค.";break;
	
}
if($flag=="y"){if($nowyear=="543"){return "";}else{return $nowyear;}}
if($flag=="m"){return $month1;}
if($flag=="d"){if($nowday=="00"){return "";}else{return $nowday;}}
}

function datediff1($datez,$flag){
$date1 = split("-",$datez);
$year1=$date1[2];$month1=$date1[1];$day1=$date1[0];
$year1=$year1-543;
$date1=$year1.'-'.$month1.'-'.$day1;
$birthday = $date1;      
$today = date("Y-m-d");   

	

list($byear, $bmonth, $bday)= explode("-",$birthday);      
list($tyear, $tmonth, $tday)= explode("-",$today);          
		
$mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear); 
$mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
$mage = ($mnow - $mbirthday);
//return $mage;	
$u_y=date("Y", $mage)-1970;
$u_m=date("m",$mage)-1;
$u_d=date("d",$mage)-1;
if($flag=="1"){
$year1=$year1+60+543;
switch ($month1){
	case '1' :
				$month1="มกราคม";break;
	case '2' :
				$month1="กุมภาพันธ์";break;
	case '3' :
				$month1="มีนาคม";break;
	case '4' :
				$month1="เมษายน";break;
	case '5' :
				$month1="พฤษภาคม";break;
	case '6' :
				$month1="มิถุนายน";break;
	case '7' :
				$month1="กรกฏาคม";break;
	case '8' :
				$month1="สิงหาคม";break;
	case '9' :
				$month1="กันยายน";break;
	case '10' :
				$month1="ตุลาคม";break;
	case '11' :
				$month1="พฤศจิกายน";break;
	case '12' :
				$month1="ธันวาคม";break;
	
}
$end_date=$day1." ".$month1." ".$year1;
return "$u_y   ปี    $u_m เดือน      $u_d  วัน|$end_date";
}else{
	if($mage==0){
		return "0   ปี    0 เดือน      0  วัน";
		
	}
	if($mage<0){
		return "0   ปี    0 เดือน      -1  วัน";
		
	}
	if($mage>0){
		
return "$u_y   ปี    $u_m เดือน      $u_d  วัน";
	}
}
	

}

function datediff($datez,$flag){
$date1 = split("-",$datez);
$year1=$date1[2];$month1=$date1[1];$day1=$date1[0];
$year1=$year1-543;$date1=$year1.'-'.$month1.'-'.$day1;
$birthday = $date1;      
$today = date("Y-m-d");   
		

list($byear, $bmonth, $bday)= explode("-",$birthday);      
list($tyear, $tmonth, $tday)= explode("-",$today);          
		
$mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear); 
$mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
$mage = ($mnow - $mbirthday);
	
$u_y=date("Y", $mage)-1970;
$u_m=date("m",$mage)-1;
$u_d=date("d",$mage)-1;
if($flag=="1"){
$year1=$year1+60+543;
switch ($month1){
	case '1' :
				$month1="มกราคม";break;
	case '2' :
				$month1="กุมภาพันธ์";break;
	case '3' :
				$month1="มีนาคม";break;
	case '4' :
				$month1="เมษายน";break;
	case '5' :
				$month1="พฤษภาคม";break;
	case '6' :
				$month1="มิถุนายน";break;
	case '7' :
				$month1="กรกฏาคม";break;
	case '8' :
				$month1="สิงหาคม";break;
	case '9' :
				$month1="กันยายน";break;
	case '10' :
				$month1="ตุลาคม";break;
	case '11' :
				$month1="พฤศจิกายน";break;
	case '12' :
				$month1="ธันวาคม";break;
	
}
$end_date=$day1." ".$month1." ".$year1;
return "$u_y   ปี    $u_m เดือน      $u_d  วัน|$end_date";
}else{
return "$u_y   ปี    $u_m เดือน      $u_d  วัน";
}
	
}
//=======================================
function count_position($id){
$sql="SELECT * from line where substring(line_id,1,2)='$id'";$exec=mysql_query($sql);
$totolnum=0;
while($rs=mysql_fetch_array($exec)){
	$id1=$rs[line_id];
	$sql1="select * from position where substring(p_id,4,4)=$id1 and id=''";$exec1=mysql_query($sql1);
	$num=mysql_num_rows($exec1);
	//echo $num."<br>";
	$totalnum=($totalnum-0)+($num-0);
	
}
return $totalnum;
	
}
//================= add table ===========================================================
function add_table_noauto($tablename,$data){
	$sql="SHOW COLUMNS FROM $tablename";$exec=mysql_query($sql);
	//return $data[0].":".$data[1];
	$str="";$n=0;$str1="";
	while($rs=mysql_fetch_array($exec)){
		if($n > 0){
			if($str==""){$str=$rs[0];}else{	$str=$str.",".$rs[0];}
		}
		$n++;
	}
	//return $str;
	for($i=0;$i<count($data);$i++){
		if($str1==""){$str1="'".$data[$i]."'";}else{$str1=$str1.",'".$data[$i]."'";}
	}
	$sql="insert into $tablename ($str)values($str1)";
	mysql_query($sql);
	return $sql;
}

//================= หาข้อมูล field จาก table ==============================================
function show_data($table,$where){
	if($where=='none'){
		$sql="select * from $table";
	}else{
		$sql="select * from $table where $where";
	}
	$exec=mysql_query($sql);
	while($rs=mysql_fetch_array($exec)){
		$rs1[]=$rs;	
	}
	return $rs1;
}
function show_field($table,$field,$where){
	$sql="select $field from $table where $where";
	$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);	
	return $rs;
}
function show_data_order($table,$where,$order){
	if($where=='none'){
	$sql="select * from $table order by $order";
	}else{
	$sql="select * from $table where $where order by $order";
	}
	$exec=mysql_query($sql);
	while($rs=mysql_fetch_array($exec)){
		$rs1[]=$rs;	
	}
	return $rs1;
}
function run_sql_update($sql){
	mysql_query($sql);
}
function run_sql_count($sql){
	$exec=mysql_query($sql);
	$num=mysql_num_rows($exec);
	return $num;
	
}
function run_sql_select($sql){
	$exec=mysql_query($sql);
	while($rs=mysql_fetch_array($exec)){
		$rs1[]=$rs;	
	}
	return $rs1;
}
function update_data($table,$field,$data,$fieldmark,$mark){
	if(count($field)==count($data)){
		$sql='';
	for($i=0;$i<count($data);$i++){
		if($sql==''){
			$sql="$field[$i]='$data[$i]'";
		}else{ $sql=$sql.",$field[$i]='$data[$i]'";}	
		
	}
	$sql1="update $table set $sql where $fieldmark='$mark'";$exec=mysql_query($sql1);
	if($exec){return true;}else{return false;}
	}else{ return false;}
	
}
function del_data($table,$fieldmark,$mark){
	$sql="delete from $table where $fieldmark='$mark'";$exec=mysql_query($sql);
	if($exec){return true;}else{return false;}
}
//================= ค้นหาคำนำหน้านาม ชื่อ สกุล และ ทั้งหมด จาก รหัสพนักงาน ===========================
function show_fullname($id,$flag){
	$sql="select tname,fname,lname from person where id='$id'";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);	
	$tname=$rs[tname];$sqltname="select title_name1 from title where title_id=$tname";$exectname=mysql_query($sqltname);
	$rstname=mysql_fetch_array($exectname);$titlename=$rstname[0];
	switch ($flag) {
		case "tname" :	
							return $titlename;
							break;
		case "fname" :
							return $rs[1];
							break;
		case "lname" :
							return $rs[2];
							break;
		case "fullname" :
							return $titlename.$rs[1]." ".$rs[2];
							
	}
	
}

//================= ค้นหาชื่อ สังกัด/กอง จาก รหัส============================================
function show_lvlname($id){
	$sql1="select lvl_id from position where id='$id'";$exec1=mysql_query($sql1);$rs1=mysql_fetch_array($exec1);$lvl_id=$rs1[0];
	
	$len=strlen($lvl_id);
	
	switch ($len){
		case "2" :
					 $sql="select lvl1_name from lvl1 where lvl1_id='$lvl_id' ";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);
					 return $rs[0];
					 break;
		case "4" :
					 $lvl_id1=substr($lvl_id,0,2);
					 $sql="select lvl1_name from lvl1 where lvl1_id='$lvl_id1' ";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);
					 $lvl1 = $rs[0];
					 
					 $sql="select lvl2_name from lvl2 where lvl2_id='$lvl_id' ";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);
					 return $lvl1."/".$rs[0];
					 break;
		case "6" :
					 $lvl_id1=substr($lvl_id,0,2);
					 $sql="select lvl1_name from lvl1 where lvl1_id='$lvl_id1' ";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);
					 $lvl1 = $rs[0];
					 
					 $lvl_id2=substr($lvl_id,0,4);
					 $sql="select lvl2_name from lvl2 where lvl2_id='$lvl_id2' ";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);
					 $lvl2 = $rs[0];
		
					 $sql="select lvl3_name from lvl3 where lvl3_id='$lvl_id' ";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);
					 return $lvl1."/".$lvl2."/".$rs[0];
					 break;
		case "8" :
					 $lvl_id1=substr($lvl_id,0,2);
					 $sql="select lvl1_name from lvl1 where lvl1_id='$lvl_id1' ";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);
					 $lvl1 = $rs[0];
					 
					 $lvl_id2=substr($lvl_id,0,4);
					 $sql="select lvl2_name from lvl2 where lvl2_id='$lvl_id2' ";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);
					 $lvl2 = $rs[0];
					 
					 $lvl_id3=substr($lvl_id,0,6);
					 $sql="select lvl3_name from lvl3 where lvl3_id='$lvl_id3' ";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);
					 $lvl3 = $rs[0];
					 
					 $sql="select lvl4_name from lvl4 where lvl4_id='$lvl_id' ";$exec=mysql_query($sql);$rs=mysql_fetch_array($exec);
					 return $lvl1."/".$lvl2."/".$lvl3."/".$rs[0];
					 break;
	}


}
//==================================================================================
}

 class Currency {
   public function bahtEng($thb) {
    list($thb, $ths) = explode('.', $thb);
    $ths = substr($ths.'00', 0, 2);
    $thb = Currency::engFormat(intval($thb)).' Baht';
    if (intval($ths) > 0) {
     $thb .= ' and '.Currency::engFormat(intval($ths)).' Satang';
    }
    return $thb;
   }
   // ตัวเลขเป็นตัวหนังสือ (ไทย)
   public function bahtThai($thb) {
    list($thb, $ths) = explode('.', $thb);
    $ths = substr($ths.'00', 0, 2);
    $thaiNum = array('', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า');
    $unitBaht = array('บาท', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน');
    $unitSatang = array('สตางค์', 'สิบ');
    $THB = '';
    $j = 0;
    for ($i = strlen($thb) - 1; $i >= 0; $i--, $j++) {
     $num = $thb[$i];
     $tnum = $thaiNum[$num];
     $unit = $unitBaht[$j];
     switch (true) {
      case $j == 0 && $num == 1 && strlen($thb) > 1:
       $tnum = 'เอ็ด';
       break;
      case $j == 1 && $num == 1:
       $tnum = '';
       break;
      case $j == 1 && $num == 2:
       $tnum = 'ยี่';
       break;
      case $j == 6 && $num == 1 && strlen($thb) > 7:
       $tnum = 'เอ็ด';
       break;
      case $j == 7 && $num == 1:
       $tnum = '';
       break;
      case $j == 7 && $num == 2:
       $tnum = 'ยี่';
       break;
      case $j != 0 && $j != 6 && $num == 0:
       $unit = '';
       break;
     }
     $S = $tnum.$unit;
     $THB = $S.$THB;
    }
    if ($ths == '00') {
     $THS = 'ถ้วน';
    } else {
     $j = 0;
     $THS = '';
     for ($i = strlen($ths) - 1; $i >= 0; $i--, $j++) {
      $num = $ths[$i];
      $tnum = $thaiNum[$num];
      $unit = $unitSatang[$j];
      switch (true) {
       case $j == 0 && $num == 1 && strlen($ths) > 1:
        $tnum = 'หนึ่ง';
        break;
       case $j == 1 && $num == 1:
        $tnum = '';
        break;
       case $j == 1 && $num == 2:
        $tnum = 'ยี่';
        break;
       case $j != 0 && $j != 6 && $num == 0:
        $unit = '';
        break;
      }
      $S = $tnum.$unit;
      $THS = $S.$THS;
     }
    }
    return $THB.$THS;
   }
   // ตัวเลขเป็นตัวหนังสือ (eng)
   private function engFormat($number) {
    list($thb, $ths) = explode('.', $thb);
    $ths = substr($ths.'00', 0, 2);
    $max_size = pow(10, 18);
    if (!$number)
     return "zero";
    if (is_int($number) && $number < abs($max_size)) {
     switch ($number) {
      case $number < 0:
       $prefix = "negative";
       $suffix = Currency::engFormat(-1 * $number);
       $string = $prefix." ".$suffix;
       break;
      case 1:
       $string = "one";
       break;
      case 2:
       $string = "two";
       break;
      case 3:
       $string = "three";
       break;
      case 4:
       $string = "four";
       break;
      case 5:
       $string = "five";
       break;
      case 6:
       $string = "six";
       break;
      case 7:
       $string = "seven";
       break;
      case 8:
       $string = "eight";
       break;
      case 9:
       $string = "nine";
       break;
      case 10:
       $string = "ten";
       break;
      case 11:
       $string = "eleven";
       break;
      case 12:
       $string = "twelve";
       break;
      case 13:
       $string = "thirteen";
       break;
      case 15:
       $string = "fifteen";
       break;
      case $number < 20:
       $string = Currency::engFormat($number % 10);
       if ($number == 18) {
        $suffix = "een";
       } else {
        $suffix = "teen";
       }
       $string .= $suffix;
       break;
      case 20:
       $string = "twenty";
       break;
      case 30:
       $string = "thirty";
       break;
      case 40:
       $string = "forty";
       break;
      case 50:
       $string = "fifty";
       break;
      case 60:
       $string = "sixty";
       break;
      case 70:
       $string = "seventy";
       break;
      case 80:
       $string = "eighty";
       break;
      case 90:
       $string = "ninety";
       break;
      case $number < 100:
       $prefix = Currency::engFormat($number - $number % 10);
       $suffix = Currency::engFormat($number % 10);
       $string = $prefix."-".$suffix;
       break;
      case $number < pow(10, 3):
       $prefix = Currency::engFormat(intval(floor($number / pow(10, 2))))." hundred";
       if ($number % pow(10, 2))
        $suffix = " and ".Currency::engFormat($number % pow(10, 2));
       $string = $prefix.$suffix;
       break;
      case $number < pow(10, 6):
       $prefix = Currency::engFormat(intval(floor($number / pow(10, 3))))." thousand";
       if ($number % pow(10, 3))
        $suffix = Currency::engFormat($number % pow(10, 3));
       $string = $prefix." ".$suffix;
       break;
      case $number < pow(10, 9):
       $prefix = Currency::engFormat(intval(floor($number / pow(10, 6))))." million";
       if ($number % pow(10, 6))
        $suffix = Currency::engFormat($number % pow(10, 6));
       $string = $prefix." ".$suffix;
       break;
      case $number < pow(10, 12):
       $prefix = Currency::engFormat(intval(floor($number / pow(10, 9))))." billion";
       if ($number % pow(10, 9))
        $suffix = Currency::engFormat($number % pow(10, 9));
       $string = $prefix." ".$suffix;
       break;
      case $number < pow(10, 15):
       $prefix = Currency::engFormat(intval(floor($number / pow(10, 12))))." trillion";
       if ($number % pow(10, 12))
        $suffix = Currency::engFormat($number % pow(10, 12));
       $string = $prefix." ".$suffix;
       break;
      case $number < pow(10, 18):
       $prefix = Currency::engFormat(intval(floor($number / pow(10, 15))))." quadrillion";
       if ($number % pow(10, 15))
        $suffix = Currency::engFormat($number % pow(10, 15));
       $string = $prefix." ".$suffix;
       break;
     }
    }
    return $string;
   }
  }

?>