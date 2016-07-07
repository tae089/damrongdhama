<?php
/*
$outfdf = fdf_create();
fdf_set_value($outfdf, "fill_1", $volume, 0);

fdf_set_file($outfdf, "report1.pdf");
fdf_save($outfdf, "outtest.fdf");
fdf_close($outfdf);
Header("Content-type: application/vnd.fdf");
$fp = fopen("outtest.fdf", "r");
fpassthru($fp);
unlink("outtest.fdf");
*/
exec ('C:\Program Files (x86)\PDFtk Server\bin\pdftk'." report1.pdf fill_form". 'report1.fdf'." output.pdf flatten" );

?>