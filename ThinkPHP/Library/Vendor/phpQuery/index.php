<?php

include 'phpQuery.php'; 

$data = '<div xmlns="http://www.w3.org/1999/xhtml" class="wrap1000 more_top"><h1 class="top_title">2017-09-14中国大陆现货东莞地区<span style="color:#C00;">ABS 深圳东丽 900</span>交易会员报价</h1></div>';

$QQ = '<a xmlns="http://www.w3.org/1999/xhtml" href="tencent://message/?uin=1094844889&amp;Site=&amp;Menu=yes" target="blank"><img border="0" style="float:left;" alt="点击这里给我发消息" src="http://wpa.qq.com/pa?p=1:1094844889:8" /></a>';

phpQuery::newDocument($data);
foreach(pq('div') as $div)     
{   
   $h1 = pq($div)->find('h1')->html();  
   
}

 
foreach(pq('div') as $div)     
{    
   $span= pq($div)->find('span')->html();  
}

$h1 =str_replace('</span>交易会员报价','',$h1);
$h1 =str_replace($span,'',$h1);
$h1 =str_replace('<span style="color:#C00;">','',$h1);

$h1 = explode('中国大陆现货',$h1);
var_dump($h1);
$span = explode(' ',$span);
var_dump($span);

$qq = explode(':',$QQ);
var_dump($qq);

?>