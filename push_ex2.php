
<?php



require "vendor/autoload.php";

$access_token = 'wFJmyBRjsUu7s8WP2ucTr6KhCMjl0h3Wt8UXcbwRM9IG0sRVs6QXWSzUGQ/WX4HCA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgokB5BAFUGGVW9S+KOKDD1HVTa5bZ37mw++zLQsFdGz+vAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '977670d76e802dffac5da90001614136';





    $msg_array = array("สำหรับคุณวรพันธุ์ คลินิคอายุรกรรมหัวใจแจ้งให้มายื่นบัตรนัดและตรวจเลือดในวันนัดเดิม
แล้วกลับบ้านได้ และให้ญาติอายุน้อยนำบัตรประชาชนผู้ป่วยมารับยาและใบนัดใหม่ที่
พยาบาลหน้าคลินิคอายุรกรรมหัวใจ ชั้น 1 เวลา 13.00-15.00น. ขอบคุณค่ะ" , 
"สำหรับคุณสำรวย  ให้มายื่นบัตรนัดและตรวจเลือดในวันนัดเดิม
แล้วกลับบ้านได้ และให้ญาติอายุน้อยนำบัตรประชาชนผู้ป่วยมารับยาและใบนัดใหม่ที่
ห้องจ่ายยา ชั้น 1 เวลา 13.00-15.00น. ขอบคุณค่ะ" ,
 "สำหรับคุณกิมเอ็ง ให้มายื่นบัตรนัดและตรวจเลือดในวันนัดเดิม
แล้วกลับบ้านได้ และให้ญาติอายุน้อยนำบัตรประชาชนผู้ป่วยมารับยาและใบนัดใหม่ที่
ห้องจ่ายยา ชั้น 1 เวลา 13.00-15.00น. ขอบคุณค่ะ");
    $usr_array = array("Ua37579e270f508b49b8d210d43b72680", "U8918b4296d193138e1bd2e83c4580a73", "U8dd712cb34289975c9e07b1ae0f77d8f");
  
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
