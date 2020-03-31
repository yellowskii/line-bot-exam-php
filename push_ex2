
<?php



require "vendor/autoload.php";

$access_token = 'wFJmyBRjsUu7s8WP2ucTr6KhCMjl0h3Wt8UXcbwRM9IG0sRVs6QXWSzUGQ/WX4HCA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgokB5BAFUGGVW9S+KOKDD1HVTa5bZ37mw++zLQsFdGz+vAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '977670d76e802dffac5da90001614136';





    $msg_array = array("เนื่องจากคุณธนโชติ ยังมีอาการไม่คงที่ อายุน้อยไม่ใช่กลุ่มเสี่ยง และยังไม่เคยมาตรวจกับแพทย์เฉพาะทาง 
เห็นควรให้มาตรวจที่คลินิคหอบหืด ในวันที่ 3 เม.ย.63 9.00น. 
ไม่เหมาะสมที่จะมารับยาโดยไม่พบแพทย์ 
รพ.มีมาตรการป้องกันโดยให้คนไข้มีอาการไข้หวัด ตรวจนอกอาคารอยู่แล้ว
ขอบคุณค่ะ" , "สำหรับคลินิคอายุรกรรมโรคหัวใจ จะมีเจ้าหน้าที่ไปเจาะเลือดให้ที่บ้านก่อนวันนัด
พร้อมให้คำแนะนำในการมารับยา หลังแพทย์ปรับยาให้แล้ว
ขอบคุณค่ะ 
");
    $usr_array = array("Ub88fcb8b8a5570706dbf2d832bee8eb9", "U6efaef2cb1602f0428c2083ee106d681");
  
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
