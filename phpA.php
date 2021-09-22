<?php

$txt1 = "A - (url)";
$txt2 = "B - (html_url)";
$txt3 = "C - (git_url)";
$txt4 = "D - (download_url)";
$txt5 = "E - (self_link)";
$txt6 = "F - (git_link)";
$txt7 = "G - (html_link)";

$url = "https://api.github.com/repos/IlayBenjamin/web-checking-no_1/contents/dataA.txt?ref=main";
$html_url = "https://github.com/IlayBenjamin/web-checking-no_1/blob/main/dataA.txt";
$git_url = "https://api.github.com/repos/IlayBenjamin/web-checking-no_1/git/blobs/8b137891791fe96927ad78e64b0aad7bded08bdc";
$download_url = "https://raw.githubusercontent.com/IlayBenjamin/web-checking-no_1/main/dataA.txt";
$self_link = "https://api.github.com/repos/IlayBenjamin/web-checking-no_1/contents/dataA.txt?ref=main";
$git_link = "https://api.github.com/repos/IlayBenjamin/web-checking-no_1/git/blobs/8b137891791fe96927ad78e64b0aad7bded08bdc";
$html_link = "https://github.com/IlayBenjamin/web-checking-no_1/blob/main/dataA.txt";

$type = "file";
$name = "dataA.txt";
$path = "dataA.txt";

$sha = "8b137891791fe96927ad78e64b0aad7bded08bdc";
$node_id = "B_kwDOGGPuttoAKDhiMTM3ODkxNzkxZmU5NjkyN2FkNzhlNjRiMGFhZDdiZGVkMDhiZGM";
$content = "Cg==\n";
$encoding = "base64";

$fileExp1 = fopen($url, "w");
fwrite($fileExp1, $txt1);
fclose($fileExp1);

$fileExp2 = fopen($html_url, "w");
fwrite($fileExp2, $txt2);
fclose($fileExp2);

$fileExp3 = fopen($git_url, "w");
fwrite($fileExp3, $txt3);
fclose($fileExp3);

$fileExp4 = fopen($download_url, "w");
fwrite($fileExp4, $txt4);
fclose($fileExp4);

$fileExp5 = fopen($self_link, "w");
fwrite($fileExp5, $txt5);
fclose($fileExp5);

$fileExp6 = fopen($git_link, "w");
fwrite($fileExp6, $txt6);
fclose($fileExp6);

$fileExp7 = fopen($html_link, "w");
fwrite($fileExp7, $txt7);
fclose($fileExp7);





#url = https://api.github.com/repos/IlayBenjamin/web-checking-no_1/contents/dataA.txt?ref=main
#html_url = https://github.com/IlayBenjamin/web-checking-no_1/blob/main/dataA.txt
#git_url = https://api.github.com/repos/IlayBenjamin/web-checking-no_1/git/blobs/8b137891791fe96927ad78e64b0aad7bded08bdc
#download_url = https://raw.githubusercontent.com/IlayBenjamin/web-checking-no_1/main/dataA.txt

#self_link = https://api.github.com/repos/IlayBenjamin/web-checking-no_1/contents/dataA.txt?ref=main
#git_link = https://api.github.com/repos/IlayBenjamin/web-checking-no_1/git/blobs/8b137891791fe96927ad78e64b0aad7bded08bdc
#html_link = https://github.com/IlayBenjamin/web-checking-no_1/blob/main/dataA.txt

#type = file
#name = dataA.txt
#path = dataA.txt

#sha = 8b137891791fe96927ad78e64b0aad7bded08bdc
#node_id = B_kwDOGGPuttoAKDhiMTM3ODkxNzkxZmU5NjkyN2FkNzhlNjRiMGFhZDdiZGVkMDhiZGM
#content = Cg==\n
#encoding = base64



?>
