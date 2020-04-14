
<?php



require "vendor/autoload.php";

$access_token = 'wFJmyBRjsUu7s8WP2ucTr6KhCMjl0h3Wt8UXcbwRM9IG0sRVs6QXWSzUGQ/WX4HCA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgokB5BAFUGGVW9S+KOKDD1HVTa5bZ37mw++zLQsFdGz+vAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '977670d76e802dffac5da90001614136';





    $msg_array = array("สำหรับคลินิคหอบหืด ปรึกษาแพทย์แล้วขอให้คุณนพมาส
    นำใบนัดมายื่นตามวันนัดปกติ เจาะเลือดในช่วงเช้า แล้วกลับบ้านได้ 
    และให้ญาติอายุน้อยมารับยาและใบนัดที่ คลินิคอายุรกรรมชั้น1 ช่วง13:00-15:00น. ขอบคุณค่ะ");
    $usr_array = array("U558b5c782e230de47d355dc94906ecda");
  
$num = count($msg_array);


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


for($i=0;$i<$num;$i++){

$pushID = $usr_array[$i];

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg_array[$i]);
$response = $bot->pushMessage($pushID, $textMessageBuilder);
echo $i." ";
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

}
