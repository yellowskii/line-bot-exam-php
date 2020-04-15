
<?php



require "vendor/autoload.php";

$access_token = 'wFJmyBRjsUu7s8WP2ucTr6KhCMjl0h3Wt8UXcbwRM9IG0sRVs6QXWSzUGQ/WX4HCA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgokB5BAFUGGVW9S+KOKDD1HVTa5bZ37mw++zLQsFdGz+vAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '977670d76e802dffac5da90001614136';





    $msg_array = array("สำหรับคุณสมพร คลินิคอายุรกรรมแจ้งให้มายื่นใบนัดและเจาะเลือดช่วงเช้าตามปกติแล้วกลับบ้านได้
    แล้วให้ญาติอายุน้อยมารับยาและใบนัดที่คลินิคอายุรกรรม ชั้น1 ช่วง 13.00-15.00น.",
                      "สำหรับคุณไพศาล มีการขาดการติดตามผลเลือดมานาน ตั้งแต่ตค.ปีที่แล้ว 
                      เห็นควรให้มาตรวจเจาะเลือดเพื่อปรับยาไม่สามารถให้มารับยาเดิมได้
                      รพ.มีมาตรการป้องกันให้ผู้ป่วยไข้หวัด ตรวจนอกอาคารแล้วเพื่อลดความเสี่ยงของผู้รับบริการอื่นที่จำเป็นต้องมาใช้บริการในอาคาร ขอให้มั่นใจในมาตรการป้องกัน ขอบคุณค่ะ");
    $usr_array = array("U0c98542ecd0bc1584a2ed29c8c7cc01d", "Ufd405ef2395db5dc8e2e4e724f5ae9a0");
  
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
