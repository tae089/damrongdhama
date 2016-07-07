<?
//$file = "pdf file name"
//$info[$key] =$value
function createFDF($file,$info){
    $data="%FDF-1.2\n%????\n1 0 obj\n<< \n/FDF << /Fields [ ";
    foreach($info as $field => $val){
        if(is_array($val)){
            $data.='<</T('.$field.')/V[';
            foreach($val as $opt)
                $data.='('.trim($opt).')';
            $data.=']>>';
        }else{
            $data.='<</T('.$field.')/V('.trim($val).')>>';
        }
    }
    $data.="] \n/F (".$file.") /ID [ <".md5(time()).">\n] >>".
        " \n>> \nendobj\ntrailer\n".
        "<<\n/Root 1 0 R \n\n>>\n%%EOF\n";
    return $data;
}
$info['fill_1']="fill_1";
$info['fill_2']="fill_2";
$info['fill_3']="fill_3";
$info['fill_4']="fill_4";
$info['fill_5']="fill_5";
$info['fill_6']="fill_6";
$info['fill_7']="fill_7";
$info['fill_8']="fill_8";

echo createFDF("report1.pdf",$info);
?>