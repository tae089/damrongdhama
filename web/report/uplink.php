    <?
	$nowyear=date("Y")+543;
	$nowmonth=date("m");
	$nowday=date("d");
	$bill_id=$_POST[bill_id];
	unlink("scripts/".$bill_id.".pdf");
	echo "scripts/".$bill_id.".pdf";
	?>		
	