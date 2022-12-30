<html>
<head>
<meta http-equiv="Content-Language" content="ru">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Спасибо за заказ</title>
<link type="text/css" href="images/send.css" rel="stylesheet" charset="windows-1251"/>



<?php

// ----------------------------конфигурация-------------------------- // 
$domain = $_SERVER['SERVER_NAME'];
$adminemail="testformland@gmail.com"; // e-mail админа 

$header="From: \"Заявка на фитнес резинка 1\" <admin@$domain>\n"; // от кого
$header.="Content-type: text/html; charset=\"utf-8\""; // кодировка

$date=date("d.m.y"); // число.месяц.год 
 
$time=date("H:i"); // часы:минуты:секунды 
 
$backurl="success.html";  // На какую страничку переходит после отправки письма 
 
//---------------------------------------------------------------------- // 
 
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
 

 
    // формируем URL в переменной $queryUrl
	
    $queryUrl = 'https://sportovar.bitrix24.ru/rest/1/h3qjq1o2za6h9n39/crm.lead.add.json';
    // формируем параметры для создания лида в переменной $queryData
    $queryData = http_build_query(array(
        'fields' => array(
    'TITLE' => ' Набор инструментов Healthy 219000 сум',
    'NAME' => $name,
    'EMAIL' => Array(
           "n0" => Array(
               "VALUE" => "$email",
               "VALUE_TYPE" => "WORK",
           ),
       ),
       'PHONE' => Array(
           "n0" => Array(
               "VALUE" => "$phone",
               "VALUE_TYPE" => "WORK",
           ),
       ),
  ),
        'params' => array("REGISTER_SONET_EVENT" => "Y")
    ));
    // обращаемся к Битрикс24 при помощи функции curl_exec
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $queryData,
    ));
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result, 1);
    if (array_key_exists('', $result)) echo "Ошибка при сохранении лида: ".$result['error_description'].
    "<br/>";
 
 
 
 
 // ----------------------------конфигурация-------------------------- // 
$domain = $_SERVER['SERVER_NAME'];
$adminemail="testformland@gmail.com"; // e-mail админа 

$header="From: \"Заявка на волшебный луч\" <admin@$domain>\n"; // от кого
$header.="Content-type: text/html; charset=\"utf-8\""; // кодировка

$date=date("d.m.y"); // число.месяц.год 
 
$time=date("H:i"); // часы:минуты:секунды 
 
$backurl="success.html";  // На какую страничку переходит после отправки письма 
 
//---------------------------------------------------------------------- // 
 
  
 
// Принимаем данные с формы 
 
$name=$_POST['name']; 
  
$phone=$_POST['phone']; 

$urll=$_SERVER['SERVER_NAME'];
$url=$_SERVER['REQUEST_URI'];

$msg=" 

<p>Телефон: $phone </p>

<p>Имя: $name </p>

"; 
 
 // Отправляем письмо админу  
 
mail("$adminemail", "$to $date $time Заявка 
на волшебный луч", "$msg", "$header"); 
 
// Сохраняем в базу данных 
 
$f = fopen("message.txt", "a+"); 
 
fwrite($f," \n $date $time Заявка 
на волшебный луч"); 
 
fwrite($f,"\n $msg "); 
 
fwrite($f,"\n ---------------"); 
 
fclose($f); 
 
 
// Выводим сообщение пользователю 



echo ' ';

 print "<p></p><script><!-- 
function reload() {location = \"$backurl\"}; setTimeout('reload()', 0); 
//--></script>"; 
exit; 
?>

