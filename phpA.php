<?php
#"https://api.github.com/repos/$username/$repo/contents/$path";
#phpA.php
#https://ilaybenjamin.github.io/web-checking-no_1/phpA.php

$my = fopen("https://api.github.com/repos/IlayBenjamin/web-checking-no_1/contents/dataA.txt");
$myf = fopen("https://api.github.com/repos/IlayBenjamin/web-checking-no_1/contents/web-checking-no_1/xxx.txt");
$myfilee = fopen("https://ilaybenjamin.github.io/web-checking-no_1/testtfile.txt", "w");

$txt1 = "A - (dataA.txt)";
$txt2 = "B - (xxx.txt)";
$txt3 = "C - (testtfile.txt)";

fwrite($my, $txt1);
fwrite($myf, $txt2);
fwrite($myfilee, $txt3);

$fclose($my);
$fclose($myf);
$fclose($myfilee);

?>
